
<?php $__env->startSection('title', 'ONFP - '.$localitesliste.' | '.$nom_module); ?>
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
                Liste des demandeurs ayant suivis la formation au métier de <?php echo $nom_module.' | '.$localitesliste; ?>

            </div> 
          <div class="card-body">
            <div class="table-responsive">
              
              <table class="table table-bordered table-striped" id="moduleTable" width="100%" cellspacing="0">
                <thead class="table-dark">
                  <tr>
                    <th>N°</th>
                   
                    <th>Cin</th>
                    <th>Civilité</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Date naissance</th>
                    <th>Lieu naissance</th>
                    <th>Téléphone</th>
                    
                    
                    
                   
                   
                  </tr>
                </thead>
                <tfoot class="table-dark">
                    <tr>
                      <th>N°</th>
                      
                      <th>Cin</th>
                      <th>Civilité</th>
                      <th>Prenom</th>
                      <th>Nom</th>
                      <th>Date naissance</th>
                      <th>Lieu naissance</th>
                      <th>Téléphone</th>
                      
                      
                      
                     
                     
                    </tr>
                  </tfoot>
                <tbody>
                  <?php $i = 1 ?>
                  <?php $__currentLoopData = $localites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($localite->name == $localitesliste): ?>
                  <?php $__currentLoopData = $localite->demandeurs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demandeur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($demandeur->status == "Terminée"): ?>                      
                  <?php $__currentLoopData = $demandeur->modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($module->name == $nom_module): ?>
                  <tr> 
                    <td><?php echo $i++; ?></td>
                    
                    <td><?php echo $demandeur->cin; ?></td>
                    <td><?php echo $demandeur->user->civilite; ?></td>             
                    <td><?php echo ucwords(strtolower($demandeur->user->firstname)); ?></td>             
                    <td><?php echo strtoupper($demandeur->user->name); ?></td>        
                    <td><?php echo $demandeur->user->date_naissance->format('d/m/Y'); ?></td>             
                    <td><?php echo ucwords(strtoupper($demandeur->user->lieu_naissance)); ?></td> 
                    <td><?php echo str_limit($demandeur->user->telephone, 9, ''); ?></td>      
                               
                     
                           
                   
                  </tr>
                  <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
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


<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/localites/lister_term.blade.php ENDPATH**/ ?>