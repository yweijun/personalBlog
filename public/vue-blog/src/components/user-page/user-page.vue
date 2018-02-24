<template>
  <div class="myweb-content layui-fluid">
    <div class="myweb-left">
      <user-info ref="userInfo" @submitEditInfo="submitEditInfo"></user-info>
    </div>
    <div class="myweb-right">
      <blog-item :key="key" v-for="(item, key) in blogs"
                 :data="item"
                 @select="goToBlogDetail"
                 :canOperate="canOperate"
                 @delete="deleteBlog"
      ></blog-item>
      <!-- 分页 -->
      <div id="pages" class="myweb-pages"></div>
    </div>
  </div>
</template>

<script>
import UserInfo from 'components/user-info/user-info'
import BlogItem from 'components/blog-item/blog-item'
import {getUserBlogs, deleteOneBlog} from 'api/blog'
import {editUserInfo} from 'api/user'
import {mapGetters, mapMutations} from 'vuex'

export default {
  data () {
    return {
      curr: 1,
      limit: 5,
      groups: 5,
      total: 0,
      blogs: [],
      canOperate: true
    }
  },
  created () {
    // 判断用户是否登录
    if (this.userInfo.length <= 0) {
      this.$router.push('/mainContent')
      return false
    }
    this.getBlogs()
    this.laypageRender()
    this.layer = layui.layer
  },
  methods: {
    getBlogs () {
      getUserBlogs(this.curr, this.limit).then((res) => {
        if (res.code === 0) {
          this.blogs = res.data.list
          this.total = res.data.total
          this.laypageRender()
        }
      })
    },
    goToBlogDetail (item) {
      this.$router.push({
        path: '/BlogDetail',
        query: {
          id: item
        }
      })
    },
    deleteBlog (item) {
      this.layer.confirm('确认删除这篇文章吗?', {
        btn: ['确认', '取消'],
        yes: (index, layero) => {
          deleteOneBlog(item).then((res) => {
            if (res.code === 0) {
              this.layer.open({
                content: '删除成功！'
              })
              this.getBlogs()
            } else {
              this.layer.open({
                content: '删除失败！'
              })
            }
          })
        },
        btn2: (index, layero) => {
          console.log('取消删除')
        }
      })
    },
    laypageRender () {
      this.$nextTick(() => {
        layui.laypage.render({
          elem: 'pages',
          count: this.total,
          limit: this.limit,
          groups: this.groups,
          curr: this.curr,
          jump: (obj, first) => {
            if (!first) {
              this.curr = obj.curr
              this.getBlogs()
            }
          }
        })
      }, 20)
    },
    submitEditInfo (data) {
      editUserInfo(data).then((res) => {
        if (res.code === 0) {
          layui.layer.open({
            content: '修改成功'
          })
          this.setUserInfo(res.data)
          this.$refs.userInfo.hidden()
        } else {
          layui.layer.open({
            content: '修改失败'
          })
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
    UserInfo,
    BlogItem
  }
}
</script>

<style scoped>
  .myweb-content {
    padding: 15px 0;
    display: flex;
    display: -webkit-flex;
    align-items: flex-start;
    justify-content: space-between;
  }
  .myweb-left {
    width: 240px;
  }
  .myweb-right {
    width: 880px;
    display: flex;
    display: -webkit-flex;
    flex-direction: column;
  }
</style>
