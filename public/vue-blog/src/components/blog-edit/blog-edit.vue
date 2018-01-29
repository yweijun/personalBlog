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
      <div class="layui-input-inline">
        <v-select :init="classify" :options="options" @selectItem="selectClass"></v-select>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">标签</label>
      <div class="layui-input-block">
        <input type="text" name="tag" class="layui-input" v-model="label">
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">描述</label>
      <div class="layui-input-block">
        <input type="text" name="desc" class="layui-input" v-model="desc">
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
import VSelect from 'base/v-select/v-select'
import {saveBlog} from 'api/blog'

export default {
  data () {
    return {
      config: {
        initialFrameWidth: null,
        initialFrameHeight: 400
      },
      title: '',
      label: '',
      options: [
        {
          text: '分类1',
          value: 1
        },
        {
          text: '分类2',
          value: 2
        },
        {
          text: '分类3',
          value: 3
        }
      ],
      classify: 1,
      desc: ''
    }
  },
  created () {
    console.log(this.$route)
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
        content: this.$refs.UE.getUEContent(),
        desc: this.desc
      }
      saveBlog(data)
    },
    back () {
      this.$router.back()
    },
    selectClass (val) {
      this.classify = val
    }
  },
  components: {
    UEdit,
    VSelect
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
