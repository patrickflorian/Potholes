<!DOCTYPE html>

    <style>
        body{
            background-color: #f2f2f2;
        }

        h4 {

            color: white !important;
            text-align: center;
            font-size: 20px;
        }
        nav.sidebar{
            margin-right: -30px;
             margin-top:100px;
             max-width:200px;
        }
        @media(max-width: 758px) {
            nav.sidebar{
                max-width:50px;
            }
            .nav.nav-pills li:before ul{
                display: block;
            }
        }

        .nav.nav-pills li{
            width:100%;
        }
        .nav.nav-pills li:active ul{
            display: block;
        }
        .nav.nav-pills li ul {
            display: table;
            list-style: none;
        }
        

    </style>
    

<body>
<nav class="navbar navbar-default sidebar hidden-xs navbar-fixed-top hidden-print">
    <div class="container-fluid">
        <div class="navbar-header"><a href="#" class="navbar-brand navbar-link" style="color: forestgreen;"><i class="glyphicon glyphicon-star"></i>Ad<span style="color: yellow;">min </span>--</a>
            <button data-toggle="collapse" data-target="#sidebar-collapse" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="sidebar-collapse">
            <ul class=" nav side navbar-nav nav-pills">
                <li  class=""><a data-toggle="dropdown" aria-expanded="false" href="#" class="dropdown-toggle menu"><i class="fa fa-building-o"></i> <span class="hidden-xs">Campus</span></a>
                    <ul role="" class="nav-pills submenu">
                        <li role="presentation"><a href="?q=app/views/administrateur/formCampus">Ajouter</a></li>
                        <li role="presentation"><a href="#">Liste des Campus</a></li>
                    </ul>
                </li>
                <li  class=""><a href="#" class=" menu"><i class="fa fa-home"></i> <span class="hidden-xs">Salles</span></a>
                    <ul role="" class="nav-pills submenu">
                        <li role="presentation"><a href="?q=app/views/administrateur/formSalles">Ajouter</a></li>
                        <li role="presentation"><a href="?q=app/views/administrateur/listSalle">Liste des Salles</a></li>
                    </ul>
                </li>
                <li  class=""><a href="#" class=" menu"><i class="glyphicon glyphicon-user"></i> <span class="hidden-xs">Comptes Utilisateurs</span></a>
                    <ul role="" class="nav-pills submenu">
                        <li role="presentation"><a href="?q=app/views/administrateur/formCompt">Ajouter</a></li>
                        <li role="presentation"><a href="#">modifier/supprimer</a></li>
                        <li role="presentation"><a href="#">Liste des utilisateurs</a></li>
                    </ul>
                </li>
                <li  class=""><a href="#" class=" menu"><i class="glyphicon glyphicon-book"></i> <span class="hidden-xs">Matiere</span></a>
                    <ul role="" class="nav-pills submenu">
                        <li role="presentation"><a href="?q=app/views/enseignant/formEnseignantMatiere">Definir Enseignant </a></li>

                    </ul>
                </li>
                <li  class=""><a href="#" class=" menu"><i class="glyphicon glyphicon-text-background"></i> <span class="hidden-xs">Annee Scolaire</span></a>
                    <ul role="" class="nav-pills submenu" >
                        <li role="presentation"><a href="#">Cloture </a></li>
                        <li role="presentation"><a href="#" onclick="newSchoolYear();">Nouvelle Annee </a></li>
                    </ul>
                </li>
                <li role="presentation"><a href="#"><i class="material-icons">notifications</i> Notifications</a></li>

            </ul>
        </div>
    </div>
</nav>

</body>
<script>
    $(document).ready(function(){

        $(".submenu").hide();
        $(".menu").click(function(e) {
            e.preventDefault();
            $(".submenu").toggle(300);
        });
        $(".sidebar-toggle").click(function() {
            if ($('#sidebar > ul').is(":visible") === true) {
                $('#main-content').css({
                    'margin-left': '0px'
                });
                $('#sidebar').css({
                    'margin-left': '-210px'
                });
                $('#sidebar > ul').hide();
                $("#container").addClass("sidebar-closed");
            } else {
                $('#main-content').css({
                    'margin-left': '210px'
                });
                $('#sidebar > ul').show();
                $('#sidebar').css({
                    'margin-left': '0'
                });
                $("#container").removeClass("sidebar-closed");
            }
        });

    });
    
</script>