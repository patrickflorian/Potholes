<?php if (isset($_GET['e'])){
    $eleveManager = new EleveManager($bdd);
    $passeManager = new PasseManager($bdd);
    $parentManager = new ParentManager($bdd);
    $adresseManager = new AdresseManager($bdd);

    $parent = $parentManager->getList($_GET['e']);
    $eleve = $eleveManager->getUnique($_GET['e']);
    $filiere = $passeManager->getFiliereByEleve($_GET['e']);
    $adress = $adresseManager->getUnique($eleve->getCODE_ADRESSE());

    ?>
    <script> window.document.title = "Wigefor-Fiche-inscription"</script>

    <div class="col-md-12 col-md-offset-2"><nav class=" nav navbar "><div class="row text-red " style=""><a class="link" href="?q=app/views/apprenant/formApprenant&alter=<?php echo $eleve->getNumEleve();?>" > Modifier <i class="glyphicon glyphicon-edit" > </i></a></div>
    <div class="row text-red " style=""><a class="link" onclick="printFiche();" href="#" > Imprimer <i class="glyphicon glyphicon-print" > </i></a></div>
</nav>
    <style>
        .value{
            width: 300px;
            color: green;
            text-decoration:underline ;
        }
        .profile-img-card{
            width:100%;
            height:auto;
        }
    </style>
    <div id="printzone" class="container-fluid " style="max-width:720px;">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-11"><small class="show">Ingeneurie Informatique, Réseaux, Formation, Maintenance, Vente du materiel</small>
                <p class="text-left show"><small>Et consommable Informatique, Risographes, Ronéo typeurs</small></p>
                <p>BP296 BAFOUSSAM Tel: 233 446 358 /699 994 208 /677054 087</p>
                <p>Email: winsoftcom06@yahoo.fr/ winsoft@lebaobab-cam.com/ Site: www.lebaobab-cam.com</p>
            </div>

            <div class="divider"></div>
            <div class="col-md-3 col-md-offset-0 col-xs-4 col-sm-3 hidden-sm hidden-md hidden-lg "><img width="100px" height= "100px" src="app/controllers/photo/image.php?id=<?php echo $eleve->getID_IMG();?>"></div>


            <div class="col-md-8 col-md-offset-0 col-md-push-0 col-sm-8 visible-xs-inline visible-sm-inline visible-md-inline visible-lg-inline-block">
                <h1 class="text-center"><em><span style="text-decoration: underline;">FICHE D&#39;INSCRIPTION </span></em></h1>
            </div>
            <div class="col-md-3 col-md-offset-0 col-sm-3 hidden-xs"><img src="app/controllers/photo/image.php?id=<?php echo $eleve->getID_IMG();?>" class="profile-img-card"></div>

        </div>
        <div class="row">
            <div class="col-md-12"><h1><em><span style="text-decoration: underline;font-size: medium;">Apprenant </span></em></h1></div>
            <div class="col-md-12" >
                <p><span class="col-md-6 col-sm-6 ">Noms et Prenoms de l'apprenant :</span><span class="value"> <?php echo $eleve->getNom().' '.$eleve->getPrenom(); ?></span></p>
                <p><span class="col-md-6 col-sm-6 ">Date et lieu de naissance :</span>  <span class="value"><?php echo $eleve->getDob().'...'.$eleve->getLieu();?></></p>
                <p><span class="col-md-6 col-sm-6 ">CNI :</span> <span class="value"><?php echo $eleve->getCNI();?></></p>
                <p><span class="col-md-6 col-sm-6 ">Contact : </span><span class="value"><?php echo $adress->getNumTelephone(); ?></></p>
                <p><span class="col-md-6 col-sm-6 ">Duree de la formation : </span><span class="value"><?php echo $filiere->getDuree().' Mois ' ;?></></p>
                <p><span class="col-md-6 col-sm-6 ">Niveau d'étude :</span> <span class="value"><?php echo $eleve->getNiveau(); ?></></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"><h1><em><span style="text-decoration: underline;font-size: medium;">Tuteur Chargé du paiement </span></em></></div>
            <div class="col-md-12">
                <p><span class="col-md-6 col-sm-6 ">Noms et Prenoms : </span><span class="value"><?php echo $parent->getNom();?></span></p>
                <p><span class="col-md-6 col-sm-6 ">CNI :</span> <span class="value"><?php echo $parent->getCni();?></span></p>
                <p><span class="col-md-6 col-sm-6 ">Contact :</span> <span class="value"><?php echo $parent->getNumeroTelephone(); ?></span></p>
                <p><span class="col-md-6 col-sm-6 ">Je m'inscrit pour une formation en :</span> <span class="value"><?php echo $filiere->getLibelle(); ?></span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"><h1 style="display : inline;"><em><span style="text-decoration: underline;font-size: medium;">Duree : <span/></em></h1><span class="value"><?php echo $filiere->getDuree().' Mois ' ;?> </span></div>
        </div>
        <div class=" row footer right" style="float: right;">
            <h2 ><span class="" style="text-decoration: underline;font-size: medium;"> signature de l'apprenant <span/></h2>
        </div>
    </div>
</div>
    <?php
}