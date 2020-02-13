<template>
    <div class="w-100">
        <div v-show="state === 'default'" class="bg-light rounded">
            <div class="d-flex justify-content-between">
                <p class="text-black ml-3 m-1">{{ comment.content }}</p>
                <button v-if="editable" @click="state = 'editing'" class="btn btn-danger m-1">Edit</button>
            </div>
            <div>
                <p class="blockquote-footer ml-3 m-1">{{ comment.name }}<span>.</span>{{ comment.created_at }}
                </p>
            </div>
        </div>
        <div v-show="state === 'editing'">
            <div>
                <h5 class="text-danger">Update Comment</h5>
            </div>
            <textarea v-model="data.content"
                      placeholder="Update comment"
                      class="rounded w-100"
                      rows="3"
                      cols="35">
            </textarea>
            <div class="p-1 d-flex justify-content-between">
                <div>
                    <button class="btn btn-danger" @click="saveEdit">Update</button>
                    <button class="btn btn-danger" @click="resetEdit">Cancel</button>
                </div>
                <button class="btn btn-danger" @click="deleteComment">Delete</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            user: {
                required: true,
                type: Object,
            },

            comment: {
                required: true,
                type: Object,
            },

        },

        data: function () {
            return {
                state: 'default',
                data: {
                    content: this.comment.content,
                }
            }
        },

        computed: {
            editable() {
                if (this.user.id === this.comment.user_id) {
                    return true;
                } else if (this.user.type === 'admin') {
                    return true;
                } else {
                    return false;
                }
            }
        },

        methods: {
            resetEdit() {
                this.state = 'default';
                this.data.content = this.comment.content;
            },

            saveEdit() {
                this.state = 'default';

                this.$emit('comment-updated', {
                    'id': this.comment.id,
                    'content': this.data.content,
                });
            },

            deleteComment() {
                this.$emit('comment-deleted', {
                    'id': this.comment.id,
                });
            },

        }
    }
</script>
