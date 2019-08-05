/**
 * Created by noumb on 08/06/2017.
 */
function formatName(x) {
    x.value = x.value.toUpperCase();
}

function loadOnContainer(filename){
    $("container").load(filename);
}

function message(m) {
    document.getElementById('msg').innerHTML(m);
    $("msg").show();
}

function remember() {
   val=parseInt(document.getElementById('remember').value) ;
   if(val == 0 || val==""){
       document.getElementById('remember').value = 1;
   }else{
       document.getElementById('remember').value = 0;
   }
}
function editPaiement(){
    document.getElementById('paiement').innerHTML= "<input  class='form-control has-feedback' type ='number' name='val' id='val' min='50000' max='300000'/>"+"<button onclick='addPaiement(val.value,eleve.value);viewPaiement(eleve.value);'>"+"<i class ='glyphicon glyphicon-eur '></i></button>";
}

var numTotal = 23 ;
var numCount;

function verifIntput(text) {
    if(text != ''){
        numCount+=1;
    }
    else{
       this.parentElement().lastElementChild.className = "form-control-feedback glyphicon glyphicon-ok-sign";
    }
}

function updateProgress(){
    document.getElementsByClassName('progress-bar').style.cssText='width: '+numCount*100/numTotal+'%;background-color : blue';
}


function checkall() {
    list = document.getElementsByClassName('checkbox-matiere');

    for(i=0;i<list.length;i++){
        list.item(i).checked = 'true';
    }
}
/* ---------- Disable moving to top ---------- */
$('a[href="#"][data-top!=true]').click(function(e){
    e.preventDefault();
});

/* ---------- Submenu  ---------- */

$('.dropmenu').click(function(e){

    e.preventDefault();

    $(this).parent().find('ul').slideToggle();

});

$('.paie').click(function(e){
  e.preventDefault();

  $(this).parent().innerHTML='';
});
function printFiche(){
    window.print();
}