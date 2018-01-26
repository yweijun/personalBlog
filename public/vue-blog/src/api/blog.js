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
