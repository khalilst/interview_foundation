<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Github Token</div>

          <div class="card-body">

            <b-form @submit="onSubmit">
              <b-form-group>
                <b-form-input
                  v-model="token"
                  type="text"
                  required
                  placeholder="Enter Github Token"
                ></b-form-input>

              </b-form-group>

              <b-form-group v-if="!token">
                <small>
                  <span>No Token? Click </span>

                  <a href="https://docs.github.com/en/free-pro-team@latest/github/authenticating-to-github/creating-a-personal-access-token" target="_blank">
                    here
                  </a>

                  <span> to learn how to make token</span>
                </small>
              </b-form-group>

              <b-button type="submit" variant="primary" class="px-5">
                <b-spinner v-if="isLoading"></b-spinner>
                <span v-else>Save</span>
              </b-button>
            </b-form>
          </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
  import { mapState } from 'vuex';
  import * as endpoints from '../endpoints';

  export default {
    name: 'github-token-form',

    data() {
      return {
        token: null,
      }
    },

    computed: {
      ...mapState(['loading', 'github']),

      isLoading() {
        return this.loading === endpoints.github.token;
      },
    },

    async mounted() {
      window.vm = this;
      await this.$store.dispatch('fetchGithubToken');
      this.token = this.github.token;
    },

    methods: {
      onSubmit(event) {
        event.preventDefault();

        this.$store.dispatch('storeGithubToken', this.token);
      },
    },
  }
</script>
