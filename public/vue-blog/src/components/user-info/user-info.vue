<template>
  <div class="myweb-user-info">
    <i class="layui-icon myweb-edit-icon" @click="editUserInfo" v-show="!isEditShow">&#xe642;</i>
    <div class="myweb-user-avator">
      <img ref="avator" :src="userInfo.avator" class="layui-circle"/>
      <div>
        <input v-show="isEditShow" ref="upload_img" type="file" name="uploadImg" @change="uploadImg" class="myweb-upload-img"/>
        <button v-show="isEditShow" class="layui-btn layui-btn-sm layui-btn-normal myweb-upload-btn" @click.stop="uploadBtn">上传头像</button>
      </div>
    </div>
    <div class="myweb-user-text">
      <h1 v-show="!isEditShow">{{userInfo.nick}}</h1>
      <input ref="nick" type="text" v-show="isEditShow" :value="userInfo.nick" class="layui-input myweb-edit-input"/>
      <span v-show="!isEditShow">{{userInfo.desc}}</span>
      <input ref="desc" type="text" v-show="isEditShow" :value="userInfo.desc" class="layui-input myweb-edit-input"/>
      <div>
        <button v-show="isEditShow" class="layui-btn layui-btn-sm layui-btn-normal" @click.stop="submitEditInfo">确认</button>
        <button v-show="isEditShow" class="layui-btn layui-btn-sm layui-btn-primary" @click.stop="cancel">取消</button>
      </div>
    </div>
  </div>
</template>

<script>
import {mapGetters} from 'vuex'

export default {
  data () {
    return {
      nick: '',
      desc: '',
      avator: '',
      isEditShow: false
    }
  },
  // props: {
  //   data: {
  //     type: Object,
  //     default: () => {
  //       return {
  //         nick: 'username',
  //         desc: 'desc',
  //         avator: './avator.jpg'
  //       }
  //     }
  //   }
  // },
  methods: {
    show () {
      this.isEditShow = true
    },
    hidden () {
      this.isEditShow = false
    },
    editUserInfo () {
      this.avator = this.userInfo.avator
      this.isEditShow = true
    },
    uploadBtn () {
      this.$refs.upload_img.click()
    },
    uploadImg (e) {
      this.file = e.target.files
      if (typeof FileReader === 'undefined') {
        alert('您的浏览器不支持图片上传，请升级您的浏览器')
        return false
      }
      let vm = this
      let leng = this.file.length
      if (leng > 0) {
        let reader = new FileReader()
        reader.readAsDataURL(this.file[0])
        reader.onload = function (e) {
          vm.avator = e.target.result
          vm.$refs.avator.src = vm.avator
        }
      }
    },
    cancel () {
      this.avator = ''
      this.$refs.avator.src = this.userInfo.avator
      this.isEditShow = false
    },
    submitEditInfo () {
      let data = {
        'nick': this.$refs.nick.value,
        'avator': this.avator,
        'desc': this.$refs.desc.value
      }
      this.$emit('submitEditInfo', data)
    }
  },
  computed: {
    ...mapGetters([
      'userInfo'
    ])
  }
}
</script>

<style scoped>
  .myweb-user-info {
    text-align: center;
    box-shadow: 0 2px 10px 0 rgba(0,0,0,0.1);
    background-color: #fff;
    padding: 20px;
    margin-bottom: 20px;
  }
  .myweb-user-avator img{
    width: 120px;
    height: 120px;
  }
  .myweb-user-text {
    padding: 10px 0;
  }
  .myweb-user-text h1 {
    padding: 5px 0;
  }
  .myweb-edit-input {
    margin-bottom: 10px;
  }
  .myweb-upload-img {
    display: none;
  }
  .myweb-upload-btn {
    margin-top: 5px;
  }
  .myweb-edit-icon {
    font-size: 20px;
    color: #1E9FFF;
    position: relative;
    top: -15px;
    right: -105px;
    border: 2px solid #b9e7ff;
    border-radius: 6px;
  }
</style>
