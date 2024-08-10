
<main class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="id">Immatriculation:</label>
                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="6" name="id" value="{{ isset($eleve->id) ? $eleve->id:'' }}" placeholder="Entrez le numero matricule!"  class="form-control" required="Veuillez remplir ce champ!" autofocus>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="id_classe">Classe:</label>
                @php
                    $classe_id = isset($eleve->id_classe) ? $eleve->id_classe : 1;
                @endphp
                <select name="id_classe" class="form-control">
                    @if (isset($class) and count($class) > 0)
                        @foreach($class as $classe)
                        @php
                            $classe_ids = $classe->id_classe;
                        @endphp
                        <option value="{{ $classe->id_classe ? $classe->id_classe : '' }}" @if(isset($classe_id) && isset($classe_ids) && $classe_id = $classe_ids) selected='true' @endif>{{ $classe->nom_classe ? $classe->nom_classe : '' }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>    
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" name="nom" value="{{ isset($eleve->nom) ? $eleve->nom:'' }}" placeholder="Entrez le nom!" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="prenoms">Prénom(s):</label>
                <input type="text" name="prenoms" value="{{ isset($eleve->prenoms) ? $eleve->prenoms:'' }}" placeholder="Entrez le(s) prénom(s)!" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>    
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="date_nais">Date de naissance:</label>
                <input type="date" name="date_nais" value="{{ isset($eleve->date_nais) ? $eleve->date_nais:'' }}" placeholder="Entrez la date de naissance!" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="lieu_nais">Lieu de naissance:</label>
                <input type="text" name="lieu_nais" value="{{ isset($eleve->lieu_nais) ? $eleve->lieu_nais:'' }}" placeholder="Entrez le lieu de naissance" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>    
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="sexe">Sexe:</label>
                @php
                    $sex_select = isset($eleve->sexe) ? $eleve->sexe : 0;
                @endphp
                <select name="sexe" class="form-control" required="Veuillez remplir ce champ!">
                    <option value="Masculin" @if(isset($sex_select) && $sex_select == 'Masculin') selected='true'  @endif>Masculin</option>
                    <option value="Feminin" @if(isset($sex_select) && $sex_select == 'Feminin') selected='true'  @endif>Féminin</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
           <div class="form-group">
                <label for="adresse">Adresse:</label>
                <input type="text" name="adresse" value="{{ isset($eleve->adresse) ? $eleve->adresse:'' }}" placeholder="Entrez l'adresse!" class="form-control" required="Veuillez remplir ce champ! ">
            </div>
    
        </div>    
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control" required="Veuillez remplir ce champ!">
                    <option value="Passant">Passant</option>
                    <option value="Redoublant">Rédoublant</option>
                    <option value="Transfert">Transfert</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
           <div class="form-group">
                <label for="date_entree">Date d'entrée:</label>
                <input type="date" name="date_entree" value="{{ isset($eleve->date_entree) ? $eleve->date_entree:'' }}" placeholder="Entrez la date d'entrée!" class="form-control" required="Veuillez remplir ce champ! ">
            </div>
    
        </div>    
    </div>
</main>
