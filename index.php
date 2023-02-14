<?php
session_start();
if(@$_SESSION['if_logged'] == TRUE) {
    header('Location: zalogowano.html');
}
?>
<!doctype html>
<html lang="pl">
  <HEAD>
  <script src="https://www.googleoptimize.com/optimize.js?id=OPT-WFSTCM4"></script>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>let'sGO</title>

    

    
    
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

    
    <!-- Custom styles for this template -->
   
    <link href="carousel.rtl.css" rel="stylesheet">
    </HEAD>
  <body>
    
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">let'sGO</a>
      
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          
          
        </ul>
        
          
        <a href="signin.php"> <button class="btn btn-outline-light" >Logowanie</button></a>
        
      </div>
    </div>
  </nav>
</header>

<main>

  <div id="myCarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel"  data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="bd-placeholder-img" width="100%" height="auto" src="pics/happy-young-cool-brunet-men-in-white-t-shirts-and-checkered-shirts-rejoice-smile-and-pose-on-orange-wall-travelers-hold-backpack-and-retro-camera.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>

        <div class="container">
          <div class="carousel-caption text-start">
            <h1 class="text-white">Wybierz się do dowolnego miejsca w polsce.</h1>
            <p class="text-white">Oferujemy wszechstronne podróże do każdego zakątka Polski </p>
            <p><a class="btn btn-lg btn-dark" href="zarejestruj.php">Zarejestruj się</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="bd-placeholder-img" width="100%" height="auto" src="pics/white-comfortable-pillow-on-bed-decoration-interior.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>

        <div class="container">
          <div class="carousel-caption">
            <h1 class="text-dark">Potrzebujesz tylko przenocować? Nie przejmuj się!</h1>
            <p class="text-dark">Oferujemy również zarezerwowanie pokoju hotelowego. Wybierz tylko miasto.</p>
            <p><a class="btn btn-lg btn-dark"  href="listamiast.php">Przeglądaj oferty</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="bd-placeholder-img" width="100%" height="auto" src="pics/vecteezy_success-big-deal-and-successful-contract-achievement_6419017_798.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></img>

        <div class="container">
          <div class="carousel-caption text-end">
            <h1 class="text-white">Chcesz wystawić ogłoszenie swojego hotelu?</h1>
            
            <p ><a class="btn btn-lg btn-dark" href="kontakt.php">Kliknij tutaj</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="pics/warsaw-poland-old-town.jpg" role="img"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>

        <h2 class="fw-normal">Miasto?</h2>
        <p>Pozwiedzaj z nami najpiękniejsze polskie miasta</p>
        <p><a class="btn btn-secondary" href="miasto.php">Przeglądaj &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="pics/5.jpg" role="img"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>

        <h2 class="fw-normal">Góry?</h2>
        <p>Jeździj na nartach i oglądaj piękne góry</p>
        <p><a class="btn btn-secondary" href="gory.php">Przeglądaj &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="pics/6.jpg" role="img"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>

        <h2 class="fw-normal">Morze?</h2>
        <p>Odpocznij i poopalaj się na rozgrzanym piasku</p>
        <p><a class="btn btn-secondary" href="morze.php">Przeglądaj &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal">Dlaczego my? <span class="text-muted">Mamy najlepsze oferty!</span></h2>
        <p class="lead fs-4">Nasza firma posiada mnóstwo różnorodnych ofert w bardzo korzystnych cenach. Jesteśmy przekonani, że znajdziesz coś dla siebie.</p>
      </div>
      <div class="col-md-5">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="pics/7.jpg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em"></text></img>

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal ">Stale powiększamy liczbę naszych partnerów. <span class="text-muted">Masz coraz większy wybór.</span></h2>
        <p class="lead fs-4">Stale się rozwijamy, co powoduje że liczba partnerów jak i klientów ciągle rośnie. Zaufaj nam!</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="pics/8.jpg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em"></text></img>

      </div>
    </div>

    <hr class="featurette-divider">
    
    

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Powrót do początku</a></p>
    <p>&copy; 2022 let'sGO, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>


    <script src="js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
