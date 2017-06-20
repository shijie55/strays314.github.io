<template>

    <button class="btn btn-sm pull-right"
            v-bind:class="{'btn-info': voted}"
            v-text="text"
            v-on:click="vote">
    </button>

</template>

<script>
    export default {
        props: ['answer', 'count', 'auth'],
        mounted() {
            axios.get('/api/user/' + this.answer + '/vote').then(response => {
                this.voted = response.data.voted
            })
        },
        data() {
            return {
                voted: false
            }
        },
        computed: {
            text() {
                return this.count
            }
        },
        methods: {
            vote() {
                if (this.auth === '') {
                    return false
                }
                axios.post('/api/user/vote',
                    {'answer_id': this.answer,}).then(response => {
                    this.voted = response.data.voted;
                    response.data.voted ? this.count ++ : this.count -- ;
                })
            }
        }
    }
</script>
