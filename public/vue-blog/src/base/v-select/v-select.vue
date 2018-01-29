<template>
  <div class="layui-unselect layui-form-select" :class="{'layui-form-selected': selectShow}">
    <div class="layui-select-title" @click="selectToggle">
      <input type="text" placeholder="请选择" readonly="readonly" :value="currentValue.text" class="layui-input layui-unselect">
      <i class="layui-edge"></i>
    </div>
    <dl class="layui-anim layui-anim-upbit" v-show="selectShow">
      <dd :class="{'layui-this': currentValue.value === item.value}"
          v-for="(item, key) in options"
          :key="key"
          @click="selectItem(item)"
      >{{item.text}}</dd>
    </dl>
  </div>
</template>

<script>
export default {
  name: 'v-select',
  data () {
    return {
      selectShow: false,
      currentValue: {
        text: '',
        value: null
      }
    }
  },
  created () {
    this.options && this.options.forEach((item) => {
      if (item.value == this.init) {
        this.currentValue = item
      }
    })
  },
  props: {
    options: {
      type: Array,
      default: null
    },
    init: null
  },
  methods: {
    selectToggle () {
      this.selectShow = !this.selectShow
    },
    selectItem (item) {
      this.currentValue = item
      this.value = item.value
      console.log(this.value)
      this.selectToggle()
      this.$emit('selectItem', item.value)
    }
  }
}
</script>

<style scoped>

</style>
