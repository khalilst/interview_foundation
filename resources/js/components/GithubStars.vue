<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
              <b-button
                type="submit"
                class="px-5"
                variant="primary"
                :disabled="!github.token"
                @click="loadRepos"
              >
                <span v-if="isLoading">
                  Getting Your Data
                  <b-spinner ></b-spinner>
                </span>
                <span v-else>Get Starred Repos</span>
              </b-button>
          </div>

          <div class="card-body">
            <b-list-group>
              <b-list-group-item v-for="star in github.stars" :key="star.id">
                <a :href="star.url" _target="blank">{{ star.name }}</a>
              </b-list-group-item>
            </b-list-group>
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
    name: 'github-stars',

    computed: {
      ...mapState(['loading', 'github']),

      isLoading() {
        return this.loading === endpoints.github.stars;
      }
    },

    mounted() {
      window.vm = this;
    },

    methods: {
      loadRepos(event) {
        event.preventDefault();

        this.$store.dispatch('fetchGithubStars');
      },
    },
  }
</script>
