
<?php $__env->startSection('title', 'ONFP - Liste des programmes'); ?>
<?php $__env->startSection('content'); ?>
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-12">
                <?php if(session()->has('success')): ?>
                  <div class="alert alert-success" role="alert"><?php echo e(session('success')); ?></div>
                <?php endif; ?> 
                <?php if(session('message')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('message')); ?>

                </div>
                <?php endif; ?>
              <div class="card"> 
                  <div class="card-header">
                      <i class="fas fa-table"></i>
                      Liste des programmes
                  </div>              
                <div class="card-body">
                      <div class="table-responsive">
                          <div align="right">
                            <a href="<?php echo e(route('programmes.create')); ?>"><div class="btn btn-success btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</i></div></a>
                          </div>
                          <br />
                        <table class="table table-bordered table-striped" width="100%" cellspacing="0" id="table-programmes">
                          <thead class="table-dark">
                            <tr>
                              <th>N°</th>
                               <th><?php echo __("programme"); ?></th>
                               <th><?php echo __("sigle"); ?></th>
                               <th><?php echo __("effectif"); ?></th>
                              <th style="width:20%;">Action</th>
                            </tr>
                          </thead>
                          <tfoot class="table-dark">
                              <tr>
                                <th>N°</th>
                                <th><?php echo __("programme"); ?></th>
                                <th><?php echo __("sigle"); ?></th>
                                <th><?php echo __("effectif"); ?></th>
                               <th style="width:20%;">Action</th>
                              </tr>
                            </tfoot>
                          <tbody>
                            <?php $i = 1 ?>                            
                            <?php $__currentLoopData = $programmes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $programme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                            
                            <tr> 
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $programme->name; ?></td>
                              <td>
                                <a href="<?php echo e(route('localites.pdcej')); ?>">
                                <?php echo $programme->sigle; ?>

                                </a>
                              </td>
                              <td><?php echo $programme->effectif; ?></td>                                   
                              <td style="text-align: center;" class="d-flex align-items-baseline align-content-center">
                                <a href="<?php echo url('programmes/' .$programme->id. '/edit'); ?>" class= 'btn btn-success btn-sm' title="modifier">
                                  <i class="far fa-edit">&nbsp;</i>
                                </a>
                                
                               &nbsp;
                                <?php echo Form::open(['method'=>'DELETE', 'url'=>'programmes/' .$programme->id, 'id'=>'deleteForm', 'onsubmit' => 'return ConfirmDelete()']); ?>

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
      <div class="modal fade" id="modal_delete_programme" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="" id="form-delete-programme">
          <?php echo csrf_field(); ?>
          <?php echo method_field('DELETE'); ?>
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Êtes-vous sûr de bien vouloir supprimer cet admin ?</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                cliquez sur close pour annuler
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger"><i class="fas fa-times">&nbsp;Delete</i></button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <?php $__env->stopSection(); ?>
      <?php $__env->startPush('scripts'); ?>
      <script type="text/javascript">
        $(document).ready( function () {
          $('#table-programmes').DataTable({
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
      
      

    
<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/programmes/index.blade.php ENDPATH**/ ?>