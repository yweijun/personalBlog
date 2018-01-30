<template>
  <div>
    <!-- 网站标题 -->
    <div class="myweb-top">
      <h1 class="myweb-title" @click="backToIndex">大吉大利，今晚吃鸡</h1>
      <div class="myweb-login-reg">
        <button class="layui-btn layui-btn-sm layui-btn-radius layui-btn-normal" @click="edit">添加</button>
        <div class="layui-inline" v-show="!userData">
          <button class="layui-btn layui-btn-sm layui-btn-radius layui-btn-normal" @click="login">登录</button>
          <button class="layui-btn layui-btn-sm layui-btn-radius layui-btn-normal">注册</button>
        </div>
        <div class="layui-inline" v-show="userData">
          <h2>{{userData.u_nick}}</h2>
        </div>
      </div>
    </div>
    <!-- 顶部导航栏 -->
    <ul class="layui-nav layui-bg-green">
      <li class="layui-nav-item">
        <a>导航一</a>
        <dl class="layui-nav-child">
          <dd><a>内容1</a></dd>
          <dd><a>内容1</a></dd>
          <dd><a>内容1</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a>导航一</a></li>
      <li class="layui-nav-item"><a>导航一</a></li>
      <li class="layui-nav-item"><a>导航一</a></li>
    </ul>
    <login :isShow="loginShow"></login>
  </div>
</template>

<script>
import Login from 'components/login/login'
import {getUserInfo} from 'api/login'

export default {
  data () {
    return {
      loginShow: false,
      userData: {}
    }
  },
  created () {
    getUserInfo().then((res) => {
      if (res.code === 0) {
        this.userData = res.data
      }
    })
  },
  methods: {
    login () {
      this.loginShow = true
    },
    backToIndex () {
      this.$router.push('/mainContent')
    },
    edit () {
      this.$router.push('/blogEdit')
    }
  },
  components: {
    Login
  }
}
</script>

<style scoped>
  .myweb-top {
    display: flex;
    display: -webkit-flex;
    justify-content: space-between;
    align-items: center;
  }
  .myweb-title {
    font-size: 36px;
    height: 60px;
    line-height: 60px;
  }
  .myweb-login-reg {

  }
</style>
