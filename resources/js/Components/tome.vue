<template>
    <div>
      <h1>Products</h1>
      <ul>
        
        <li v-for="product in products" :key="product.id">
          <h2>{{ product.title }}</h2>
          <p>{{ product.description }}</p>
          <p>Price: {{ product.price }}</p>
          
        </li>
        
      </ul>
    </div>
    <div class="flex">
    <div>
      <h4 class="text-lg font-bold">Lorem ipsum</h4>
      <p class="mt-1">Repudiandae sint consequuntur vel. Amet ut nobis explicabo numquam expedita quia omnis voluptatem. Minus quidem ipsam quia iusto.</p>
    </div>
    <div class="ml-4 flex-shrink-0">
      <svg class="h-16 w-16 border border-gray-300 bg-white text-gray-300" preserveAspectRatio="none" stroke="currentColor" fill="none" viewBox="0 0 200 200" aria-hidden="true">
        <path vector-effect="non-scaling-stroke" stroke-width="1" d="M0 0l200 200M0 200L200 0" />
      </svg>
    </div>
  </div>
  </template>
  
  <script>
  export default {
    props: {
      products: {
        type: Object,
        required: true
      }
    }
  }
  // :products="{{$products->toJson() }}"
  
  </script>


<!--
<template>
    <div>
        <h1>{{ message }}</h1>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: 'Hello, Laravel Blade with Vue using Vite!'
        };
    }
};
</script>

-->