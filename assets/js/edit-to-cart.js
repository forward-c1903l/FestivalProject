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
            dataNew = parseInt(data);
            
            if(isNaN(dataNew)) {
                $(inputTarget).val(valueDefault);// Returns the value before quantity change fails

                alert(data);
            } else {
                priceTotal.text(dataNew);// change the total value when the quantity change is successful

                $(inputTarget).attr('name', valueQuantity);// Change the value of name when the quantity change is successful
            }
        });

    })
})