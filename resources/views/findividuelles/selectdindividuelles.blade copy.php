@extends('layout.default')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        {{ __("Sélection de l'ingénieur") }}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div align="right">
                            </div>
                            <br />
                            <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="{{ url('selectdindividuellesUpdateAll') }}">Update All Selected</button>
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0"
                                style="height: 100px;">
                                <thead class="table-dark">
                                    <tr>
                                        <th width="50px"><input type="checkbox" id="table-ingenieurs"></th>
                                        <th>ID</th>
                                        <th>Cin</th>
                                        <th>Civilité</th>
                                        <th>Prenom</th>
                                        <th>Nom</th>
                                        <th>Date nais.</th>
                                        <th>Lieu nais.</th>
                                        <th>Téléphone</th>
                                        <th>Département</th>
                                        <th>Région</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-dark">
                                    <tr>
                                        <th></th>
                                        <th>ID</th>
                                        <th>Cin</th>
                                        <th>Civilité</th>
                                        <th>Prenom</th>
                                        <th>Nom</th>
                                        <th>Date nais.</th>
                                        <th>Lieu nais.</th>
                                        <th>Téléphone</th>
                                        <th>Département</th>
                                        <th>Région</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if ($individuelles->count())
                                        @foreach ($individuelles as $key => $individuelle)
                                            <tr id="tr_{{ $individuelle->id }}">
                                                <td><input type="checkbox" class="sub_chk" data-id="{{ $individuelle->id }}"></td>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $individuelle->cin }}</td>
                                                <td>{!! $individuelle->demandeur->user->civilite !!}</td>
                                                <td>{!! $individuelle->demandeur->user->firstname !!}</td>
                                                <td>{!! $individuelle->demandeur->user->name !!}</td>
                                                <td>{!! $individuelle->demandeur->user->date_naissance->format('d/m/Y') !!}</td>
                                                <td>{!! $individuelle->demandeur->user->lieu_naissance !!}</td>
                                                <td>{!! $individuelle->demandeur->user->telephone !!}</td>
                                                <td>{!! $individuelle->demandeur->departement->nom !!}</td>
                                                <td>{!! $individuelle->demandeur->departement->region->nom !!}</td>
                                                <td>
                                                    <a href="{{ url('selectdindividuelles', $individuelle->id) }}"
                                                        class="btn btn-success btn-sm" data-tr="tr_{{ $individuelle->id }}"
                                                        data-toggle="confirmation" data-btn-ok-label="Delete"
                                                        data-btn-ok-icon="fa fa-remove"
                                                        data-btn-ok-class="btn btn-sm btn-success"
                                                        data-btn-cancel-label="Cancel"
                                                        data-btn-cancel-icon="fa fa-chevron-circle-left"
                                                        data-btn-cancel-class="btn btn-sm btn-default"
                                                        data-title="Are you sure you want to delete ?" data-placement="left"
                                                        data-singleton="true">
                                                        Select
                                                    </a>
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

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            $('#table-ingenieurs').on('click', function(e) {
             if($(this).is(':checked',true))
             {
                $(".sub_chk").prop('checked', true);
             } else {
                $(".sub_chk").prop('checked',false);
             }
            });
    
    
            $('.delete_all').on('click', function(e) {
    
    
                var allVals = [];
                $(".sub_chk:checked").each(function() {
                    allVals.push($(this).attr('data-id'));
                });
    
    
                if(allVals.length <=0)
                {
                    alert("Please select row.");
                }  else {
    
    
                    var check = confirm("Are you sure you want to delete this row?");
                    if(check == true){
    
    
                        var join_selected_values = allVals.join(",");
    
    
                        $.ajax({
                            url: $(this).data('url'),
                            type: 'DELETE',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: 'ids='+join_selected_values,
                            success: function (data) {
                                if (data['success']) {
                                    $(".sub_chk:checked").each(function() {
                                        $(this).parents("tr").remove();
                                    });
                                    alert(data['success']);
                                } else if (data['error']) {
                                    alert(data['error']);
                                } else {
                                    alert('Whoops Something went wrong!!');
                                }
                            },
                            error: function (data) {
                                alert(data.responseText);
                            }
                        });
    
    
                      $.each(allVals, function( index, value ) {
                          $('table tr').filter("[data-row-id='" + value + "']").remove();
                      });
                    }
                }
            });
    
    
            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]',
                onConfirm: function (event, element) {
                    element.trigger('confirm');
                }
            });
    
    
            $(document).on('confirm', function (e) {
                var ele = e.target;
                e.preventDefault();
    
    
                $.ajax({
                    url: ele.href,
                    type: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function (data) {
                        if (data['success']) {
                            $("#" + data['tr']).slideUp("slow");
                            alert(data['success']);
                        } else if (data['error']) {
                            alert(data['error']);
                        } else {
                            alert('Whoops Something went wrong!!');
                        }
                    },
                    error: function (data) {
                        alert(data.responseText);
                    }
                });
    
    
                return false;
            });
        });
    </script>
@endpush
