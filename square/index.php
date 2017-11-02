<html>
<head>
    <title>My Payment Form</title>
    <script type="text/javascript" src="https://js.squareup.com/v2/paymentform"></script>
    <script type="text/javascript">
        var sqPaymentForm = new SqPaymentForm({
            // Replace this value with your application's ID (available from the merchant dashboard).
            // If you're just testing things out, replace this with your _Sandbox_ application ID,
            // which is also available there.
            applicationId: 'sandbox-sq0idp-nUGhVY-8g-UNxR1DZUX5VQ',
            locationId: 'CBASENXfygOYib7JssKtOzsT_6wgAQ',
            inputClass: 'sq-input',
            cardNumber: {
                elementId: 'sq-card-number',
                placeholder: "0000 0000 0000 0000"
            },
            cvv: {
                elementId: 'sq-cvv',
                placeholder: 'CVV'
            },
            expirationDate: {
                elementId: 'sq-expiration-date',
                placeholder: 'MM/YY'
            },
            postalCode: {
                elementId: 'sq-postal-code',
                placeholder: 'Postal Code'
            },
            inputStyles: [
                // Because this object provides no value for mediaMaxWidth or mediaMinWidth,
                // these styles apply for screens of all sizes, unless overridden by another
                // input style below.
                {
                    fontSize: '14px',
                    padding: '3px'
                },
                // These styles are applied to inputs ONLY when the screen width is 400px
                // or smaller. Note that because it doesn't specify a value for padding,
                // the padding value in the previous object is preserved.
                {
                    mediaMaxWidth: '400px',
                    fontSize: '18px',
                }
            ],
            callbacks: {
                methodsSupported: function (methods) {
                    // Show the Apple Pay button if Apple Pay is supported.
                    if (methods.applePay === true) {
                        var element = document.getElementById('pay-button-area');
                        element.style.display = 'block';
                    }
                },
                cardNonceResponseReceived: function(errors, nonce, cardData) {
                    if (errors) {
                        var errorDiv = document.getElementById('errors');
                        errorDiv.innerHTML = "";
                        errors.forEach(function(error) {
                            var p = document.createElement('p');
                            p.innerHTML = error.message;
                            errorDiv.appendChild(p);
                        });
                    } else {
                        // This alert is for debugging purposes only.
                        alert('Nonce received! ' + nonce + ' ' + JSON.stringify(cardData));
                        // Assign the value of the nonce to a hidden form element
                        var nonceField = document.getElementById('card-nonce');
                        nonceField.value = nonce;
                        // Submit the form
                        document.getElementById('form').submit();
                    }
                },
                unsupportedBrowserDetected: function() {
                    // Alert the buyer that their browser is not supported
                },
                createPaymentRequest: function () {
                    return {
                        requestShippingAddress: false,
                        currencyCode: "USD",
                        countryCode: "US",
                        total: {
                            label: "Merchant Name",
                            amount: "1.01",
                            pending: false,
                        },
                        lineItems: [
                            {
                                label: "Subtotal",
                                amount: "1.00",
                                pending: false,
                            },
                            {
                                label: "Tax",
                                amount: "0.01",
                                pending: false,
                            }
                        ]
                    };
                },
            }
        });
        function submitButtonClick(event) {
            event.preventDefault();
            sqPaymentForm.requestCardNonce();
        }
    </script>
    <style type="text/css">
        .sq-input {
            border: 1px solid #CCCCCC;
            margin-bottom: 10px;
            padding: 1px;
        }
        .sq-input--focus {
            outline-width: 5px;
            outline-color: #70ACE9;
            outline-offset: -1px;
            outline-style: auto;
        }
        .sq-input--error {
            outline-width: 5px;
            outline-color: #FF9393;
            outline-offset: 0px;
            outline-style: auto;
        }
        .apple-pay-button {
            display: inline-block;
            background-size: 100% 60%;
            background-repeat: no-repeat;
            background-position: 50% 50%;
            border-radius: 5px;
            border-width: 2px;
            padding: 0px;
            box-sizing: border-box;
            min-width: 200px;
            min-height: 32px;
            max-height: 64px;
        }
        .apple-pay-button-white {
            background-image: -webkit-named-image(apple-pay-logo-black);
            background-color: white;
        }
    </style>
</head>
<body>

<h1>My Payment Form</h1>

<form id="form" novalidate action="process-card.php" method="post">
    <div id="pay-button-area" style="display:none">
        <button id="sq-apple-pay" class="apple-pay-button apple-pay-button-white" />
    </div>

    <label>Credit Card</label>
    <div id="sq-card-number"></div>
    <label>CVV</label>
    <div id="sq-cvv"></div>
    <label>Expiration Date</label>
    <div id="sq-expiration-date"></div>
    <label>Postal Code</label>
    <div id="sq-postal-code"></div>
    <input type="hidden" id="card-nonce" name="nonce">
    <input type="submit" onclick="submitButtonClick(event)" id="card-nonce-submit">
</form>

<div id="errors"></div>
</body>
</html>