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