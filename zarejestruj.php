
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Rejestracja</title>
</head>
<body>
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
          $email = $_POST['email'];

          $haslo = $_POST['haslo'];
          $haslorep = $_POST['haslorep'];
          $hashhaslo = password_hash($haslo, PASSWORD_DEFAULT);
          $getID = "SELECT COUNT(*) FROM  uzytkownicy";
          if($result = mysqli_query($polaczenie, $getID)){
            $row = mysqli_fetch_array($result);
            $rowcount = $row[0]+1;
            mysqli_free_result($result);
          }
          $emailexist = mysqli_query($polaczenie, "SELECT * FROM uzytkownicy WHERE email = '$email'");
          $loginexist = mysqli_query($polaczenie, "SELECT * FROM uzytkownicy WHERE nick = '$login'");

          if($haslo == $haslorep && mysqli_num_rows($emailexist)==0 && mysqli_num_rows($loginexist)==0)
          {
             $sql = "INSERT INTO uzytkownicy (ID, nick, email, pass) VALUES ('$rowcount', '$login', '$email', '$hashhaslo')";
             $user = "SELECT * FROM uzytkownicy WHERE nick='$login' and pass ='$hashhaslo'";
             if(mysqli_query($polaczenie, $sql)){
              $_SESSION['registered'] = '<br><p class = "text-success">Konto utworzono pomyślnie </p>';
              }
              else{
              echo "nie polaczylo <br>";
               }
             $rezultat = $polaczenie->query($user);
             $wiersz = $rezultat->fetch_assoc();
               $user = $wiersz['nick'];
               $globemail = $wiersz['email'];
               $rezultat->free_result();
               
              $_SESSION['if_logged'] = TRUE;

              $_SESSION['login'] = $user;
              $_SESSION['email'] = $globemail;
              header('Location: zalogowano.html');
          }
          else{
             if($haslo != $haslorep){
              $_SESSION['Repeat_Pass'] = '<p class = "text-danger">Błąd: Hasła muszą być takie same </p>';
          }
          
           if(mysqli_num_rows($loginexist)>0){
             
            $_SESSION['Login_exists'] = '<p class = "text-danger"> Błąd: podany login już istnieje </p> ';
          }
           if(mysqli_num_rows($emailexist)>0){
            $_SESSION['email_exists'] = '<p class = "text-danger"> Błąd: podany email już istnieje </p> ';
          }
          }
          
          
      }

       $polaczenie->close();
   }
   
  ?>
    <div class=" d-flex justify-content-center text-center " style="margin-top: 5%;">
    <form action="zarejestruj.php" method="post">
        
        <div class="form-outline mb-4">
          <input type="text"  name="login" class="form-control" minlength="3" maxlength="20"
           placeholder="nazwa uzytkownika" required />
          <?php
            if(isset($_SESSION['Login_exists']))
            {
              echo $_SESSION['Login_exists'];
               unset ($_SESSION['Login_exists']);
            }
           ?>
        </div>
      
        <div class="form-outline mb-4">
          <input type="email"  name="email" class="form-control" placeholder="email" required />
          <?php
            if(isset($_SESSION['email_exists']))
            {
              echo $_SESSION['email_exists'];
              unset ($_SESSION['email_exists']);           
            }
            if(isset($_SESSION['E_mail']))
            {
              echo $_SESSION['E_mail'];
              unset ($_SESSION['E_mail']);
            }
            if(isset($_SESSION['E_mailsp']))
            {
              echo $_SESSION['E_mailsp'];
              unset ($_SESSION['E_mailsp']);
            }
           ?>
        </div>
        <div class="form-outline mb-4">
          <input type="password"  name="haslo" class="form-control" minlength="8"  placeholder="hasło" required/>
          <?php 
          if(isset($_SESSION['Repeat_Pass']))
            {
              echo $_SESSION['Repeat_Pass'];
              unset ($_SESSION['Repeat_Pass']);
            }
          ?>
        </div>
        <div class="form-outline mb-4">
          <input type="password"  name="haslorep" class="form-control" minlength="8"  placeholder="powtorz haslo" required/>
          
        </div>
        <div style="margin-left: 10px;" class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
            <label class="form-check-label" style="margin-left: -10px; margin-bottom:
             10px;" for="flexCheckDefault">Akceptuje regulamin</label>
        </div>

        <div>
        <button  type="submit"  class="btn btn-primary">Zarejestruj</button>
            <?php
        if(isset($_SESSION['registered']))
          {
          echo $_SESSION['registered'];
          unset ($_SESSION['registered']);
          }
          ?>
        
        </div>
      </form>
      
    </div>
    
</body>
</html>