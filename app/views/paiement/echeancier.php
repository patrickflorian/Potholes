<div class="col-md-12 col-md-offset-2"><?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 30/06/2017
 * Time: 20:13
 */
if (isset($_GET['el'])){
    $passeManager = new PasseManager($bdd);
    $studentManager = new EleveManager($bdd);
    $filiereManager = new FiliereManager($bdd);
    $passeManager = new PasseManager($bdd);
    $trancheManager = new TrancheManager($bdd);
    $adress = new AdresseManager($bdd);
    $parentMan = new \ParentManager($bdd);

    $parent = $parentMan->getUnique($_GET['el']);
    $eleve = $studentManager->getUnique($_GET['el']);
    $filiere = $passeManager->getFiliereByEleve($_GET['el']);
    $passe = $passeManager->getFraisByEleve($_GET['el'], strtok($filiere->getCodeFiliere(), ' '));
    $tranche = $trancheManager->getList($filiere->getCodeFiliere());
    $t = $trancheManager->Count($filiere->getCodeFiliere());
    ?>

    <div class="container-fluid">
        <nav class=" nav navbar ">
            <div class="row text-red " style=""><a class="btn btn-warning" onclick="printFiche();" href="#" > Imprimer <i class="glyphicon glyphicon-print" > </i></a></div>
        </nav>
        <div class="row hidden visible-print">
            <div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-11"><small class="show">Ingeneurie Informatique, Réseaux, Formation, Maintenance, Vente du materiel</small>
                <p class="text-left show"><small>Et consommable Informatique, Risographes, Ronéo typeurs</small></p>
                <p>BP296 BAFOUSSAM Tel: 233 446 358 /699 994 208 /677054 087</p>
                <p>Email: winsoftcom06@yahoo.fr/ winsoft@lebaobab-cam.com/ Site: www.lebaobab-cam.com</p>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-pull-2 col-md-12">
                <h1 class="text-center"><em><span
                                style="text-decoration: underline;">ECHEANCIER DE PAIEMENT </span></em></h1>
            </div>
            <div class="col-md-6 col-sm-8">
                <p>Noms et Prenoms de l'apprenant : <?php echo $eleve->getNom() . ' ' . $eleve->getPrenom(); ?></p>
                <p>Date et lieu de naissance : <?php echo $eleve->getDob() . '  ' . $eleve->getLieu(); ?></p>
                <p>CNI : <?php echo $eleve->getCNI(); ?></p>
                <p>Contact : <?php echo $adress->getUnique($eleve->getCODE_ADRESSE())->NUM_TEL; ?></p>
                <p>Duree de la formation : <?php echo $filiere->getDuree(); ?>  Mois</p>
                <p>Niveau d'étude : nom</p>
            </div>
            <div class=" col-md-3 hidden-xs"><img width="100px" height="100px" src="app/controllers/photo/image.php?id=<?php echo $eleve->getID_IMG();?>" class="profile-img-card">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-pull-2 col-md-12">
                <h1 class="text-center"><em><span
                                style="text-decoration: underline;">PROPOSEES PAR LE TUTEUR </span></em></h1>
            </div>
            <div class="col-md-12">
                <p>Noms et Prenoms : <?php echo $parent->getNom(); ?></p>
                <p>CNI : <?php echo $parent->getCni(); ?></p>
                <p>Contact : <?php echo $parent->getNumeroTelephone(); ?></p>
                <p>Je m'inscrit pour une formation en : <?php echo $filiere->getLibelle(); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-pull-2 col-md-12">
                <h1 class="text-center"><em><span style="text-decoration: underline;">TRANCHES PERCUES</span></em></h1>
            </div>
            <div class="col-md-9">
                <input type="hidden" name="eleve" id="eleve" value="<?php echo $_GET['el']; ?>">
                <table class="table table-striped table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th>Tranches</th>
                        <th>Montant</th>
                        <th>Montant Versé</th>
                        <th>Montant restant</th>
                    </tr>
                    </thead>
                    <tbody id="tranche-list">


                    <?php
                    $solde = $passe->getSolde();
                    foreach ($tranche as $item) {
                        $res;
                        $ver;
                        $m = $item->getValeur();
                        $t1 = $solde - $m;
                        if ($t1 < 0) {
                            $ver = $solde;
                            $res = $t1;
                            $solde = 0;
                        } else {
                            $solde = $t1;
                            $ver = $m;
                            $res = 0;
                        }
                        ?>
                        <tr>
                            <td><label><?php echo $item->getCode(); ?></label></td>
                            <td class="warning"><label><?php echo $m; ?></label><i class="glyphicon glyphicon-usd"></i>
                            </td>
                            <td class="<?php if ($ver == $m) echo 'success'; else {
                                if ($ver > 0) echo 'warning'; else echo 'danger';
                            } ?>"><label><?php echo $ver; ?></label><i class="glyphicon glyphicon-usd"></i></td>
                            <td class="<?php if ($res == 0) echo 'success'; else echo 'label-danger'; ?>">
                                <label><?php echo $res; ?></label><i class="glyphicon glyphicon-usd"></i></td>
                            <td></td>
                        </tr>

                        <?php
                        $t--;
                    }
                    ?></tbody>

                </table>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>


</div><?php
}