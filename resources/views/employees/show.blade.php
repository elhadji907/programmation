@extends('layout.default')
@section('title', 'ONFP - Fiche employee')
@section('content')
    
    <style>
    .invoice-box {
        max-width: 90%;
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
            <h1 class="h4 text-white mb-0">FICHE DE RENSEIGNEMENT EMPLOYE</h1>
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
                                <img style="width:100%; max-width:100px;" src="{{ asset($employee->user->profile->getImage()) }}"/>
                          
                            </td>
                            <td>
                                Matricule de solde: {!! $employee->matricule !!}<br>
                                {!! __("Date") !!}:  {!! Carbon\Carbon::parse($employee->created_at)->format('d/m/Y') !!}<br>
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
                                {!!  $employee->user->civilite." ".$employee->user->firstname." ". $employee->user->name !!}<br>                                
                                @if ($employee->user->civilite=="Mme")
                                    {!! ("née le") !!}
                                @else
                                    {!! ("né le") !!}
                                @endif
                                {!! Carbon\Carbon::parse($employee->user->date_naissance)->format('d/m/Y')." "."à"." ".$employee->user->lieu_naissance !!}<br>
                                <b>Email : </b>{!! $employee->user->email !!}<br>
                                <b>Téléphone : </b>{!! $employee->user->telephone !!}<br>
                                <b>Adresse : </b>{!! $employee->user->adresse !!}<br>
                                
                            </td>                            
                            <td>
                                <b>CIN : </b> {{ $employee->cin }}<br>
                                <b>SF : </b>{{ $employee->user->situation_familiale }}<br>
                                <b>{!! __("Nbre enfant") !!}: </b> {{ $employee->nbrefant }}<br>
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
                    {{ __("Date embauche") }}
                </td>
            </tr>            
            <tr class="item">
                <td>
                    {{ $employee->fonction->name }}
                </td>                
                <td>
                    {{ Carbon\Carbon::parse($employee->date_embauche)->format('d/m/Y') }}
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
                    {{ $employee->category->name }}
               </td>
                
                <td>
                   
                </td>
            </tr>
            <tr class="heading">
                <td>
                    {{ __("Age") }}
                </td>
                
                <td>
                  {{ __("Ancienneté") }}
                </td>
            </tr>
            
            <tr class="item">
                <td>
                      
                  <?php 
                  $firstDate  = \Carbon\Carbon::parse($employee->user->date_naissance)->format('Y-m-d'); 
                  $secondDate = \Carbon\Carbon::now()->format('Y-m-d');
                  $dateDifference = abs(strtotime($secondDate) - strtotime($firstDate));
                  $years  = floor($dateDifference / (365 * 60 * 60 * 24));
                  $months = floor(($dateDifference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                  $days   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));
                  ?>
                    {!! $years ." ".__("an(s)")." ".$months ." ".__("mois")." ".$days." ".__("jour(s)") !!}
               </td>
                <td>
                    <?php  
                    $firstDat  = \Carbon\Carbon::parse($employee->date_embauche)->format('Y-m-d'); 
                    $secondDate = \Carbon\Carbon::now()->format('Y-m-d');
                    $dateDifferenc = abs(strtotime($secondDate) - strtotime($firstDat));
                    $year  = floor($dateDifferenc / (365 * 60 * 60 * 24));
                    $month = floor(($dateDifferenc - $year * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                    $day   = floor(($dateDifferenc - $year * 365 * 60 * 60 * 24 - $month * 30 * 60 * 60 *24) / (60 * 60 * 24));
                    ?>
                    {!! $year ." ".__("an(s)")." ".$month ." ".__("mois")." ".$day." ".__("jour(s)") !!}
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
                    {!! \Carbon\Carbon::now()->diffInYears($employee->date_embauche) !!} an(s)
               </td>
                
                <td>
                    {!! \Carbon\Carbon::now()->diffInMonths($employee->date_embauche) !!} mois
                    {!! \Carbon\Carbon::now()->diffInDays($employee->date_embauche) !!} jour(s)
                </td>
            </tr>
             --}}
            
           {{--  <tr class="total">
                <td>
                    {!! ("Nombre d'année(s) en fonction") !!}
                </td>
                
                <td>
                    {!! \Carbon\Carbon::now()->diffInYears($employee->user->date_embauche) !!}  an(s)
                </td>
            </tr> --}}
        </table>
        <div class="text-center bg-gradient-default"><br/>
            <a href="{!! url('employees/' .$employee->id. '/edit') !!}" title="modifier" class="btn btn-outline-secondary mt-0">
                <i class="far fa-edit">&nbsp;Modifier</i>
            </a>
        </div>
    </div>
</div>
</div>

@endsection