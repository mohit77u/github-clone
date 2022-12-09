import { defineStore } from 'pinia'
import axios from 'axios'
// define octakit
import { Octokit } from "@octokit/core";

const octokit = new Octokit({
  auth: import.meta.env.VITE_GITHUB_ACCESS_TOKEN
})

export const usersStore = defineStore('gitUser', {
    // arrow function recommended for full type inference
    state: () => {
      return {
        // all these properties will have their type inferred automatically
        user: [],
        gitHubUser: [],
      }
    },
    // all getters
    getters: {
      // userData: function(state){
      //     return state.user
      // },
    },
    // all actions
    actions: {
      getUser(){
        return new Promise((resolve, reject) => {
        axios.get('/user')
        .then((res) => {
          this.$patch({
            user: res.data.user
          })
          resolve(res)
          const accessToken = res.data.user.access_token
          const octokit = new Octokit({
            auth: accessToken
          })
          octokit.request('GET /user', {})
          .then((res) => {
            this.$patch({
              gitHubUser: res.data
            })
            resolve(res)
          }).catch((err) => {
            reject(err)
          })
          }).catch((err) => {
            reject(err)
          })
        })
      },
    },
  })