@extends('layout.default')
@section('content')
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">              
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
              <div class="card">
                  <div class="card-header">
                      <i class="fas fa-table"></i>
                      Liste des recues
                  </div> 
                @if(\Session::has('success'))
                <div class="alert alert-success">
                 <p>{{ \Session::get('success') }}</p>
                </div>
                @endif
                <div class="card-body">
                  <div class="table-responsive">
                    <div align="right">
                      <a href=""><div class="btn btn-success">Nouveau recue&nbsp;<i class="fas fa-plus"></i></div></a> 
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
                          <th>Action</th>
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
                        @foreach ($recues as $recue)
                        <tr>
                          <td>{!! $recue->id !!}</td>
                          <td>{!! $recue->numero !!}</td>
                          <td>{!! $recue->courrier->objet !!}</td>
                          <td>{!! $recue->courrier->expediteur !!}</td>
                          <td>
                            @foreach ($recue->courrier->directions as $direction)
                                <button type="button" class="btn btn-success">{!! $direction->sigle !!}<span class="badge">{!! $direction->id !!}</span></button> 
                            @endforeach
                          </td>
                          
                         
                          <td>
                              <a class="btn btn-primary"  href={{ route('recues.show',['recue'=>$recue->id]) }} title="Modifier"><i class="far fa-edit">&nbsp;</i></a>
                          </td>
                        </tr>
                        @endforeach
                            
                        @endif
                      </tbody>
                     
                    </table>
                    {{-- {{ $recues->links() }} --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endsection