<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    
    <link href="listamiast.css" rel="stylesheet">
    

    

<link href="css/bootstrap.min.css" rel="stylesheet">

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
<main style="margin-top: 50px;">

 
  <div class="album py-5">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
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
     $sql = "SELECT * FROM listamiast";
     $result = mysqli_query($polaczenie, $sql);
     if (mysqli_num_rows($result) > 0) {
       // output data of each row
       while($row = mysqli_fetch_assoc($result)) {
         echo '<div class="col">
         <button class="buttonik" style="border: none; width:100%; padding:0; margin: 0;" >
         <div class="card shadow-sm">
          
           
           <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="data:image/jpeg;base64,'.base64_encode( $row['pic'] ).'"/>
           <div class="card-body d-flex justify-content-center">
             <h5>'.$row['name'].'</h5>
             
           </div>
         
         </div>
       </button>
       </div>';
       }
     } else {
       echo "0 results";
     }
     
    
     
   }
   mysqli_close($polaczenie);
   ?>
        
       
        
      </div>
    </div>
  </div>
  <hr class="featurette-divider" style="margin-left: 11.5%; margin-right:11.5%;">
  <footer class="container" style="margin-top: 60px; margin-bottom:60px;">
    <p class="float-end"><a href="#">Powrót do początku</a></p>
    <p>&copy; 2022 let'sGO, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>




    <script src="js/bundle.min.js"></script>

      
  </body>
</html>
