<template>
  <div id="app" class="layui-layout-body">
    <div class="layui-main">
      <top-nav></top-nav>
      <!--<main-content></main-content>-->
      <keep-alive>
        <router-view></router-view>
      </keep-alive>
    </div>
  </div>
</template>

<script type="text/ecmascript-6">
import Slider from 'components/slider/slider'
import TopNav from 'components/top-nav/top-nav'
import MainContent from 'components/main-content/main-content'

export default {
  created () {
    this.$nextTick(() => {
      layui.element.render()
    })
  },
  components: {
    TopNav,
    Slider,
    MainContent
  }
}
</script>

<style>
  .myweb-content {
    padding: 15px 0;
    display: flex;
    display: -webkit-flex;
    align-items: flex-start;
    justify-content: space-between;
  }
</style>
