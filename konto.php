<?php
    class account{
        public $nick;
        public $email;
        function setdata($login, $uemail){
            $this->nick = $login;
            $this->email = $uemail;
        }
        function showacc()
        {
            echo "Nazwa użytkownika: ".$this->nick. "<br>";
            echo "email użytkownika: ".$this->email. "<br>";
        }
    }
    session_start();
    if(@$_SESSION['if_logged'] == TRUE) {
        $user = new account();
        $user->setdata($_SESSION['login'],$_SESSION['email']);
        $user->showacc();


    }
    else{
        header('Location: index.php');
    }
    ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Moje Konto</title>
</head>
<body>
    
    <form action="wyloguj.php" method="post"><input value="Wyloguj" type="submit"></form> 
</body>
</html>