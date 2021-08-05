<?php $__env->startSection('title', 'B. DAF' . ' ' . $liste->numero); ?>
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
                        <?php echo $liste->numero; ?>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div align="right">
                                <a href="<?php echo e(route('bordereaus.create')); ?>">
                                    <div class="btn btn-success btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</i></div>
                                </a>
                            </div>
                            <br />
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0"
                                id="table-bordereaus">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width:8%;"><?php echo __('Numéro'); ?></th>
                                        <th style="width:8%;"><?php echo __('Date/MP'); ?></th>
                                        <th style="width:30%;"><?php echo __('Désignation'); ?></th>
                                        <th><?php echo __('Projet'); ?></th>
                                        <th><?php echo __('Montant'); ?></th>
                                        <th style="width:5%;"><?php echo __('Nb/Pc'); ?></th>
                                        <th><?php echo __('Observation'); ?></th>
                                        <th style="width:10%;">Action</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-dark">
                                    <tr>
                                        <th><?php echo __('Numéro'); ?></th>
                                        <th><?php echo __('Date/MP'); ?></th>
                                        <th><?php echo __('Désignation'); ?></th>
                                        <th><?php echo __('Projet'); ?></th>
                                        <th><?php echo __('Montant'); ?></th>
                                        <th><?php echo __('Nb/Pc'); ?></th>
                                        <th><?php echo __('Observation'); ?></th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php $__currentLoopData = $bordereaus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bordereau): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            
                                            <td><?php echo $bordereau->numero; ?></td>
                                            <td><?php echo Carbon\Carbon::parse($bordereau->date_mandat)->format('d/m/Y'); ?></td>
                                            <td><?php echo $bordereau->designation; ?></td>
                                            <td><?php echo $bordereau->courrier->projet->sigle; ?></td>
                                            <td><?php echo $bordereau->montant; ?></td>
                                            <td><?php echo $bordereau->nombre_de_piece; ?></td>
                                            <td><?php echo $bordereau->observation; ?></td>
                                            <td class="align-middle d-flex align-items-baseline">
                                                
                                                    <a href="<?php echo url('bordereaus/' . $bordereau->id . '/edit'); ?>" class='btn btn-success btn-sm'
                                                        title="modifier" target="_blank">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                
                                                &nbsp
                                                <a href="<?php echo url('courriers/' . $bordereau->courrier->id); ?>" class='btn btn-primary btn-sm'
                                                    title="voir" target="_blank">
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
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "Tout"]
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

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/listes/feuil.blade.php ENDPATH**/ ?>