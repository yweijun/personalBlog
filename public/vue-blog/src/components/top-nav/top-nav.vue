<template>
  <div>
    <!-- 网站标题 -->
    <div class="myweb-top">
      <h1 class="myweb-title" @click="backToIndex">大吉大利，今晚吃鸡</h1>
      <div class="myweb-login-reg">
        <div class="layui-inline" v-show="!userInfo.nick">
          <button class="layui-btn layui-btn-sm layui-btn-radius layui-btn-normal" @click="loginBoxShow">登录</button>
          <button class="layui-btn layui-btn-sm layui-btn-radius layui-btn-normal">注册</button>
        </div>
        <div ref="dropDown" class="layui-inline myweb-user-login" v-show="userInfo">
          <div class="myweb-user-info" @click="toggleInfoBox">
            <img :src="userInfo.avator" class="layui-circle"/>
            <span>{{userInfo.nick}}</span>
            <img ref="array" class="myweb-array" src="./down.png"/>
          </div>
          <ul class="myweb-user" v-show="isShowInfoBox">
            <li @click="goUserPage">个人中心</li>
            <li @click="quit">退出</li>
          </ul>
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
      classify: [],
      isShowInfoBox: false
    }
  },
  created () {
    // this.getUserInfos()
    this.getClassify()
    console.log(this.userInfo)
  },
  methods: {
    // 退出登录
    quit () {
      this.quitLogin()
      this.backToIndex()
    },
    // 登录框显示
    loginBoxShow () {
      this.loginShow = true
    },
    // 头部下拉菜单的显示隐藏,点击div外部隐藏下拉框
    toggleInfoBox () {
      this.isShowInfoBox ? this.infoBoxHide() : this.infoBoxShow()
    },
    infoBoxShow () {
      this.isShowInfoBox = true
      addEventListener('click', this.handleBox, false)
    },
    infoBoxHide () {
      this.isShowInfoBox = false
      removeEventListener('click', this.handleBox, false)
    },
    handleBox (e) {
      if (!this.$refs.dropDown.contains(e.target)) {
        this.infoBoxHide()
      }
    },
    // 返回首页
    backToIndex () {
      this.$router.push('/mainContent')
    },
    // 确认登录
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
    // 跳转用户个人中心
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
    // 获取分类
    getClassify () {
      getClassify().then((res) => {
        console.log(res)
        this.classify = res.data
        this.$nextTick(() => {
          layui.element.render()
        })
      })
    },
    // 获取用户信息
    getUserInfos () {
      getUserInfo().then((res) => {
        if (res.code === 0) {
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
      'setUserInfo': 'SET_USER_INFO',
      'quitLogin': 'QUIT_LOGIN'
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
  .myweb-user-login {
    position: relative;
  }
  .myweb-user {
    margin-right: 20px;
    position: absolute;
    top: 36px;
    right: 0;
    width: 100px;
    background-color: #fff;
    text-align: center;
    z-index: 99;
    border-radius: 5px;
    padding: 5px 0;
  }
  .myweb-user li {
    padding: 5px 0;
  }
  .myweb-user li:hover {
    background-color: #ddd;
  }
  .myweb-user-info {
    padding-right: 20px;
  }
  .myweb-user-info img{
    width: 30px;
    height: 30px;
  }
  .myweb-user-info .myweb-array {
    width: 16px;
    height: 16px;
  }
</style>
