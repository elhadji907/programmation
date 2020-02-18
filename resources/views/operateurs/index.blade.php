@extends('layout.default')
@section('title', 'ONFP - Liste des opérateurs')
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
                Liste des opérateurs
            </div> 
          <div class="card-body">
            <div class="table-responsive">
              <div align="right">
                <a href="{!! url('operateurs/create') !!}"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</div></a> 
              </div>
                <br />
              <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                  <tr>
                    <th>Id</th>
                    <th>Type</th>
                    <th>Numéro agrément</th>
                    <th>Nom de la structure</th>
                    <th>Adresse e-mail</th>
                    <th>Téléphone</th>
                    <th style="width:70px;">Action</th>
                  </tr>
                </thead>
                <tfoot class="table-dark">
                  <tr>
                    <th>Id</th>
                    <th>Type</th>
                    <th>Numéro agrément</th>
                    <th>Nom de la structure</th>
                    <th>Adresse e-mail</th>
                    <th>Téléphone</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  @if (count($operateurs)==0)                            
                  <tr>
                    <td class="text-center" colspan="2"></td>
                  </tr>
                  @else 
                  {!! $i = 1 !!}
                  @foreach ($operateurs as $operateur)

                  <tr>
                    <td>{!! $i++ !!}</td>
                    <td>{!! $operateur->structure->name !!}</td>
                    <td>{!! $operateur->numero !!}</td>
                    <td>{!! $operateur->name !!}</td>
                    <td>{!! $operateur->user->email !!}</td>             
                    <td>{!! $operateur->user->telephone !!}</td>             
                    <td class="d-flex align-items-baseline align-content-center">
                      {{--  @can('update', $operateur)  --}}
                        <a href="{!! url('operateurs/' .$operateur->id. '/edit') !!}" class= 'btn btn-success btn-sm' title="modifier">
                          <i class="far fa-edit">&nbsp;</i>
                        </a>
                        {{--  @endcan   --}}
                        &nbsp; <a href="{!! url('operateurs/' .$operateur->id) !!}" class= 'btn btn-primary btn-sm' title="voir">
                          <i class="far fa-eye">&nbsp;</i>
                        </a>
                        &nbsp;
                        {{--  @can('delete', $operateur)  --}}
                        {!! Form::open(['method'=>'DELETE', 'url'=>'operateurs/' .$operateur->id, 'id'=>'deleteForm', 'onsubmit' => 'return ConfirmDelete()']) !!}
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title'=>"supprimer"] ) !!}
                        {!! Form::close() !!}
                        {{--  @endcan   --}}
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