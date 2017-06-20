<template>

    <button class="btn btn-sm btn-info pull-left"
            v-bind:class="{'btn-danger': followed}"
            v-text="text"
            v-on:click="follow">
    </button>

</template>

<script>
    export default {
        props: ['user', 'auth'],
        mounted() {
            if (this.auth === '') {
                return false
            }
            axios.get('/api/user/' + this.user + '/follower').then(response => {
                this.followed = response.data.followed
            })
        },
        data() {
            return {
                followed: false
            }
        },
        computed: {
            text() {
                return this.followed ? '已关注' : '关注'
            }
        },
        methods: {
            follow() {
                axios.post('/api/user/follow',
                    {'user_id': this.user,}).then(response => {
                    this.followed = response.data.followed
                })
            }
        }
    }
</script>
