<template>
  <div>
    <!-- 网站标题 -->
    <h1 class="myweb-title">大吉大利，今晚吃鸡</h1>
    <!-- 顶部导航栏 -->
    <ul class="layui-nav layui-bg-green">
      <li class="layui-nav-item"><a>导航一</a>
        <dl class="layui-nav-child">
          <dd><a>内容1</a></dd>
          <dd><a>内容1</a></dd>
          <dd><a>内容1</a></dd>
        </dl></li>
      <li class="layui-nav-item"><a>导航一</a></li>
      <li class="layui-nav-item"><a>导航一</a></li>
      <li class="layui-nav-item"><a>导航一</a></li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'top-nav'
}
</script>

<style scoped>
  .myweb-title {
    font-size: 36px;
    height: 60px;
    line-height: 60px;
  }
</style>
