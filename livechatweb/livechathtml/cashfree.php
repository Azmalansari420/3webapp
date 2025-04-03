<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cashfree Checkout Integration</title>
        <script src="https://sdk.cashfree.com/js/v3/cashfree.js"></script>
    </head>
    <body>
        <div class="row">
            <p>Click below to open the checkout page in current tab</p>
            <button id="renderBtn">Pay Now</button>
        </div>
        <script>
            const cashfree = Cashfree({
                mode: "sanbox", // change it for production make it production
            });
            document.getElementById("renderBtn").addEventListener("click", () => {
                let checkoutOptions = {
                    paymentSessionId: "pass session_id received from backend api",
                    redirectTarget: "_self",
                };
                cashfree.checkout(checkoutOptions);
            });
        </script>
    </body>
</html>