@extends('layout.default')
@section('title', 'ONFP - Fiche Courier depart')
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
    
    .invoice-box table tr.item td{
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
    
    @foreach ($departs as $depart)  
    <div class="invoice-box justify-content-center">
        <div class="card">            
            <div class="card card-header text-center bg-gradient-success">
                <h1 class="h4 text-white mb-0">{!! $depart->courrier->types_courrier->name !!}</h1>
            </div> 
        <div class="card-body">
        <table method="POST" cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                {{-- <img src="" style="width:100%; max-width:300px;"> --}}
                                <img style="width:50%; max-width:100px;" src="{{ asset('images/image_onfp.jpg') }}">
                            </td>
                            <td>
                                Numéro #:                                   
                                {!! $depart->numero !!}<br>
                                Date correspondance:  {!! Carbon\Carbon::parse($depart->courrier->date_cores)->format('d/m/Y') !!}<br>
                                Date réception:  {!! Carbon\Carbon::parse($depart->courrier->date_recep)->format('d/m/Y') !!}<br>
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
                                <b>Nom:</b> {{ $depart->courrier->expediteur }}<br>
                                <b>Adresse:</b> {{ $depart->courrier->adresse }}<br>
                                <b>E-mail:</b> {{ $depart->courrier->email }}<br>
                                <b>Tel:</b> {{ $depart->courrier->telephone }}<br>
                                <b>Fax:</b> {{ $depart->courrier->fax }}<br>
                                <b>BP:</b> {{ $depart->courrier->bp }}<br>
                            </td>
                            
                            <td>
                                <h3>{{ __('GESTIONNAIRE') }}</h3>
                                <b>Nom:</b> {{ $depart->courrier->user->firstname }}&nbsp;&nbsp;{{ $depart->courrier->user->name }}<br>
                                <b>Tel:</b> {{ $depart->courrier->user->telephone }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    {{ __('OBJET') }}
                </td>
                
                <td>
                        {{ __('FICHIER') }}
                </td>
            </tr>
            
            <tr class="details">
                <td>
                        {{ $depart->courrier->objet }}
                </td>                
                <td>
                    @if ($depart->courrier->file !== "")
                        <a class="btn btn-outline-secondary mt-0" title="télécharger le fichier joint" target="_blank" href="{{ asset($depart->courrier->getFile()) }}">
                            <i class="fas fa-download">&nbsp;cliquez ici pour télécharger</i>
                        </a>                                            
                    @else
                        Aucun fichier joint
                    @endif
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
                    {{ $depart->courrier->message }} 
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
                    @foreach ($depart->courrier->imputations as $imputation)
                      {!! $imputation->destinataire !!}<br>
                    @endforeach
               </td>
                
                <td>
                    @foreach ($depart->courrier->imputations as $imputation)
                    {!! $imputation->sigle !!}<br>
                    @endforeach
                </td>
            </tr>            
        </table>

        <div class="d-flex justify-content-between align-items-center mt-5">
            @can('update', $depart->courrier)
                <a href="{!! url('departs/' .$depart->id. '/edit') !!}" title="modifier" class="btn btn-outline-warning mt-0">
                    <i class="far fa-edit">&nbsp;Modifier</i>
                </a>
            @endcan
            <a href="{!! route('courriers.show', $depart->courrier->id) !!}" title="modifier" class="btn btn-outline-primary mt-0">
                <i class="far fa-eye">&nbsp;M&eacute;ssage</i>
            </a>
        </div>

    </div>
</div>
</div>
@endforeach
@endsection