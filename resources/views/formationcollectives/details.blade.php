@extends('layout.default')
@section('title', 'ONFP - Fiche Courier individuelle')
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
    @foreach ($individuelles as $individuelle)
        <div class="invoice-box justify-content-center">
            <div class="card">
                <div class="card card-header text-center bg-gradient-success">
                    <h1 class="h4 text-white mb-0">{!! $individuelle->demandeur->types_demande->name !!}</h1>
                </div>
                <div class="card-body">
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
                                            <b>Numéro dossier </b>#:
                                            {!! $individuelle->demandeur->numero !!}<br>
                                            <b>Date dépot </b>: {!! Carbon\Carbon::parse($individuelle->demandeur->date_depot)->format('d/m/Y') !!}<br>
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
                                            <h3>{{ __('INFORMATIONS PERSONNELLES') }}</h3>
                                            <b>CIN:</b> {{ $individuelle->cin }}<br>
                                            <b>Prénom:</b> {{ $individuelle->demandeur->user->firstname }}&nbsp;&nbsp;
                                            <b>Nom :</b>{{ $individuelle->demandeur->user->name }}<br>
                                            <b>Date et lieu de naissance:</b>
                                            {{ $individuelle->demandeur->user->date_naissance->format('d/m/Y') }}&nbsp;à&nbsp;
                                            {{ $individuelle->demandeur->user->lieu_naissance }}<br>
                                            <b>E-mail:</b> <span style="color: blue">{{ $individuelle->demandeur->user->email }}</span>&nbsp;&nbsp;
                                            <b>Tel:</b> {{ $individuelle->demandeur->user->telephone }}&nbsp;&nbsp;
                                            <b>Fixe:</b> {{ $individuelle->demandeur->user->fixe }}<br>
                                            <b>Fax:</b> {{ $individuelle->demandeur->user->fax }}&nbsp;&nbsp;
                                            <b>BP:</b> {{ $individuelle->demandeur->user->bp }}<br>
                                            <b>Adresse:</b> {{ $individuelle->demandeur->user->adresse }}<br>
                                        </td>

                                        <td>
                                            {{-- <h3>{{ __('GESTIONNAIRE') }}</h3>
                                <b>Nom:</b> {{ $individuelle->demandeur->user->firstname }}&nbsp;&nbsp;{{ $individuelle->demandeur->user->name }}<br>
                                <b>Tel:</b> {{ $individuelle->demandeur->user->telephone }} --}}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr class="heading">
                            <td>
                                {{ __('MODULES') }}
                            </td>

                            <td>
                                {{ __('FORMATIONS') }}
                            </td>
                        </tr>

                        <tr class="details">
                            <td>
                                @foreach ($individuelle->demandeur->modules as $module)
                                    <p><small>{!! $i++ !!}</small>)
                                        {!! $module->name ?? 'aucun module demandé' !!}</small></p>
                                @endforeach
                            </td>
                            <td>
                                {{-- @if ($individuelle->demandeur->file !== '')
                        <a class="btn btn-outline-secondary mt-0" title="télécharger le fichier joint" target="_blank" href="{{ asset($individuelle->demandeur->getFile()) }}">
                            <i class="fas fa-download">&nbsp;cliquez ici pour télécharger</i>
                        </a>                                            
                    @else
                        Aucun fichier joint
                    @endif --}}
                            </td>
                        </tr>
                        <tr class="heading">
                            <td>
                                MESSAGE
                            </td>
                            <td>

                            </td>

                        </tr>

                        <tr class="item">

                            <td colspan="2">
                                {{-- {{ $individuelle->demandeur->message }} --}}
                            </td>
                        </tr>
                        <tr class="heading">
                            <td>
                                IMPUTATION
                            </td>

                            <td>
                                RESPONSABLE
                            </td>
                        </tr>

                        <tr class="item">
                            <td>
                                {{-- @foreach ($individuelle->demandeur->imputations as $imputation)
                      {!! $imputation->destinataire !!}<br>
                    @endforeach --}}
                            </td>

                            <td>
                                {{-- @foreach ($individuelle->demandeur->imputations as $imputation)
                    {!! $imputation->sigle !!}<br>
                    @endforeach --}}
                            </td>
                        </tr>
                    </table>

                    <div class="d-flex justify-content-between align-items-center mt-5">
                        @can('update', $individuelle)
                            <a href="{!! url('individuelles/' . $individuelle->id . '/edit') !!}" title="modifier" class="btn btn-outline-warning mt-0">
                                <i class="far fa-edit">&nbsp;Modifier</i>
                            </a>
                        @endcan
                        <a href="{!! route('demandeurs.show', $individuelle->demandeur->id) !!}" title="modifier" class="btn btn-outline-primary mt-0">
                            <i class="far fa-eye">&nbsp;M&eacute;ssage</i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection
