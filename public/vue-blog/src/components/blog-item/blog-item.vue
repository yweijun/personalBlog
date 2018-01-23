<template>
  <div class="myweb-main-item">
    <h2 class="myweb-content-item-top"><span @click="selectItem(data.title)">{{data.title}}</span></h2>
    <div class="myweb-content-item-center">{{data.shortContent}}</div>
    <div class="myweb-content-item-footer">
      <a>{{data.author}}</a>
      <span>{{data.time}}</span>
    </div>
    <hr class="layui-bg-gray">
  </div>
</template>

<script>
export default {
  data () {
    return {}
  },
  props: {
    data: {
      type: Object,
      default: null
    }
  },
  methods: {
    selectItem (item) {
      this.$emit('select', item)
    }
  }
}
</script>

<style scoped>
  .myweb-main-item {
    display: flex;
    display: -webkit-flex;
    flex-direction: column;
  }
  .myweb-content-item-top {
    font-size: 20px;
    padding: 10px;
    font-family: Verdana,PingFang SC,Hiragino Sans GB,Arial,Microsoft YaHei,Roboto,Noto,Helvetica Neue,sans-serif !important;
    color: #4f4f4f;
    font-weight: bold;
  }
  .myweb-content-item-top :hover {
    color: #ca0c16;
  }
  .myweb-content-item-center {
    font-size: 14px;
    line-height: 20px;
    color: #333;
    padding: 0 20px;
  }
  .myweb-content-item-footer {
    padding: 5px 20px;
  }
  .myweb-content-item-footer>span {
    color: #1E9FFF;
  }
  .myweb-content-item-footer>span:hover{
    color: #93D1FF;
  }
</style>
