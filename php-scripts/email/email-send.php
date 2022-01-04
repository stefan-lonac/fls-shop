<?php 
define("BASE_URL", "http://mediavuk.com/");

include "../connection/connection-OOP.php";

   // data sent in header are in JSON format
   header("Content-Type: application/json");

   // takes the value from variables and Post the data
   $to = $_GET["email"];
   $subject="Angeforderter Link für die ausgewählte Schule";

   // Email Template
   // $message = "<b><a href='".BASE_URL."fls-shop/table.php'>Link TABLE</a></b>";


   $message = "Sehr geehrte(r) Besteller(in),"."\r\n";
   $message.="\r\n";
   $message.="Klicken Sie bitte diesen Link an:"." "."<b><a href='".BASE_URL."fls-shop/table.php'>Link TABLE</a></b>"."\r\n";
   $message.="Dieser Link führt Sie auf die Seite Ihrer Schule, wo alle Laschen aufgelistet sind, die in Ihrer Schule angebracht wurden."."\r\n";
   $message.="Falls eine Lasche nicht aufgelistet ist, können Sie uns jederzeit per E-Mail mitteilen, welche Laschen fehlen, die wir zeitnah einstellen."."\r\n";
   $message.="\r\n";
   $message.="Nach der Auswahl der gewünschten Lasche(n). Wird die zuständige Druckerei Ihnen die Kosten mitteilen."."\r\n";
   $message.="Nach der Auftragserteilung, werden die Laschen geliefert bzw. angebracht."."\r\n";
   $message.="\r\n";
   $message.="Wir bedanken uns für das entgegengebrachte Interesse."."\r\n";
   $message.="\r\n";
   $message.="Mit freundlichen Grüßen."."\r\n";
   $message.="Das FLS-Team."."\r\n";
   $message.="\r\n";
  

   $header="From: lonacstefan@gmail.com" . "\r\n" .
    "Reply-To: lonacstefan@gmail.com" . "\r\n";
   $header .= "MIME-Version: 1.0\n";
   $header .= "Content-type: text/html\n";
   $retval = mail ($to,$subject,$message,$header);
   // message Notification
   if( $retval == true ) {
      echo json_encode(array(
         'success'   => true,
         'message'   => 'Message sent successfully',
         'to'        => $to,
      ));
   }else {
      echo json_encode(array(
         'error'=> true,
         'message' => 'Error sending message'
      ));
   }

?>

