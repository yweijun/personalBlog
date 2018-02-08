<template>
  <div>
    <!-- 网站标题 -->
    <div class="myweb-top">
      <h1 class="myweb-title" @click="backToIndex">大吉大利，今晚吃鸡</h1>
      <div class="myweb-login-reg">
        <button class="layui-btn layui-btn-sm layui-btn-radius layui-btn-normal" @click="edit">添加</button>
        <div class="layui-inline" v-show="!userInfo.nick">
          <button class="layui-btn layui-btn-sm layui-btn-radius layui-btn-normal" @click="loginBoxShow">登录</button>
          <button class="layui-btn layui-btn-sm layui-btn-radius layui-btn-normal">注册</button>
        </div>
        <div class="layui-inline" v-show="userInfo">
          <h2 @click="goUserPage">{{userInfo.nick}}</h2>
        </div>
      </div>
    </div>
    <!-- 顶部导航栏 -->
    <ul class="layui-nav layui-bg-green">
      <li class="layui-nav-item" v-for="item in classify">
        <a :data-id="item.classify_id">{{item.classify_name}}</a>
      </li>
    </ul>
    <login ref="loginBox" @loginSubmit="loginSubmit" :isShow="loginShow" :tips="loginTips"></login>
  </div>
</template>

<script>
import Login from 'components/login/login'
import {getUserInfo, login} from 'api/login'
import {getClassify} from 'api/blog'
import {mapGetters, mapMutations} from 'vuex'

export default {
  data () {
    return {
      loginShow: false,
      userData: {},
      loginTips: '',
      classify: []
    }
  },
  created () {
    // this.getUserInfos()
    this.getClassify()
  },
  methods: {
    loginBoxShow () {
      this.loginShow = true
    },
    backToIndex () {
      this.$router.push('/mainContent')
    },
    edit () {
      this.$router.push('/blogEdit')
    },
    loginSubmit (data) {
      login(data).then((res) => {
        if (res.code === 0) { // 登录成功
          this.loginTips = ''
          this.loginShow = false
          this.getUserInfos()
        } else {
          this.loginTips = res.msg
        }
      })
    },
    goUserPage () {
      this.$router.push({
        path: '/UserPage',
        query: {
          avator: this.userInfo.u_avator,
          nick: this.userInfo.u_nick,
          desc: this.userInfo.u_desc
        }
      })
    },
    getClassify () {
      getClassify().then((res) => {
        console.log(res)
        this.classify = res.data
        this.$nextTick(() => {
          layui.element.render()
        })
      })
    },
    getUserInfos () {
      getUserInfo().then((res) => {
        if (res.code === 0) {
          // this.userData = res.data
          let data = {
            avator: res.data.u_avator,
            nick: res.data.u_nick,
            desc: res.data.u_desc
          }
          this.setUserInfo(data)
        }
      })
    },
    ...mapMutations({
      'setUserInfo': 'SET_USER_INFO'
    })
  },
  computed: {
    ...mapGetters([
      'userInfo'
    ])
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
