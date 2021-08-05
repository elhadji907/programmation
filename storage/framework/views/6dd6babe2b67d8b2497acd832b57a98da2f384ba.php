
<?php $__env->startSection('title', 'ONFP - Fiche Courier interne'); ?>
<?php $__env->startSection('content'); ?>
    
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
    
    <?php $__currentLoopData = $internes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interne): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
    <div class="invoice-box justify-content-center">
        <div class="card">
            
            <div class="card card-header text-center bg-gradient-success">
                <h1 class="h4 text-white mb-0"><?php echo $interne->courrier->types_courrier->name; ?></h1>
            </div> 

        
        
        <div class="card-body">
        <table method="POST" cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                
                                <img style="width:50%; max-width:100px;" src="<?php echo e(asset('images/image_onfp.jpg')); ?>">
                            </td>
                            <td>
                                Numéro #:                                   
                                <?php echo $interne->numero; ?><br>
                                Date correspondance:  <?php echo Carbon\Carbon::parse($interne->courrier->date_cores)->format('d/m/Y'); ?><br>
                                Date réception:  <?php echo Carbon\Carbon::parse($interne->courrier->date_recep)->format('d/m/Y'); ?><br>
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
                                <h3><?php echo e(__('EXPEDITEUR')); ?></h3>
                                <b>Nom:</b> <?php echo e($interne->courrier->expediteur); ?><br>
                                <b>Adresse:</b> <?php echo e($interne->courrier->adresse); ?><br>
                                <b>E-mail:</b> <?php echo e($interne->courrier->email); ?><br>
                                <b>Tel:</b> <?php echo e($interne->courrier->telephone); ?><br>
                                <b>Fax:</b> <?php echo e($interne->courrier->fax); ?><br>
                                <b>BP:</b> <?php echo e($interne->courrier->bp); ?><br>
                            </td>
                            
                            <td>
                                <h3><?php echo e(__('GESTIONNAIRE')); ?></h3>
                                <b>Nom:</b> <?php echo e($interne->courrier->user->firstname); ?>&nbsp;&nbsp;<?php echo e($interne->courrier->user->name); ?><br>
                                <b>Tel:</b> <?php echo e($interne->courrier->user->telephone); ?>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    <?php echo e(__('OBJET')); ?>

                </td>
                
                <td>
                        <?php echo e(__('FICHIER')); ?>

                </td>
            </tr>
            
            <tr class="details">
                <td>
                        <?php echo e($interne->courrier->objet); ?>

                </td>                
                <td>
                    <?php if($interne->courrier->file !== ""): ?>
                        <a class="btn btn-outline-secondary mt-0" title="télécharger le fichier joint" target="_blank" href="<?php echo e(asset($interne->courrier->getFile())); ?>">
                            <i class="fas fa-download">&nbsp;cliquez ici pour télécharger</i>
                        </a>                                      
                    <?php else: ?>
                        Aucun fichier joint
                    <?php endif; ?>
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
                   <?php echo e($interne->courrier->message); ?>

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
                    <?php $__currentLoopData = $interne->courrier->imputations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imputation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php echo $imputation->destinataire; ?><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </td>
                
                <td>
                    <?php $__currentLoopData = $interne->courrier->imputations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imputation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $imputation->sigle; ?><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
            </tr>

            
            
            

          
        </table>

        <div class="d-flex justify-content-between align-items-center mt-5">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $interne->courrier)): ?> 
                <a href="<?php echo url('internes/' .$interne->id. '/edit'); ?>" title="modifier" class="btn btn-outline-warning mt-0">
                    <i class="far fa-edit">&nbsp;Modifier</i>
                </a>
            <?php endif; ?>
            <a href="<?php echo route('courriers.show', $interne->courrier->id); ?>" title="modifier" class="btn btn-outline-primary mt-0">
                <i class="far fa-eye">&nbsp;M&eacute;ssage</i>
            </a>
        </div>

    </div>
</div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/internes/details.blade.php ENDPATH**/ ?>