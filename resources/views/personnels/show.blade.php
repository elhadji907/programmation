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
    
    <div class="invoice-box justify-content-center">
        <h1 class="h4 text-black mb-0 text-center"> {!! ("Fiche personnel") !!}</h1>
        <div class="card">
        <div class="card card-header text-center bg-gradient-default">
            <a href="{!! url('personnels/' .$personnel->id. '/edit') !!}" title="modifier" class="btn btn-outline-secondary mt-0">
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
                                Matricule: {!! $personnel->matricule !!}<br>
                                {!! ("Date d'enregistrement") !!}:  {!! $personnel->created_at->format('d/m/Y') !!}<br>
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
                                <b>Prenom: </b> {{ $personnel->user->firstname }}<br>
                                <b>Date naissance: </b> {{ $personnel->user->date_naissance->format('d/m/Y') }}<br>
                                <b>E-mail: </b> {{ $personnel->user->email }}<br>
                                <b>Situation familiale: </b> {{ $personnel->user->situation_familiale }}<br>
                                <b>{!! __("Nombre d'enfant") !!}: </b> {{ $personnel->nbrefant }}<br>
                            </td>
                            
                            <td>
                                <b>Nom: </b> {{ $personnel->user->name }}<br>
                                <b>Lieu naissance: </b> {{ $personnel->user->lieu_naissance}}<br>
                                <b>Tel: </b> {{ $personnel->user->telephone }}<br>
                                <b>Cin: </b> {{ $personnel->cin }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    {{ __("Date d'entrée en fonction") }}
                </td>
                
                <td>
                        {{ __("Date de la retraite") }}
                </td>
            </tr>
            
            <tr class="details">
                <td>
                        {{ $personnel->debut->format('d/m/Y') }}
                </td>                
                <td>
                {!! $personnel->user->date_naissance->format('d/m/Y') !!}
                </td>
            </tr>
           {{--  <tr class="heading">
                <td>
                   IMPUTATION
                </td>
                
                <td>
                    RESPONSABLE
                </td>
            </tr> --}}
            
            <tr class="item">
                <td>
                   {{--  @foreach ($personnel->courrier->directions as $direction)
                      <span class="btn">{!! $direction->name !!}</span><br>
                    @endforeach --}}
               </td>
                
                <td>
                  {{--   @foreach ($personnel->courrier->directions as $direction)
                    <span class="btn">{!! $direction->sigle !!}</span><br>
                    @endforeach --}}
                </td>
            </tr>
            
            
            <tr class="total">
                <td>
                    
                </td>
                
                <td>
                   {{-- Total: $385.00 --}}
                </td>
            </tr>
        </table>
    </div>
</div>
</div>
</div>

@endsection