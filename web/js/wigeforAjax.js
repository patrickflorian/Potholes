/**
 * Created by noumb on 07/06/2017.
 */
num=2;
function getXhr(){
    var xhr = null;
    if(window.XMLHttpRequest) // Firefox et autres
        xhr = new XMLHttpRequest();
    else if(window.ActiveXObject){ // Internet Explorer
        try {
            xhr = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e)
        {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    else { // XMLHttpRequest non support? par le navigateur
        alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
        xhr = false;
    }
    return xhr;
}
function addTranche() {
    var xhr = getXhr();

    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            content = document.getElementById('tranche-list').innerHTML;
            document.getElementById('tranche-list').innerHTML =content + texte ;
            num++;
        }
    };

    xhr.open("GET","web/ajax/ajaxFiliere.php?tranche="+num,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send();

}


function getListFormation(type){
    var xhr = getXhr();
    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById("formation").innerHTML =texte ;
        }
    };
        xhr.open("GET","web/ajax/ajaxGetFormation.php?optionlist&type="+type,true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xhr.send();

}

function getFormationInformation(form) {
    var xhr = getXhr();
    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout recu et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById("infos-formation").innerHTML =texte ;
        }
    };
    xhr.open("GET","web/ajax/ajaxGetFormation.php?id="+form,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send();
}

function ajouterAdresse(tel , email, ville  ,region, quartier){

}

function ajouterApprenant(){
    var nom_parent = document.getElementById('nom-parent').value;
    var prof_parent = document.getElementById('prof-parent').value;
    var tel_parent = document.getElementById('tel-parent').value;
    var email_parent = document.getElementById('email-parent').value;
    var code_filiere = document.getElementById('formation').value;
    var nom  = document.getElementById('nom-eleve').value;
    var prenom  = document.getElementById('prenom-eleve').value;
    var sexe  = document.getElementById('sexe-eleve').value;
    var dob  = document.getElementById('dob-eleve').value;
    var lieu  = document.getElementById('lieu-eleve').value;
    var niveau  = document.getElementById('niveau-eleve').value;
    var groupe  = document.getElementById('groupe-eleve').value;
    var rhesus  = document.getElementById('rhesus-eleve').value;
    var status  = document.getElementById('status-eleve').value;
    var cni  = document.getElementById('cni-eleve').value;
    var cni_parent  = document.getElementById('cni-parent').value;
    var tel  = document.getElementById('tel-eleve').value;
    var email  = document.getElementById('email-eleve').value;
    var ville  = document.getElementById('ville-eleve').value;
    var region  = document.getElementById('reg-eleve').value;
    var quartier  = document.getElementById('q-eleve').value;




    var xhr = getXhr();
    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById("infos-formation").innerHTML =texte ;
        }
    };
    link = "../../web/ajax/ajaxAddStudentInfos.php?nom="+nom+"&prenom="+prenom+"&sexe="+sexe +"&dob="+dob+"&lieu="+lieu+"&niveau="+niveau+"&groupe="+groupe+"&rhesus="+rhesus+"&status="+status+"&cni="+cni+"&tel="+tel+"&email="+email+"&ville="+ville+"&region="+region+"&quartier="+quartier+"&nom_parent="+nom_parent+"&prof_parent="+prof_parent+"&tel_parent="+tel_parent+"&email_parent="+email_parent+"&code_filiere="+code_filiere;
            
    xhr.open("GET",link ,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);
}



function log_in() {
    remember = document.getElementById('remember').value;
    login = document.getElementById('login');
    pwd = document.getElementById('password');


    var xhr = getXhr();
    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('result').innerHTML =texte ;
        }
    };
    link = "../wigefor/web/ajax/ajaxConnexion.php?log=in&login="+login+"&pwd="+pwd;
    if(remember = 1){
        link += "&remember";
    }
    xhr.open("GET",link ,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);
}


function getListCampus(){
    var xhr = getXhr();
    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('campus').innerHTML =texte ;
        }
    };

    xhr.open("GET","web/ajax/ajaxCampus.php?list" ,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);
}
function getOptionSalle(campus){
    var xhr = getXhr();
    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('salle').innerHTML = texte ;
        }
    };


    xhr.open("GET","/wigefor/web/ajax/ajaxCampus.php?salle="+campus ,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);
}
function getListSalle(c){
    var xhr = getXhr();
    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('list').innerHTML =texte ;
        }
    };

    xhr.open("GET","web/ajax/ajaxCampus.php?tablesalle="+c ,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);
}
function getListAnnee() {
    var xhr = getXhr();
    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('annee').innerHTML = texte ;
        }
    };

    xhr.open("GET","web/ajax/ajaxAnneeScolaire.php" ,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);
}
function getListApprenantForPaiement(){
    var xhr = getXhr();

    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('list').innerHTML=texte;
        }
    };

    xhr.open("GET","web/ajax/ajaxAddStudentInfos.php?list="+document.getElementById('formation').value+"&annee="+document.getElementById('annee').value+"&paiement" ,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);
}
function getListApprenant(){
    var xhr = getXhr();

    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('list').innerHTML=texte;
        }
    };

    xhr.open("GET","web/ajax/ajaxAddStudentInfos.php?list="+document.getElementById('formation').value+"&annee="+document.getElementById('annee').value ,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);
}
function getListApprenantForChange(){
    var xhr = getXhr();

    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('list').innerHTML=texte;
        }
    };

    xhr.open("GET","web/ajax/ajaxAddStudentInfos.php?changelist="+document.getElementById('formation').value+"&annee="+document.getElementById('annee').value ,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);
}
function searchApprenant(annee,critere,val){
    var xhr = getXhr();

    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('list').innerHTML=texte;
        }
    };

    xhr.open("GET","web/ajax/ajaxSearchStudent.php?annee="+annee+"&critere="+critere+"&val="+val,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);
}
function  getListMatiere(formation) {
    var xhr = getXhr();
    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('matiere').innerHTML=texte;
        }
    };

    xhr.open("GET","web/ajax/ajaxMatiere.php?table&formation="+formation,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);

}
function  getOptionListMatiere(formation) {
    var xhr = getXhr();
    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('matiere').innerHTML=texte;
        }
    };

    xhr.open("GET","../wigefor/web/ajax/ajaxMatiere.php?optionlist&formation="+formation,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);

}

function  getEvalMatiere(formation,evaluation) {
    var xhr = getXhr();
    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('matiere').innerHTML=texte;
        }
    }
    xhr.open("GET","web/ajax/ajaxMatiere.php?formation="+formation+"&evaluation="+evaluation,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);

}

function  addEvaluation(formation,type) {
    var xhr = getXhr();
    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('matiere').innerHTML=texte;
        }
    };

    xhr.open("GET","web/ajax/ajaxMatiere.php?table&formation="+formation,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);

}


function getListEvaluation(annee) {
    var xhr = getXhr();
    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('examen').innerHTML=texte;
        }
    };

    xhr.open("GET","web/ajax/ajaxEvaluation.php?annee="+annee,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);
}
function getFormNote( annee ,examen ,formation, matiere) {
    var xhr = getXhr();
    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById("list").innerHTML=texte;
        }
    };

    xhr.open("GET","web/ajax/ajaxNotes.php?annee="+annee+"&examen="+examen+"&matiere="+matiere+"&formation="+formation,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);
}

function getListNotes( annee ,examen ,formation, matiere) {
    var xhr = getXhr();
    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById("list").innerHTML=texte;
        }
    };

    xhr.open("GET","web/ajax/ajaxNotes.php?view&annee="+annee+"&examen="+examen+"&matiere="+matiere+"&formation="+formation,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);
}
function getTableNotes(examen ,formation) {
    var xhr = getXhr();
    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById("list").innerHTML=texte;
        }
    };

    xhr.open("GET","web/ajax/ajaxEvaluation.php?&num_eval="+examen+"&code_filiere="+formation,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);
}
function addOneNote(examen,matiere,eleve,note){
    var xhr = getXhr();
    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById(eleve).innerHTML=texte;

        }
    };

    xhr.open("GET","web/ajax/ajaxNotes.php?eleve="+eleve+"&examen="+examen+"&matiere="+matiere+"&valeur="+note,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);
}

function addNoteTable(examen,matiere) {
    listNote = document.getElementsByClassName('note');
    for(i=0;i<listNote.length;i++){
        note=listNote.item(i).value;
        eleve = listNote.item(i).name;
        addOneNote(examen,matiere,eleve,note)
    }
}

function getOptionListEnseignant(){
    var xhr = getXhr();

    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('enseignant').innerHTML=texte;
        }
    };
    xhr.open("GET","web/ajax/ajaxEnseignant.php?optionlist" ,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);

}
function getListEnseignant(){
    var xhr = getXhr();

    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('list').innerHTML=texte;
        }
    };

    xhr.open("GET","web/ajax/ajaxEnseignant.php?list="+document.getElementById('formation').value+"&annee="+document.getElementById('annee').value+"&matiere="+document.getElementById('matiere').value ,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);
}



function addPaiement(x,e){

    alert(x+'   '+e);
    var xhr = getXhr();
    if(isNaN(x)|| x==''){
        alert('veuillez entrer un valeur entiere');
    }else{
        if (confirm('voulez vous vraiment effectuer ce versement de '+x+' ??')){
        // On defini ce qu'on va faire quand on aura la reponse
        xhr.onreadystatechange = function(){
            // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
            if(xhr.readyState == 4 && xhr.status == 200){
                texte = xhr.responseText;
                if (texte == '0'){
                    alertMsg('danger','Paiement non effectué');
                }
                else {
                     alertMsg('success','Paiement effectué avec succès');
                }
                // On se sert de innerHTML pour rajouter les options a la liste
            }
        };


        xhr.open("GET","web/ajax/ajaxPaiement.php?e="+e+"&m="+x,true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xhr.send(null);
    }
    }

}
function viewPaiement(el){
    var xhr = getXhr();

    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('list').innerHTML=texte;
        }
    };

    xhr.open("GET","web/ajax/ajaxPaiement.php?el="+el,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);
}

function newSchoolYear(){
    var xhr = getXhr();
    if(confirm('voulez vous vraiment debuterue nouvelle année scolaire ??')){
        // On defini ce qu'on va faire quand on aura la reponse
        xhr.onreadystatechange = function(){
            // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
            if(xhr.readyState == 4 && xhr.status == 200){
                texte = xhr.responseText;
                // On se sert de innerHTML pour rajouter les options a la liste
                document.getElementById('msg').innerHTML=texte;
            }
        };

        xhr.open("GET","web/ajax/ajaxNewSchoolYear.php?year=new",true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xhr.send(null);
    }

}
function deleteSalle(s){
    var xhr = getXhr();
    if(confirm('voulez vous supprimer cette salle ??')){
        // On defini ce qu'on va faire quand on aura la reponse
        xhr.onreadystatechange = function(){
            // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
            if(xhr.readyState == 4 && xhr.status == 200){
                texte = xhr.responseText;
                // On se sert de innerHTML pour rajouter les options a la liste
            }
        };

        xhr.open("GET","web/ajax/ajaxSalle.php?delete="+s,true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xhr.send(null);
    }

}

function listFiliereForModif(type){
    var xhr = getXhr();
    
        // On defini ce qu'on va faire quand on aura la reponse
        xhr.onreadystatechange = function(){
            // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
            if(xhr.readyState == 4 && xhr.status == 200){
                texte = xhr.responseText;
                // On se sert de innerHTML pour rajouter les options a la liste
                document.getElementById('modif').innerHTML=texte;

            }
        xhr.open("GET","web/ajax/ajaxFiliere.php?changelist&type="+type,true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xhr.send(null);
    }

}
function affecter(ens,mat){
    var xhr = getXhr();
if(confirm("voulez vous vraiment affecter cette Matiere a cet enseignant??")){
    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            alertMsg('success','enseignant affecter a cette matiere');
        }
    };
    xhr.open("GET","web/ajax/ajaxEnseignant.php?ens="+ens+"&mat="+mat ,true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.send(null);
}
}
function getSolvableApprenantList() {
    var xhr = getXhr();

    // On defini ce qu'on va faire quand on aura la reponse
    xhr.onreadystatechange = function(){
        // On ne fait quelque chose que si on a tout re?u et que le serveur est ok
        if(xhr.readyState == 4 && xhr.status == 200){
            texte = xhr.responseText;
            // On se sert de innerHTML pour rajouter les options a la liste
            document.getElementById('list').innerHTML=texte;

        }
    }

    xhr.open("GET","web/ajax/ajaxPaiement.php?solve&annee="+annee.value+"&formation="+formation.value,true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
        xhr.send(null);
}