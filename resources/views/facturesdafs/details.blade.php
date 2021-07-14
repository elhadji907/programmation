@extends('layout.default')
@section('title', 'ONFP - Fiche facturesdaf')
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

    @foreach ($facturesdafs as $facturesdaf)
        <div class="invoice-box justify-content-center">
            <div class="card">
                <div class="card card-header text-center bg-gradient-success">
                    <h1 class="h4 text-white mb-0">{!! $facturesdaf->courrier->types_courrier->name !!}</h1>
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
                                            Numéro #:
                                            {!! $facturesdaf->courrier->numero !!}<br>
                                            Date imputation: {!! Carbon\Carbon::parse($facturesdaf->courrier->date_imp)->format('d/m/Y') !!}<br>
                                            Date réception: {!! Carbon\Carbon::parse($facturesdaf->courrier->date_recep)->format('d/m/Y') !!}<br>
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
                                            <h3>{{ __('EXPEDITEUR') }}</h3>
                                            <b>Nom:</b> {{ $facturesdaf->courrier->designation }}<br>
                                            <b>Adresse:</b> {{ $facturesdaf->courrier->adresse }}<br>
                                            <b>E-mail:</b> {{ $facturesdaf->courrier->email }}<br>
                                            <b>Tel:</b> {{ $facturesdaf->courrier->telephone }}<br>
                                            @if (isset($facturesdaf->courrier->fax))
                                                <b>Fax:</b> {{ $facturesdaf->courrier->fax }}<br>
                                            @elseif(isset($facturesdaf->courrier->bp))
                                                <b>BP:</b> {{ $facturesdaf->courrier->bp }}<br>
                                            @endif
                                        </td>

                                        <td>
                                            <h3>{{ __('GESTIONNAIRE') }}</h3>
                                            <b>Nom:</b>
                                            {{ $facturesdaf->courrier->user->firstname }}&nbsp;&nbsp;{{ $facturesdaf->courrier->user->name }}<br>
                                            <b>Tel:</b> {{ $facturesdaf->courrier->user->telephone }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr class="heading">
                            <td>
                                Designation
                            </td>
                            <td>
                                Télécharger
                            </td>

                        </tr>

                        <tr class="item">

                            <td>
                                {{ $facturesdaf->courrier->designation }}
                            </td>
                            <td>
                                @if (isset($facturesdaf->courrier->file))
                                    <a class="btn btn-outline-secondary mt-0" title="télécharger le fichier joint"
                                        target="_blank" href="{{ asset($facturesdaf->courrier->getFile()) }}">
                                        <i class="fas fa-download"></i>
                                    </a>
                                @else
                                    Aucun fichier joint
                                @endif
                            </td>

                        </tr>
                        <tr class="heading">
                            <td>
                                VISA DG
                            </td>

                            <td>
                                DATE
                            </td>
                        </tr>

                        <tr class="item">
                            <td>

                            </td>
                            <td>
                                {!! Carbon\Carbon::parse($facturesdaf->date_dg)->format('d/m/Y') !!}
                            </td>
                        </tr>
                        <tr class="heading">
                            <td>
                                VISA CG
                            </td>

                            <td>
                                DATE
                            </td>
                        </tr>

                        <tr class="item">
                            <td>

                            </td>
                            <td>
                                {!! Carbon\Carbon::parse($facturesdaf->date_cg)->format('d/m/Y') !!}
                            </td>
                        </tr>
                        <tr class="heading">
                            <td>
                                VISA AC
                            </td>

                            <td>
                                DATE
                            </td>
                        </tr>

                        <tr class="item">
                            <td>

                            </td>
                            <td>
                                {!! Carbon\Carbon::parse($facturesdaf->date_ac)->format('d/m/Y') !!}
                            </td>
                        </tr>
                        <tr class="heading">
                            <td>
                                IMPUTATION DIRECTION
                            </td>

                            <td>
                                RESPONSABLE
                            </td>
                        </tr>

                        <tr class="item">
                            <td>
                                @foreach ($facturesdaf->courrier->directions as $direction)
                                    {!! $direction->name !!}<br>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($facturesdaf->courrier->directions as $direction)
                                    {!! $direction->chef->user->firstname . '   ' . $direction->chef->user->name !!}<br>
                                @endforeach
                            </td>
                        </tr>

                        <tr class="heading">
                            <td>Montant</td>

                            <td>Prix</td>
                        </tr>

                        <tr class="item">
                            <td>Montant HT</td>

                            <td>{!! number_format($facturesdaf->courrier->montant, 3, ',', ' ') . ' ' . 'F CFA' !!}</td>
                        </tr>
                        @if (isset($facturesdaf->courrier->tva) && $facturesdaf->courrier->tva != '0')
                            <tr class="item">
                                <td>{{__("TVA (18%)")}}</td>

                                <td>{!! number_format($facturesdaf->courrier->tva, 3, ',', ' ') . ' ' . 'F CFA' !!}</td>
                            </tr>
                        @endif
                        @if (isset($facturesdaf->courrier->ir) && $facturesdaf->courrier->ir != '0')
                            <tr class="item">
                                <td>{{__("IR")}}</td>

                                <td>{!! number_format($facturesdaf->courrier->ir, 3, ',', ' ') . ' ' . 'F CFA' !!}</td>
                            </tr>
                        @endif
                        @if (isset($facturesdaf->courrier->autres_montant) && $facturesdaf->courrier->autres_montant != '0')
                            <tr class="item last">
                                <td>Autre montant</td>

                                <td>{!! number_format($facturesdaf->courrier->autres_montant, 3, ',', ' ') . ' ' . 'F CFA' !!}</td>
                            </tr>
                        @endif

                        <tr class="total">
                            <td></td>

                            <td>Total: {!! number_format($facturesdaf->courrier->total, 3, ',', ' ') . ' ' . 'F CFA' !!}</td>
                        </tr>
                    </table>

                    <div class="d-flex justify-content-between align-items-center mt-5">
                        @can('update', $facturesdaf->courrier)
                            <a href="{!! url('facturesdafs/' . $facturesdaf->id . '/edit') !!}" title="modifier" class="btn btn-outline-warning mt-0">
                                <i class="far fa-edit">&nbsp;Modifier</i>
                            </a>
                        @endcan
                        <a href="{!! route('courriers.show', $facturesdaf->courrier->id) !!}" title="modifier" class="btn btn-outline-primary mt-0">
                            <i class="far fa-eye">&nbsp;M&eacute;ssage</i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection
