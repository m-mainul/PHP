<?php 
    
         function sendAdminEmail($cartinfo){
        
        $subject = 'Request for Resort Reservation';
        $customer = new Customer ();
        $theCustomer = $customer->get_customer_by_id ( $_SESSION['customer_id'] );
        $sender_from = "ScandicBooking";
        $sender_email = "info@scandicbooking.nl";
        $mb_invoice_id = @$_SESSION['mb_invoice_id']; 
        $body =
            "Dear Admin,<br />".
            "You recevied an email for new reservation, Information of new reservation as follows <br />".
            "Number of days: <b>{$cartinfo['num_of_days']}<b> <br />".
            "Resort Name: <b>{$cartinfo['resort_name']}<b> <br />".
            "Persons: <b>{$cartinfo['persons']}<b> <br />".
            "Start Date: <b>{$cartinfo['start_date']}<b> <br />".
            "FirstName: <b>{$theCustomer ['first_name']}<b> <br />".
            "LastName: <b>{$theCustomer ['last_name']}<b> <br />".
            "MobilePhone: <b>{$theCustomer ['phone']}<b> <br />".
            "Email: <b>{$theCustomer ['email']}<b> <br />".
            "Address: <b>{$theCustomer ['address1']}<b> <br />".
            "MoneyBird Invoice Link: <a href='https://scandic-booking.moneybird.nl/invoices/{$mb_invoice_id}'>Link</a> "
        ;

        $admin_headers = "MIME-Version: 1.0" . "\r\n";
        $admin_headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $admin_headers .= 'From:  '.$sender_from.' <'. $sender_email . ">\r\n";
        
        $status = wp_mail( _SCANDIC_BOOKING_ADMIN_EMAIL, $subject, $body, $admin_headers );
       
        return $status;
        
    }

     function sendUserEmail(){
        
        $to = $_POST['email'];
        $subject = __('_CUSTOMER_EMAIL_SUBJECT');
        $sender_from = "ScandicBooking";
        $sender_email = "info@scandicbooking.nl";
        $body = __('_CUSTOMER_EMAIL_BODY');
        $admin_headers = "MIME-Version: 1.0" . "\r\n";
        $admin_headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $admin_headers .= 'From:  '.$sender_from.' <'. $sender_email . ">\r\n";
        
        $status = wp_mail( $to, $subject, $body, $admin_headers );
       
        return $status;
        
    }
 ?>