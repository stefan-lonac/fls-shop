<?php 

include '../connection/connection-OOP.php';


   // data sent in header are in JSON format
   header('Content-Type: application/json');
   // takes the value from variables and Post the data

$action = 'addedOrder';

if (isset($_GET['action'])) { 
    $add = $_GET['action'];
}
 $itemsArray = $_GET['itemsRequest'];

if ($action == 'addedOrder') {

   $contact 		= $_POST['contact'];
   $number  		= $_POST['number'];
   $email 	 	   = $_POST['email'];
   $check 	 	   = $_POST['check'];
   $comment      = $_POST['comment'];

   

   $to = "lonacstefan@gmail.com";
   $subject = "Contact Us";


      
   $message = '<html xmlns="http://www.w3.org/1999/xhtml">
      <head>
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
         <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
         <title>Your Message Subject or Title</title>
         <style type="text/css">
            #outlook a {padding:0;}
            body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
            .ExternalClass {width:100%;}
            .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}
            #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
            img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;}
            a img {border:none;}
            .image_fix {display:block;}
            p {margin: 1em 0;}
            h1, h2, h3, h4, h5, h6 {color: black !important;}
            h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: blue !important;}
            h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {
               color: red !important;
             }
            h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
               color: purple !important;
            }
            table td {border-collapse: collapse;}
            table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; width: 80%;}
            table tr { border-bottom: 1px solid #D1D5DB; }
            table th {   color: #555555;
                         font-size: 18px;
                         text-transform: uppercase;
                         font-weight: normal;
                         letter-spacing: 0.025em;
                         padding: 25px;
                         text-align: left;}
             table tbody tr:last-child { border-bottom: 1px solid #D1D5DB;}
             table tbody tr {background-color: #FCFCFC;}
             table td { font-size: 16px;
                        font-weight: 300;
                        color: #555555;
                        letter-spacing: 0.025em;
                        padding: 25px;}
            table tbody tr {background-color: #FCFCFC;}
            table tbody tr:last-child {border: none;}
            a {color: orange;}

            .info-finish {
                padding-left: 25px;
                padding-right: 25px;
            }
           .bg-grey {
               background-color: #FCFCFC;
               padding-bottom: 50px;
            }
            .pt-50 {
               padding-top: 50px;
            }

            .info-finish li {
               display: flex;
               margin-bottom: 0;
            }

            .info-finish li p, info-finish li a {
               font-size: 16px;
               font-weight: lighter;
               letter-spacing: 0.025em;
               color: #555555;
            }

            @media only screen and (max-device-width: 480px) {
               a[href^="tel"], a[href^="sms"] {
                        text-decoration: none;
                        color: black; /* or whatever your want */
                        pointer-events: none;
                        cursor: default;
                     }
               .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                        text-decoration: default;
                        color: orange !important; /* or whatever your want */
                        pointer-events: auto;
                        cursor: default;
                     }
            }
            @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
               a[href^="tel"], a[href^="sms"] {
                        text-decoration: none;
                        color: blue;
                        pointer-events: none;
                        cursor: default;
                     }
               .mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
                        text-decoration: default;
                        color: orange !important;
                        pointer-events: auto;
                        cursor: default;
                     }
            }
            @media only screen and (-webkit-min-device-pixel-ratio: 2) {
               /* Put your iPhone 4g styles in here */
            }
            @media only screen and (-webkit-device-pixel-ratio:.75){
               /* Put CSS for low density (ldpi) Android layouts in here */
            }
            @media only screen and (-webkit-device-pixel-ratio:1){
               /* Put CSS for medium density (mdpi) Android layouts in here */
            }
            @media only screen and (-webkit-device-pixel-ratio:1.5){
               /* Put CSS for high density (hdpi) Android layouts in here */
            }
         </style>
         <!--[if IEMobile 7]>
         <style type="text/css">
            /* Targeting Windows Mobile */
         </style>
         <![endif]-->
         <!--[if gte mso 9]>
         <style>
            /* Target Outlook 2007 and 2010 */
         </style>
         <![endif]-->
      </head>
      <body>';


      $message .= '<table style="border-collapse: collapse; width: 100%;">
                  <thead>
                     <tr style="border-bottom: 1px solid #D1D5DB;">
                           <th>Rumnummer</th>
                           <th>Farbe</th>
                           <th>Laschentyp</th>
                           <th>Gebäude</th>
                           <th>Anzahl</th>
                     </tr>    
                  </thead>';

      foreach($itemsArray as $key=>$row){
         $response = json_decode($row, true);
         
         $message .= 
         '<tr>'. 

            '<td>'.$response['rumnummer'].'</td>'.
      
            '<td>'.$response['farbe'].'</td>'.
            
            '<td>'.$response['laschentyp'].'</td>'.

            '<td>'.$response['gebaude'].'</td>'.

            '<td>'.$response['quantity'].'</td>'.
         '</tr>';
      }
      $message .= '</table>';


   // Email Template
   $message .= "<ul class='info-finish pt-50 bg-grey'>";
      $message .= "<li><p>E-MAIL ADRESSE: </p>" . "<p> " . $email . "</p>" . "</li>";
      $message .= "<li><p>ANSPRECHPARTNER: </p>" . "<p> " .  $contact . "</p>" . "</li>";
      $message .= "<li><p>NUMMER: </p>" . "<p> " . $number . "</p>" . "</li>";
      $message .= "<li><p>WOLLEN SIE DIE BEKLEBUNG SELBST VORNEHMEN?: </p>" . "<p> " . $check . "</p>" . "</li>";
      $message .= "<li><p>KOMMENTAR / KOSTENSTELLEN: </p>" . "<p> " . $comment . "</p>" . "</li>";
   $message .= "</ul>";

   $message .= '</body></html>';


   $header = "From:".$email." \n";
   $header .= "MIME-Version: 1.0\n";
   $header .= "Content-type: text/html\n";
   $retval = mail ($to,$subject,$message,$header);
   // message Notification
   if( $retval == true ) {
      echo json_encode(array(
         'success'=> true,
         'message' => 'Message sent successfully'
      ));
   }else {
      echo json_encode(array(
         'error'=> true,
         'message' => 'Error sending message'
      ));
   }


}


?>