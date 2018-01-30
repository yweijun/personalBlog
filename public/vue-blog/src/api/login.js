import axios from 'axios'
import {host} from 'api/config'

/**
 * 登录接口
 * @param data 账号密码
 * @returns {Promise<AxiosResponse<any>>}
 */
export function login (data) {
  const url = host + 'login_api/login'

  return axios.post(url, data).then((res) => {
    return Promise.resolve(res.data)
  }).catch((err) => {
    console.log(err)
  })
}

/**
 * 获取用户信息
 *
 */
export function getUserInfo () {
  const url = host + 'login_api/get_user_info'

  return axios.get(url, {}).then((res) => {
    return Promise.resolve(res.data)
  }).catch((err) => {
    console.log(err)
  })
}
