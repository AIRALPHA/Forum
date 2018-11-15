<?php 

  if(isset($_POST["submit"]))
  {
    if(empty(trim($_POST["pseudo"])))
    {
      $errors[] = "Veuillez saisir votre pseudo";
    }

    if(empty(trim($_POST["password"])))
    {
      $errors[] = "Veuillez saisir votre password";
    }

    if(empty($errors))
    {
      if(relation_pseudo_password($_POST["pseudo"], $_POST["password"]))
      {
        $_SESSION["pseudo"] = $_POST["pseudo"];
        header("Location:index.php?page=membre");
      } 
      else
      {
        echo "<div class='container col-md-6'>";
        echo "<div class='alert alert-danger alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert'>✗</button>
            Pseudo ou Password incorect
            </div> <br/>";
        echo "</div>";
      }
    }
    else
    {
      echo "<div class='container col-md-6'>";
      foreach ($errors as $error) {
        echo "<div class='alert alert-danger alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert'>✗</button><li>".$error."</li></div> <br/>";
      }
      echo "</div>";
    }
  }

   ?>
<link rel="stylesheet" href="../css/style.css">
<!------ Include the above in your HEAD tag ---------->

<section class="login-block">
    <div class="container">
    <div class="row">
        <div class="col-md-4 login-sec">
            <h2 class="lead text-center font-weight-bold">Connexion</h2>
            <form class="login-form" method="POST" action="">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase font-weight-bold">Pseudo</label>
    <input type="text" name="pseudo" class="form-control" placeholder="">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase font-weight-bold">Password</label>
    <input type="password" class="form-control" name="password" placeholder="">
  </div>
  
  
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      <small class="font-weight-bold">Se souvenir de moi</small>
    </label>
    <br><br>
    <button type="submit" name="submit" class="btn btn-outline-danger float-right">Connexion</button>
  </div>
  <br><br><br>
  <a class="lead text-danger" href="pages/forgot.php">Mot de passe oublié</a>
  
</form>
<div class="copy-text">Copyright - 2018 <i class="fa fa-heacrt"></i><a href="http://air-alpha.com">Air-Alpha.com</a></div>
        </div>
        <div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li class="bg-primary" data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li class="bg-primary" data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li class="bg-primary" data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="img/1.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>Air Alpha</h2>
            <p>C'est un reseau social creer dans le but de promouvoir le l'entraide sur les problemes d'informatique </p>
        </div>  
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="img/2.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2 class="text-success">Air Alpha</h2>
            <p class="text-success">C'est un reseau social creer dans le but de promouvoir l'entraide sur les problemes d'informatique </p>
        </div>  
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="img/3.bmp" alt="Third slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2 class="text-success">Air Alpha</h2>
            <p class="text-success">C'est un reseau social creer dans le but de promouvoir le l'entraide sur les problemes d'informatique </p>
        </div>  
    </div>
  </div>
            </div>     
            
        </div>
    </div>
</div>
</section>