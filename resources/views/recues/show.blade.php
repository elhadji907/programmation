@extends('layout.default')
@section('title', 'ONFP - Fiche Courier reçu')
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
    
    @foreach ($recues as $recue)  
    <div class="invoice-box justify-content-center">
        <h1 class="h4 text-black mb-0 text-center"> {!! $recue->courrier->types_courrier->name !!}</h1>
        <div class="card">
        <div class="card card-header text-center bg-gradient-default">
            <a href="{!! url('recues/' .$recue->id. '/edit') !!}" title="modifier" class="btn btn-outline-secondary mt-0">
                <i class="far fa-edit">&nbsp;Modifier</i>
            </a>
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
                                {!! $recue->numero !!}<br>
                                Date correspondance:  {!! $recue->courrier->date_c->format('d/m/Y') !!}<br>
                                Date réception:  {!! $recue->courrier->date_r->format('d/m/Y') !!}<br>
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
                                <b>Nom:</b> {{ $recue->courrier->expediteur }}<br>
                                <b>Adresse:</b> {{ $recue->courrier->adresse }}<br>
                                <b>E-mail:</b> {{ $recue->courrier->email }}<br>
                                <b>Tel:</b> {{ $recue->courrier->telephone }}<br>
                                <b>Fax:</b> {{ $recue->courrier->fax }}<br>
                                <b>BP:</b> {{ $recue->courrier->bp }}<br>
                            </td>
                            
                            <td>
                                <h3>{{ __('GESTIONNAIRE') }}</h3>
                                <b>Nom:</b> {{ $recue->courrier->user->firstname }}&nbsp;&nbsp;{{ $recue->courrier->user->name }}<br>
                                <b>Tel:</b> {{ $recue->courrier->user->telephone }}
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
                        {{ $recue->courrier->objet }}
                </td>                
                <td>
                    @if ($recue->courrier->file !== "")
                        <a class="btn btn-outline-secondary mt-0" title="télécharger le fichier joint" target="_blank" href="{{ asset($recue->courrier->getFile()) }}">
                            <i class="fas fa-download">&nbsp;Dossier</i>
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
                    @foreach ($recue->courrier->directions as $direction)
                      <span class="btn">{!! $direction->name !!}</span><br>
                    @endforeach
               </td>
                
                <td>
                    @foreach ($recue->courrier->directions as $direction)
                    <span class="btn">{!! $direction->sigle !!}</span><br>
                    @endforeach
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
                
                <td>
                    {{ $recue->courrier->message }}
                </td>
            </tr>
            
            
            <tr class="total">
                <td>
                    
                </td>
                
                <td>
                   {{-- Total: $385.00 --}}
                </td>
            </tr>
          {{--   <tr>
                <a class="btn btn-outline-primary mt-0" title="modifier le courrier" 
                href="{{ route('courriers.create',['courrier'=>$courrier->id]) }}">
                    <i class="fas fa-edit">&nbsp;Modifier le courrier</i>
                </a>   
            </tr> --}}
        </table>
    </div>
</div>
</div>
@endforeach

</div>

@endsection