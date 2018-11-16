<template>
    <div class="container">
      <div class="row">
        <p class="text-center" v-if="loading">
          Loading..
        </p>
        <p class="text-center" v-if="!loading">
          <button class="btn btn-success" v-if="status == 0" v-on:click="add_friend">Add Friend</button>
          <button class="btn btn-success" v-if="status == 'pending'" v-on:click="accept_friend">Accept Friend</button>
          <button class="btn btn-success" v-if="status == 'friend'">Friend</button>
          <button class="btn btn-primary" v-if="status == 'waiting'">Friend Request Sent</button>
        </p>

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
        },
        methods: {
          add_friend(){
            this.loading = true
            this.$http.get('/add_friend/' + this.profile_user_id)
            .then((response)=>{
              console.log(response)
              console.log(response.body)
              if (response.body == 1)
                this.status = 'waiting'
                new Noty({
                  type: 'success',
                  layout: 'center',
                  text: 'Friend Request Sent'
                }).show()
                this.loading=  false


            })
          },

          accept_friend(){
            this.loading = true
            this.$http.get('/accept_friend/'+ this.profile_user_id)
            .then((response) => {
              console.log(response)
              if(response.body == 1)
                this.status = 'friend'
                new Noty({
                  type: 'success',
                  layout: 'center',
                  text: 'You guys are now friends'
                }).show()
                this.loading = false

            })
          }
        }
    }
</script>
