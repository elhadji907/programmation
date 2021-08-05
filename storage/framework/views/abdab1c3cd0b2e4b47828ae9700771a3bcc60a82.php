<?php $__env->startSection('title', 'ONFP - Frais bancaire'); ?>
<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">              
          <?php if(session('success')): ?>
          <div class="alert alert-success">
              <?php echo e(session('success')); ?>

          </div>
          <?php elseif(session('message')): ?>
          <div class="alert alert-success">
              <?php echo e(session('message')); ?>

          </div>
          <?php endif; ?>
        <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weiht-bold text-info"><i class="fas fa-table"></i>&nbsp;Frais bancaire</h6>
          </div>            
          <div class="card-body">
            <div class="table-responsive">
              <div align="right">
                <a href="<?php echo url('banques/create'); ?>"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</div></a> 
              </div>
              <table class="table table-bordered table-striped" id="table-banques" width="100%" cellspacing="0">
                <thead class="table-dark">
                  <tr>
                    <th style="width:8%;">N° Cour.</th>
                    <th style="width:30%;">Designation</th>
                    <th style="width:15%;">Montant total</th>
                    <th style="width:25%;">Observation</th>
                    <th style="width:8%;">Projet</th>
                    <th style="width:9%;">Mandat DG</th>
                    <th style="width:8%;">Date AC</th>
                    <th style="width:10%;">Action</th>
                  </tr>
                </thead>
                <tfoot class="table-dark">
                  <tr>
                    <th>N° Cour.</th>
                    <th>Designation</th>
                    <th>Montant total</th>
                    <th>Observation</th>
                    <th>Projet</th>
                    <th>Mandat DG</th>
                    <th>Date AC</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>              
                  <?php $i = 1 ?>
                  <?php $__currentLoopData = $banques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banque): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                     
                    <td class="align-middle"><?php echo $banque->courrier->numero; ?></td>
                    <td class="align-middle"><?php echo $banque->courrier->designation; ?></td>    
                    <td class="align-middle"><?php echo number_format($banque->courrier->total,3, ',', ' ') . ' '; ?></td>   
                    <td class="align-middle"><?php echo $banque->courrier->observation; ?></td>      
                    <td class="align-middle"><?php echo $banque->courrier->projet->sigle; ?></td>
                    <td class="align-middle"><?php echo Carbon\Carbon::parse($banque->date_dg)->format('d/m/Y'); ?></td>        
                    <td class="align-middle"><?php echo Carbon\Carbon::parse($banque->date_ac)->format('d/m/Y'); ?></td>        
                    <td class="d-flex align-items-center justify-content-center">
                     
                        <a href="<?php echo url('banques/' .$banque->id. '/edit'); ?>" class= 'btn btn-success btn-sm' title="modifier">
                          <i class="far fa-edit"></i>
                        </a>
                         
                        &nbsp
                         <a href="<?php echo url('courriers/' .$banque->courrier->id); ?>" class= 'btn btn-primary btn-sm' title="voir">
                          <i class="far fa-eye">&nbsp;</i>
                        </a>
                        &nbsp;
                        
                          <?php echo Form::open(['method'=>'DELETE', 'url'=>'banques/' .$banque->id, 'id'=>'deleteForm', 'onsubmit' => 'return ConfirmDelete()']); ?>

                          <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title'=>"supprimer"] ); ?>

                          <?php echo Form::close(); ?>

                           
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                </tbody>                
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
  $(document).ready( function () {
    $('#table-banques').DataTable({
      dom: 'lBfrtip',
      buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print',
      ],
      "lengthMenu": [ [5,10, 25, 50, 100, -1], [5,10, 25, 50, 100, "Tout"] ],
      "order": [
            [ 0, 'asc' ]
            ],
            language: {
              "sProcessing":     "Traitement en cours...",
              "sSearch":         "Rechercher&nbsp;:",
              "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
              "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
              "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
              "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
              "sInfoPostFix":    "",
              "sLoadingRecords": "Chargement en cours...",
              "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
              "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
              "oPaginate": {
                  "sFirst":      "Premier",
                  "sPrevious":   "Pr&eacute;c&eacute;dent",
                  "sNext":       "Suivant",
                  "sLast":       "Dernier"
              },
              "oAria": {
                  "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                  "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
              },
              "select": {
                      "rows": {
                          _: "%d lignes séléctionnées",
                          0: "Aucune ligne séléctionnée",
                          1: "1 ligne séléctionnée"
                      }
              }
            }
    });
} );
</script> 
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/banques/index.blade.php ENDPATH**/ ?>