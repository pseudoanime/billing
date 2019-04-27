<!DOCTYPE html>
<html>

<head>
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="container">
        <div class="content">
            <h1>Buy my book for £25.00</h1>
            <form action="/charge" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="amount" value="{{ $amount }}">
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="{{ config('services.stripe.key') }}" data-amount="{{ $amount }}" data-currency="GBP" data-name="Testing" data-description="{{ $description }}" data-locale="auto" data-label="Pay with Stripe">
                </script>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

</body>

</html>