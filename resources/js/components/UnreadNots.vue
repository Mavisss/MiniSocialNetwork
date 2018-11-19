<template lang="html">
   <li>
      <div class="btn-group">
         <button class="btn btn-light btn-outline-danger dropdown" href="/get_unread" data-toggle="dropdown">
            <i class="fas fa-bell fa-lg"></i>
            <span class="badge badge-danger">{{all_nots_count}}</span>
         </button>
         <div  class="dropdown-menu">
            <ul class="" id="unReadNotification" style="list-style-type:none">
               <div class="clearfix">
                  <li><button id="maarBtn">Mark All As Read</button></li>
                  <li class="border-bottom" v-for="not in nots">
                     <span>{{not.message}}</span>

                        <button v-on:click="mark_as_read" class="btn btn-sm btn-light">
                           <i class="fas fa-check fa-xs"></i>
                        </button>






                  </li>
               </div>

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
         nots: [],
         url: ''

      }
   },
   methods: {
         get_unread(){
            this.$http.get('/get_unread')
               .then( (nots) => {
                  console.log(nots)
                  nots.body.forEach( (not) => {
                     this.$store.commit('add_not', not)
                     this.nots.push(not.data)
                     this.url = "/mark_as_read/"+not.id
                     console.log(this.url)
                  })
               })
         },
         mark_as_read(){
            var _this = this
            this.$http.get('/get_unread')
               .then((nots) =>{
                  var notId = 1321321321
                   var star = this.$routes.push({path:`/mark_as_read/123132`})
                   console.log(star);

               })

         }

   },
   computed: {
      all_nots_count(){
         return this.$store.getters.all_nots_count
      }
   }
}
</script>
<style>
   #unReadNotification{
      width: 300px;
      padding-left: 20px;
      padding-right: 5px;
   }
   #unReadNotification div{
      display: block;
      vertical-align: middle;
   }
   #unReadNotification li {
      padding: 10px;
      display: inline-flex;

   }
   #unReadNotification li span {
      margin: 0 auto;

   }
   #unReadNotification li button {
      background: transparent;
      vertical-align: middle;
      float:right;
   }
   #maarBtn {

   }
</style>
