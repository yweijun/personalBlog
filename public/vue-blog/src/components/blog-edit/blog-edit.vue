<template>
  <div class="layui-form myweb-edit-form">
    <div class="layui-form-item">
      <label class="layui-form-label">标题</label>
      <div class="layui-input-block">
        <input type="text" name="title" class="layui-input" v-model="title">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">分类</label>
      <div class="layui-input-block">
        <select name="classify" class="myweb-select" v-model="classify">
          <option value="">请选择一个分类</option>
          <option value="1">分类一</option>
          <option value="2">分类一</option>
          <option value="3">分类一</option>
        </select>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">标签</label>
      <div class="layui-input-block">
        <input type="text" name="tag" class="layui-input" v-model="label">
      </div>
    </div>
    <div class="layui-form-item">
      <uEdit class="uedit" :config="config" ref="UE"></uEdit>
    </div>
    <div class="layui-form-item myweb-button">
      <button class="layui-btn" @click="submit">提交</button>
      <button class="layui-btn layui-btn-primary" @click="back">返回</button>
    </div>
  </div>
</template>

<script>
import UEdit from 'base/uEdit/uEdit'
import {saveBlog} from 'api/blog'

export default {
  data () {
    return {
      config: {
        initialFrameWidth: null,
        initialFrameHeight: 400
      },
      title: '',
      classify: '',
      label: ''
    }
  },
  created () {
    this.$nextTick(() => {
      layui.form.render()
    })
  },
  methods: {
    submit () {
      let data = {
        title: this.title,
        classify_id: this.classify,
        label: this.label,
        content: this.$refs.UE.getUEContent()
      }
      saveBlog(data)
    },
    back () {
      this.$router.back()
    }
  },
  watch: {
    classify () {
      console.log(123123)
      this.$nextTick(() => {
        layui.form.render()
      })
    }
  },
  components: {
    UEdit
  }
}
</script>

<style scoped>
  .myweb-edit-form {
    width:80%;
    margin: 20px auto;
    display: -webkit-flex;
    display: flex;
    flex-direction: column;
  }
  .uedit {
    align-self: center;
  }
  .myweb-button {
    align-self: center;
  }
</style>
