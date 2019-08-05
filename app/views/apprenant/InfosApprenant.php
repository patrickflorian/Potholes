

<div class="col-md-11 col-md-offset-0">
    <div class="row register-form col-md-9 col-md-offset-2">

        <div  >
                <input type="hidden" name="q" value="app/views/apprenant/InfosApprenant">
            <div class="form-group col-md-4" >
                <div class="col-md-4 label-column">
                    <label for="annee" class="control-label">
                        Annee Scolaire
                    </label>
                </div>
                <div class="col-md-7 input-column  ">
                    <select class="form-control " id="annee" name="annee" title="ne changer cette option que pour ajuster la precision de la recherche">
                    </select>
                </div>
            </div>
            <div class="form-group col-md-4" >
                <div class="col-md-4 label-column">
                    <label for="critere" class="control-label">
                        critere de  recherche
                    </label>
                </div>
                <div class="col-md-5 input-column  ">
                    <select class="form-control" id="critere" name="critere" >
                        <option value="mat"> Matricule</option>
                        <option value="name">Noms/Prenoms</option>
                        <option value="filiere">Filiere</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-4" >

                <div class="col-md-8 input-group  ">
                    <input type="text" id="val" name="val">
                    <button type="submit" class="btn right" style="color: yellow;background-color:purple;float: right;" onclick="searchApprenant(annee.value,critere.value,document.getElementById('val').value);"> <i class="glyphicon glyphicon-search"> </i></button>

                </div>
                <div class="col-md-4 input-group">
                </div>

            </div>
            <div class="form-group col-md-5 input-column  ">
            </div>

        </div>

    </div>



    <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-2" id="list">

    </div>
</div>