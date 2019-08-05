<style>
    .charts_container{
        width: 900px;
        height: 420px;
        margin: 10px auto;
        color: black;
        background: white;
    }

    .chart_container_centered{
        text-align: center;
        width: 900px;
        height: 420px;
        margin: 10px auto;
        color: black;
    }

    .chart_container{
        width: 400px;
        height: 400px;
        margin: 0 25px;
        float: left;
        color: black;
        background: white;
    }

</style>
<script type="text/javascript" src="../../../res/AwesomeChartJS/awesomechart.js"></script>

<div class="col-md-8 col-md-offset-2"><div class="chart_container">
    <canvas   id="charCanvas1" width="400" height="400">
        Your web-browser does not support the HTML 5 canvas element.
    </canvas>
</div></div>
<?php
/**
 * Created by PhpStorm.
 * User: noumb
 * Date: 04/07/2017
 * Time: 05:49
 */
include_once "../../../lib/autoload.php";
$bdd=PDOFactory::getPostgresConnexion();

    $eleveManager = new EleveManager($bdd);
    $list= $eleveManager->countPerYear();
    ?>
    <script>
    var graph = new AwesomeChart('charCanvas1');
    graph.data=[
    <?php
    foreach ($list as $item){
        echo $item['nombre'].',';
    }
    ?>];
    graph.labels=[
        <?php
        foreach ($list as $item){
            $annee = date_format(date_create($item['annee']),'Y');
            echo "'".$annee."',";
        }
        ?>];
    graph.chartType="pareto";
    graph.title="Evolution du nombre d'apprenant par année";
    graph.colors = ['darkblue','skyblue', '#FF6600', 'pink', 'lightpink', 'green'];
    graph.randomColors = true;
    graph.animate = true;
    graph.animationFrames = 70;
    graph.backgroundFillStyle = 'rgba(25,25,255,0)';
    graph.borderStrokeStyle = 'rgba(255,25,25,0)';
    graph.borderWidth = 1.0;
    graph.draw();
    </script>

    <?php
