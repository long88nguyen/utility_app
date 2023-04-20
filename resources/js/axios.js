import axios from "axios";


import { authStore } from "./stores/auth"

let getAuth = authStore();
let token = getAuth.token;
axios.defaults.headers.common = {'Authorization': `Bearer ${token}`}

export default axios;

