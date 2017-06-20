<template>
    <div>
        <button class="btn btn-sm btn-default pull-right" data-toggle="modal" data-target="#modal-send-message">
            发送私信
        </button>

        <div class="modal fade" id="modal-send-message" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                        <h4 class="modal-title">
                            发送私信
                        </h4>
                    </div>

                    <div class="modal-body">
                        <div class="alert alert-danger" v-if="status === false" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <strong>私信发送失败!</strong>
                        </div>
                        <div class="alert alert-success" v-if="status === true" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <strong>私信发送成功!</strong>
                        </div>
                        <div class="alert alert-warning" v-if="error" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <strong>{{ error }}</strong>
                        </div>
                        <textarea id="body" name="body" class="form-control" v-model="body" rows="5"></textarea>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary" @click="store">
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
        props: ['user', 'auth'],
        data() {
            return {
                body: '',
                status: '',
                error: ''
            }
        },
        methods: {
            store() {
                if (this.auth === '') { // 验证是否登录
                    this.error = '请先登录！';
                    setTimeout(function () {
                        $('#modal-send-message').modal('hide');
                        this.body = '';
                    }, 2000);
                    return false
                }

                if (this.body === '') { // 验证是否填入了内容
                    this.error = '私信内容不能为空!';
                    return false
                }

                axios.post('/api/user/message', {'user_id': this.user, 'body': this.body}).then(response => {
                    this.status = response.data.status;
                    if (response.data.status === true) {
                        setTimeout(function () {
                            $('#modal-send-message').modal('hide');
                            this.body = '';
                        }, 2000);
                    }
                })
            }
        }
    }
</script>
