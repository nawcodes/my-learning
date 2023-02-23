<template>
  <v-row>
    <v-col cols="12">
      <h2>Order</h2>
      <v-list>
        <v-list-item v-for="(item, i) in cartItems" :key="i">
          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
            <v-list-item-subtitle>{{ item.price }}</v-list-item-subtitle>
          </v-list-item-content>
          <v-list-item-action>
            <v-btn icon @click="removeItem(item)">
              <v-icon>mdi-minus</v-icon>
            </v-btn>
          </v-list-item-action>
        </v-list-item>
      </v-list>
    </v-col>
  </v-row>
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
