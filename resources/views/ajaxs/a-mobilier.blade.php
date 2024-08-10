
<main class="container" onload="addition();">
    <div class="row">
        <div class="col-md-6">
            
            <div class="form-group">
                <label for="libelle_mobilier">Libellé:</label>
                <input type="text" name="libelle_mobilier" value="{{ isset($mobilier->libelle_mobilier) ? $mobilier->libelle_mobilier:'' }}" placeholder="Entrez le libellé du mobilier!" class="form-control" oninvalid="alert('fenoy')" required="required" autofocus>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="total_mobilier">Effectif total:</label>
                <input type="text" name="total_mobilier" id="total" value="{{ isset($mobilier->total_mobilier) ? $mobilier->total_mobilier:'' }}" placeholder="Entrez l'effectif total du mobilier!" class="form-control" oninvalid="alert('fenoy')" required ="required" readonly>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="bon_mobilier">Effectif bon état:</label>
                <input type="number" name="bon_mobilier" id="bon" value="{{ isset($mobilier->bon_mobilier) ? $mobilier->bon_mobilier:'' }}" placeholder="Entrez l'effectif du mobilier en bon état!" class="form-control" oninvalid="alert('fenoy')" required="required " onchange="addition();">
            </div>
        </div>
        <div class="col-md-6">
             <div class="form-group">
                <label for="mauvais_mobilier">Effectif mauvais état:</label>
                <input type="number" name="mauvais_mobilier" id="mauvais" value="{{ isset($mobilier->mauvais_mobilier) ? $mobilier->mauvais_mobilier:'' }}" placeholder="Entrez l'effectif du mobilier en mauvais état!" class="form-control" oninvalid="alert('fenoy')" required="required " onchange="addition();">
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