<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 11/06/2017
 * Time: 20:21
 */
?>
 <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      max-height: 600px;
      margin: auto;
  }
  #myCarousel{
      margin-bottom : 15px;
  }
  #myCarousel h2{
        color: darkgreen;
        text-shadow: 2px;
  }
  </style>
<div data-target=".navbar" id="#myPage"></div>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header"><a href="#" class="navbar-brand navbar-link" style="color: forestgreen;"><i class="glyphicon glyphicon-phone"></i>Wige<span style="color: yellow;">for </span>--</a>
        </div>
        <div class="navbar-btn" >
            <ul class="nav navbar-nav navbar-right">
                <li role="presentation"  style="color : blue" ><a href="#" class="text-primary myBtn" id="myBtn">connexion </a></li>
            </ul>
        </div>
    </div>
</nav>

<div id="myCarousel" class="carousel slide center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="res/assets/img/1.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h2>Cours de langue chinoise</h2>
          <p>Apprendre à parler Chinois</p>
        </div>
      </div>

      <div class="item">
        <img src="res/assets/img/2.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h2>Chania</h2>
          <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
        </div>
      </div>
    
      <div class="item">
        <img src="res/assets/img/3.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h2>Flowers</h2>
          <p>Beatiful flowers in Kolymbari, Crete.</p>
        </div>
      </div>

      <div class="item">
        <img src="res/assets/img/4.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h2>Flowers</h2>
          <p>Beatiful flowers in Kolymbari, Crete.</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
 
</div>


<div class="jumbotron hero">
    <div class="container">
        <div class="row">
            
            <div class="col-md-6 col-md-pull-3 get-it">
                <h1 class = "name">Winsoft Informatique</h1>
                <p class="text-muted">savoir choisir c'est dejà réussir</p>
                <span><a class="btn btn-lg" role="button" style="background-color: yellow; color: white;" href="#"> contact us </a></span>
                <button  id="myBtn" class="myBtn btn btn-success btn-lg" style="background: #26B400;" type="button">Connect Now!</button>
            </div>
        </div>
    </div>
</div>
<section class="testimonials">
    <h2 class="text-center">People Love It!</h2>
    <blockquote>
        <p>Centre de formation professionnel agrée par le ministere de la formation professionnelle</p>
        <footer>Minefor</footer>
    </blockquote>
</section>
<section class="features">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Application de gestion de formation</h2>
                <p>Cette Application est conçu et developpez selon le modèle d'architecture Client serveur et  MVC</p>
            </div>
            <div class="col-md-6">
                <div class="row icon-features">
                    <div class="col-xs-4 icon-feature"><i class="glyphicon glyphicon-book"></i>
                        <p>Gestion des formatiions</p>
                    </div>
                    <div class="col-xs-4 icon-feature"><i class="glyphicon glyphicon-piggy-bank"></i>
                        <p>gestion des paiements</p>
                    </div>
                    <div class="col-xs-4 icon-feature"><i class="glyphicon glyphicon-folder-open"></i>
                        <p>gestion des impressions</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- modal pour les resultats -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="padding:15px 30px;">

                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="glyphicon glyphicon-lock"></span> Connexion </h4>
            </div>
            <div class="modal-body" style="padding:30px 10px  30px 10px ;">
                <form method="post" action="index.php">
                    <p class="profile-name-card" ></p>

                    <div class="form-signin custom-form " role="form"><span class="reauth-email"> </span>

                        <i class="glyphicon glyphicon-user" style="color: #26B400;"></i>
                        <input class="form-control" style="margin-bottom: 0;" type="text" required="" name="login"
                               placeholder="Login" autofocus="" id="inputEmail">
                        <input type="hidden" name="log" value="in"/>

                        <i class="glyphicon glyphicon-lock" style="color:  #26B400;"></i>
                        <input class="form-control" style="margin-top: 0;" type="password" required="" name="pwd"
                               placeholder="Password" id="inputPassword">

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" id="remember" oninput="remember();">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-column">
                                <button  class="btn" type="submit" onclick="log_in()" style="width: 100px; float: right; background-color: yellow;" >
                                    <i class="glyphicon glyphicon-user btn-signin"></i> Sign in
                                </button>
                            </div>
                        </div>
                    </div>

                </form><a href="#" class="forgot-password">Forgot your password?</a>
            </div>

        </div>

    </div>
</div>

</div>
</div>


<script>
    $(document).ready(function () {
        $(".myBtn").click(function () {
            $("#myModal").modal();
        });
    });

</script>