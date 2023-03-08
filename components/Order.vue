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
        <div v-if="cartItems.length">
        <v-list-item class="text-h6 black--text grey lighten-2">
          <v-list-item-content>
            <v-list-item-title
            >Sub Total</v-list-item-title>
          </v-list-item-content>
          <v-list-action>
            <v-list-item-title>{{ currency(subTotal) }}</v-list-item-title>
          </v-list-action>
        </v-list-item>
        <v-list-group>
          <template v-slot:activator>
           <v-list-item-content>
             <v-list-item-title>
               Additionals
             </v-list-item-title>
           </v-list-item-content>            
          </template>
          <template v-for="(additional, i) in additionals" >
            <v-list-item :key="i">
                <v-list-item-content>
                  <v-list-item-title>
                    {{additional.title}}
                  </v-list-item-title>
                </v-list-item-content>
                <v-list-item-action>
                  <v-list-item-title>
                    {{additional.value}}
                  </v-list-item-title>
                </v-list-item-action>
            </v-list-item>
          </template>
        </v-list-group>
        </div>
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
      remove: 'remove',
    }),
    currency(value) {
      return Intl.NumberFormat('en-US').format(value)
    }
  },
  computed: {
    ...mapGetters('carts', {
      cartItems: 'cartItems',
      itemTotal: 'itemTotal',
      subTotal: 'subTotal'
    }),
    ...mapState('carts', {
      items: 'items',
      additionals: 'additionals'
    })
  }
}

</script>
