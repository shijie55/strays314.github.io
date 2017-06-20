<template>
    <div class="avatar">
        <my-upload field="img"
                   @crop-success="cropSuccess"
                   @crop-upload-success="cropUploadSuccess"
                   @crop-upload-fail="cropUploadFail"
                   v-model="show"
                   :width="100"
                   :height="100"
                   url="/user/avatar/change"
                   :params="params"
                   :headers="headers"
                   img-format="png"></my-upload>
        <div class="avatar-button">
            <img :src="imgDataUrl" class="avatar-img">
            <button class="btn btn-default" @click="toggleShow">上传头像</button>
        </div>
    </div>
</template>

<script>
    import 'babel-polyfill'; // es6 shim
    import myUpload from 'vue-image-crop-upload/upload-2.vue';

    export default {
        props: ['avatar'],
        data() {
            return {
                show: false,
                params: {
                    _token: document.head.querySelector('meta[name="csrf-token"]').content,
                    name: 'img'
                },
                headers: {
                    smail: '*_~'
                },
                imgDataUrl: this.avatar // the datebase64 url of created image
            }
        },
        components: {
            'my-upload': myUpload
        },
        methods: {
            toggleShow() {
                this.show = !this.show;
            },
            /**
             * crop success
             *
             * [param] imgDataUrl
             * [param] field
             */
            cropSuccess(imgDataUrl, field){
                // console.log('-------- crop success --------');
                this.imgDataUrl = imgDataUrl;
            },
            /**
             * upload success
             *
             * [param] jsonData  server api return data, already json encode
             * [param] field
             */
            cropUploadSuccess(jsonData, field){
                this.toggleShow();
                /*console.log('-------- upload success --------');
                console.log(jsonData);
                console.log('field: ' + field);*/
            },
            /**
             * upload fail
             *
             * [param] status    server api return error status, like 500
             * [param] field
             */
            cropUploadFail(status, field){
                console.log('-------- upload fail --------');
                console.log(status);
                console.log('field: ' + field);
            }
        }
    }
</script>

<style>
    .avatar {
        width: 100%;
        text-align: center;
    }
    .avatar-button {
        width: 100px;
        margin: 0 auto;
    }
    .avatar-button button{
        margin-top: 10px;
    }
</style>