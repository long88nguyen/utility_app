import ApiService from "./api";
import { commonStore } from "../stores/modules/commonStore.js";
import { pinia } from "../stores/index.js";
import Toast from "../helpers/toast.js";
const common = commonStore(pinia);

/**
 * HTTP STATUS CODE
 */
const HTTP_UNAUTHORIZED = 401;
const HTTP_FORBIDDEN = 403;
const HTTP_UNPROCESSABLE_ENTITY = 422;
const HTTP_INTERNAL_SERVER_ERROR = 500;

export default {
  async post(url, params = {}) {
    try {
      if (common.isCallingApi) return;
      common.isCallingApi = true;
      return await ApiService.post(url, params);
    } catch (e) {
      return this._setError(e);
    } finally {
      common.isCallingApi = false;
    }
  },
  async put(url, params = {}) {
    try {
      if (common.isCallingApi) return;
      common.isCallingApi = true;
      return await ApiService.put(url, params);
    } catch (e) {
      return this._setError(e);
    } finally {
      common.isCallingApi = false;
    }
  },
  async get(url, params = {}) {
    try {
      // if(common.isCallingApi)
      //     return
      common.isCallingApi = true;
      return await ApiService.get(url, params);
    } catch (e) {
      return this._setError(e);
    } finally {
      common.isCallingApi = false;
    }
  },

  async delete(url, params = {}) {
    try {
      if (common.isCallingApi) return;
      common.isCallingApi = true;
      return await ApiService.delete(url, params);
    } catch (e) {
      return this._setError(e);
    } finally {
      common.isCallingApi = false;
    }
  },

  async export(url, params = {}) {
    try {
      return await ApiService.get(url, params, { responseType: "blob" });
    } catch (e) {
      e.response.data = JSON.parse(await e.response.data.text());
      return this._setError(e);
    }
  },

  async _setError(e) {
    common.isCallingApi = false;

    switch (e.response?.status) {
      case HTTP_UNPROCESSABLE_ENTITY:
        // e.response.data.status = HTTP_UNPROCESSABLE_ENTITY;
        e.response.data.message = "";
        return e.response.data;
        break;
      case HTTP_UNAUTHORIZED:
        return e.response.data;
        // await router.push({name: 'Login'})
        break;
      case HTTP_FORBIDDEN:
        // await router.push({name: 'Forbidden'})
        break;
      case HTTP_INTERNAL_SERVER_ERROR:
        console.log(e.response.data.message);
        Toast.fire({
          icon: "error",
          title: e.response.data.message || "Lỗi hệ thống",
        });
        // return;
        break;
    }
    return e.response.data;
  },
};
