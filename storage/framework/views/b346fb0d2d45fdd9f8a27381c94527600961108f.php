
<?php $__env->startSection('title', 'ONFP - Fiche Personnel'); ?>
<?php $__env->startSection('content'); ?>
    
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
    
    @media  only screen and (max-width: 600px) {
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
                                
                                                            
                                <img style="width:100%; max-width:100px;" src="<?php echo e(asset($personnel->user->profile->getImage())); ?>"/>
                          
                            </td>
                            <td>
                                Matricule de solde: <?php echo $personnel->matricule; ?><br>
                                <?php echo __("Date"); ?>:  <?php echo $personnel->created_at->format('d/m/Y'); ?><br>
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
                                <b><?php echo $personnel->user->civilite." ".$personnel->user->firstname." ". $personnel->user->name; ?><br>                                
                                <?php if($personnel->user->civilite=="Mme"): ?>
                                    <?php echo ("née le"); ?>

                                <?php else: ?>
                                    <?php echo ("né le"); ?>

                                <?php endif; ?>
                                </b>
                                <b><?php echo $personnel->user->date_naissance->format('d/m/Y')." "."à"." ".$personnel->user->lieu_naissance; ?></b><br>
                                <b><?php echo $personnel->user->email; ?></b><br>
                                <b><?php echo $personnel->user->telephone; ?></b><br>
                                <b><?php echo $personnel->user->adresse; ?></b><br>
                                
                            </td>                            
                            <td>
                                <b>Cin: </b> <?php echo e($personnel->cin); ?><br>
                                <b>Situation familiale: </b><?php echo e($personnel->user->situation_familiale); ?><br>
                                <b><?php echo __("Nombre d'enfant"); ?>: </b> <?php echo e($personnel->nbrefant); ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>            
            <tr class="heading">
                <td>
                    <?php echo e(__("Fonction")); ?>

                </td>                
                <td>
                    <?php echo e(__("Date d'entrée en fonction")); ?>

                </td>
            </tr>            
            <tr class="item">
                <td>
                    <?php echo e($personnel->fonction->name); ?>

                </td>                
                <td>
                    <?php echo e($personnel->debut->format('d/m/Y')); ?>

                </td>
            </tr>
            <tr class="heading">
                <td>
                    <?php echo e(__("Catégorie")); ?>

                </td>
                
                <td>
                    <?php echo e(__("Salaire")); ?>

                </td>
            </tr>
            
            <tr class="item">
                <td>
                    <?php echo e($personnel->categorie->name); ?>

               </td>
                
                <td>
                   
                </td>
            </tr>
            <tr class="heading">
                <td>
                    <?php echo e(__("Age")); ?>

                </td>
                
                <td>
                  
                  <?php echo e(__("Ancienneté")); ?>

                </td>
            </tr>
            
            <tr class="item">
                <td>
                    <?php echo $age =  \Carbon\Carbon::now()->diffInYears($personnel->user->date_naissance); ?>

                    <?php if($age >1): ?>
                        <?php echo __('ans'); ?>

                    <?php else: ?>
                        <?php echo __('an'); ?>           
                    <?php endif; ?>
               </td>
                
                <td>
                    <?php echo $an = \Carbon\Carbon::now()->diffInYears($personnel->debut); ?>

                    <?php if( $an >1): ?>
                        <?php echo __('ans'); ?>

                    <?php elseif( $an == 1): ?>
                    <?php echo __('an'); ?>

                    <?php elseif( $an < 1): ?>
                    <?php echo $mois = \Carbon\Carbon::now()->diffInMonths($personnel->debut); ?> mois <?php echo \Carbon\Carbon::now()->diffInDays($personnel->debut); ?> jours
                   
                    <?php endif; ?>
                </td>
            </tr>
          
            
           
            
           
        </table>
        <div class="text-center bg-gradient-default"><br/>
            <a href="<?php echo url('personnels/' .$personnel->id. '/edit'); ?>" title="modifier" class="btn btn-outline-secondary mt-0">
                <i class="far fa-edit">&nbsp;Modifier</i>
            </a>
        </div>
    </div>
</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/personnels/show.blade.php ENDPATH**/ ?>