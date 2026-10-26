<script>
        function getClientDetail(param) {
            return (window.CLIENT_DETAILS || {})[param] || '';
        }

        document.addEventListener('DOMContentLoaded', () => {
            // Populate any active fields from server-resolved client details.
            if (document.getElementById('firstName')) document.getElementById('firstName').value = getClientDetail('firstName');
            if (document.getElementById('lastName')) document.getElementById('lastName').value = getClientDetail('lastName');
            if (document.getElementById('description')) document.getElementById('description').value = getClientDetail('description');
            if (document.getElementById('payment')) document.getElementById('payment').value = getClientDetail('payment');

            // Check if the form has been completed and show payment button
            const formCompleted = localStorage.getItem('formCompleted');
            if (formCompleted === 'true' && document.getElementById('paymentButton')) {
                document.getElementById('paymentButton').style.display = 'inline';
            }
        });

   let clickCount = 0;

    function togglePackageForm() {
        const packageFormContainer = document.getElementById('packageFormContainer');

        // Toggle form visibility on each click
        if (packageFormContainer.style.display === 'none') {
            packageFormContainer.style.display = 'block';
        } else {
            packageFormContainer.style.display = 'none';
        }

        // Store in localStorage (if necessary)
        localStorage.setItem('formCompleted', 'false');

        // Increment click count
        clickCount++;

        // Disable button after 3 clicks
        // if (clickCount >= 4) {
        //     document.getElementById('packageFormButton').disabled = true;
        // }
    }

    // Ensure the form is hidden initially
    if (document.getElementById('packageFormContainer')) document.getElementById('packageFormContainer').style.display = 'none';

        function proceedToPayment() {
            // Redirect to the payment page based on the selected amount
            const paymentAmount = document.getElementById('payment').value;
            window.location.href = `https://secure-tm.com/payment/payment-${paymentAmount}/`;
        }
    </script>