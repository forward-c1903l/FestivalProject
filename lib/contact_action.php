<?php 
    require('dbConn.php');

    function SendMailContact($contact) {
        global $conn;

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s');
        // luu thong tin feedback
        $sql = "INSERT INTO feedback (fullname, email, phonenumber, subject, message, date)
                                values ('{$contact['fullname']}', '{$contact['email']}', '{$contact['phone']}', '{$contact['subject']}', '{$contact['message']}', '$date' )";
        $result = mysqli_query($conn, $sql);

        $to = $contact['email'];
        $subject = 'Thank you note !';
        $message = '<html>
        <body>
            <div style="padding: 20px;width: 800px;margin: auto;background:#2E9AFE;color: white">
                <h4 style="font-size: 22px;text-align: center;">FESTIVAL</h4>
                <h6 style="font-size: 13px;">Thanks for responding to us about the website.We will contact you as soon as possible by email.</h6>
                <span><a href="http://localhost/FestivalProject" style="
                color: black;
                font-size: 14px;
                font-weight: 600;
            ">Back to website</a></span>
            </div>
        </body>
        </html>
        ';
        $header = 'Festival Feedback';
        $header  = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $success = mail($to,$subject,$message,$header);
        if( $success == true )
        {
            echo "Success";
        }
        else
        {
            echo "Email failed to send !";
        }
    }
?>