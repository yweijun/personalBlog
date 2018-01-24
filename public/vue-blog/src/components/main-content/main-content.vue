<template>
  <div class="myweb-content layui-fluid">
    <!-- 左侧边栏 -->
    <slider></slider>
    <div class="myweb-main-content">
      <blog-item :key="key" v-for="(item, key) in blogs" :data="item" @select="goToBlogDetail"></blog-item>
      <!-- 分页 -->
      <div id="pages" class="myweb-pages"></div>
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import Slider from 'components/slider/slider'
import BlogItem from 'components/blog-item/blog-item'

export default {
  data () {
    return {
      curr: 1,
      limit: 5,
      groups: 5,
      count: 100,
      blogs: [
        {
          title: '如果有一天程序员再也不忙了',
          shortContent: '概述 转眼到18年了，从大二暑假到软件公司到至今，也满一年了，从未发表过文章。今天且记录这个功能。 作为一个刚入门的程序员，代码存不规范，代码中有错误，请各位看到本文章的大神们指点，在下感激不尽 2、代码 3、调用 1， 单个字段 生成的sql 2 多个字段 生成的sql 4、结束 下面这个，不 ',
          author: '作者',
          time: '发布于 2018-01-19 13:40'
        },
        {
          title: '如果有一天程序员再也不忙了',
          shortContent: '概述 转眼到18年了，从大二暑假到软件公司到至今，也满一年了，从未发表过文章。今天且记录这个功能。 作为一个刚入门的程序员，代码存不规范，代码中有错误，请各位看到本文章的大神们指点，在下感激不尽 2、代码 3、调用 1， 单个字段 生成的sql 2 多个字段 生成的sql 4、结束 下面这个，不 ',
          author: '作者',
          time: '发布于 2018-01-19 13:40'
        }
      ]
    }
  },
  created () {
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
      this.$router.push('/blogEdit')
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
</style>
