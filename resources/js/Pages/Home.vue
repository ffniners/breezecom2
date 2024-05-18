<!--Home.vue-->
<template>
    <div class="container mx-auto py-8">
        <!--
        <h1 class="text-4xl font-bold mb-4">Welcome to {{ appName }}</h1>
        -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            <div v-for="product in products" :key="product.id" class="bg-white rounded-lg shadow-md p-4">
              <a :href="'/product/' + product.id">
                <img :src="product.image" :alt="product.title" class="w-full h-48 object-cover mb-4">
                <h2 class="text-xl font-semibold mb-2">{{ product.title }}</h2>
                <p class="text-gray-600 mb-4">{{ product.description }}</p>
                <div class="flex justify-between items-center">
                    <span class="text-lg font-semibold">${{ product.price }}</span>
                    <!--
                    <inertia-link :href="route('products.show', product.id)" class="bg-blue-500 text-white px-4 py-2 rounded">View Details</inertia-link>
                    -->
                </div>
              </a>
            </div>
        </div>
    </div>
</template>

<script>
//import { usePage } from '@inertiajs/inertia-vue3';
export default {
    props: {
      products: {
        type: Object,
        required: true
      }
    },
    mounted() {
        console.log(this.products); // Log the value of products when the component is mounted
    }
}
</script>
<!--
<template>
    <div>
      <h1>Welcome to Our Shop</h1>
      

      <div v-if="statamicTags">
        <h2>Statamic Tags</h2>
        <ul>
          <li v-for="(value, key) in statamicTags" :key="key">
            {{ key }}: {{ value }}
          </li>
        </ul>
      </div>
  

      <div v-if="products && products.length > 0">
        <h2>Our Products</h2>
        <div v-for="product in products" :key="product.id">
          <h3>{{ product.name }}</h3>
          <p>{{ product.description }}</p>
          <p>Price: ${{ product.price }}</p>
          
        </div>
      </div>
      <div v-else>
        <p>No products available</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      statamicTags: Object,
      products: Array // Assuming you pass the products as an array prop
    }
  };
  </script>
  
-->
  



<!--
<template>
    <div>
      <h1>Welcome to Our Shop</h1>
      <div v-if="statamicTags">
        <h2>Statamic Tags</h2>
        <ul>
          <li v-for="(value, key) in statamicTags" :key="key">
            {{ key }}: {{ value }}
          </li>
        </ul>
      </div>
 
    </div>
  </template>
  
  <script>
  export default {
    props: {
      statamicTags: Object
    }
  };
  </script>
  -->