<?php

require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_51OIbx3JKH5PpJW72JmMQkMtO2sDX8ze7KUBmiuieQUTy5pxDelf7YQlidU8gc4o1vKep8LapmPJVfo2fqPW1Rd9n00NnlKXfgh');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        isset($_POST["user"]) &&
        isset($_POST["cours"]) &&
        isset($_POST["periode"]) &&
        isset($_POST["totalAmount"])
    ) {
        // Cast $_POST['cours'] to an integer
        $coursValue = (int)$_POST['cours'];

        $ins = new Inscri(
            null,
            $_POST['user'],
            $coursValue,
            $_POST['periode']
        );

        $coursC->addInscription($ins);

        // Get the total amount from the form
        $totalAmount = $_POST["totalAmount"];

        // Create a charge
        try {
            $charge = \Stripe\Charge::create([
                'amount' => $totalAmount * 100,  // Convert amount to cents
                'currency' => 'usd',
                'description' => 'Course Payment',
                'source' => $_POST["stripeToken"],
            ]);

            // Payment successful, you can redirect or do other actions here
            header('Location: success.php'); // Redirect to success page
            exit();
        } catch (\Stripe\Exception\CardException $e) {
            // Handle card error (e.g., incorrect number, insufficient funds)
            $error = $e->getMessage();
        } catch (\Stripe\Exception\RateLimitException $e) {
            // Handle rate limit error
            $error = $e->getMessage();
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            // Handle invalid request error
            $error = $e->getMessage();
        } catch (\Stripe\Exception\AuthenticationException $e) {
            // Handle authentication error
            $error = $e->getMessage();
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            // Handle network communication error
            $error = $e->getMessage();
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Handle generic API error
            $error = $e->getMessage();
        }

        // If the code reaches here, an error occurred
        echo "Error: " . $error;
    }
}

?>
<script>
    var stripe = Stripe('pk_test_51OIbx3JKH5PpJW72sqqX0jUONkzSleP0w7S84plj2krgEzdSpdEzdod3v1VYav9XoqxjFJtqLLVVOh7XdVsw6l1l00VvIUKhUX');
var elements = stripe.elements();

var card = elements.create('card');
card.mount('#card-element');

var payButton = document.getElementById('payButton');

payButton.addEventListener('click', function () {
  stripe.createToken(card).then(function (result) {
    if (result.error) {
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server to charge the user
      var token = result.token.id;
      var totalAmount = document.getElementById('totalAmount').innerText;

      // Send token and totalAmount to your server for payment processing
      // Use AJAX or form submission to send data to the server
      // Handle payment processing and redirection on the server
    }
  });
});

</script>
<!-- Include Stripe.js -->
<script src="https://js.stripe.com/v3/"></script>

<form action="process_payment.php" method="post" id="payment-form">
  <div class="form-group">
    <label for="card-element">
      Credit or debit card
    </label>
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>
    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>
  </div>

  <button type="submit">Submit Payment</button>
</form>

<!-- Additional JavaScript for handling the Stripe Element -->
<script src="js/stripe.js"></script>
