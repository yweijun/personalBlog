<template>
  <div>
    <!-- 网站标题 -->
    <div class="myweb-top">
      <h1 class="myweb-title">大吉大利，今晚吃鸡</h1>
      <div class="myweb-login-reg">
        <button class="layui-btn layui-btn-sm layui-btn-radius layui-btn-normal" @click="login">登录</button>
        <button class="layui-btn layui-btn-sm layui-btn-radius layui-btn-normal">注册</button>
      </div>
    </div>
    <!-- 顶部导航栏 -->
    <ul class="layui-nav layui-bg-green">
      <li class="layui-nav-item"><a>导航一</a>
        <dl class="layui-nav-child">
          <dd><a>内容1</a></dd>
          <dd><a>内容1</a></dd>
          <dd><a>内容1</a></dd>
        </dl></li>
      <li class="layui-nav-item"><a>导航一</a></li>
      <li class="layui-nav-item"><a>导航一</a></li>
      <li class="layui-nav-item"><a>导航一</a></li>
    </ul>
  </div>
</template>

<script>
import {login} from 'api/login'
export default {
  methods: {
    login () {
      login()
    }
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
