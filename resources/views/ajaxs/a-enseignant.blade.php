
<main class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cin">CIN:</label>
                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="12" name="cin" value="{{ isset($enseignant->cin) ? $enseignant->cin:'' }}" placeholder="Entrez le numero de la CIN!" id="cin" class="form-control" required="Veuillez remplir ce champ!" autofocus>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="immatriculation">Immatriculation:</label>
                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="6" name="immatriculation" value="{{ isset($enseignant->immatriculation) ? $enseignant->immatriculation:'' }}" placeholder="Entrez l'immatriculation!" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>    
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" name="nom" value="{{ isset($enseignant->nom) ? $enseignant->nom:'' }}" placeholder="Entrez le nom!" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="prenoms">Prénom(s):</label>
                <input type="text" name="prenoms" value="{{ isset($enseignant->prenoms) ? $enseignant->prenoms:'' }}" placeholder="Entrez le(s) prénom(s)!" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>    
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="date_nais">Date de naissance:</label>
                <input type="date" name="date_nais" value="{{ isset($enseignant->date_nais) ? $enseignant->date_nais:'' }}" placeholder="Entrez la date de naissance!" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="lieu_nais">Lieu de naissance:</label>
                <input type="text" name="lieu_nais" value="{{ isset($enseignant->lieu_nais) ? $enseignant->lieu_nais:'' }}" placeholder="Entrez le lieu de naissance" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>    
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="sexe">Sexe:</label>

                @php
                    $sex_select = isset($enseignant->sexe) ? $enseignant->sexe : 1;
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
                <input type="text" name="adresse" value="{{ isset($enseignant->adresse) ? $enseignant->adresse:'' }}" placeholder="Entrez l'adresse!" class="form-control" required="Veuillez remplir ce champ! ">
            </div>
    
        </div>    
    </div>

    <div class="row">

        <div class="col-md-6">
           <div class="form-group">
                <label for="id_fonction">Fonction:</label>
                @php
                    $fonction_id = isset($enseignant->id_fonction) ? $enseignant->id_fonction : 0;
                @endphp
                <select name="id_fonction" class="form-control">
                    @if (isset($fonct) and count($fonct) > 0)
                        @foreach($fonct as $fonction)
                        @php
                            $fonction_ids = $fonction->id_fonction;
                        @endphp
                        <option value="{{ $fonction->id_fonction ? $fonction->id_fonction : '' }}" @if(isset($fonction_id) && isset($fonction_ids) && $fonction_id = $fonction_ids) selected='true' @endif>{{ $fonction->nom_fonction ? $fonction->nom_fonction : '' }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
    
        </div>  
        <div class="col-md-6">
            <div class="form-group">
                <label for="id_statu">Status:</label>
                @php
                    $statu_id = isset($statu->id_statu) ? $statu->id_statu : 0;
                @endphp
                <select name="id_statu" class="form-control">
                    @if (isset($stat) and count($stat) > 0)
                        @foreach($stat as $statu)
                        @php
                            $statu_ids = $statu->id_statu;
                        @endphp
                        <option value="{{ $statu->id_statu ? $statu->id_statu : '' }}" @if(isset($statu_id) && isset($statu_ids) && $statu_id = $statu_ids) selected='true' @endif>{{ $statu->libelle_statu ? $statu->libelle_statu : '' }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
          
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="id_matiere">Matière enseignée:</label>
                @php
                    $matiere_id = isset($enseignant->id_matiere) ? $enseignant->id_matiere : 0;
                @endphp
                <select name="id_matiere" class="form-control">
                    @if (isset($mat) and count($mat) > 0)
                        @foreach($mat as $matiere)
                        @php
                            $matiere_ids = $matiere->id_matiere;
                        @endphp
                        <option value="{{ $matiere->id_matiere ? $matiere->id_matiere : '' }}" @if(isset($matiere_id) && isset($matiere_ids) && $matiere_id = $matiere_ids) selected='true' @endif>{{ $matiere->libelle ? $matiere->libelle : '' }}</option>

                        @endforeach
                    @endif
                   
                </select>
            </div>
        </div>
        <div class="col-md-6">    
            <div class="form-group">
                <label for="date_prise_service">Date de prise de service:</label>
                <input type="date" name="date_prise_service" value="{{ isset($enseignant->date_prise_service) ? $enseignant->date_prise_service:'' }}" placeholder="Entrez la date de prise de service!" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="codediplomeac">Diplôme académique:</label>

                @php
                    $diplomeac_id = isset($enseignant->codediplomeac) ? $enseignant->codediplomeac : 0;
                @endphp
                <select name="codediplomeac" class="form-control">
                    @if (isset($dipac) and count($dipac) > 0)
                        @foreach($dipac as $diplomeac)
                        @php
                            $diplomeac_ids = $diplomeac->codediplomeac;
                        @endphp
                        <option value="{{ $diplomeac->codediplomeac ? $diplomeac->codediplomeac : '' }}" @if(isset($diplomeac_id) && isset($diplomeac_ids) && $diplomeac_id = $diplomeac_ids) selected='true' @endif>{{ $diplomeac->diplome ? $diplomeac->diplome : '' }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="col-md-6">
           <div class="form-group">
                <label for="codediplomepd">Diplôme pédagogique:</label>

                @php
                    $diplomepd_id = isset($enseignant->codediplomepd) ? $enseignant->codediplomepd : 0;
                @endphp
                <select name="codediplomepd" class="form-control">
                    @if (isset($dippd) and count($dippd) > 0)
                        @foreach($dippd as $diplomepd)
                        @php
                            $diplomepd_ids = $diplomepd->codediplomepd;
                        @endphp
                        <option value="{{ $diplomepd->codediplomepd ? $diplomepd->codediplomepd : '' }}" @if(isset($diplomepd_id) && isset($diplomepd_ids) && $diplomepd_id = $diplomepd_ids) selected='true' @endif>{{ $diplomepd->diplome ? $diplomepd->diplome : '' }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
    
        </div>    
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="num_tel">Contact:</label>
                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="10" name="num_tel" value="{{ isset($enseignant->num_tel) ? $enseignant->num_tel:'' }}" placeholder="Entrez la contact!" id="contact" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>
           
    </div>
</main>

<script type="text/javascript">
    function maxLengthCheck(object){
        if(object.value.length>object.maxLength)
            object.value = object.value.slice(0, object.maxLength)
    }
   
</script>