<template>
  <section>
    <v-row align="center">
      <v-col cols="10">
        <v-autocomplete
        label="Search product"
        variant="solo"
        :search-input.sync="search"
        :loading="isLoading"
        :items="itemsSearch"
        item-text="title"
        item-value="id"
        v-model="selectedSearch"
        return-object
        hide-no-data
        >

        </v-autocomplete>
      </v-col>
      <v-col cols="2">
        <v-menu>
          <template v-slot:activator="{ on: category }">
            <v-btn v-on="category" color="primary">
              Category
            </v-btn>
          </template>

          <v-list>
            <v-list-item-group v-model="categoryId">
              <v-list-item v-for="(category, i) in categories" :key="i" :value="category.id" :disabled="category.id == categoryId">
                <v-list-item-title >
                  {{ category.title }}
                </v-list-item-title>
              </v-list-item>
            </v-list-item-group>
          </v-list>
        </v-menu>
      </v-col>

    </v-row>
    <v-row>
      <v-col
        v-for="(product, i) in filteredProducts"
        :key="i"
        :value="product.id"
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
  </section>


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

import { mapState } from 'vuex';

export  default  {
  data() {
    return {
      categoryId: false,
      search: null,
      isLoading: false,
      itemsSearch: [],
      selectedSearch: null,
      categories: [
        { id: false, title: 'All'},
        { id: 1, title: 'Smartphone'},
        { id: 2, title: 'Camera' },
        { id: 3, title: 'Television'}
      ],
    }
  },
  computed: {
    filteredProducts() {
      if(this.categoryId) {
        console.log(this.categoryId);
        return this.products.filter(product => product.categoryId == this.categoryId);
      }else if(this.selectedSearch) {
        return this.products.filter(product => product.title == this.selectedSearch.title);
      }

      return this.products;
    },
    ...mapState('products', {
      products: 'products'
    })
  },
  methods: {
    resetCategoryId() {
      this.categoryId = false;
    }
  },
  watch: {
    search(val) {
      this.isLoading = true;
      setTimeout(() => {
        this.itemsSearch = this.products.filter(product => {
          this.isLoading = false;
          this.resetCategoryId();
          return product.title;
        });
      }, 500);
    }
  }
}

</script>
