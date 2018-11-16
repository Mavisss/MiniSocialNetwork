<template lang="html">
   <li>
      <div class="btn-group">
         <button class="btn btn-light btn-outline-danger dropdown" href="/get_unread" data-toggle="dropdown">
            Unread Notifications
            <span class="badge badge-danger">{{all_nots_count}}</span>
         </button>
         <div v-on:click="mark_as_read" class="dropdown-menu">
            <ul>
               <li v-for="message in messages">{{message}}</li>

            </ul>
         </div>
      </div>

   </li>
</template>

<script>
export default {
   mounted(){
      this.get_unread()
   },
   data(){
      return {
         messages: []
      }
   },
   methods: {
         get_unread(){
            this.$http.get('/get_unread')
               .then( (nots) => {
                  nots.body.forEach( (not) => {
                     this.$store.commit('add_not', not)
                     this.messages.push(not.data.message)
                  })
               })
         },
         mark_as_read(){

         }
   },
   computed: {
      all_nots_count(){
         return this.$store.getters.all_nots_count
      }
   }
}
</script>
