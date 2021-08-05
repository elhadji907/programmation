<?php $__env->startSection('title', 'ONFP - '.' '.$nom_module); ?>
<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="row justify-content-center">
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
        <div class="card">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Liste des demandeurs au métier de <?php echo $nom_module; ?>

            </div> 
          <div class="card-body">
            <div class="table-responsive">
              <div align="right">
                <a href="<?php echo url('modules/create'); ?>"><div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</div></a> 
              </div>
                <br />
              <table class="table table-bordered table-striped" id="moduleTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                  <tr>
                    <th>N°</th>
                    <th>Num Cour.</th>
                    <th>Cin</th>
                    <th>Civilité</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Date naissance</th>
                    <th>Lieu naissance</th>
                    <th>Téléphone</th>
                    <th>Localité</th>
                    <th>Diplôme</th>
                    <th>Note</th>
                    <th>Statut</th>
                    <th style="width:08%;">Action</th>
                  </tr>
                </thead>
                <tfoot class="table-dark">
                    <tr>
                      <th>N°</th>
                      <th>Num Cour.</th>
                      <th>Cin</th>
                      <th>Civilité</th>
                      <th>Prenom</th>
                      <th>Nom</th>
                      <th>Date naissance</th>
                      <th>Lieu naissance</th>
                      <th>Téléphone</th>
                      <th>Localité</th>
                      <th>Diplôme</th>
                      <th>Note</th>
                      <th>Statut</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                <tbody>
                  <?php $i = 1 ?>
                  <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($module->name == $nom_module): ?>
                  <?php $__currentLoopData = $module->demandeurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demandeur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr> 
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $demandeur->numero_courrier; ?></td>
                    <td><?php echo $demandeur->cin; ?></td>
                    <td><?php echo $demandeur->user->civilite; ?></td>             
                    <td><?php echo $demandeur->user->firstname; ?></td>             
                    <td><?php echo $demandeur->user->name; ?></td>             
                    <td><?php echo $demandeur->user->date_naissance->format('d/m/Y'); ?></td>             
                    <td><?php echo $demandeur->user->lieu_naissance; ?></td> 
                    <td><?php echo str_limit($demandeur->user->telephone, 9, ''); ?></td>      
                    <td>
                      <a href="<?php echo route('localites.lister', ['$localitesliste' => $demandeur->localite->name, '$nom_module' => $nom_module]); ?>">
                        <?php echo $demandeur->localite->name; ?>

                      </a>
                    </td>             
                    <td>
                      <?php $__currentLoopData = $demandeur->diplomes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diplome): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php echo $diplome->name; ?>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>             
                    <td><?php echo $demandeur->note; ?></td>   
                    <td style="text-align: center;">
                      <?php if($demandeur->status == "Retenue"): ?>
                      <a href="<?php echo route('localites.lister_r', ['$localitesliste' => $demandeur->localite->name, '$nom_module' => $nom_module]); ?>">
                        
                        <i class="fa fa-check text-success" title="Retenue" aria-hidden="true"></i>
                      </a>
                      <?php elseif($demandeur->status == "Annulée"): ?>
                      <a href="<?php echo route('localites.lister_an', ['$localitesliste' => $demandeur->localite->name, '$nom_module' => $nom_module]); ?>">
                      <i class="fa fa-times text-danger" title="Annulée" aria-hidden="true"></i>
                      </a>
                      <?php elseif($demandeur->status == "Présélectionné"): ?>
                      <a href="<?php echo route('localites.lister_pres', ['$localitesliste' => $demandeur->localite->name, '$nom_module' => $nom_module]); ?>">
                        <?php echo $demandeur->status; ?>

                      </a>     
                      <?php elseif($demandeur->status == "En cours"): ?>
                      <a href="<?php echo route('localites.lister_cours', ['$localitesliste' => $demandeur->localite->name, '$nom_module' => $nom_module]); ?>">
                        <?php echo $demandeur->status; ?>

                      </a>     
                      <?php elseif($demandeur->status == "Terminée"): ?>
                      <a href="<?php echo route('localites.lister_term', ['$localitesliste' => $demandeur->localite->name, '$nom_module' => $nom_module]); ?>">
                        <?php echo $demandeur->status; ?>

                      </a>     
                      <?php elseif($demandeur->status == "Absent"): ?>
                      <a href="<?php echo route('localites.lister_abs', ['$localitesliste' => $demandeur->localite->name, '$nom_module' => $nom_module]); ?>">
                        <?php echo $demandeur->status; ?>

                      </a>
                      <?php else: ?>       
                      <a href="<?php echo route('localites.lister_at', ['$localitesliste' => $demandeur->localite->name, '$nom_module' => $nom_module]); ?>">               
                      <?php echo $demandeur->status; ?>    
                      </a>                      
                      <?php endif; ?>
                    </td>           
                    <td style="text-align: center;" class="d-flex align-items-baseline align-content-center">
                        <a href="<?php echo url('demandeurs/' .$demandeur->id. '/edit'); ?>" class= 'btn btn-success btn-sm' title="modifier">
                          <i class="far fa-edit">&nbsp;</i>
                        </a>
                        &nbsp;
                        <a href="<?php echo url('demandeurs/' .$demandeur->id); ?>" class= 'btn btn-primary btn-sm' title="voir">
                          <i class="far fa-eye">&nbsp;</i>
                        </a>
                        &nbsp;
                        <?php echo Form::open(['method'=>'DELETE', 'url'=>'demandeurs/' .$demandeur->id, 'id'=>'deleteForm', 'onsubmit' => 'return ConfirmDelete()']); ?>

                        <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title'=>"supprimer"] ); ?>

                        <?php echo Form::close(); ?>

                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
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
    $('#moduleTable').DataTable({
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


<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/modules/detail.blade.php ENDPATH**/ ?>