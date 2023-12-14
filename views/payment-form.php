
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Stripe Payment Form</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
<?php include 'header.php'; ?>



    <h1>Secure Payment</h1>
    <form action="process-payment.php" method="post" id="payment-form">
        <div>
            <label for="card-number">
                Credit or debit card number
            </label>
            <input type="text" id="card-number" name="card-number" placeholder="Card number">
        </div>
        <div>
            <label for="card-expiry">
                Expiration date (MM/YY)
            </label>
            <input type="text" id="card-expiry" name="card-expiry" placeholder="MM/YY">
        </div>
        <div>
            <label for="card-cvc">
                CVC
            </label>
            <input type="text" id="card-cvc" name="card-cvc" placeholder="CVC">
        </div>
        <div>
            <button type="submit">Pay Now</button>
        </div>
    </form>
    <script>
        var stripe = Stripe('sk_test_51OKVxHHB6lE88qCI4jmq5u5lrvyyHNz0Nh12kRbOYgXYOrJOENUu9cpjsFpm26eMJnXhKJyRom8y0bsVJl62oThX00yABVLHxu');
        var elements = stripe.elements();

        var cardNumberElement = elements.create('cardNumber');
        cardNumberElement.mount('#card-number-element');
        
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(cardNumberElement).then(function(result) {
                if (result.error) {
                    // Display error to your customer
                    console.error(result.error.message);
                } else {
                    // Token represents the card token
                    var token = result.token;
                    // Insert the token ID into the form so it gets submitted to the server
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    form.appendChild(hiddenInput);
                    // Submit the form
                    form.submit();
                }
            });
        });
    </script>
        <?php include 'footer.php'; ?>
</body>
</html>