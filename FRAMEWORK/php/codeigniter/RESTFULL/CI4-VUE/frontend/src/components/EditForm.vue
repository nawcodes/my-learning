<template>
    <div>
       <div class="title">Edit Product</div>
       <form @submit.prevent="updateProduct">
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
                    <button   class="button is-primary" >Update</button>
                </div>        
            </div>   
       </form> 
    </div>
</template>


<script>
import axios from 'axios';
export default {
    name: "editForm",
    data() {
        return {
            title: "",
            price: "",
        }
    },
    created() {
        this.getProductById();
    },
    methods: {
        async getProductById() {
            try {
                const response = await await axios.get(`product/${this.$route.params.id}`, {
                    title: this.title,
                    price: this.price,
                });
                this.title = response.data.title;
                this.price = response.data.price;
                // (this.title = ""), (this.price = ""), (this.$router.push("/product"));
            } catch (error) {
                console.log(error);
            }
        },

        async updateProduct() {
            try {
                await axios.put(`product/${this.$route.params.id}`, {
                    title: this.title,
                    price: this.price,
                });

                (this.title = ''), (this.price = ''), (this.$router.push("/product"));
            }catch(error) {
                console.log(error);
            }
        }
    }
}
</script>
