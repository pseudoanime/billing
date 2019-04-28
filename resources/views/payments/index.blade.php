<!DOCTYPE html>
<html>

<head>
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- <link href="/css/style.css" rel="stylesheet" type="text/css"> -->
</head>

<body>
    <div class="container">
        <div class="content">
            <h1>Buy my book for £25.00</h1>
            <form action="/charge" method="POST" id="checkout">
                {{ csrf_field() }}
                <input type="hidden" id="stripeToken" name="stripeToken" />
                <input type="hidden" id="stripeEmail" name="stripeEmail" />
                <button id="buy">Buy</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script>
        let stripe = StripeCheckout.configure({
            key:"{{ config('services.stripe.key') }}",
            amount:{{$amount}},
            image:"https://stripe.com/img/documentation/checkout/marketplace.png",
        });
        document.getElementById("buy").addEventListener("click", function(e) {
            stripe.open({
                name:"Marketplace",
                currency:"GBP",
                name:"Testing",
                description:"{{ $description}}",
                locale:"auto",
                token:function(token) {
                    $("#stripeToken").val(token.id);
                    $("#stripeEmail").val(token.email);
                    $("#checkout").submit();
                }
            });
            e.preventDefault();
        });
    </script>
</body>

</html>