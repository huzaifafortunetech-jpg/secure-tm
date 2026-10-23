<!DOCTYPE html>
<html lang="en">
<head>
   
<?php
include 'link.html';
?>
<script>
  gtag('event', 'conversion', {'send_to': 'AW-16515121006/GqZhCIm2wqIZEO7-gsM9'});
</script>

</head>

<body>
    
    <header>
    <?php
include 'header.html';
?>
    </header>
    <!-- <h1 class="wow fadeInRight" data-wow-duration="3s">hello</h1> -->
    <section class="home-sec-1 about-us-banner jkl thnkban">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="text">
                <h1>Sorry<br>
                  <span>Your transaction had not been approved </span></h1>
                <p> Please recheck the card details again</p>
                <div class="t-btn-div">
                    <a href="tel:+1 469-680-8801" class="t-btn  t-btn-text-s">Call Us Now : +1 469-680-8801</a> </div>
              </div>
            
          </div>
        </div>
      </section>
      <?php
include 'partners.html';
?>
    
     
   
      <?php
include 'footer.html';
?>
<script type="text/javascript">
$(document).on('click', '.srch-btn', function() {
    $('.search-data tbody').html('');
    $('.search-data').css('display', 'none');
    var searchText = $('.srch').val();
    if (searchText == '') {

    } else {
        var requestOptions = {
            method: 'GET'
        };

        async function searchTrademarks(searchText) {
            try {
                const response = await fetch(`https://innova-labs.net:9094/trademarks/search?name=${searchText}&page=1&count=5`, requestOptions);
                const result = await response.json();
        
                if (result.elements.length > 0) {
                    result.elements.forEach(function(item) {
                        $(".search-data tbody").append(
                            `<tr><td>${item.markIdentification}</td><td>${item.owners[0].partyName}</td><td>${item.serialNumber}</td><td>${item.filingDate}</td></tr>`
                        );
                    });
                    $('.search-data').css('display', 'block');
                } else {
                    $(".search-data tbody").append(
                        `<tr><td colspan="4">No Trademark Found For ${searchText}</td></tr>`
                    );
                    $('.search-data').css('display', 'block');
                }
            } catch (error) {
                console.log('error', error);
            }
        }
        
        // Call the function with searchText parameter
        searchTrademarks(searchText);
    } 


});
</script>

</body>

</html>