@extends('layout.default') 
@section('content')
    
    <style>
    .invoice-box {
        max-width: 800px;
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
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
    <div class="invoice-box">
        <table method="POST" cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                {{-- <img src="" style="width:100%; max-width:300px;"> --}}
                                <i>DOSSIER</i><br>
                            </td>
                            <td>
                                Numéro #: {{ $courrier->numero }}<br>
                                Date de réception: {{ $courrier->date->format('d/m/Y') }}<br>
                                Heure: {{ $courrier->date->format('H:i:s') }}
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
                                {{ $courrier->expediteur }}<br>
                                {{ $courrier->adresse }}<br>
                                {{ $courrier->email }}<br>
                                {{ $courrier->telephone }}<br>
                                {{ $courrier->fax }}<br>
                                {{ $courrier->bp }}<br>
                            </td>
                            
                            <td>
                                <h3>{{ __('GESTIONNAIRE') }}</h3>
                                {{ $courrier->gestionnaire->user->firstname }}&nbsp;&nbsp;{{ $courrier->gestionnaire->user->name }}<br>
                                {{ $courrier->gestionnaire->user->telephone }}
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
                        {{ $courrier->objet }}
                </td>                
                <td>
                    @if ($courrier->file !== "")
                        <a class="btn btn-outline-secondary mt-0" title="télécharger le fichier joint" target="_blank" href="{{ asset($courrier->getFile()) }}">
                            <i class="fas fa-download">&nbsp;Télécharger le courrier</i>
                        </a>                                            
                    @else
                        Aucun fichier joint
                    @endif
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
                    {{-- Website design --}}
                </td>
                
                <td>
                   {{--  $300.00 --}}
                </td>
            </tr>
            
            <tr class="item">
                <td>
                   {{--  Hosting (3 months) --}}
                </td>
                
                <td>
                    {{-- $75.00 --}}
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                   {{--  Domain name (1 year) --}}
                </td>
                
                <td>
                   {{--  $10.00 --}}
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                   {{-- Total: $385.00 --}}
                </td>
            </tr>
            <tr>
                <a class="btn btn-outline-primary mt-0" title="modifier le courrier" 
                href="{{ route('courriers.create',['courrier'=>$courrier->id]) }}">
                    <i class="fas fa-edit">&nbsp;Modifier le courrier</i>
                </a>   
            </tr>
        </table>
    </div>
</div>

@endsection