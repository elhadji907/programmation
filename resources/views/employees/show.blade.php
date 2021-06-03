@extends('layout.default')
@section('title', 'ONFP - Fiche Personnel')
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
        <div class="card">
        <div class="card card-header text-center bg-gradient-success">
            <h1 class="h4 text-white mb-0">FICHE DE RENSEIGNEMENT AGENT</h1>
        </div>
        <div class="card-body">
        <table method="POST" cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                {{-- <img src="" style="width:100%; max-width:300px;"> --}}
                               {{--  <img style="width:50%; max-width:100px;" src="{{ asset('images/image_onfp.jpg') }}"> --}}                             
                                <img style="width:100%; max-width:100px;" src="{{ asset($personnel->user->profile->getImage()) }}"/>
                          
                            </td>
                            <td>
                                Matricule de solde: {!! $personnel->matricule !!}<br>
                                {!! __("Date") !!}:  {!! $personnel->created_at->format('d/m/Y') !!}<br>
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
                                <b>{!!  $personnel->user->civilite." ".$personnel->user->firstname." ". $personnel->user->name !!}<br>                                
                                @if ($personnel->user->civilite=="Mme")
                                    {!! ("née le") !!}
                                @else
                                    {!! ("né le") !!}
                                @endif
                                </b>
                                <b>{!! $personnel->user->date_naissance->format('d/m/Y')." "."à"." ".$personnel->user->lieu_naissance !!}</b><br>
                                <b>{!! $personnel->user->email !!}</b><br>
                                <b>{!! $personnel->user->telephone !!}</b><br>
                                <b>{!! $personnel->user->adresse !!}</b><br>
                                
                            </td>                            
                            <td>
                                <b>Cin: </b> {{ $personnel->cin }}<br>
                                <b>Situation familiale: </b>{{ $personnel->user->situation_familiale }}<br>
                                <b>{!! __("Nombre d'enfant") !!}: </b> {{ $personnel->nbrefant }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>            
            <tr class="heading">
                <td>
                    {{ __("Fonction") }}
                </td>                
                <td>
                    {{ __("Date d'entrée en fonction") }}
                </td>
            </tr>            
            <tr class="item">
                <td>
                    {{ $personnel->fonction->name }}
                </td>                
                <td>
                    {{ $personnel->debut->format('d/m/Y') }}
                </td>
            </tr>
            <tr class="heading">
                <td>
                    {{ __("Catégorie") }}
                </td>
                
                <td>
                    {{ __("Salaire") }}
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    {{ $personnel->categorie->name }}
               </td>
                
                <td>
                   
                </td>
            </tr>
            <tr class="heading">
                <td>
                    {{ __("Age") }}
                </td>
                
                <td>
                  {{--   {{ __("Année(s) avant la retraite") }} --}}
                  {{ __("Ancienneté") }}
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    {!! $age =  \Carbon\Carbon::now()->diffInYears($personnel->user->date_naissance) !!}
                    @if ($age >1)
                        {!! __('ans') !!}
                    @else
                        {!! __('an') !!}           
                    @endif
               </td>
                
                <td>
                    {!! $an = \Carbon\Carbon::now()->diffInYears($personnel->debut) !!}
                    @if ( $an >1)
                        {!! __('ans') !!}
                    @elseif( $an == 1)
                    {!! __('an') !!}
                    @elseif( $an < 1)
                    {!!$mois = \Carbon\Carbon::now()->diffInMonths($personnel->debut) !!} mois {!! \Carbon\Carbon::now()->diffInDays($personnel->debut) !!} jours
                   
                    @endif
                </td>
            </tr>
          {{--   <tr class="heading">
                <td>
                    {{ __("Ancienneté") }}
                </td>
                
                <td>
                    {{ __("Annnée de retraite") }}
                </td>
            </tr> --}}
            
           {{--  <tr class="item">
                <td>
                    {!! \Carbon\Carbon::now()->diffInYears($personnel->debut) !!} an(s)
               </td>
                
                <td>
                    {!! \Carbon\Carbon::now()->diffInMonths($personnel->debut) !!} mois
                    {!! \Carbon\Carbon::now()->diffInDays($personnel->debut) !!} jour(s)
                </td>
            </tr>
             --}}
            
           {{--  <tr class="total">
                <td>
                    {!! ("Nombre d'année(s) en fonction") !!}
                </td>
                
                <td>
                    {!! \Carbon\Carbon::now()->diffInYears($personnel->user->debut) !!}  an(s)
                </td>
            </tr> --}}
        </table>
        <div class="text-center bg-gradient-default"><br/>
            <a href="{!! url('personnels/' .$personnel->id. '/edit') !!}" title="modifier" class="btn btn-outline-secondary mt-0">
                <i class="far fa-edit">&nbsp;Modifier</i>
            </a>
        </div>
    </div>
</div>
</div>

@endsection