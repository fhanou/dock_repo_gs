
<main class="container" onload="addition();">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="libelle_immobilier">Libellé:</label>
                <input type="text" name="libelle_immobilier" value="{{ isset($immobilier->libelle_immobilier) ? $immobilier->libelle_immobilier:'' }}" placeholder="Entrez le libellé de l'immobilier!" class="form-control" required="Veuillez remplir ce champ!">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="total_immobilier">Effectif total:</label>
                <input type="text" name="total_immobilier" id="total" value="{{ isset($immobilier->total_immobilier) ? $immobilier->total_immobilier:'' }}" placeholder="effectif total de l'immobilier!" class="form-control" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="bon_immobilier">Effectif bon état:</label>
                <input type="number" name="bon_immobilier" id="bon" value="{{ isset($immobilier->bon_immobilier) ? $immobilier->bon_immobilier:'' }}" placeholder="Entrez l'effectif de l'immobilier en bon état!" class="form-control" required="Veuillez remplir ce champ!" onchange="addition();">
            </div>
        </div>
        <div class="col-md-6">
             <div class="form-group">
                <label for="mauvais_immobilier">Effectif mauvais état:</label>
                <input type="number" name="mauvais_immobilier" id="mauvais" value="{{ isset($immobilier->mauvais_immobilier) ? $immobilier->mauvais_immobilier:'' }}" placeholder="Entrez l'effectif de l'immobilier en mauvais état!" class="form-control" required="Veuillez remplir ce champ! " onchange="addition();">
            </div> 
        </div>
    </div>
</main>

<script>
    function addition() {
        var bon = document.getElementById("bon").value;
        var mauvais = document.getElementById("mauvais").value;
        var total = parseFloat(bon) + parseFloat(mauvais);
        document.getElementById("total").value = total;
    }
</script>