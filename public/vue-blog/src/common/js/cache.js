export const StorageUserInfo = () => {
  return localStorage.userinfo ? JSON.parse(localStorage.userinfo) : ''
}
