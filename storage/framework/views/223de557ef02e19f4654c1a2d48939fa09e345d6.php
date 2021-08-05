<?php $__env->startSection('title', 'ONFP - Feuils'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                        Feuils
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div align="right">
                                <a href="<?php echo e(route('listes.create')); ?>">
                                    <div class="btn btn-success btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</i></div>
                                </a>
                            </div>
                            <br />
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0"
                                id="table-listes">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width:10%;">N°</th>
                                        <th style="width:75%;"><?php echo __('Feuil'); ?></th>
                                        <th><?php echo __('Quantité'); ?></th>
                                        <th style="width:10%;">Action</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-dark">
                                    <tr>
                                        <th>N°</th>
                                        <th><?php echo __('Feuil'); ?></th>
                                        <th><?php echo __('Quantité'); ?></th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php $__currentLoopData = $listes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $liste): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td>
                                                <a style="color: darkorange; text-decoration: none;"
                                                    href="<?php echo url('listes/' . $liste->id); ?>" class="view" title="voir"
                                                    target="_blank">
                                                    <?php echo $liste->numero; ?>

                                                </a>
                                            </td>
                                            <td>
                                                <?php $__currentLoopData = $liste->bordereaus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bordereau): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($loop->last): ?>
                                                        <?php echo $loop->count; ?>

                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td class="d-flex align-items-center justify-content-center">
                                                <a href="<?php echo url('listes/' . $liste->id . '/edit'); ?>" class='btn btn-success btn-sm'
                                                    title="modifier">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                &nbsp;
                                               
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
            $('#table-listes').DataTable({
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

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/listes/index.blade.php ENDPATH**/ ?>