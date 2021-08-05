<?php $__env->startSection('title', $direction->name); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <?php if(session()->has('success')): ?>
            <div class="alert alert-success" role="alert"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <?php if(session('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>
                <?php if (\Illuminate\Support\Facades\Blade::check('roles', 'Administrateur')): ?>
                <div class="list-group mb-1">
                    <?php $__currentLoopData = $direction_courriers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courrier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="list-group-item">
                                <p class="h4 card-title h-100 m-0"><b><u class="h4">Type </u> : </b> <?php echo $courrier->types_courrier->name; ?>

                                </p>
                                <p class="h4 card-title h-100 mb-0"><b><u class="h4">Objet </u> : </b><a class="font-italic"
                                        style="text-decoration:none"
                                        href="<?php echo route('courriers.show', $courrier->id); ?>"><?php echo $courrier->objet; ?></a></p>
                                <p><b><u class="h4">Expéditeur </u> : </b><?php echo $courrier->expediteur; ?></p>
                                <p><b><u class="h4">Description </u> : </b><?php echo $courrier->description; ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small>Posté le <?php echo $courrier->created_at->format('d/m/Y à H:m'); ?></small>
                                    <span
                                        class="badge badge-primary"><?php echo $courrier->user->firstname; ?>&nbsp;<?php echo $courrier->user->name; ?></span>
                                </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <hr>
                </div>
                <div class="d-flex justify-content-center pt-2">
                    <?php echo $courriers->links(); ?>

                </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        <?php echo $direction->name; ?>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <div class="d-flex justify-content-between align-items-center pb-3">
                                <p>
                                    
                                </p>
                                <span>
                                    <a href="<?php echo e(route('directions.selectemployees')); ?>">
                                        <div class="btn btn-success  btn-sm"><i class="fas fa-plus"></i>&nbsp;Ajouter</div>
                                    </a>
                                </span>
                            </div>
                            <br />
                            <table class="table table-bordered table-striped" width="100%" cellspacing="0"
                                id="table-directions">
                                <thead class="table-dark">
                                    <tr>
                                        <th style="width:5%;">Matricule</th>
                                        <th style="width:5%;">Civilité</th>
                                        <th>Prenom</th>
                                        <th>Nom</th>
                                        <th style="width:8%;">Date Nais.</th>
                                        <th>Lieu Nais.</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th style="width:15%;">Fonction</th>
                                        <th style="width:10%;">Action</th>
                                    </tr>
                                </thead>
                                <tfoot class="table-dark">
                                    <tr>
                                        <th>Matricule</th>
                                        <th>Civilité</th>
                                        <th>Prenom</th>
                                        <th>Nom</th>
                                        <th>Date Nais.</th>
                                        <th>Lieu Nais.</th>
                                        <th>Email</th>
                                        <th>Telephone</th>
                                        <th>Fonction</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo $employee->matricule; ?></td>
                                            <td><?php echo $employee->user->civilite; ?></td>
                                            <td><?php echo $employee->user->firstname; ?></td>
                                            <td><?php echo $employee->user->name; ?></td>
                                            <td><?php echo $employee->user->date_naissance->format('d/m/Y'); ?></td>
                                            <td><?php echo $employee->user->lieu_naissance; ?></td>
                                            <td><?php echo $employee->user->email; ?></td>
                                            <td><?php echo $employee->user->telephone; ?></td>
                                            <td><?php echo $employee->fonction->name; ?></td>
                                            <td style="text-align: center;"
                                                class="d-flex align-items-baseline align-content-center">
                                                <a href="<?php echo url('employees/' . $employee->id . '/edit'); ?>" class='btn btn-success btn-sm'
                                                    title="modifier">
                                                    <i class="far fa-edit">&nbsp;</i>
                                                </a>
                                                &nbsp;
                                                <a href="<?php echo url('employees/' . $employee->id); ?>" class='btn btn-primary btn-sm'
                                                    title="voir">
                                                    <i class="far fa-eye">&nbsp;</i>
                                                </a>
                                                &nbsp;
                                                <?php echo Form::open(['method' => 'DELETE', 'url' => 'employees/' . $employee->id, 'id' => 'deleteForm', 'onsubmit' => 'return ConfirmDelete()']); ?>

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
            $('#table-directions').DataTable({
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

<?php echo $__env->make('layout.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/programmation/resources/views/directions/show.blade.php ENDPATH**/ ?>