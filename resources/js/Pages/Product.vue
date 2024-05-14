<!--Product.vue-->
<template>
    <div class="product-page">
      <div class="product-image">
        <img :src="product[0].image" :alt="product[0].title" />
      </div>
      <div class="product-details">
        <h1>{{ product[0].title }}</h1>
        <p class="price">{{ formatPrice(product[0].price) }}</p>
        <p class="description">{{ product[0].description }}</p>
        <form v-bind="formAttrs">
      <div v-html="formParams"></div>
      <input type="hidden" name="product" :value="productId" />
      <input type="text" name="quantity" v-model="quantity" />
      <button @click.prevent="addToCart">Add to Cart</button>
    </form>
       
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: { 
      product: {
        type: Object,
        required: true
      },
    formAttrs: {
      type: Object,
      required: true,
    },
    formParams: {
      type: String,
      required: true,
    },
    productId: {
      type: String,
      required: true,
    },
    cartitems: {
      type: String,
      required: true
    },
  },

    data() {
      return {
        quantity: 1,
      };
    },
    mounted() {
        console.log(this.cartitems); // Log the value of products when the component is mounted
    },

    
    methods: {
      formatPrice(price) {
        return  price;
      },
      addToCart() {
        // Logic to add the product to the cart
        console.log(`Adding ${this.quantity} unit(s) of ${this.product[0].title} to the cart. ${this.product}`)
        console.dir(this.product[0].title);;
        // You can make an API call to add the product to the cart using the Statamic Simple Commerce endpoints
        // Example: axios.post('/cart', { product_id: this.product.id, quantity: this.quantity });
        this.$el.querySelector('form').submit();
      },
    },
  };
  </script>
  
  <style scoped>
  .product-page {
    display: flex;
    gap: 20px;
  }
  
  .product-image img {
    max-width: 100%;
    height: auto;
  }
  
  .product-details {
    flex: 1;
  }
  
  .price {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
  }
  
  .description {
    margin-bottom: 20px;
  }
  
  .add-to-cart {
    display: flex;
    align-items: center;
    gap: 10px;
}

</style>

<!--
   <div class="add-to-cart">
          <label for="quantity">Quantity:</label>
          <input type="number" id="quantity" v-model="quantity" min="1" />
          <button @click="addToCart">Add to Cart</button>
        </div>
-->