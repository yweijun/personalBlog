<template>
  <div class="myweb-main-item" :data-id="data.article_id">
    <h2 class="myweb-content-item-top"><span @click="selectItem(data.article_id)">{{data.title}}</span></h2>
    <div class="myweb-content-item-center layui-elip" v-html="data.desc"></div>
    <div class="myweb-content-item-footer">
      <div>
        <a>{{data.u_nick}}</a>
        <span>发布于 {{data.add_time}}</span>
      </div>
      <div class="myweb-operation" v-if="canOperate">
        <button class="myweb-blog-edit-btn layui-btn layui-btn-xs layui-btn-warm">编辑</button>
        <button class="myweb-blog-delete-btn layui-btn layui-btn-xs layui-btn-danger" @click="deleteItem(data.article_id)">删除</button>
      </div>
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
    },
    canOperate: {
      type: Boolean,
      default: false
    }
  },
  methods: {
    selectItem (item) {
      this.$emit('select', item)
    },
    deleteItem (item) {
      this.$emit('delete', item)
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
    margin: 0 5px 10px 5px;
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
    padding: 10px 40px 20px 40px;
  }
  .myweb-content-item-footer {
    padding: 5px 20px;
    display: -webkit-flex;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
  }
  .myweb-content-item-footer>span {
    color: #1E9FFF;
  }
  .myweb-content-item-footer>span:hover{
    color: #93D1FF;
  }
</style>
