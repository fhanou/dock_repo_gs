
<main class="container">
    <div class="row">
        <div class="col-md-6">
            
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" value="{{ isset($utilisateur->name) ? $utilisateur->name : '' }}" placeholder="Entrez le nom!" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email"  value="{{ isset($utilisateur->email) ? $utilisateur->email:'' }}" placeholder="Entrez l'email!" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Fonction</label>
                @php
                    $uti_select = isset($utilisateur->fonction) ? $utilisateur->fonction : 0;
                @endphp
                <select name="fonction" class="form-control" required="Veuillez remplir ce champ!">
                    <option value="Admin" @if(isset($uti_select) && $uti_select == 'Admin') selected='true'  @endif>ADMIN</option>
                    <option value="Directeur" @if(isset($uti_select) && $uti_select == 'Directeur') selected='true'  @endif>DIRECTEUR</option>
                    <option value="Secretaire" @if(isset($uti_select) && $uti_select == 'Secretaire') selected='true'  @endif>SECRETAIRE</option>
                </select>
            </div>
        </div>
        
        <div class="col-md-6">
             <div class="form-group">
                <label for="password">Mots de passe</label>
                <input type="password" name="password" value="{{ isset($utilisateur->password) ? $utilisateur->password:'' }}" placeholder="Entrez le mots de passe!" class="form-control" required="Veuillez remplir ce champ! ">
            </div> 
        </div>
    </div>
</main>