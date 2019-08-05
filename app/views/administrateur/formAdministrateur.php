<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 05:33
 */
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wigefor -- ajouter un administrateur</title>
    <link rel="stylesheet" href="../../../res/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../web/css/styles.css">
    <link rel="stylesheet" href="../../../res/assets/css/untitled.css">
    <link rel="stylesheet" href="../../../res/assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="../../../res/assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="../../../res/assets/css/Bootstrap-Payment-Form.css">
</head>

<body>
<script> window.document.title = "Wigefor --new Admin"</script>
<div class="row register-form">
    <div class="col-md-9 col-md-offset-2">
        <h1 class="text-center"> Adminisrator Add Form</h1>
        <?php  include "app/controllers/administrateur/C_formAdministrateur.php";?>
        <div >
            <form enctype="multipart/form-data" class="form-horizontal custom-form" method="post" action="formAdministrateur.php" >

                <div class="form-group col-md-8" id ="photo">
                    <div class="col-sm-4 label-column">
                        <img src="app/controllers/photo/image.php?id=0" alt="photo 4X4" width="150" class="img-thumbnail show"/>
                        <p class="help-block">photo 4x4</p>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input type="file" accept="image/*" id="photo-admin" name="photo-admin" class="form-control" />
                    </div>
                </div>

                <fieldset class="col-md-6" style="margin-left: -30px;display: inline-block;">
                    <legend class="small">information personnelle</legend>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label for="nom-admin" class="control-label">Nom </label>
                            <p class="help-block">First Name </p>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input type="text" id="nom-admin" name="nom-admin" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label for="prenom-admin" class="control-label">Prenom </label>
                            <p class="help-block">Last Name </p>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input type="text" id="prenom-admin" class="form-control" name="prenom-admin" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label for="sexe-admin" class="control-label">Sexe</label>
                            <p class="help-block">Sex </p>
                        </div>
                        <div class="col-sm-6 input-column">
                            <select class="form-control" id="sexe-admin" name="sexe-admin">
                                <optgroup label="Choose admin Sexe">
                                    <option value="" selected>------------</option>
                                    <option value="H" >Homme</option>
                                    <option value="F">Femme</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label for="dob-admin" class="control-label">Date de naissance</label>
                            <p class="help-block">Day of birth</p>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input type="date" id="dob-admin" class="form-control" name="dob-admin"/>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="col-md-6" style="display: inline-block;">
                                                    <legend class="small">social</legend>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label for="cni-admin" class="control-label">N¤ CNI </label>
                            <p class="help-block">n¤ cni </p>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input type="text" id="cni-admin" class="form-control" name="cni-admin"/>
                        </div>
                    </div>
                </fieldset>


                <fieldset class="col-md-6" style="display: inline-block;">
                    <legend class="small">adresse</legend>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label for="tel-admin" class="control-label">Telephone</label>
                            <p class="help-block">phone number</p>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input type="tel" id="tel-admin" class="form-control" name="tel-admin"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label for="email-admin" class="control-label">Email</label>
                            <p class="help-block">email</p>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input type="email" id="email-admin" class="form-control" name="email-admin"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label for="ville-admin" class="control-label">Ville de Residence</label>
                            <p class="help-block">town</p>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input type="text" id="ville-admin" class="form-control" name="ville-admin"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 label-column">
                            <label for="quartier-admin" class="control-label">Quartier</label>
                            <p class="help-block">quartier</p>
                        </div>
                        <div class="col-sm-6 input-column">
                            <input type="text" class="form-control" id="quartier-admin" name="quartier-admin"/>
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="col-sm-4 label-column">
                                <label for="region-admin" class="control-label">Region</label>
                                <p class="help-block">region</p>
                            </div>
                            <div class="col-sm-6 input-column">
                                <input type="text" class="form-control" id="region-admin" name="region-admin"/>
                            </div>
                        </div>
                </fieldset>
                        <div class="form-group" style="float: right;">
                            <input type="reset" class="btn btn-danger btn-lg" name ="reinitialiser"/>
                            <input type="submit" class="btn btn-success btn-lg" value="submit" name="enregistrer" class="form-control"/>
                        </div>
            </form>
        </div>

</div>
</div>
<script src="../../../res/assets/js/jquery.min.js"></script>
<script src="../../../res/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

