<template>
      <div>

      </div>
</template>

<script>
  export default{
    mounted(){
      this.listen()
    },
    props: ['id'],
    methods: {
      listen(){
        Echo.private('App.User.' + this.id)
            .notification( (notification) => {
               new Noty({
                type: 'success',
                layout: 'topLeft',
                text: 'Someone sent you friend request'
              }).show()
              console.log(notification)
            })
      }
    }
  }
</script>
