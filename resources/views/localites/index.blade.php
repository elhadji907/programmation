@extends('layout.default')
@section('title', 'ONFP - Liste des localités')
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
                Liste des localites
            </div> 
          <div class="card-body">
            <div class="table-responsive">
              <div align="right">
                <a href="{!! url('localites/create') !!}"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</div></a> 
              </div>
                <br />
              <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                  <tr>
                    <th>ID</th>
                     <th>{!! __("Localite") !!}</th>
                     <th>{!! __("Nombre de demande") !!}</th>
                    <th style="width:20%;">Action</th>
                  </tr>
                </thead>
                <tfoot class="table-dark">
                    <tr>
                      <th>ID</th>
                       <th>{!! __("Localite") !!}</th>
                       <th>{!! __("Nombre de demande") !!}</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                <tbody>
                  <?php $i = 1 ?>
                  @foreach ($localites as $localite)
                  <tr> 
                    <td>{!! $i++ !!}</td>
                    <td>{!! $localite->name !!}</td>
                    <td>
                      @foreach ($localite->demandeurs as $demandeur)
                      @if($loop->last)
                      {!! $loop->count !!}
                      @endif
                      @endforeach
                    </td>             
                    <td class="d-flex align-items-baseline align-content-center">
                        <a href="{!! url('localites/' .$localite->id. '/edit') !!}" class= 'btn btn-success btn-sm' title="modifier">
                          <i class="far fa-edit">&nbsp;</i>
                        </a>
                        &nbsp;
                        {!! Form::open(['method'=>'DELETE', 'url'=>'localites/' .$localite->id, 'id'=>'deleteForm', 'onsubmit' => 'return ConfirmDelete()']) !!}
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