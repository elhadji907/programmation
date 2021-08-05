<?php $__env->startSection('title', 'ONFP - Liste des bordereaux'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- Page Heading -->
       
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
                        <h6 class="m-0 font-weiht-bold text-info"><i class="fas fa-table"></i>Liste des bordereaux</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center pb-3">
                                <p>
                                    
                                </p>
                                <span>
                                    <a href="<?php echo url('bordereaus/create'); ?>">
                                        <div class="btn btn-success btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</div>
                                    </a>
                                </span>
                            </div>
                            <table class="table table-bordered table-striped" id="table-bordereaus" width="100%"
                                cellspacing="0">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width:7%;">N° MP</th>
                                        <th style="width:8%;">Date MP</th>
                                        <th style="width:30%;">Désignation réglement</th>
                                        <th style="width:5%;">Projet</th>
                                        <th style="width:10%;">Montant</th>
                                        <th style="width:5%;">Nb/Pc</th>
                                        <th style="width:20%;">Bobservations</th>
                                        <th style="width:5%;">Classeur</th>
                                        <th style="width:10%;"></th>
                                    </tr>
                                </thead>
                                <tfoot class="table-dark">
                                    <tr>
                                        <th>N° MP</th>
                                        <th>Date MP</th>
                                        <th>Désignation réglement</th>
                                        <th>Projet</th>
                                        <th>Montant</th>
                                        <th>Nbre pièces</th>
                                        <th>Bobservations</th>
                                        <th>Classeur</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php $__currentLoopData = $bordereaus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bordereau): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            
                                            <td class="align-middle"><?php echo $bordereau->numero_mandat; ?></td>
                                            <td class="align-middle"><?php echo Carbon\Carbon::parse($bordereau->date_mandat)->format('d/m/Y'); ?></td>
                                            <td class="align-middle"><?php echo $bordereau->designation; ?></td>
                                            <td class="align-middle"><?php echo $bordereau->courrier->projet->sigle; ?></td>
                                            <td class="align-middle"><?php echo $bordereau->montant; ?></td>
                                            <td class="align-middle"><?php echo $bordereau->nombre_de_piece; ?></td>
                                            <td class="align-middle"><?php echo $bordereau->observation; ?></td>
                                            <td class="align-middle">
                                                <a style="color: darkorange; text-decoration: none;"
                                                href="<?php echo url('listes/'. $bordereau->liste->id); ?>" class="view" title="voir"
                                                target="_blank">                                                
                                                <?php echo $bordereau->liste->numero; ?>

                                            </a>
                                            </td>
                                            <td class="align-middle d-flex align-items-baseline">
                                                
                                                    <a href="<?php echo url('bordereaus/' . $bordereau->id . '/edit'); ?>" class='btn btn-success btn-sm'
                                                        title="modifier">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                
                                                &nbsp
                                                <a href="<?php echo url('courriers/' . $bordereau->courrier->id); ?>" class='btn btn-primary btn-sm'
                                                    title="voir">
                                                    <i class="far fa-eye">&nbsp;</i>
                                                </a>
                                                &nbsp;
                                                
                                                    <?php echo Form::open(['method' => 'DELETE', 'url' => 'bordereaus/' . $bordereau->id, 'id' => 'deleteForm', 'onsubmit' => 'return ConfirmDelete()']); ?>

                                                    <?php echo Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'title' => 'supprimer']); ?>

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
        $(document).ready(function() {
            $('#table-bordereaus').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                ],
                "lengthMenu": [
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "Tout"]
                ],
                "order": [
                    [0, 'asc']
                ],
                language: {
                    "sProcessing": "Traitement en cours...",
                    "sSearch": "Rechercher&nbsp;:",
                    "sLengthMenu": "Afficher _MENU_ &eacute;l&eacute;ments",
                    "sInfo": "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    "sInfoEmpty": "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                    "sInfoFiltered": "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    "sInfoPostFix": "",
                    "sLoadingRecords": "Chargement en cours...",
                    "sZeroRecords": "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    "sEmptyTable": "Aucune donn&eacute;e disponible dans le tableau",
                    "oPaginate": {
                        "sFirst": "Premier",
                        "sPrevious": "Pr&eacute;c&eacute;dent",
                        "sNext": "Suivant",
                        "sLast": "Dernier"
                    },
                    "oAria": {
                        "sSortAscending": ": activer pour trier la colonne par ordre croissant",
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
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/bordereaus/index.blade.php ENDPATH**/ ?>