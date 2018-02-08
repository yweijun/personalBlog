import * as types from './mutation-types'

export const setUserInfo = function ({commit}, {userInfo}) {
  commit(types.SET_USER_INFO, userInfo)
}
