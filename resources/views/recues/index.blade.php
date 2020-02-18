@extends('layout.default')
@section('title', 'ONFP - Liste des courriers arrives')
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
                Liste des recues
            </div> 
            
          <div class="card-body">
            <div class="table-responsive">
              <div align="right">
                <a href="{!! url('recues/create') !!}"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</div></a> 
              </div>
                <br />
              <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                  <tr>
                    <th>ID</th>
                    <th>Numero</th>
                    <th>Objet</th>
                    <th>Expéditeur</th>
                    <th>Imputation</th>
                    <th style="width:50px;">Action</th>
                  </tr>
                </thead>
                <tfoot class="table-dark">
                  <tr>
                    <th>ID</th>
                    <th>Numero</th>
                    <th>Objet</th>
                    <th>Expéditeur</th>
                    <th>Imputation</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @if (count($recues)==0)                            
                  <tr>
                    <td class="text-center" colspan="2"></td>
                  </tr>
                  @else 
                  {!! $i = 1 !!}
                  @foreach ($recues as $recue)
                  <tr>
                    <td>{!! $i !!}</td>
                    <td>{!! $recue->numero !!}</td>
                    <td>{!! $recue->courrier->objet !!}</td>
                    <td>{!! $recue->courrier->expediteur !!}</td>
                    <td>
                      @foreach ($recue->courrier->directions as $direction)
                          <span class="btn btn-default">{!! $direction->sigle !!}</span> 
                      @endforeach
                    </td>             
                    <td class="d-flex align-items-baseline">
                      @can('update', $recue->courrier)
                        <a href="{!! url('recues/' .$recue->id. '/edit') !!}" class= 'btn btn-success btn-sm' title="modifier">
                          <i class="far fa-edit">&nbsp;</i>
                        </a>
                      @endcan 
                        &nbsp; <a href="{!! url('courriers/' .$recue->courrier->id) !!}" class= 'btn btn-primary btn-sm' title="voir">
                          <i class="far fa-eye">&nbsp;</i>
                        </a>
                        &nbsp;
                        @can('delete', $recue->courrier)
                          {!! Form::open(['method'=>'DELETE', 'url'=>'recues/' .$recue->id, 'id'=>'deleteForm', 'onsubmit' => 'return ConfirmDelete()']) !!}
                          {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title'=>"supprimer"] ) !!}
                          {!! Form::close() !!}
                        @endcan 
                    </td>
                  </tr>
                  @endforeach                        
                  @endif
                </tbody>                
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection