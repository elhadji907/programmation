<?php $__env->startSection('title', 'ONFP - Liste des localités'); ?>
<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">              
          <?php if(session('success')): ?>
          <div class="alert alert-success">
              <?php echo e(session('success')); ?>

          </div>
          <?php elseif(session('message')): ?>
          <div class="alert alert-success">
              <?php echo e(session('message')); ?>

          </div>
          <?php endif; ?>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Liste des localites
            </div> 
          <div class="card-body">
            <div class="table-responsive">
              <div align="right">
                <a href="<?php echo url('localites/create'); ?>"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</div></a> 
              </div>
                <br />
              <table class="table table-bordered table-striped" id="localiteTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                  <tr>
                    <th>N°</th>
                     <th><?php echo __("Localite"); ?></th>
                     <th><?php echo __("Effectif"); ?></th>
                    <th style="width:20%;">Action</th>
                  </tr>
                </thead>
                <tfoot class="table-dark">
                    <tr>
                      <th>N°</th>
                       <th><?php echo __("Localite"); ?></th>
                       <th><?php echo __("Effectif"); ?></th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                <tbody>
                  <?php $i = 1 ?>
                  <?php $__currentLoopData = $localites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr> 
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $localite->name; ?></td>
                    <td>
                      <?php $__currentLoopData = $localite->demandeurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demandeur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($loop->last): ?>
                      <?php echo $loop->count; ?>

                      <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>             
                    <td class="d-flex align-items-baseline align-content-center">
                        <a href="<?php echo url('localites/' .$localite->id. '/edit'); ?>" class= 'btn btn-success btn-sm' title="modifier">
                          <i class="far fa-edit">&nbsp;</i>
                        </a>
                        &nbsp;
                        <a href="<?php echo url('localites/' .$localite->id); ?>" class= 'btn btn-primary btn-sm' title="voir la liste">
                          <i class="far fa-eye">&nbsp;</i>
                        </a>
                        &nbsp;
                        <?php echo Form::open(['method'=>'DELETE', 'url'=>'localites/' .$localite->id, 'id'=>'deleteForm', 'onsubmit' => 'return ConfirmDelete()']); ?>

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
    $('#localiteTable').DataTable({
      dom: 'lBfrtip',
      buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print',
      ],
      "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Tout"] ],
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


<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/localites/index.blade.php ENDPATH**/ ?>