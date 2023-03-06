<template>
  <v-row>
    <v-col cols="12">
      <h2>Order</h2>
      <v-list>
        <v-list-item v-for="(item, i) in cartItems" :key="i">
          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
            <v-list-item-subtitle>

              {{ currency(item.price) }} x

               <v-btn
                   icon
                    depressed
                    class="px-2"
                    color="primary"
                    x-small
                    @click="decrement(item.id)">
                  <v-icon>
                    mdi-chevron-down
                  </v-icon>
                </v-btn>
              {{ item.quantity }}
               <v-btn
                     icon
                      depressed
                      class="px-2"
                      color="primary"
                      x-small
                      @click="increment(item.id)">

                    <v-icon>
                      mdi-chevron-up
                    </v-icon>
                  </v-btn>
            </v-list-item-subtitle>
          </v-list-item-content>
          <v-list-item-action>
            <v-btn
            icon
            color="error"
            x-small
            @click="remove(item.id)"
            >
              <v-icon>
                mdi-close-thick
              </v-icon>
            </v-btn>
            <v-list-item-title>{{ currency(itemTotal(item.price, item.quantity)) }}</v-list-item-title>
          </v-list-item-action>
        </v-list-item>
      </v-list>
    </v-col>
  </v-row>
</template>

<script>
import { mapState, mapGetters, mapActions } from 'vuex'

export default {
  methods: {
    ...mapActions('carts', {
      increment: 'increment',
      decrement: 'decrement',
      remove: 'remove'
    }),
    currency(value) {
      return Intl.NumberFormat('en-US').format(value)
    }
  },
  computed: {
    ...mapGetters('carts', {
      cartItems: 'cartItems',
      itemTotal: 'itemTotal',
    }),
    ...mapState('carts', {
      items: 'items'
    })
  }
}

</script>
