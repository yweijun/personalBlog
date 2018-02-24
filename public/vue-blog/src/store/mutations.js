import * as types from './mutation-types'

const mutations = {
  [types.SET_USER_INFO] (state, userInfo) {
    localStorage.userinfo = JSON.stringify(userInfo)
    state.userInfo = userInfo
  },
  [types.QUIT_LOGIN] (state) {
    localStorage.userinfo = ''
    state.userInfo = ''
  }
}

export default mutations
