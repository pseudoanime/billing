<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <script>
        var main = {
            csrfToken: "{{csrf_token()}}",
            stripeKey: "{{ config('services.stripe.key') }}"
        }
    </script>
</head>

<body>
    <div id="app">
        <div class="container">
            <div class="content">
                <checkoutform></checkoutform>
            </div>
        </div>
    </div>
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script src="{{ mix('/js/app.js') }}"></script>

</body>

</html>