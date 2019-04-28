<template>
  <form>
    <input type="hidden" v-model="stripeToken" name="stripeToken">
    <input type="hidden" v-model="stripeEmail" name="stripeEmail">
    <button id="buy" @click.prevent="buy">Buy my book</button>
  </form>
</template>

<script>
export default {
  data() {
    return {
      stripeEmail: "",
      stripeToken: ""
    };
  },
  created() {
    var vm = this;
    this.stripe = StripeCheckout.configure({
      key: main.stripeKey,
      amount: 2500,
      image: "https://stripe.com/img/documentation/checkout/marketplace.png",
      locale: "auto",
      token: function(token) {
        vm.stripeToken = token.id;
        vm.stripeEmail = token.email;
        axios.post("/checkout", vm.$data).then(response => alert("all done"));
      }
    });
  },
  methods: {
    buy() {
      this.stripe.open({
        name: "Marketplace",
        currency: "GBP",
        name: "Testing",
        description: "Testing"
      });
    }
  }
};
</script>
