$(document).ready(function(){
    //change staff to user
    function changeRole(name, id) {
        $.ajax({
            url: 'handle_user.php',
            method: 'post',
            data: {role : {name, id}}
        }).done(function(res) {
            if(res === 'Success') {
                toastr.success('You have successfully changed the role');

                setTimeout(() => {
                    location.reload();
                    window.scrollTo({top: 0 });
                }, 700);
            } else {
                toastr.error(res);
            }
        })
    }

    $('button[name=btn-staff-manager]').click(function() {
        let id = $(this).val();
        changeRole('staff', id);
    })

    $('button[name=btn-user-manager]').click(function() {
        let id = $(this).val();
        changeRole('customer', id);
    })

    $('select[name=stt-user]').on('change', function(){
        let idData = $(this).data('id');
        let value = $(this).val();

        $.ajax({
            url: 'handle_user.php',
            method: 'post',
            data: {status : {id: idData, stt: value}}
        }).done(function(res) {
            if(res === 'Success') {
                toastr.info('You have successfully changed status');

                setTimeout(() => {
                    location.reload();
                    window.scrollTo({top: 0 });
                }, 700);
            } else {
                toastr.error(res);
            }
        })
    })
})