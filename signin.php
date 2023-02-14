<?php
   
   require_once("polacz.php");
    $polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);
    session_start();
  if(@$_SESSION['if_logged'] == TRUE) {
      header('Location: zalogowano.html');
  }
   if($polaczenie->connect_errno!=0)
   {
       echo "Error: ".$polaczenie->connect_errno;
   }
   else
   {
      if ($_SERVER['REQUEST_METHOD'] === 'POST'){
          $login = $_POST['login'];

          $haslo = $_POST['haslo'];
          $hashhaslo = password_hash($haslo, PASSWORD_DEFAULT);
          
          
          $account = "SELECT * FROM uzytkownicy WHERE nick = '$login'";

          if($rezultat = $polaczenie->query($account))
          {
            $ile_usr = $rezultat->num_rows;
            if($ile_usr >0)
             {
              $wiersz = $rezultat->fetch_assoc();
              if(password_verify($haslo, $wiersz['pass']))
              {
                $user = $wiersz['nick'];
                $globemail = $wiersz['email'];
                $rezultat->free_result();
                
               $_SESSION['if_logged'] = TRUE;
               $_SESSION['login'] = $user;
               $_SESSION['email'] = $globemail;
               header('Location: zalogowano.html');
              }
             }
             else{
  
           
           
              $_SESSION['account_exists'] = '<p class = "text-danger"> Błąd: Login lub hasło jest niepoprawne </p> ';
            
            
            }
               
              
          }
          
  
      }

       $polaczenie->close();
   }
   
  ?>


<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    
    <title>Zaloguj Się</title>

    

    

    

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="signin.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form action="signin.php" method="post">
    
    <h1 class="h3 mb-3 fw-normal">Zaloguj się</h1>

    <div class="form-floating">
      <input type="text" style="margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;" name="login" class="form-control" id="floatingInput" placeholder="login">
      <label for="floatingInput">Nazwa użytkownika</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="haslo" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Hasło</label>
    </div>

    <div class="checkbox mb-3">
      
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Zaloguj</button>
    <?php 
          if(isset($_SESSION['account_exists']))
            {
              echo $_SESSION['account_exists'];
              unset ($_SESSION['account_exists']);
            }
          ?>
    <div class=" d-flex justify-content-center text-center " style="margin-top: 50px;">

      

   </div>
    
  </form>
  <a href = "zarejestruj.php"> <button   class="btn btn-primary">Nie masz konta? Zarejestruj się</button></a>
  <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
</main>


    
  </body>
</html>
