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
                layout: 'topRight',
                text: notification.message
              }).show()
              console.log(notification.message)
            })
      }
    }
  }
</script>
