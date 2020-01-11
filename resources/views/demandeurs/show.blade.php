@extends('layout.default')
@section('title', 'ONFP - Fiche demandeur')
@section('content')
{{-- 
<div class="content">
    <div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="container-fluid">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">{{ session('success') }}</div>
            @endif                    
            <div class="row pt-5"></div>
            <div class="card">
                <div class="card-header card-header-primary text-center">
                    <h3 class="card-title">Enregistrement</h3>
                    <p class="card-category">demandeurs</p>
                </div>
                <div class="card-body">                                               
                        <form method="POST" action="{{ url('demandeurs') }}">
                           @csrf                                    
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="objet"><b>Objet:</b></label>
                                    <select name="objet" id="objet" class="form-control" value="{{ old('objet') }}">
                                        <option></option>
                                    @foreach($objets as $objet)
                                        <option value="{{ $objet->name }}">{{ $objet->name }}</option>
                                    @endforeach
                                    </select>
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('objet'))
                                        @foreach ($errors->get('objet') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date_r"><b>Date:</b></label>
                                    <input class="form-control {{ $errors->has('date_r') ? 'is-invalid' : '' }}" type="date" value="{{ $date }}" name="date_r" placeholder="date réception courrier..."
                                        id="date_r" value="{{ old('date_r') }}">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('date_r') }}
                                    </div>
                                </div>                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="input-cin"><b>Numero CIN:</b></label>
                                    <input type="text" name="cin" class="form-control" id="input-cin" placeholder="numero cin" value="{{ old('cin') }}">
                                    <small id="emailHelp" class="form-text text-muted">
                                            @if ($errors->has('cin'))
                                            @foreach ($errors->get('cin') as $message)
                                            <p class="text-danger">{{ $message }}</p>
                                            @endforeach
                                            @endif
                                    </small>
                                </div>                               
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1"><b>Civilité</b></label>
                                    <select name="civilite" id="civilite" class="form-control">
                                        <option></option>
                                        @foreach($civilites as $civilite)
                                        <option value="{{ $civilite->civilite }}">{{ $civilite->civilite }}</option>
                                        @endforeach
                                    </select>
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('civilite'))
                                        @foreach ($errors->get('civilite') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="input-telephone1"><b>{{ __('Téléphone 1:') }}</b></label>
                                    <input type="text" name="telephone1" class="form-control" id="input-telephone1" aria-describedby="emailHelp" placeholder="Numero de telephone" value="{{old('telephone1')}}">
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('telephone1'))
                                        @foreach ($errors->get('telephone1') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="input-telephone2"><b>{{ __('Téléphone 2:') }}</b></label>
                                    <input type="text" name="telephone2" class="form-control" id="input-telephone2" aria-describedby="emailHelp" placeholder="Numero de telephone secondaire" value="{{old('telephone2')}}">
                                    <small id="emailHelp" class="form-text text-muted">
                                        @if ($errors->has('telephone2'))
                                        @foreach ($errors->get('telephone2') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                        @endforeach
                                        @endif
                                    </small>
                                </div>
                            </div>                         
                        <button type="submit" class="btn btn-primary"><i class="far fa-paper-plane"></i>&nbsp;Enregistrer</button>
                        </form>
                        <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Verifier les donn&eacute;es saisies svp</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @push('scripts')
                                        <script type="text/javascript">
                                        $(document).ready(function () {
                                            $("#error-modal").modal({
                                                'show':true,
                                            })
                                        });
                                        </script>
                                            
                                        @endpush
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
--}}

<div class="container-fluid">
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif 
  <div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
      <div class="card"> 
          {{-- <div class="card-header">
              <i class="fas fa-table"></i>
              Liste des demandeurs
          </div>  --}}  
          <div class="card-header card-header-primary text-center">
            <h3 class="card-title">Mon dossier</h3>
            <p class="card-category">personnel</p>
        </div>           
        <div class="card-body">
              <div class="table-responsive">
                  <div align="right">
                    <a href="{{route('demandeurs.create')}}"><div class="btn btn-success">Nouvelle demande&nbsp;<i class="fas fa-user-plus"></i></div></a>
                  </div>
                  <br />
                <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="table-demandeurs">
                  <thead class="table-dark">
                    <tr>
                      <th>ID</th>
                      <th>Module</th>
                      <th>Domaine</th>
                      <th>Secteur</th>
                      <th>Etat</th>
                      <th>Operateur</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot class="table-dark">
                      <tr>
                        <th>ID</th>
                        <th>Module</th>
                        <th>Domaine</th>
                        <th>Secteur</th>
                        <th>Etat</th>
                        <th>Operateur</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  <tbody>
                   
                  </tbody>
              </table>                        
        </div>
      </div>
    </div>
  </div>
</div>
</div> </div>

<div class="modal fade" id="modal_delete_demandeur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form method="POST" action="" id="form-delete-demandeur">
  @csrf
  @method('DELETE')
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Êtes-vous sûr de bien vouloir supprimer cet admin ?</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        cliquez sur fermer pour annuler
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-danger"><i class="fas fa-times">&nbsp;Supprimer</i></button>
      </div>
    </div>
  </div>
</form>
</div>
@endsection
{{-- 
@push('scripts')
<script type="text/javascript">
$(document).ready(function () {
  $('#table-demandeurs').DataTable( { 
    "processing": true,
    "serverSide": true,
    "ajax": "{{route('demandeurs.list')}}",
    columns: [
            { data: ' ', name: ' ' },
            { data: ' ', name: ' ' },
            { data: ' ', name: ' ' },
            { data: ' ', name: ' ' },
            { data: ' ', name: ' ' },
            { data: ' ', name: ' ' },
            { data: null ,orderable: false, searchable: false}

        ],
        "columnDefs": [
                {
                "data": null,
                "render": function (data, type, row) {
                url_e =  "{!! route('demandeurs.edit',':id')!!}".replace(':id', data.id);
                url_d =  "{!! route('demandeurs.destroy',':id')!!}".replace(':id', data.id);
                return '<a href='+url_e+'  class=" btn btn-primary edit " title="Modifier"><i class="far fa-edit">&nbsp;Edit</i></a>'+
                '<div class="btn btn-danger delete btn_delete_demandeur ml-1" title="Supprimer" data-href='+url_d+'><i class="fas fa-trash-alt"></i></div>';
                },
                "targets": 6
                },
        ],
        language: {
          "sProcessing":     "Traitement en cours...",
          "sSearch":         "Rechercher&nbsp;:",
          "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
          "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
          "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
          "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
          "sInfoPostFix":    "",
          "sLoadingRecords": "Chargement en cours...",
          "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
          "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
          "oPaginate": {
              "sFirst":      "Premier",
              "sPrevious":   "Pr&eacute;c&eacute;dent",
              "sNext":       "Suivant",
              "sLast":       "Dernier"
          },
          "oAria": {
              "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
              "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
          },
          "select": {
                  "rows": {
                      _: "%d lignes séléctionnées",
                      0: "Aucune ligne séléctionnée",
                      1: "1 ligne séléctionnée"
                  } 
          }
        }            
  });

  
$('#table-demandeurs').off('click', '.btn_delete_demandeur').on('click', '.btn_delete_demandeur',
function() { 
  var href=$(this).data('href');
  $('#form-delete-demandeur').attr('action', href);
  $('#modal_delete_demandeur').modal();
});
});

</script> 
@endpush --}}