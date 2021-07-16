@extends('layout.default')
@section('title', 'ONFP - Fiche formation individuelle')
@section('content')

    <style>
        .invoice-box {
            max-width: 1500px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr td p:nth-child(1) {
            text-align: center;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table thead.heading {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            imputation: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }

    </style>
    <?php $i = 1; ?>
    @foreach ($findividuelles as $findividuelle)
        <div class="invoice-box justify-content-center">
            <div class="card">
                <div class="card card-header text-center bg-gradient-success">
                    <h1 class="h4 text-white mb-0">Formation&nbsp;{!! $findividuelle->formation->types_formation->name !!}</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table method="POST" cellpadding="0" cellspacing="0">
                            <tr class="top">
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td class="title">
                                                {{-- <img src="" style="width:100%; max-width:300px;"> --}}
                                                <img style="width:50%; max-width:100px;"
                                                    src="{{ asset('images/image_onfp.jpg') }}">
                                            </td>
                                            <td>
                                                <b>CODE </b>#:
                                                {!! $findividuelle->code !!}<br>
                                                <b>DÉBUT </b>: {!! Carbon\Carbon::parse($findividuelle->formation->date_debut)->format('d/m/Y') !!}<br>
                                                <b>FIN </b>: {!! Carbon\Carbon::parse($findividuelle->formation->date_fin)->format('d/m/Y') !!}<br>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="information">
                                <td colspan="2">
                                    <table>
                                        <tr>
                                            <td>
                                                <h3>{{ __('INFORMATIONS') }}</h3>

                                            </td>

                                            <td>
                                                <h3>{{ __('INGÉNIEURS') }}</h3>
                                                {{ $findividuelle->formation->ingenieur->name }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr class="heading">
                                <td>
                                    {{ __('MODULE') }}
                                </td>

                                <td>
                                    {{ __('Effectif') }}
                                </td>
                            </tr>

                            <tr class="details">
                                <td>
                                    {{ $findividuelle->formation->module->name }}
                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr class="details">
                                <td>
                                    <a href="{!! url('findividuelles/' . $findividuelle->id . '/edit') !!}" title="modifier" class="btn btn-outline-warning mt-0">
                                        <i class="far fa-edit">&nbsp;Modifier</i>
                                    </a>
                                </td>
                                <td>
                                    <a
                                        href="{{ route('findividuelles.selectdindividuelles', ['$id_dept' => $findividuelle->formation->departement, '$id_module' => $findividuelle->formation->module, 'id_form' => $findividuelle->formation->id]) }}">
                                        <div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</i>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                            <br />
                            <table class="table table-bordered" width="100%" cellspacing="0" id="table-individuelles">
                                <thead class="heading">
                                    <tr>
                                        <th width="150px">Cin</th>
                                        <th width="50px">Civilité</th>
                                        <th>Prenom</th>
                                        <th>Nom</th>
                                        <th width="150px">Téléphone</th>
                                        <th width="50px">Statut</th>
                                        <th style="width:08%;">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Cin</th>
                                        <th>Civilité</th>
                                        <th>Prenom</th>
                                        <th>Nom</th>
                                        <th>Téléphone</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody class="details">
                                    <?php $i = 1; ?>
                                    @foreach ($findividuelle->formation->individuelles as $individuelle)
                                        <tr>
                                            <td>{{ $individuelle->cin }}</td>
                                            <td>
                                                <p>{{ $individuelle->demandeur->user->civilite }}</p>
                                            </td>
                                            <td>{{ $individuelle->demandeur->user->firstname }}</td>
                                            <td>{{ $individuelle->demandeur->user->name }}</td>
                                            <td>{{ $individuelle->demandeur->user->telephone }}</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
