<template>
  <div class="myweb-content layui-fluid">
    <!-- 左侧边栏 -->
    <slider></slider>
    <div class="myweb-main-content">
      <blog-item :key="key" v-for="(item, key) in blogs" :data="item" @select="goToBlogDetail"></blog-item>
      <!-- 分页 -->
      <div id="pages" class="myweb-pages"></div>
    </div>
  </div>
</template>

<script>
import Slider from 'components/slider/slider'
import BlogItem from 'components/blog-item/blog-item'
import {getBlogs} from 'api/blog'

export default {
  data () {
    return {
      curr: 1,
      limit: 5,
      groups: 5,
      total: 0,
      blogs: []
    }
  },
  created () {
    this.getBlogs()
    this.laypageRender()
  },
  methods: {
    goToBlogDetail (item) {
      this.$router.push({
        path: '/BlogDetail',
        query: {
          id: item
        }
      })
    },
    getBlogs () {
      getBlogs(this.curr, this.limit).then((res) => {
        if (res.code === 0) {
          this.blogs = res.data.list
          this.total = res.data.total
          this.laypageRender()
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
    }
  },
  components: {
    Slider,
    BlogItem
  }
}
</script>

<style scoped>
  .myweb-main-content {
    width: 880px;
    display: flex;
    display: -webkit-flex;
    flex-direction: column;
  }
  .myweb-content-item-top :hover {
    color: #ca0c16;
  }
  .myweb-content-item-footer>a {
    color: #1E9FFF;
  }
  .myweb-content-item-footer>a:hover{
    color: #93D1FF;
  }
  .myweb-pages {
    display: flex;
    display: -webkit-flex;
    justify-content: center;
  }
  .myweb-content {
    padding: 15px 0;
    display: flex;
    display: -webkit-flex;
    align-items: flex-start;
    justify-content: space-between;
  }
</style>
