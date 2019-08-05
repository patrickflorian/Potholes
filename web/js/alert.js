/**
 * Created by noumb on 23/06/2017.
 */
function alertMsg(type,message){
    var texte;
    if(type == 'warning'){
        texte= '<div class="alert alert-warning alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Warning!</strong> '+message+'.</div>';

    }
    if(type == 'success'){
        texte ='<div class="alert alert-success alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong>'+ message+'.</div>';
    }
    if(type == 'danger'){
        texte ='<div class="alert alert-danger alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Danger!</strong> '+message+'.</div>';
    }
    if(type == 'info'){
        texte='<div class="alert alert-info alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Info!</strong> '+message+'.</div>';

    }
    document.getElementById('msg').innerHTML+=texte;
}