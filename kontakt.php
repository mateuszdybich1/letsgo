<?php 
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $sender = $_POST['email'];
    $imieinaz = $_POST['dane'];
    $tresc = "<div>
                
                <p>Dziękujemy ".$imieinaz." za wysłanie nam propozycji współpracy. Wkrótce się do ciebie odezwiemy. </p>                   
                             
                <br>    
                <p>Pozdrawiamy, </p>
                <b>Zespół let'sGO</b>   
              </div>";

    $headers2  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n";

    $dane = "";
    $email = "";
    $wiadomosc = "";
    $recipient = "mateuszdybich1@gmail.com";
    $email_title = "Współpraca";
    $email_body ="<div>";
    if(isset($_POST['dane'])) {
        $dane = filter_var($_POST['dane'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Imię i nazwisko:</b></label>&nbsp;<span>".$dane."</span>
                        </div>";
    }
 
    if(isset($_POST['email'])) {
        $email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
                           <label><b>Email:</b></label>&nbsp;<span>".$email."</span>
                        </div>";
    }
    if(isset($_POST['wiadomosc'])) {
        $wiadomosc = htmlspecialchars($_POST['wiadomosc']);
        $email_body .= "<div>
                           <label><b>Treść wiadomości:</b></label>
                           <div>".$wiadomosc."</div>
                        </div>";
    }
    $email_body .= "</div>";
 
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'Od: ' . $email . "\r\n";
      
    if(mail($recipient, $email_title, $email_body, $headers) && mail($sender, $email_title, $tresc, $headers2) ) {
        $_SESSION['complete'] = '<p  class = "text-success" >Dziękujemy,' .$dane. ' za twoją wiadomość. Odpowiedź otrzymasz w ciągu 24 godzin.</p><br>
        <p class = "text-success">Za chwilę zostaniesz przeniesiony na stronę główną</p>';
    } else {
        $_SESSION['notcomplete'] = '<p class = "text-danger>Przepraszamy, ale nie udało się wysłać wiadomości. Prawdopodobnie Email jest niepoprawny.</p>';
    }
}
 else {
    $_SESSION['error'] = '<p class = "text-danger>Coś poszło nie tak</p>';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="kontaktstyl.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>
    <title>Współpraca</title>
</head>
<body>
 
    <main>
    <div class="wrapper d-flex" style="width: 100%;">
        <div class="overlay " style="width: 100%;"> 
            <div class="row d-flex justify-content-center align-items-center" style="width: 100%;">
                <div class="col-md-9"> <div class="contact-us text-center">
                    <h3 class="glownytext">Współpraca</h3>
                    <p class="mb-5">Aby nawiązać współpracę, skontaktuj się z nami.</p>
                    <div class="row"> <div class="col-md-6">
                        <div class="mt-5 text-center px-3">
                            
                            <div class="d-flex flex-row align-items-center mt-3"> 
                                <span class="icons"><i class="fa fa-phone"></i></span> 
                                <div class="address text-left d-flex flex-column"> 
                                    <span style="text-align: left;">Telefon (08:00 - 16:00)</span> 
                                    <p style="text-align: left;">+48 123 456 789</p> </div> </div> <div class="d-flex flex-row align-items-center mt-3"> 
                                        <span class="icons"><i class="fa fa-envelope-o"></i></span> 
                                        <div class="address text-left d-flex flex-column"> 
                                            <span style="text-align: left;">Email</span> 
                                            <p>mateuszdybich1@gmail.com</p> 
                                        </div> 
                                </div> 
                            </div> 
                        </div> 
                        <div class="col-md-6"> 
                            <div class="text-center px-1"> 
                                <form action="kontakt.php" method="post">
                                <div class="forms p-4 py-5 bg-white">
                                    
                                    <h5>Wyślij wiadomość</h5> <div class="mt-4 inputs"> 
                                    <input type="text" name="dane" class="form-control" placeholder="Imię i nazwisko" required> 
                                    <input type="text" name="email" class="form-control" placeholder="Email" required> 
                                    <textarea type="text" name="wiadomosc" class="form-control" placeholder="Wiadomość"></textarea> 
                                </div> 
                                <div class="button mt-4 text-left"> 
                                <button type="submit" class="btn btn-dark">Wyślij</button> 
                                
                                </div> 
                                <div>
                                    <?php
                                        if(isset($_SESSION['complete']))
                                        {
                                          echo $_SESSION['complete'];
                                          unset ($_SESSION['complete']); 
                                          if(@$_SESSION['if_logged'] == TRUE) {
                                            header('refresh: 8; url=zalogowano.html');
                                        }
                                        else if(@$_SESSION['if_logged'] == false) {
                                            header('refresh: 8; url=index.php');
                                        }   
                                        }
                                        if(isset($_SESSION['notcomplete']))
                                        {
                                          echo $_SESSION['notcomplete'];
                                          unset ($_SESSION['notcomplete']);           
                                        }
                                        if(isset($_SESSION['error']))
                                        {
                                          echo $_SESSION['error'];
                                          unset ($_SESSION['error']);           
                                        }
                                    ?>
                                </div>
                            </form> 
                        </div> 
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div>
</div>
</main>
 
</body>
</html>