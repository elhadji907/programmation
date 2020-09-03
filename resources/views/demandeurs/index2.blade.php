@extends('layout.default')
@section('title', 'ONFP - Liste des demandeurs')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">              
          @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
          @elseif (session('message'))
          <div class="alert alert-success">
              {{ session('message') }}
          </div>
          @endif
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Liste des users demandeurs
            </div> 
          <div class="card-body">
            <div class="table-responsive">
              <div align="right">
                <a href="{!! url('demandeurs/create') !!}"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</div></a> 
              </div>
                <br />
              <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                  <tr>
                    <th style="width:10%;">N° Cour.</th>
                    <th>Cin</th>
                    <th>Civilité</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Module</th>
                    <th>Date dépot</th>
                    <th>Localité</th>
                    {{--  <th>Téléphone</th>
                    <th>Statut</th>  --}}
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot class="table-dark">
                    <tr>
                    <th style="width:10%;">N° Cour.</th>
                    <th>Cin</th>
                    <th>Civilité</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Module</th>
                    <th>Date dépot</th>
                    <th>Localité</th>
                    {{--  <th>Téléphone</th>
                    <th>Statut</th>  --}}
                    <th>Action</th>
                    </tr>
                  </tfoot>
                <tbody>
                  @foreach ($demandeurs as $demandeur)
                  <tr> 
                    <td>{!! $demandeur->numero_courrier !!}</td>
                    <td>{!! $demandeur->cin !!}</td>
                    <td>{!! $demandeur->user->civilite !!}</td>
                    <td>{!! $demandeur->user->firstname !!}</td>
                    <td>{!! $demandeur->user->name !!}</td>
                    <td>
                      @foreach ($demandeur->modules as $module)
                          <span class="btn btn-default">{!! $module->name !!}</span> 
                      @endforeach
                    </td>
                    <td>{!! $demandeur->date_depot->format('d/m/Y') !!}</td>          
                    <td>{!! $demandeur->localite->name !!}</td>          
                   {{--   <td>{!! $demandeur->user->telephone !!}</td>          
                    <td>{!! $demandeur->user->status !!}</td>   --}}         
                    <td class="d-flex align-items-baseline align-content-center">
                        <a href="{!! url('demandeurs/' .$demandeur->id. '/edit') !!}" class= 'btn btn-success btn-sm' title="modifier">
                          <i class="far fa-edit">&nbsp;</i>
                        </a>
                       {{--   &nbsp; <a href="{!! url('demandeurs/' .$demandeur->id) !!}" class= 'btn btn-primary btn-sm' title="voir">
                          <i class="far fa-eye">&nbsp;</i>
                        </a>  --}}
                        &nbsp;
                        {!! Form::open(['method'=>'DELETE', 'url'=>'demandeurs/' .$demandeur->id, 'id'=>'deleteForm', 'onsubmit' => 'return ConfirmDelete()']) !!}
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title'=>"supprimer"] ) !!}
                        {!! Form::close() !!}
                    </td>
                  </tr>
                  @endforeach
                </tbody>                
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection