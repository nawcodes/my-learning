<template>
  <v-row>
    <v-col
      v-for="(product, i) in products"
      :key="i"
      cols="2"
    >
      <v-card :title="product.title" :ripple="true">
        <v-card-actions>
          <v-img :src="require(`@/assets/images/products/${product.image}`)"></v-img>
        </v-card-actions>
        <v-card-text class="product-title">
          {{ product.title }}
        </v-card-text>
      </v-card>
    </v-col>
  </v-row>


</template>

<style scoped>
  .product-title{
    text-align: center;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
</style>

<script>

export  default  {
  data() {
    return {
      products: [
        {
          id : 1,
          title : 'Asus zenfone',
          image : 'asus-zenfone.png',
          price: 1000000,
          category: 'Smartphone'
        },
        {
          id: 2,
          title: 'Canon EOS 700D',
          image: 'canon-eos-700d.png',
          price: 1290000,
          category: 'Camera'
        },
        {
          id: 3,
          title: 'Canon EOS 750D',
          image: 'canon-eos-750d.png',
          price: 3050000,
        },
        {
          id: 4,
          title: 'Iphone 6s',
          image: 'iphone-6-silver.png',
          price: 5000000,
        },
        {
          id: 5,
          title: 'Lenovo A7000',
          image: 'Lenovo-A7000.png',
          price: 2000000,

        },
        {
          id: 6,
          title: 'LG 32 LED TV 32LF550A',
          image: 'lg-32-led-tv-32LF550A.png',
          price: 3000000,
        },
        {
          id: 7,
          title: 'LG LED TV 32 32LF520A',
          image: 'lg-led-tv32-32LF520A.png',
          price: 4000000,
        },
        {
          id: 8,
          title: 'MI 4i',
          image: 'mi-4i.png',
          price: 5000000,

        },
        {
          id: 9,
          title: 'Nikon D3200',
          image: 'nikon-d3200.png',
          price: 6000000,
        },
        {
          id: 10,
          title: 'Nikon D5200',
          image: 'nikon-d5200.png',
          price: 7000000,
        },
        {
          id: 11,
          title: 'Samsung Galaxy A3',
          image: 'samsung-galaxy-A3.png',
          price: 8000000,
        },
        {
          id: 12,
          title: 'Samsung Galaxy A8',
          image: 'samsung-galaxy-A8.png',
          price: 2402000,
        },
        {
          id: 13,
          title: 'Samsung Galaxy Grand Prime',
          image: 'samsung-galaxy-grand-prime.png',
          price: 9000000,
        },
        {
          id: 14,
          title: 'Samsung Galaxy Note 3',
          image: 'samsung-galaxy-note-3.png',
          price: 1000000,
        },
        {
          id: 15,
          title: 'Sharp 32 LED TV LC-32LE265i',
          image: 'sharp-32-led-32LE265i.png',
        }
      ]
    }
  }
}

</script>
