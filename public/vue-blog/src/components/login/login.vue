<template>
  <div class="myweb-login layui-bg-gray" v-show="isShow">
    <div class="myweb-login-box">
      <div class="myweb-login-input">
        <label class="layui-form-label">用户名</label>
        <div class="layui-input-block">
          <input type="text" required  lay-verify="required" placeholder="请输入用户名" v-model="username" autocomplete="off" class="layui-input">
        </div>
      </div>
      <div class="myweb-login-input">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-block">
          <input type="password" required  lay-verify="required" placeholder="请输入密码" v-model="password" autocomplete="off" class="layui-input">
        </div>
      </div>
      <button class="layui-btn layui-btn-fluid layui-btn-warm" @click="login">登录</button>
      <span class="myweb-tips">{{tips}}</span>
    </div>
  </div>
</template>

<script>
import {login} from 'api/login'
export default {
  name: 'login',
  props: {
    isShow: {
      type: Boolean,
      default: false
    }
  },
  methods: {
    login () {
      let data = {
        user: this.username,
        pwd: this.password
      }
      login(data).then((res) => {
        if (res.code === 0) {
          this.tips = ''
          this.padding = ''
        } else {
          this.tips = res.msg
        }
      })
    }
  },
  data () {
    return {
      username: '',
      password: '',
      tips: ''
    }
  }
}
</script>

<style scoped>
  .myweb-login {
    position: fixed;
    z-index: 100;
    top: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    display: flex;
    display: -webkit-flex;
    justify-content: center;
    align-items: center;
  }
  .myweb-login-box {
    background: #fff;
    width: 400px;
    height: 230px;
    border: 5px solid #fff;
    padding: 60px 30px 20px 30px;
  }
  .myweb-login-input .layui-input-block{
    margin-left: 90px;
  }
  .myweb-login-input .layui-form-label{
    width: 60px;
    padding: 9px 0;
  }
  .myweb-login-input {
    margin-bottom: 30px;
  }
  .myweb-tips {
    color: red;
    padding: 10px 20px;
    display: block;
  }
</style>
