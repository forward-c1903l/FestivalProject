$(document).ready(function() {
    inputQuantity = $('.ip-quantity');
    priceTotal = $('.price_total');
    // Block out Submit Input
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
    
    inputQuantity.change(function(e){ 
        //input current
        inputTarget = e.target;// input target
        valueDefault = $(inputTarget).attr('name');//default Value
        valueQuantity = e.target.value;// value when change

        formParent = $(inputTarget).parent().parent().parent();// get form parent
        url = formParent.attr('action');
        

        $.ajax({
            url,
            method: 'post',
            data: {quantity: valueQuantity}
        }).done(function(data) {
            // Receive JSON
            let dataNew = JSON.parse(data);

            if(!dataNew['status']) {
                $(inputTarget).val(valueDefault);// Returns the value before quantity change fails

                alert(dataNew['error']);
            } else {
                let stringTotal = `${dataNew['total']} VND`;
                priceTotal.text(stringTotal);// change the total value when the quantity change is successful

                $(inputTarget).attr('name', valueQuantity);// Change the value of name when the quantity change is successful
            }


        });

    })
})