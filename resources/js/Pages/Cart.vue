<template>
  <div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
      <div v-for="item in cartitems" :key="item.id" class="bg-white shadow-md rounded-lg p-4">
        <div class="flex items-center justify-between">
          <h3 class="text-lg font-semibold">{{ item.product.title }}</h3>
          <p>quantity: {{ item.quantity }}</p>

          <form method="POST" :action="`/!/simple-commerce/cart-items/${item.id}`">
            <input type="hidden" name="_token" :value="csrfToken" autocomplete="off">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_redirect" :value="redirectValue">
            <input type="hidden" name="_error_redirect" :value="errorRedirectValue">
            <input type="hidden" name="_request" :value="requestValue">
            <button type="submit" class="mt-1 block text-sm text-gray-700" @click.prevent="removeItem">Remove</button>
          </form>

        </div>
        <p class="mt-2">Price: {{ item.product.price }}</p>
        <!-- Display other item details as needed -->
      </div>
    </div>
    <div class="mt-8">
      <p>Items Total: {{ itemstotal }}</p>
      <p>Grand Total: {{ grandtotal }}</p>
    </div>
    <button class="mt-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded" @click="redirectToCheckout">
        Proceed to Checkout
    </button>
  </div>
</template>
<script>
export default {

  props: {
    itemstotal: {
      type: String,
      required: true,
    },
    cartitems: {
      type: Array,
      required: true,
    },
    grandtotal: {
      type: String,
      required: true,
    },

  },

  mounted() {
    console.log(this.cartitems); // Log the value of products when the component is mounted
  },
  data() {
    return {
      csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      redirectValue: window.location.href,
      errorRedirectValue: window.location.href,
      requestValue: window.location.href,
    };
  },

  methods: {
    async removeItem(event) {
      try {
        const form = event.target.closest('form');
        console.log('Form action:', form.action);
        console.log('Form method:', form.method);
        console.log('Form data:', new FormData(form));
        const response = await fetch(form.action, {
          method: form.method,
          body: new FormData(form),
        });

        if (response.ok) {
          // Item removed successfully, update the cart items in the component
          this.cartItems = this.cartItems.filter(item => item.id !== form.action.split('/').pop());
        } else {
          // Handle the error case
          console.error('Error removing item from cart');
        }
      } catch (error) {
        console.error('Error removing item from cart', error);
      }
    },
    redirectToCheckout() {
      // Redirect to the checkout page
      window.location.href = '/checkout';
    },
  },
};

</script>





