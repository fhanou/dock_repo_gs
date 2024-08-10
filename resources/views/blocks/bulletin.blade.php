@extends ('../layout')

@section('content')
	<h5 >BULLETIN DE NOTE</h5>
	<div>
		<div class="col-md-12">		
			@if(session('error'))
				<div class="alert alert-danger" role="alert" style="text-align:center;">
					{{session('error')}}
				</div>
			@endif

			@if(session('success'))
					<div class="alert alert-success" role="alert " style="text-align:center;">
						{{session('success')}}
					</div>
				@endif				
		</div>
	</div>
	<div class="container-fluid" >
		<div class="row">
			<div class="col-md-6 blocks-print-bult">
				<form action="{{ Route('imprimer_tous_bulletin') }}" method="GET">
					<div class="row">
						<label> EXPORT BULLETIN PAR CLASSE</label>
						<div class="col-md-8">
							<div class="form-group">
				                <select name="id_classe" class="form-control" style="text-align: center;" required="true">
				                    
				                    @if (isset($class) and count($class) > 0)
				                        @foreach($class as $classe)
				                        @php
				                            $classe_ids = $classe->id_classe;
				                        @endphp
				                        <option value="{{ $classe->nom_classe ? $classe->nom_classe : '' }}" >{{ $classe->nom_classe ? $classe->nom_classe : '' }}</option>
				                        @endforeach
				                    @endif
				                </select>
				            </div>
						</div>
						<div class="col-md-4">
							<button type="submit" class="btn btn-default" href="{{ Route('imprimer_tous_bulletin')}}"><i class="fa fa-print"></i> Imprimer</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-5 blocks-print-bult">
				<label>CONSULTATION BULLETIN PAR ELEVE</label>
				<form action="{{ Route('bulletin_note') }}" method="GET">
					<div class="input-group">
					  	<input type="text" class="form-control" placeholder="Recherche par IM" name="im">
					  	<div class="input-group-append">
					    <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
					  </div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection