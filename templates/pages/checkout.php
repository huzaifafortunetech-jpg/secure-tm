
<html>
<body>
    <head>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
            <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
            <?php require TEMPLATE_PATH . '/scripts/checkout-1.php'; ?>
            <?php require TEMPLATE_PATH . '/scripts/checkout-2.php'; ?>
            
    <?php require TEMPLATE_PATH . '/head/checkout-1.php'; ?>
  </head>
    <div class="container">
      <div id="Checkout" class="inline">
          <h1>Pay Invoice</h1>
          <div class="card-row">
              <span class="visa"></span>
              <span class="mastercard"></span>
              <span class="amex"></span>
              <span class="discover"></span>
          </div>
          <form method="POST" action="./payment.php" name="paymentForm">
              <div class="form-group">
                  <label>Payment amount</label>
                  <div class="amount-placeholder">
                      <span>$</span>
                      <span><?= esc($paymentPackage['amount']) ?></span>
                      <input type="hidden" name="paydata[amount]" value="<?= esc($paymentPackage['amount']) ?>">
                  </div>
              </div>
            <div class="form-group">
                  <label or="NameOnCard">Name on card</label>
                  <input id="NameOnCard" class="form-control" type="text" maxlength="255" name="paydata[name]"></input>
              </div>
       
              <div class="form-group">
                  <label for="CreditCardNumber">Card number</label>
                  <input id="CreditCardNumber" name="paydata[cc_no]" maxlength="16" class="null card-image form-control" type="text"></input>
              </div>
              <div class="expiry-date-group form-group">
                  <label for="ExpiryDate">Expiry date</label>
                  <input id="ExpiryDate" name="paydata[expiry]" class="form-control" type="text" placeholder="0522" maxlength="4"></input>
              </div>
              <div class="security-code-group form-group">
                  <label for="SecurityCode">Security code</label>
                  <div class="input-container" >
                      <input id="SecurityCode" name="paydata[cvv]" class="form-control" type="text" ></input>
                      <i id="cvc" class="fa fa-question-circle"></i>
                  </div>
                  <div class="cvc-preview-container two-card hide">
                      <div class="amex-cvc-preview"></div>
                      <div class="visa-mc-dis-cvc-preview"></div>
                  </div>
              </div>
              <div class="form-group">
                    <label or="NameOnCard">State</label>
                    <input id="NameOnCard" name="paydata[state]" class="form-control" type="text" maxlength="255"></input>
                </div>
                <div class="form-group">
                        <label or="NameOnCard">City</label>
                        <input id="NameOnCard" name="paydata[city]" class="form-control" type="text" maxlength="255"></input>
                    </div>
                    <div class="form-group">
                            <label or="NameOnCard">Country</label>
                            <input id="NameOnCard" name="paydata[country]" class="form-control" type="text" maxlength="255"></input>
                        </div>
                        <div class="form-group">
                    <label or="NameOnCard">Address</label>
                    <input id="NameOnCard" name="paydata[address]" class="form-control" type="text" maxlength="255"></input>
                </div>

              <div class="zip-code-group form-group">
                  <label for="ZIPCode">ZIP/Postal code</label>
                  <div class="input-container">
                      <input id="ZIPCode" name="paydata[zip]" class="form-control" type="text" maxlength="10"></input>
                      <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" data-placement="left" data-content="Enter the ZIP/Postal code for your credit card billing address."><i class="fa fa-question-circle"></i></a>
                  </div>
              </div>
              <input  id="PayButton" name="payNow"  value="Pay" class="btn btn-block btn-success submit-button" type="submit">
                 
              
          </form>
      </div>
    </div>
    <?php require TEMPLATE_PATH . '/scripts/checkout-3.php'; ?>
</body>
</html>