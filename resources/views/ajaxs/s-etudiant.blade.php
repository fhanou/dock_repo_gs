
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nom_pere">Nom du père</label>
                <input type="text" name="nom_pere" value="{{ isset($parent->nom_pere) ? $parent->nom_pere:'' }}" placeholder="Entrez le nom du père!" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="profession_pere">Profession du père</label>
                <input type="text" name="profession_pere" value="{{ isset($parent->profession_pere) ? $parent->profession_pere:'' }}" placeholder="Entrez la profession du père!" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>   
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nom_mere">Nom de la mère</label>
                <input type="text" name="nom_mere" value="{{ isset($parent->nom_mere) ? $parent->nom_mere:'' }}" placeholder="Entrez le nom de la mère!" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="profession_mere">Profession de la mère</label>
                <input type="text" name="profession_mere" value="{{ isset($parent->profession_mere) ? $parent->profession_mere:'' }}" placeholder="Entrez la profession de la mère!" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>  
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nom_tuteur">Nom du tuteur</label>
                <input type="text" name="nom_tuteur" value="{{ isset($parent->nom_tuteur) ? $parent->nom_tuteur:'' }}" placeholder="Entrez le nom du tuteur!" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="profession_tuteur">Profession du tuteur</label>
                <input type="text" name="profession_tuteur" value="{{ isset($parent->profession_tuteur) ? $parent->profession_tuteur:'' }}" placeholder="Entrez la profession du tuteur!" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>    
    </div>