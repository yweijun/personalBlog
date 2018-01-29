<template>
  <div class="blog-detail">
    <div class="myweb-top">
      <h1>【Welcome to .NET Core】ASP.NET Core中间件介绍</h1>
      <div>编辑时间：{{detail.add_time}} 作者：{{detail.u_nick}}</div>
    </div>
    <div class="myweb-blog-content lay-ignore" v-html="detail.content"></div>
  </div>
</template>

<script>
import {getBlogDetail} from 'api/blog'

export default {
  name: 'blog-detail',
  data () {
    return {
      id: '',
      detail: {}
    }
  },
  created () {
    this.id = this.$route.query.id
    this.getBlogDetail()
  },
  methods: {
    getBlogDetail () {
      getBlogDetail(this.id).then((res) => {
        if (res.code === 0) {
          this.detail = res.data
        }
      })
    }
  }
}
</script>

<style scoped>
  .blog-detail {
    margin: 20px 0;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 1px 8px #a6a6a6
  }
  .myweb-top {
    text-align: center;
  }
  .myweb-top h1{
    text-align: center;
    padding: 20px 10px 20px 10px;
  }
  .myweb-top div{
    border: 1px dashed #808080;
    padding: 5px;
  }
  .myweb-blog-content {
    margin: 10px 0;
  }
</style>
