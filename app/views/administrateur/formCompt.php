<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 28/06/2017
 * Time: 13:40
 */
include_once "app/controllers/administrateur/C_formCompte.php";

?>

<script> window.document.title = "Wigefor* new user Account"</script>

<div class="col col-md-3 col-md-offset-2 text-center">
    <form method="get" action="#">
        <header>Enregistrer un nouveau compte</header>
        <input type="hidden" name="q" value="app/views/administrateur/formCompt">
        <label>Login</label>
        <input class="form-control" type="text" name="login" required>
        <label>Mot de Passe</label>
        <input class="form-control" type="text" name="pwd" required>
        <label>Type </label>
        <select name="type" required class="form-control">
            <option value="administrateur">Admin</option>
            <option value="eleve">Apprenant</option>
            <option value="enseignant">Enseignant</option>
        </select>

        <button class="btn btn-success " style="float: right; margin:15px;" type="submit">Add  <span class="glyphicon glyphicon-plus"></span> </button>
        <button class="btn btn-danger" style="float: right; margin:15px;">Reset  <span class="glyphicon glyphicon-remove"></span> </button>
    </form>
</div>
