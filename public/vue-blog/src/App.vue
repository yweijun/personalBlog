<template>
  <div id="app" class="layui-layout-body">
    <div class="layui-main">
      <top-nav></top-nav>
      <router-view></router-view>
    </div>
  </div>
</template>

<script type="text/ecmascript-6">
import Slider from 'components/slider/slider'
import TopNav from 'components/top-nav/top-nav'

export default {
  created () {
    this.$nextTick(() => {
      layui.element.render()
    })
  },
  components: {
    TopNav,
    Slider
  }
}
</script>

<style>

</style>
