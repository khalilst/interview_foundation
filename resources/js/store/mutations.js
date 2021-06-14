export const SET_LOADING = (state, payload) => state.loading = payload;

export const SET_GITHUB_TOKEN = (state, payload) => state.github.token = payload;

export const TOAST = (state, payload) => {
    window.vm.$bvToast.toast(payload.message, {
      ...payload,
      solid: true,
      appendToast: true,
      toaster: 'b-toaster-top-right',
      autoHideDelay: 5000,
    });
}
