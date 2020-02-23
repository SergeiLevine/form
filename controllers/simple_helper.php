<?php
class SimpleHelper {

    public function __construct($post_data){
        $this->data = $post_data;
    }

    public function send_email_to_support(){
        // enter your email here
        $to = 'serfpnd@gmail.com';
        // enter your email there ^
    
        $subject = 'Contact Us';

        // checking if someone tries to inject another email
        if (preg_match("/%0A/i",$this->data["email"]) || preg_match("/%0D/i",$this->data["email"]) 
            || preg_match("/\r/i",$this->data["email"]) || preg_match("/\n/i",$this->data["email"])){  
                echo "here";
                die("Header injection detected!");
		}
        // creating email template
        $headers = "From: " . $this->data["email"] . " \r\n";
        $headers .= "Reply-To: " . $this->data["email"] . " \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
        $message = '<html><body>';
        $message .= "<h1>Customer needs your attention!</h1>";
        $message .= '<table rules="all" style="border-color: black;" cellpadding="9">';
        $message .= "<tr ><td><strong>First Name:</strong> </td><td>" . $this->data["first_name"] . "</td></tr>";
        $message .= "<tr ><td><strong>Last Name:</strong> </td><td>" . $this->data["last_name"] . "</td></tr>";
        $message .= "<tr ><td><strong>Country:</strong> </td><td>" . $this->data["country"] . "</td></tr>";
        $message .= "<tr ><td><strong>Phone Number:</strong> </td><td>" . $this->data["phone_number"] . "</td></tr>";
        $message .= "<tr ><td><strong>Email:</strong> </td><td>" . $this->data["email"] . "</td></tr>";
        $message .= "</table>";
        $message .= "</body></html>";
        
        if(mail($to, $subject, $message, $headers)){
            unset($_POST);
            return ["success","An email has been sent. Thank you for contacting us."];
        }else{
            return ["error","Oops, something went wrong, unable to send the email."];
        }
    }
}