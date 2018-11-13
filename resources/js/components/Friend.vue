<template>
    <div class="container">
      <div class="row">
        <p class="text-center" v-if="loading">
          Loading..
        </p>
        <div class="text-center" v-if="!loading">
          <button class="btn btn-success" v-if="status == 0">Add Friend</button>
          <button class="btn btn-success" v-if="status == 'pending'">Accept Friend</button>
          <button class="btn btn-success" v-if="status == 'friend'">Friend</button>
        </div>

      </div>
    </div>
</template>

<script>
    export default {
        mounted() {
             this.$http.get('/check_relationship_status/'+ this.profile_user_id)
            .then( (response) => {
              console.log(response)
              this.status = response.body.status
              this.loading = false
            })
        },
        props: ['profile_user_id'],
        data(){
          return {
            status: '',
            loading: true
          }
        }
    }
</script>
