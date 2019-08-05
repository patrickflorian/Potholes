<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 09/06/2017
 * Time: 05:33
 */

?>
    <script> window.document.title = "Wigefor --new Campus"</script>
    <div class="col-md-8 col-md-offset-2">
        <?php include_once "app\controllers\administrateur\C_formCampus.php"; ?>
<form method="post">
    <h1>Add a new campus</h1>
<div class="col-md-12">
    <div class="form-group">
        <label>Campus Code</label>
        <input type="text" name="code-campus">
    </div>
    <div class="form-group">
        <label>Campus Name</label>
        <input type="text" name="libelle-campus">
    </div>
    <input class="btn btn-info" type="submit" value="ADD" > </input>
</div>
</form>
    </div>

<?php
?>