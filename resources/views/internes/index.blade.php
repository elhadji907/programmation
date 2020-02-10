@extends('layout.default')
@section('title', 'ONFP - Liste des courriers internes')
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
                Liste des courriers internes
            </div> 
          <div class="card-body">
            <div class="table-responsive">
              <div align="right">
                <a href="{!! url('internes/create') !!}"><div class="btn btn-success btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</div></a> 
              </div>
                <br />
              <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                  <tr>
                    {{-- <th>ID</th> --}}
                    <th>Numero</th>
                    <th>Objet</th>
                    <th>Expéditeur</th>
                    <th>Imputation</th>
                    <th style="width:50px;">Action</th>
                  </tr>
                </thead>
                <tfoot class="table-dark">
                  <tr>
                    {{-- <th>ID</th> --}}
                    <th>Numero</th>
                    <th>Objet</th>
                    <th>Expéditeur</th>
                    <th>Imputation</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @if (count($internes)==0)                            
                  <tr>
                    <td class="text-center" colspan="2"></td>
                  </tr>
                  @else 
                  @foreach ($internes as $interne)
                  <tr>
                    {{-- <td>{!! $interne->id !!}</td> --}}
                    <td>{!! $interne->numero !!}</td>
                    <td>{!! $interne->courrier->objet !!}</td>
                    <td>{!! $interne->courrier->expediteur !!}</td>
                    <td>
                      @foreach ($interne->courrier->directions as $direction)
                          <span class="btn btn-default">{!! $direction->sigle !!}</span> 
                      @endforeach
                    </td>             
                    <td class="d-flex align-items-baseline">
                      @can('update', $interne->courrier)
                        <a href="{!! url('internes/' .$interne->id. '/edit') !!}" class= 'btn btn-success btn-sm' title="modifier">
                          <i class="far fa-edit">&nbsp;</i>
                        </a>
                        @endcan 
                        &nbsp; <a href="{!! url('courriers/' .$interne->courrier->id) !!}" class= 'btn btn-primary btn-sm' title="voir">
                          <i class="far fa-eye">&nbsp;</i>
                        </a>
                        &nbsp;
                        @can('delete', $interne->courrier)
                        {!! Form::open(['method'=>'DELETE', 'url'=>'internes/' .$interne->id, 'id'=>'deleteForm']) !!}
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