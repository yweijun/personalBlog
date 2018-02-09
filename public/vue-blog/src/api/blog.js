import axios from 'axios'
import {host} from 'api/config'

/**
 * 保存博客
 * @param content 保存数据
 */
export function saveBlog (content) {
  const url = host + 'blog_api/save_blog'

  return axios.post(url, content).then((res) => {
    console.log(res)
    return Promise.resolve(res.data)
  }).catch((err) => {
    console.log(err)
  })
}

/**
 * 获取博客列表
 * @param page 页码
 * @param limit 每页数据数量
 */
export function getBlogs (page, limit) {
  const url = host + 'blog_api/get_blogs'

  return axios.post(url, {
    page: page,
    limit: limit
  }).then((res) => {
    return Promise.resolve(res.data)
  }).catch((err) => {
    console.log(err)
  })
}
/**
 * 获取某篇博客详情
 * @param id 文章id
 */
export function getBlogDetail (id) {
  const url = host + 'blog_api/get_blog_detail'

  return axios.post(url, {
    id: id
  }).then((res) => {
    return Promise.resolve(res.data)
  }).catch((err) => {
    console.log(err)
  })
}

/**
 * 获取用户博客
 */
export function getUserBlogs (page, limit) {
  const url = '/api/blog_api/get_user_blogs'

  return axios.post(url, {
    page: page,
    limit: limit
  }).then((res) => {
    return Promise.resolve(res.data)
  }).catch((err) => {
    console.log(err)
  })
}

/**
 * 删除某一篇文章
 * @param id 文章id
 */
export function deleteOneBlog (id) {
  const url = '/api/blog_api/delete_one_blog'

  return axios.post(url, {
    id: id
  }).then((res) => {
    return Promise.resolve(res.data)
  }).catch((err) => {
    console.log(err)
  })
}

/**
 * 获取顶部分类
 */
export function getClassify () {
  const url = '/api/blog_api/get_classify'

  return axios.post(url, {}).then((res) => {
    return Promise.resolve(res.data)
  }).catch((err) => {
    console.log(err)
  })
}
