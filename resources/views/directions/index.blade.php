@extends('layout.default')
@section('title', 'ONFP - Liste directions et services')
@section('content')
<div class="container-fluid">
    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif 
  <div class="row justify-content-center">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
      <div class="card"> 
          <div class="card-header">
              <i class="fas fa-table"></i>
              Liste des directions et services
          </div>              
        <div class="card-body">
            <div class="table-responsive">
                  <div align="right">
                    <a href="{{ route('directions.selectresponsable')}}"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</i></div></a>
                  </div>
                  <br />
                <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="table-directions">
                  <thead class="table-dark">
                    <tr>
                      <th>N°</th>
                      <th>direction</th>
                      <th>Sigle</th>
                      <th>Responsable</th>
                      <th style="width:10%;">Action</th>
                    </tr>
                  </thead>
                  <tfoot class="table-dark">
                      <tr>
                        <th>N°</th>
                        <th>direction</th>
                        <th>Sigle</th>
                        <th>Responsable</th>
                        <th style="width:10%;">Action</th>
                      </tr>
                    </tfoot>
                  <tbody>
                    <?php $i = 1 ?>
                    @foreach ($directions as $direction)
                    <tr>
                      <td>{!! $i++ !!}</td>
                      <td>{!! $direction->name !!}</td>
                      <td>{!! $direction->sigle !!}</td>
                      <td>{!! $direction->chef->user->name."  ".$direction->chef->user->firstname !!}</td>            
                      <td class="d-flex align-items-baseline">
                          <a href="{!! url('directions/' .$direction->id. '/edit') !!}" class= 'btn btn-success btn-sm' title="modifier">
                            <i class="far fa-edit">&nbsp;</i>
                          </a>
                          &nbsp; <a href="{!! url('directions/' .$direction->id) !!}" class= 'btn btn-primary btn-sm' title="voir">
                            <i class="far fa-eye">&nbsp;</i>
                          </a>
                          &nbsp;
                          {!! Form::open(['method'=>'DELETE', 'url'=>'directions/' .$direction->id, 'id'=>'deleteForm', 'onsubmit' => 'return ConfirmDelete()']) !!}
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

    