import axios from 'axios'
import {host} from 'api/config'

export function login () {
  const url = host + 'login_api/login'

  const data = {
    user: 'admin',
    pwd: '123456'
  }
  axios.post(url, data).then((res) => {
    console.log(res)
  }).catch((err) => {
    console.log(err)
  })
}
