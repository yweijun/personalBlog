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
      count: 100,
      blogs: []
    }
  },
  created () {
    this.getBlogs()
    this.$nextTick(() => {
      layui.laypage.render({
        elem: 'pages',
        count: this.count,
        limit: this.limit,
        groups: this.groups,
        curr: this.curr
      })
    }, 20)
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
          this.blogs = res.data
        }
      })
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
    width: 900px;
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
