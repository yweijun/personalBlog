<template>
  <div class="myweb-main-item">
    <h2 class="myweb-content-item-top"><span @click="selectItem(data.title)">{{data.title}}</span></h2>
    <div class="myweb-content-item-center layui-elip" v-html="data.content"></div>
    <div class="myweb-content-item-footer">
      <a>{{data.u_nick}}</a>
      <span>{{data.add_time}}</span>
    </div>
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
    background-color: #fff;
    flex-direction: column;
    margin: 5px;
    box-shadow: 0 2px 10px 0 rgba(0,0,0,0.1);
    border-left: 5px solid #fff;
  }
  .myweb-main-item:hover {
    border-left: 5px solid #5FB878;
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
