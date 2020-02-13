<template>
    <div class="w-100">
        <div class="card-header">
            <p>Welcome, {{ user.name }}!</p>
        </div>
        <div class="card-body">
            <p> Your profile was created: {{ user.created_at }}</p>
            <p class="border-bottom">Your profile email: {{ user.email }}</p>
            <p v-if="editable">The Force is strong with You, {{ user.type }}!</p>
            <p v-else>User, the future is bright for You!</p>
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

        computed: {
            editable() {
                return this.user.type === 'admin';
            }
        },

    }
</script>
