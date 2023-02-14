<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <title>Góry</title>
</head>
<body>
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="zalogowano.html">let'sGO</a>
      
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          
          
        </ul>

          <a href="konto.php"><button class="btn btn-outline-light" >Moje Konto</button></a>
        
      </div>
    </div>
  </nav>
</header>
<main style="margin-top: 55px;">
    <div class="list-group">
      <?php
   
        require_once("polacz.php");
        $polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);
        session_start();
        if(@$_SESSION['if_logged'] == false) {
          header('Location: signin.php');
      }
        if($polaczenie->connect_errno!=0)
        {
          echo "Error: ".$polaczenie->connect_errno;
        }
        else
        {
          $sql = "SELECT * FROM gory";
          $result = mysqli_query($polaczenie, $sql);
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              echo '<a href="#" class="list-group-item list-group-item-action">
            
              <div class="d-flex w-100 justify-content-around align-items-center">
                    <div>
                    <img width="300" height="200" src="data:image/jpeg;base64,'.base64_encode( $row['pic'] ).'"/>
                     </div>
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <h5 class="mb-1">'.$row['name'].'</h5>                
                            <p class="mb-1">'.$row['place'].'</p>
                            <p> Termin: '.$row['data'].'</p>
                    </div>
                    <div>
                    <h5> cena: '.$row['price'].' zł za dobę</h5>
                </div>
              </div>
              
            </a>';
            }
          } else {
            echo "Brak aktualnych ofert";
          }
          
         
          
        }
        mysqli_close($polaczenie);
        ?>

      </div>
      
  <footer class="container" style="margin-top: 60px; margin-bottom:60px;">
    <p class="float-end"><a href="#">Powrót do początku</a></p>
    <p>&copy; 2022 let'sGO, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>

      </main>     
</body>
</html>