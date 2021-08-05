<?php $__env->startSection('title', 'ONFP - Fiche courrier'); ?>
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
    <div class="invoice-box justify-content-center">
        <div class="card">
        <div class="card card-header text-center bg-gradient-default">
            <h1 class="h4 text-black mb-0"> <span data-feather="mail"></span> RECIPICE DU COURRIER</h1>
        </div>
        <div class="card-body">
        <table method="POST" cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                
                                <img style="width:50%; max-width:150px;" src="<?php echo e(asset('images/image_onfp.jpg')); ?>">
                               
                               
                            </td>
                            <td>
                                Numéro <?php echo '#'; ?> : <?php echo e($courrier->numero); ?><br>
                                Date de réception: <?php echo e($courrier->date_r->format('d/m/Y')); ?><br>
                                Heure: <?php echo e($courrier->date_r->format('H:i:s')); ?>

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
                                <?php echo e($courrier->expediteur); ?><br>
                                <?php echo e($courrier->adresse); ?><br>
                                <?php echo e($courrier->email); ?><br>
                                <?php echo e($courrier->telephone); ?><br>
                                <?php echo e($courrier->fax); ?><br>
                                <?php echo e($courrier->bp); ?><br>
                            </td>
                            
                            <td>
                                <h3><?php echo e(__('GESTIONNAIRE')); ?></h3>
                                <?php echo e($courrier->gestionnaire->user->firstname); ?>&nbsp;&nbsp;<?php echo e($courrier->gestionnaire->user->name); ?><br>
                                <?php echo e($courrier->gestionnaire->user->telephone); ?>

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
                        <?php echo e($courrier->objet); ?>

                </td>                
                <td>
                    <?php if($courrier->file !== ""): ?>
                        <a class="btn btn-outline-secondary mt-0" title="télécharger le fichier joint" target="_blank" href="<?php echo e(asset($courrier->getFile())); ?>">
                            <i class="fas fa-download">&nbsp;Télécharger le courrier</i>
                        </a>                                            
                    <?php else: ?>
                        Aucun fichier joint
                    <?php endif; ?>
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
                    
                </td>
                
                <td>
                   
                </td>
            </tr>
            
            <tr class="item">
                <td>
                   
                </td>
                
                <td>
                    
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                   
                </td>
                
                <td>
                   
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                   
                </td>
            </tr>
          
        </table>
    </div>
</div>
</div></div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/courriers/show.blade.php ENDPATH**/ ?>