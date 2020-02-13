<template>
    <div class="card w-25">
        <div class="card-header">
            <p class="text-danger">{{ user.name }}</p>
        </div>
        <div class="card-body">
            <p> This profile was created: {{ user.created_at }}</p>
            <p class="border-bottom">This profile email: {{ user.email }}</p>
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
  //
        },

    }
</script>
