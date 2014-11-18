<?php
        function send_email($to,$user_name,$date,$start_time,$end_time)
        {
        $subject = "Regarding Cancellation Of Your Amrc Lab Booking";
        $body = "Dear $user_name,\nYour booking of $machine_name on $date from $start_time to $end_time has been cancelled.We are sorry for this inconvenience :(\n\n  Regards Admin AMRC LAB";
        $headers = "From : admin_amrc@iitmandi.ac.in";

        if(mail($to,$subject,$body,$headers))
        echo "<br>Mail sent";
        else echo "Could not send mail";
    }

            function send_join_email($email,$fname)
        {
        $subject = "Regarding AMRC Join Lab Request Acceptance";
        $body = "Dear $fname,\nCongratulations!!!\nYour request to join AMRC lab has been accepted.\n\nRegards Admin AMRC LAB";
        $headers = "From : admin_amrc@iitmandi.ac.in";

        if(mail($to,$subject,$body,$headers))
        echo "<br>Mail sent";
        else echo "Could not send mail";
    }


        ?>