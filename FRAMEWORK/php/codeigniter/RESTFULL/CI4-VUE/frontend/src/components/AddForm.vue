<template>
    <div>
       <div class="title">Add New Product</div>
       <form @submit.prevent="saveProduct">
            <div class="field">
                <div class="control">
                    <input type="text" v-model="title" class="input" placeholder="Title">
                </div>        
            </div>   
            <div class="field">
                <div class="control">
                    <input type="number" v-model="price" class="input" placeholder="price">
                </div>        
            </div>   
            <div class="field">
                <div class="control">
                    <button   class="button is-primary" >Save</button>
                </div>        
            </div>   
       </form> 
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: "AddForm",
    data() {
        return {
            title : "",
            price : "",
        };
    },
    methods: {
        async saveProduct() {
            try {
                await axios.post('product', {
                    title: this.title,
                    price: this.price,
                });
                (this.title = ""),
                (this.price = ""),
                (this.$router.push('/product'));
            } catch (error) {
                console.log(error);
            }
        }
    }
}
</script>