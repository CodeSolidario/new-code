const hostname = window.location.hostname
export const apiDomain = 'http://' + hostname + ':8001/'

export const getHeaderPublic = function () {
    return {
      'Accept': 'application/json'
    }
}

export const getHeader = function () {
    const auth = JSON.parse(window.localStorage.getItem('auth'))
    return {
        'Accept': 'application/json',
        'Authorization': 'Bearer ' + auth.token
    }
}

export const getHeaderFile = function () {
    const auth = JSON.parse(window.localStorage.getItem('auth'))
    return {
        'Accept': 'application/json, image/*, file/*, .avi, video/*, application/octet-stream, application/*, .zip, .rar, .csv',
        'Authorization': 'Bearer ' +  auth.token
    }
}

export const userRegister = apiDomain + 'api/register'
export const userLogin = apiDomain + 'api/login'
export const userLogout = apiDomain + 'api/logout'
export const resetPass = apiDomain + 'api/reset-pass'
export const verifyToken = apiDomain + 'api/verify-token'
export const alterPass = apiDomain + 'api/alter-pass'
export const userResource = apiDomain + 'api/user'
export const projectResource = apiDomain + 'api/project'
export const postResource = apiDomain + 'api/post'
export const commentResource = apiDomain + 'api/comment'
export const userImage = apiDomain + 'api/user-image'
export const goProject = apiDomain + 'api/go-project'
