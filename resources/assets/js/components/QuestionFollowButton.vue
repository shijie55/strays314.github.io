<template>

    <button class="btn btn-sm btn-info"
            v-bind:class="{'btn-danger': followed, 'hidden': this.auth==this.user}"
            v-text="text"
            v-on:click="follow">
    </button>

</template>

<script>
    export default {
        props: ['question', 'auth', 'user'],
        mounted() {
            if (this.auth === '') {
                return false
            }
            axios.get('/api/question/' + this.question + '/follower',).then(response => {
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
                return this.followed ? '已关注' : '关注该问题'
            }
        },
        methods: {
            follow() {

                axios.post('/api/question/follow',
                    {'question_id': this.question,}).then(response => {
                    this.followed = response.data.followed
                })
            }
        }
    }
</script>
