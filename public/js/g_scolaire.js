(function(){
	var scolaire = {

		//modal ajout eleve
		init:function(){
			$('#nouveau-eleve').on('click',function(){
				var urls = $(this).data('urls');
				var sUrl = $(this).data('suivantUrls');
				var __urls = $(this).data('save');
				var data = {__ims:0};
				var mthd = "get";
				var _head = "<h3><i><center>NOUVEAU ELEVE</center></i></h3>";
				var _footer = "<button type='button' class='btn btn-primary btn sm' id='suivant-eleve' data-urls="+sUrl+" data-save="+__urls+" data-etapes='1'>Suivant</button><button type='button' id='fermer-modal' class='btn btn-danger btn sm'>Fermer</button>";
				scolaire.ajax_modal(urls , mthd, data,_head,_footer);
			});


			//modal footer ajout eleve
			$("#modal-footer").on('click','#suivant-eleve',function(){
				console.log($(this).data('etapes'));
				var __urls = $(this).data('save');
				var _datas = {_datas : $("#form-scolaire-unique").serializeArray(),_ims:$('input[name="id"]').val(),_etapes:$(this).data('etapes') };
				var __mthd = "get";
				var __this = $(this);
				scolaire.ajax_save(__urls,__mthd,_datas,__this);
			});

			


			//modal modification eleve
			$("button[id^='[modif][eleve]']").on('click',function(){
				var __ids = $(this).attr('id');
				var __ims = __ids.split('[')[3].replace(']','');
				var __urls = $(this).data('save');
				var urls = $(this).data('urls');
				var sUrl = $(this).data('suivantUrls');
				var data = {__ims:__ims};
				var mthd = "get";
				var _head = "<h3><i><center>MODIFICATION ELEVE</center></i></h3>";
				var _footer = "<button type='button' class='btn btn-primary btn sm' id='suivant-eleve' data-urls="+sUrl+" data-save="+__urls+" data-etapes='1'>Suivant</button><button type='button' id='fermer-modal' class='btn btn-danger btn sm'>Fermer</button>";
				scolaire.ajax_modal(urls , mthd, data,_head,_footer);
			});

			//parents
			$('#modal-footer').on('click','#save-eleve',function(){
				var _urls = $(this).data('save');
				var _mthd = 'get';
				var _ims = $(this).data('cles');
				var etaps = $(this).data('etapes');
				var _datas = {_ims:_ims,_etapes:etaps,_datas : $("#form-scolaire-unique").serializeArray() };
				var _this = $(this);

				scolaire.ajax_save_t(_urls,_mthd,_datas,_this);
			});

			//supprimer eleve
			$('button[id^="[remove][eleve]"]').on('click',function(){
				var __ims = $(this).attr('id').split('[')[3].replace(']','');
				var __url = $('#urls-remove-eleve').val();
				var _mthd = "get";
				var datas = {__ims:__ims};
				var _this = $(this);
				if (confirm('Voulez vous vraiment supprimer?')){
					scolaire.ajax_remove(__url,_mthd,datas,_this);
				}
			});

			//modal mobilier
			
			$('#nouveau-mobilier').on('click',function(){
				var urls = $(this).data('urls');
				var __urls = $(this).data('save');
				var data ={__mob:0};
				var mthd = "get";
				var _head = "<h3><i><center>NOUVEAU MOBILIER</center></i></h3>";
				var _footer = "<button type='button' class='btn btn-primary btn sm' id='mobilier' data-save="+__urls+">Enregistrer</button><button type='button' id='fermer-modal' class='btn btn-danger btn sm'>Fermer</button>";
				scolaire.ajax_modal(urls , mthd, data , _head, _footer);
				
			});

			$("#modal-footer").on('click','#mobilier',function(){
				var __urls = $(this).data('save');
				var __cles = $(this).data('cle');
				var _datas = {_datas : $("#form-scolaire-unique").serializeArray(),_mob:__cles};
				var __mthd = "get";
				var __this = $(this);

				scolaire.ajax_save_t(__urls,__mthd,_datas,__this);
			});


			//modifier mobilier

			$("button[id^='[modif][mobilier]']").on('click',function(){
				var __ids = $(this).attr('id');
				var __mob = __ids.split('[')[3].replace(']','');
				var __urls = $(this).data('save');
				var urls = $(this).data('urls');
				var data = {__mob:__mob};

				var mthd = "get";
				var _head = "<h3><i><center>MODIFICATION MOBILIER</center></i></h3>";
				var _footer = "<button type='button' class='btn btn-primary btn sm' id='mobilier' data-save="+__urls+" data-cle="+__mob+">Enregistrer</button><button type='button' id='fermer-modal' class='btn btn-danger btn sm'>Fermer</button>";
				scolaire.ajax_modal(urls , mthd, data,_head,_footer);
			});

			//supprimer mobilier
			$('button[id^="[remove][mobilier]"]').on('click',function(){
				var __ids = $(this).attr('id').split('[')[3].replace(']','');
				var __url = $('#urls-remove-mobilier').val();
				var _mthd = "get";
				var datas = {__ids:__ids};
				var _this = $(this);
				if (confirm('Voulez vous vraiment supprimer?')){
					scolaire.ajax_remove(__url,_mthd,datas,_this);
				}
			});

			//modal immobilier
			$('#nouveau-immobilier').on('click',function(){
				var urls = $(this).data('urls');
				var __urls = $(this).data('save');
				var data ={__imob:0};
				var mthd = "get";
				var _head = "<h3><i><center>NOUVEAU IMMOBILIER</center></i></h3>";
				var _footer = "<button type='button' class='btn btn-primary btn sm' id='immobilier' data-save="+__urls+">Enregistrer</button><button type='button' id='fermer-modal' class='btn btn-danger btn sm'>Fermer</button>";
				scolaire.ajax_modal(urls , mthd, data , _head, _footer);
			});

			$("#modal-footer").on('click','#immobilier',function(){
				var __urls = $(this).data('save');
				var __cles = $(this).data('cle');
				var _datas = {_datas : $("#form-scolaire-unique").serializeArray(),_imob:__cles};
				var __mthd = "get";
				var __this = $(this);
				scolaire.ajax_save_t(__urls,__mthd,_datas,__this);
			});

			//modal modification immobilier
			$("button[id^='[modif][immobilier]']").on('click',function(){
				var __ids = $(this).attr('id');
				var __imob = __ids.split('[')[3].replace(']','');
				var __urls = $(this).data('save');
				var urls = $(this).data('urls');
				var data = {__imob:__imob};
				var mthd = "get";
				var _head = "<h3><i><center>MODIFICATION IMMOBILIER</center></i></h3>";
				var _footer = "<button type='button' class='btn btn-primary btn sm' id='immobilier' data-save="+__urls+" data-cle="+__imob+">Enregistrer</button><button type='button' id='fermer-modal' class='btn btn-danger btn sm'>Fermer</button>";
				scolaire.ajax_modal(urls , mthd, data,_head,_footer);
			});



			//supprimer immobilier
			$('button[id^="[remove][immobilier]"]').on('click',function(){
				var __ids = $(this).attr('id').split('[')[3].replace(']','');
				var __url = $('#urls-remove-immobilier').val();
				var _mthd = "get";
				var datas = {__ids:__ids};
				var _this = $(this);
				if (confirm('Voulez vous vraiment supprimer?')){
					scolaire.ajax_remove(__url,_mthd,datas,_this);
				}
			});

			//modal enseignant
			$('#nouveau-enseignant').on('click',function(){
				var urls = $(this).data('urls');
				var __urls = $(this).data('save');
				var data ={__ens:0};
				var mthd = "get";
				var _head = "<h3><i><center>NOUVEAU ENSEIGNANT</center></i></h3>";
				var _footer = "<button type='button' class='btn btn-primary btn sm' id='enseignant' data-save="+__urls+">Enregistrer</button><button type='button' id='fermer-modal' class='btn btn-danger btn sm' >Fermer</button>";
				scolaire.ajax_modal(urls , mthd, data , _head, _footer);
			});

			$("#modal-footer").on('click','#enseignant',function(){
				var __urls = $(this).data('save');
				var __cles = $(this).data('cle');
				var _datas = {_datas : $("#form-scolaire-unique").serializeArray(),_ens:__cles};
				var __mthd = "get";
				var __this = $(this);
				scolaire.ajax_save_t(__urls,__mthd,_datas,__this);
			});

			//modal modification enseignant
			$("button[id^='[modif][enseignant]']").on('click',function(){
				var __ids = $(this).attr('id');
				var __ens = __ids.split('[')[3].replace(']','');
				var __urls = $(this).data('save');
				var urls = $(this).data('urls');
				var data = {__ens:__ens};
				var mthd = "get";
				var _head = "<h3><i><center>MODIFICATION ENSEIGNANT</center></i></h3>";
				var _footer = "<button type='button' class='btn btn-primary btn sm' id='enseignant' data-save="+__urls+" data-cle="+__ens+">Enregistrer</button><button type='button' id='fermer-modal' class='btn btn-danger btn sm'>Fermer</button>";
				scolaire.ajax_modal(urls , mthd, data,_head,_footer);
			});

			//supprimer enseignant
			$('button[id^="[remove][enseignant]"]').on('click',function(){
				var __ids = $(this).attr('id').split('[')[3].replace(']','');
				var __url = $('#urls-remove-enseignant').val();
				var _mthd = "get";
				var datas = {__ids:__ids};
				var _this = $(this);
				if (confirm('Voulez vous vraiment supprimer?')){
					scolaire.ajax_remove(__url,_mthd,datas,_this);
				}
			});

			$("#modal-footer").on('click','#utilisateur',function(){
				var __urls = $(this).data('save');
				alert(__urls);
				var __cles = $(this).data('cle');

				var _datas = {_datas : $("#form-scolaire-unique").serializeArray(),_uti:__cles};
				var __mthd = "get";
				var __this = $(this);

				scolaire.ajax_save_t(__urls,__mthd,_datas,__this);
			});

			//supprimer utilisateur
			$('button[id^="[remove][utilisateur]"]').on('click',function(){
				var __ids = $(this).attr('id').split('[')[3].replace(']','');
				var __url = $('#urls-remove-utilisateur').val();
				var _mthd = "get";
				var datas = {__ids:__ids};
				var _this = $(this);
				if (confirm('Voulez vous vraiment supprimer?')){
					scolaire.ajax_remove(__url,_mthd,datas,_this);
				}
			});
			
		},

		//supprimer
		ajax_remove:function(_urls,_mthd,_datas,__this){
			var __loader = $('#lien-gif').val();
			var __ldhtml = "<center><img src='"+__loader+"'> Chargement.....</center>";
			scolaire.ajax_csrf();

			$.ajax({
				url: _urls,
				method: _mthd,
				data: _datas,
				success:function( _datas ){
					__this.parents('tr').remove();
				},
				error:function(_e){
					alert(_e);
					return false;
				}
			});
		},

		//ajouter
		ajax_save:function(_urls,_mthd,_datas,__this){
			var __loader = $('#lien-gif').val();
			var __ldhtml = "<center><img src='"+__loader+"'> Chargement.....</center>";
			scolaire.ajax_csrf();

			$.ajax({
				url: _urls,
				method: _mthd,
				data: _datas,
				dataType:"json",
				beforeSend:function(){
					$('#modal-body').html( __ldhtml );
				},
				success:function( _datas ){
					console.log(_datas._im);
					var _im = _datas._im;
					//alert(_im);
					var urls = __this.data('urls');
					var data = {_im:_im};
					var mthd = "get";
					var _head = "<h3><i><center>NOUVEAU ELEVE</center></i></h3>";
					var _footer = "<button type='button' class='btn btn-success btn sm' id='save-eleve' data-cles="+_datas._im+" data-save="+_urls+" data-etapes='2'>Enregistrer</button><button type='button' id='fermer-modal' class='btn btn-danger btn sm'>Fermer</button>";
					
					scolaire.ajax_modal(urls , mthd, data,_head,_footer);
				},
				error:function(_e){
					alert(_e);
					return false;
				}
			});
		},


		ajax_save_t:function(_urls,_mthd,_datas,__this){
			$.ajax({
				url: _urls,
				method: _mthd,
				data: _datas,
				success:function( _datas ){
					//alert("Réussi");
					location.reload()

				},
				error:function(_e){
					alert(_e);
					return false;
				}
			});
		},

		//modal
		ajax_modal(_urls,_mthd,_datas,_head,_footer){
			var __loader = $('#lien-gif').val();
			var __ldhtml = "<center><img src='"+__loader+"'> Chargement.....</center>";
			scolaire.ajax_csrf();

			$.ajax({
				url: _urls,
				method: _mthd,
				data: _datas,
				beforeSend:function(){
					$('#modal-body').html( __ldhtml );
				},
				success:function( _html ){
					$("#scolaireModal").modal("show");
					$('#modal-header').html( _head );
					$('#modal-footer').html( _footer );
					$('#modal-body').html( _html );
					$(".btn").click(function(){
						$('#scolaireModal').modal('hide');
					});
					
				},
				error:function(_e){
					alert(_e);
				}
			});
		},

		ajax_csrf:function(){
			$.ajaxSetup({
				headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		},
	};


	scolaire.init();
})();