$(document).ready(function(){
    //Delivery
    $('#processing').click(function() {
        $.ajax({
            url: 'handle_invoice.php',
            method: 'post',
            data: {action: 'delivery'}
        }).done(function (res){
            console.log(res);
            if(res == '    Success') {
                toastr.success('Orders are being delivered!');
                setTimeout(() => {
                    location.reload();
                    window.scrollTo({top: 0});
                }, 1300);
            }
        })
    })

    //Successful
    $('#successful').click(function() {
        $.ajax({
            url: 'handle_invoice.php',
            method: 'post',
            data: {action: 'successful'}
        }).done(function (res){
            if(res == '    Success') {
                toastr.success('The order has been successfully delivered !');
                setTimeout(() => {
                    location.reload();
                    window.scrollTo({top: 0});
                }, 1300);
            } else {
                toastr.error(res);
            }
        })
    })

    //Failed
    $('#failed').click(function() {
        $.ajax({
            url: 'handle_invoice.php',
            method: 'post',
            data: {action: 'fail'}
        }).done(function (res){
            if(res == '    Success') {
                toastr.error('Order was confirmed delivery failed! ');
                setTimeout(() => {
                    location.reload();
                    window.scrollTo({top: 0});
                }, 1300);
            } else {
                toastr.error(res);
            }
        })
    })

})