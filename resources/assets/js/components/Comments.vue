<template>
    <div>
        <a class="comment"
                v-text="text"
                @click="showCommentForm">
        </a>

        <div class="modal fade" :id="dialog" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">
                            评论列表
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div v-if="dialog.length > 0">
                            <div class="media" v-for="comment in comments">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object avatar" :src="comment.user.avatar">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">{{ comment.user.name }}</h4>
                                    {{ comment.body }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <textarea name="body" type="text" class="form-control" v-model="body" rows="4"></textarea>
                        <button name="sendComment" type="button" class="btn btn-primary" @click="store">
                            发送
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
    export default {
        props: ['type', 'model', 'count'],
        data() {
            return {
                body: '',
                comments: {}
            }
        },
        computed: {
            dialog() {
                return 'comment-dialog-' + this.type + '-' + this.model
            },
            dialogId() {
                return '#' + this.dialog
            },
            text() {
                return this.count + '评论'
            }
        },
        methods: {
            store() {
                axios.post('/api/comment/store', {'type': this.type, 'model': this.model, 'body': this.body})
                    .then(response => {
                        // 将用户信息和填写的内容导入
                        let comment = {
                            user : {
                                name: Xiaohu.name,
                                avatar: Xiaohu.avatar
                            },
                            body: response.data.body
                        }
                        this.comments.push(comment);
                        this.count ++;
                        this.body = ''
                    }) 
            },
            showCommentForm() {
                this.getCommentsCount();
                $(this.dialogId).modal('show')
            },
            getCommentsCount() {
                axios.get('/api/' + this.type + '/' + this.model + '/comment').then(response => {
                    this.comments = response.data.comments;
                });
            }
        }
    }
</script>

<style>
    button[name=sendComment] {
        margin-top: 20px;
    }

    .avatar {
        width: 100px;
    }

    .comment {
        display: block;
        margin: 10px;
        cursor: pointer;
        font-size: 14px;
        color: gray;
    }
    .comment:hover {
        text-decoration: none;
    }
</style>