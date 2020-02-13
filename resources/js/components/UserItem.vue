<template>
    <div class="card w-25">
        <div class="card-header">
            <p class="text-danger">{{ user.name }}</p>
        </div>
        <div class="card-body">
            <p> This profile was created: {{ user.created_at }}</p>
            <p class="border-bottom">This profile email: {{ user.email }}</p>
            <p>user has written <a v-bind:href="url">{{ user.articles_count }} articles</a></p>
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
        },

        data: function ()
        {
            return {
                url: '/user/' + this.user.id + '/article'
          }
        },

        methods: {
            banUser(){
                //priskirti kita user.type
            },

            deleteUser(){
                //istrinti useri
            },

            makeAdmin(){
                //priskirti admin role
            }

        }

    }
</script>
