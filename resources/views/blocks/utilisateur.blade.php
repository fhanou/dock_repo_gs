@extends ('../layout')

@section('content')
	<input type="hidden" value="{{ Route('remove_utilisateur') }}" id="urls-remove-utilisateur">
	<div class="container-fluid">
		<div class="row">
			@if(isset($utilisateur) && count($utilisateur) > 0)
			@foreach($utilisateur as $utilisateurs)
				<div class="col-md-2 block-user">
					<div class="user-head">
						<center><img src="{{ asset('images/no-user.png') }}" width="100"></center>
					</div>
					<div class="user-body">
						<span><center><i>{{ isset($utilisateurs->name) ? $utilisateurs->name : "" }}</i></center></span>
						<span><center><i>{{ isset($utilisateurs->email) ? $utilisateurs->email : "" }}</i></center></span>
					</div>
					<div class="user-footer" style="text-align:center;">
						<button type="button" class="btn btn-danger btn-xs" id="[remove][utilisateur][{{ isset($utilisateurs->id) ? $utilisateurs->id : 0 }}]" data-urls="{{ Route('remove_utilisateur') }}" ><i class="fa fa-trash"></i> Supprimer</button>
					</div>
				</div>
		    @endforeach
		    @endif
		</div>
	</div>
@endsection

<style>
	.user-head{
		border: 1px solid gray;
		margin: 5px;
		padding: 5px;
		border-radius: 5px;
	}
	.user-body{
		border: 1px solid gray;
		margin: 5px;
		padding: 5px;
		border-radius: 5px;
	}
	.user-footer{
		border: 1px solid gray;
		margin: 5px;
		padding: 5px;
		border-radius: 5px;
	}
</style>