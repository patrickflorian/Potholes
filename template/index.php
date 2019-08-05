<!DOCTYPE html>
<html lang="fr">

<!-- Mirrored from www.w3schools.com/bootstrap/tryit.asp?filename=trybs_theme_company_complete_animation by HTTrack Website Copier/3.x [XR&CO'2010], Fri, 30 Dec 2016 22:07:19 GMT -->
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Company Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="res/assets/bootstrap/css/bootstrap.min.css">
  <script src="res/assets/js/jquery.min.js"></script>
  <script src="res/assets/bootstrap//js/bootstrap.min.js"></script>
  <style>

 
  body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
  }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
  }  
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
  .jumbotron {
      width : 100%;
      /*background-color : yellowgreen;*/
      color: #fff;
      /*padding: 100px 25px;*/
      font-family: Montserrat, sans-serif;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: green;
      font-size: 50px;
  }
  .logo {
      color: green;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: green;
  }
  .carousel-indicators li {
      border-color: green;
  }
  .carousel-indicators li.active {
      background-color: green;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid green; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid green;
      background-color: #fff !important;
      color: green;
  }
  .panel-heading {
      color: #fff !important;
      background-color: green !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: green;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: yellow !important;
  }

  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: green !important;
      background-color: #818181 !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  nav.navbar .container {
      background-color: #26B400;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: green;
  }
  .slideanim {visibility:hidden;}
  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;
      animation-duration: 1s;
      -webkit-animation-duration: 1s;
      visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }
      p{
          font-family: "Helvetica Neue", Arial, Helvetica, sans-serif;
          color: grey;
          text-space: 1.5;
          text-justify: none;
      }
      .navbar li:focus{
          background-color: green;
      }
      nav.navbar li a{
          color: grey;
      }

  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<div class="container text-black">
<nav class="navbar navbar-default navbar-fixed-top text-center">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     <a href="#" class="navbar-brand navbar-link" ><i class="glyphicon glyphicon-phone"></i><e style="color: forestgreen;">Wige</e><span style="color: yellow;">for </span>--</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="presentation"><a href="#about">ABOUT</a></li>
        <li class="presentation"><a href="#services">SERVICES</a></li>
        <li class="presentation"><a href="#portfolio">AGENCES</a></li>
        <li class="presentation"><a href="#contact">CONTACT</a></li>
        <li class="active" class="myBtn" id="myBtn"><a href="#">Connexion</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron hero">
    <div class="container">
        <div class="row">
            <div class="col-md-6  get-it">
                <h1 class = "name">Winsoft Informatique</h1>
                <p class="text-muted">savoir choisir c'est dejà réussir</p>
                <span><a class="btn btn-lg" role="button" style="background-color: yellow; color: white;" href="#"> contact us </a></span>
                <button  id="myBtn" class="myBtn btn btn-success btn-lg" style="background: #26B400;" type="button">Connect Now!</button>
            </div>
        </div>
    </div>
</div>
<section class="testimonials">
    <h2 class="text-center">Winsoft</h2>
    <blockquote>
        <p>Centre de formation professionnel agrée par le ministere de la formation professionnelle</p>
        <footer>Minefor</footer>
    </blockquote>
</section>

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




<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2>A propos De Winsoft Informatique </h2><br>
      <h4>Historique</h4><br>
      <p>WINSOFT INFORMATIQUE est une entreprise du secteur tertiaire qui a été créé en 2000 sous l’initiative de M. YMELE PAUL. La première agence a été ouverte à Bafoussam au quartier Tamdja face maison Renault. Les autres ont suivi : En fin d’année 2005, une agence a été ouverte à Douala, en 2006 une autre a vu le jour à Yaoundé et la dernière en 2010 dans l’extrême nord du Cameroun plus précisément à Maroua.  L’agence de Bafoussam a été déplacée à cent mètres de l’ancien cinéma quatre étoile au marché “B “. C’est également cet emplacement qui abrite le siège social de l’entreprise
Autrefois WINSOFT ne formait qu’en secrétariat bureautique, maintenance ou gestion et ne vendait que du matériel informatique. Mais grâce à son évolution. Elle vend désormais les matériaux pédagogiques, médicaux, de reprographie et énergétique. C’est en 2006 qu’elle a reçu un agrément du ministère de l’emploi et de la formation professionnelle et forme désormais en secrétariat comptable, réseau informatique, graphisme de production et gestion informatique. Aujourd’hui, WINSOFT occupe une place importante sur le marché des appareils (groupes électrogènes, onduleur) et les clients semblent plutôt satisfaits de ses prestations.
</p>
      <br><button class="btn btn-default btn-lg">Get in Touch</button>
    </div>
    <div class="col-sm-4 text-yellow">
      <img src="res/assets/img/logo.jpg" class="logo">
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2>Our Values</h2><br>
      <h4><strong>MISSION:</strong> Our mission lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
      <p><strong>VISION:</strong> Our vision Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>
</div>

<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
  <h2>SERVICES</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-off logo-small"></span>
      <h4>Formation</h4>
            <p value="" selected=""></p>
            <p value="VIGR" title="">Videographie</p> 
            <p value="SECO" title="">Secretariat Comptable</p>  
            <p value="SEBU" title="">Secretariat Bureautique           </p> 
            <p value="SEBI" title="">Secretariat Bilingue                    </p> 
            <p value="REIN" title="">Reseaux Informatique</p> 
            <p value="MAIN" title="">Maintenance Informatique</p>
            <p value="GPRO" title="">Graphisme de production(graphisme,infographie et web, imprimerie</p> 
            <p value="GPRH" title="">Gestion de la Paie et RH</p>
            <p value="GECO" title="">Gestion Commerciale / Gestion Comptable</p>
            <p value="CIGE" title="">Comptabilite Informatisée de Gestion</p>
            <p value="CAVE" title="">Caissier(e)/Vendeur(se)</p>
            <p value="ASDI" title="">Assistant(e) de Direction</p>
        </optgroup>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-usd logo-small"></span>
      <h4>Service commerciale</h4>
      <p>la prospection des produits de l’entreprise et de vendre les produits tels que : le matériel et consommable informatique, médical, le matériel de reprographie et de pédagogie, le matériel de réseau</p>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-wrench logo-small"></span>
      <h4>Atelier de dépannage et SAV</h4>
      <p>de réparer les machines défectueuses tant pour les clients que pour l’entreprise et pour but secondaire de former les apprenants en maintenance informatique</p>
    </div>
  </div>
  <br><br>
  <div class="row slideanim">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-leaf logo-small"></span>
      <h4>Administratif</h4>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-certificate logo-small"></span>
      <h4>CERTIFIED</h4>
      <p></p>
    </div>

  </div>
</div>

<!-- Container (Portfolio Section) -->
<div id="portfolio" class="container-fluid text-center bg-grey">
  <h2>Nos Agences</h2><br>
  <h4>Ouvert  de 8h00 à 18h00 de lundi à Samedi</h4>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="res/assets/img/admin.jpg" alt="Siege Social" width="400" height="300">
        <p><strong>Bafoussam,Marché B</strong></p>
        <p><strong>Bafoussam,Djemoun</strong></p>
        <p>formation professionelle et vente consommable informatique</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="res/assets/img/admin.jpg" alt="Winsoft" width="400" height="300">
        <p><strong>Douala,</strong></p>
        <p>vente consommables informatique</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="res/assets/img/admin.jpg" alt="Winsoft" width="400" height="300">
        <p><strong>Yaounde,</strong></p>
        <p>vente de consommables informatique</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="res/assets/img/admin.jpg" alt="Winsoft" width="400" height="300">
        <p><strong>Maroua,</strong></p>
        <p>vente de consommables informatique</p>
      </div>
    </div>
  </div><br>
  
  <h2>What our customers say</h2>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4>"This company is the best. I am so happy with the result!"<br><span style="font-style:normal;">Michael Roe, Vice President, Comment Box</span></h4>
      </div>
      <div class="item">
        <h4>"One word... WOW!!"<br><span style="font-style:normal;">John Doe, Salesman, Rep Inc</span></h4>
      </div>
      <div class="item">
        <h4>"Could I... BE any more happy with this company?"<br><span style="font-style:normal;">Chandler Bing, Actor, FriendsAlot</span></h4>
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
</div>


<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Bafoussam, Cameroun</p>
      <p><span class="glyphicon glyphicon-phone"></span>233 446 358 /699 994 208 /677054 087</p>
      <p><span class="glyphicon glyphicon-envelope"></span> winsoftcom06@yahoo.fr/ winsoft@lebaobab-cam.com</p>
      <p><span class="glyphicon glyphicon-link"><a href="www.lebaobab-cam.com"></a>www.lebaobab-cam.com</span></p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!--
<div id="googleMap" style="height:400px;width:100%;"></div>

 Add Google Maps
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
var myCenter = new google.maps.LatLng(41.878114, -87.629798);

function initialize() {
var mapProp = {
  center:myCenter,
  zoom:12,
  scrollwheel:false,
  draggable:false,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
-->
<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <img src="res/assets/img/admin.jpg" width="80px" height="100px" alt="">
  <p>Web Application Bootstraped by<a href="www.faceboook.com/patrick.malanou.5" title="Visit my facebook Page">Noumbissi Patrick</a></p>
</footer>
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

<script>
$(document).ready(function(){
    $(".myBtn").click(function () {
            $("#myModal").modal();
        });

  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>
</div>
</body>

</html>
