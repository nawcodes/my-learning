<template>
  <div>
    {{ cartItems }}
  </div>
</template>

<script>
import { mapState, mapGetters } from 'vuex'

export default {
  computed: {
    ...mapGetters('carts', {
      cartItems: 'cartItems'
    }),
    ...mapState('carts', {
      items: 'items'
    })
  }
}

</script>
