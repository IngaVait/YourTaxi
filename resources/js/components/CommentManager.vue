<template>
    <div class="justify-content-center">
        <div class="w-100 d-flex flex-column align-content-center justify-content-around">
            <div class="p-2">
                <h4 class="text-danger">Comments</h4>
            </div>
            <div v-if="user">
            <textarea v-model="data.content"
                      rows="4"
                      cols="35"
                      placeholder="Add a comment"
                      class="border rounded m-2"
                      :class="[state === 'editing' ? 'h-24' : 'h-10']"
                      @focus="startEditing">
              </textarea>
                <div v-show="state === 'editing'"
                     class="p-2">
                    <button class="btn btn-danger" @click="saveComment">Save</button>
                    <button class="btn btn-danger" @click="resetComment">Cancel</button>
                </div>
            </div>
            <div v-else class="text-secondary d-flex justify-content-center align-content-center">
                <p>Please, login to comment!</p>
            </div>
        </div>
        <div class="p-2">
            <comment v-for="comment in comments"
                     :key="comment.id"
                     :user="user"
                     :comment="comment"
                     @comment-updated="updateComment($event)"
                     @comment-deleted="deleteComment($event)">
            </comment>
        </div>
    </div>
</template>

<script>
    import comment from './CommentItem'

    export default {
        name: "comment-manager",

        components: {
            comment
        },

        props: {
            user: {
                required: true,
                type: [Object, Boolean]
            },
            article: {
                type: [Number],
                required: true,
            },
        },

        data: function () {
            return {
                state: 'default',
                data: {
                    content: '',
                },
                comments: [],
            }
        },

        created() {
            this.fetchComments();
            console.log(this.comments);
        },

        methods: {

            fetchComments() {
                const t = this;

                axios.get('/api/article/' + t.article + '/comments')
                    .then(({data}) => {
                        t.comments = data;
                    })
                    .catch(error => console.log(error))
            },


            updateComment($event) {
                const t = this;
                axios.put(`/api/comments/${$event.id}`+ '?api_token=' + t.user.api_token, $event)

                    .then(({data}) => {
                        t.comments[t.commentIndex($event.id)].content = data.content;
                    })

            },

            resetComment() {
                this.state = 'default';
                this.data.content = '';
            },

            deleteComment($event) {
                const t = this;

                axios.delete(`/api/comments/${$event.id}`+ '?api_token=' + t.user.api_token, $event)
                    .then(() => {
                        t.comments.splice(t.commentIndex($event.id), 1);
                    })
            },

            startEditing() {
                this.state = 'editing';
            },

            stopEditing() {
                this.state = 'default';
                this.data.content = '';
            },

            saveComment() {
                const t = this;

                axios.post('/api/comments/' + t.article + '?api_token=' + t.user.api_token, t.data)
                    .then(({data}) => {
                        t.comments.push(data);

                        t.stopEditing();
                    })
            },

            commentIndex(commentId) {
                return this.comments.findIndex((element) => {
                    return element.id === commentId;
                });
            }

        }

    }
</script>
