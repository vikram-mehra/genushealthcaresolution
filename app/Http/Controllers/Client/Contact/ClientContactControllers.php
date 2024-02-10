<?php

namespace App\Http\Controllers\Client\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientContactControllers extends Controller
{
    public function Index(){
        return view('/client/contactus/contact');
    }

    public function sendContactForm(Request $request)
    {
        // Validation logic goes here
        $data = $request->all();
        
        // Send email logic
        $to = "vikrammehra68@gmail.com";
        $subject = "Contact us mail";
        
        // Construct HTML message
        $message = "<html><body>";
        $message .= "<h2>Contact Form Submission</h2>";
        $message .= "<p><strong>Name:</strong> " . $data['name'] . "</p>";
        $message .= "<p><strong>Email:</strong> " . $data['email'] . "</p>";
        $message .= "<p><strong>Subject:</strong> " . $data['msg_subject'] . "</p>";
        $message .= "<p><strong>Phone:</strong> " . $data['phone_number'] . "</p>";
        $message .= "<p><strong>Message:</strong> " . nl2br($data['message']) . "</p>";
        $message .= "</body></html>";
    
        $headers = "From: info@genushealthcaresolution.com\r\n";
        $headers .= "Reply-To: info@genushealthcaresolution.com\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
        if (mail($to, $subject, $message, $headers)) {
            return response()->json(['success' => true, 'message' => 'Contact form submitted successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Something went wrong']);
        }
    }

}
