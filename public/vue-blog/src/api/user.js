import axios from 'axios'

/**
 * 编辑用户信息
 *@param data 修改数据
 */
export function editUserInfo (data) {
  // const url = host + 'login_api/get_user_info'
  const url = '/api/user_api/edit_user_info'

  return axios.post(url, data).then((res) => {
    return Promise.resolve(res.data)
  }).catch((err) => {
    console.log(err)
  })
}
