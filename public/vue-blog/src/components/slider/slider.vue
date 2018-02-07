<template>
    <div class="myweb-left-slider">
      <div>
        <h2 class="myweb-slider-title">时间</h2>
        <ul class="layui-nav layui-nav-tree">
          <li class="layui-nav-item"><a>1月</a>
            <dl class="layui-nav-child">
              <dd><a>文章1</a></dd>
              <dd><a>文章1</a></dd>
              <dd><a>文章1</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item"><a>2月</a>
            <dl class="layui-nav-child">
              <dd><a>文章1</a></dd>
              <dd><a>文章1</a></dd>
              <dd><a>文章1</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item"><a>3月</a></li>
          <li class="layui-nav-item"><a>4月</a></li>
          <li class="layui-nav-item"><a>5月</a></li>
        </ul>
      </div>
  </div>
</template>

<script>

export default {
  methods: {
  }
}
</script>

<style scoped>
  .myweb-left-slider {
    width: 240px;
  }
  .myweb-slider-title {
    font-size: 20px;
    line-height: 28px;
  }
</style>
