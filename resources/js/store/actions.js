import * as endpoints from '../endpoints';

export const fetchGithubToken = async ({ commit }) => {
  const { data } = await axios.get(endpoints.github.token);

  commit('SET_GITHUB_TOKEN', data.github_token);
}

export const storeGithubToken = async ({ commit }, payload) => {
  await axios.post(endpoints.github.token, { github_token: payload });

  commit('SET_GITHUB_TOKEN', payload);

  commit('TOAST', {
    title: 'Success',
    message: 'Github Token stored successfully.',
    variant: 'success',
  });
}
