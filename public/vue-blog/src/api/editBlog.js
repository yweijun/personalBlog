import axios from 'axios'
import {host} from 'api/config'

export function saveBlog (content) {
  const url = host + 'blog_api/save_blog'

  axios.post(url, content).then((res) => {
    console.log(res)
  }).catch((err) => {
    console.log(err)
  })
}
