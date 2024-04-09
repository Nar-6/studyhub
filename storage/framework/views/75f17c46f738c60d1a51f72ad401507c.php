<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    Resultat aux questions
                </h6>
                <div class="ml-auto">
                    <a href="<?php echo e(route('result.create')); ?>" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">Nouvel Resultat a une question</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-result" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>No</th>
                                <th>Points</th>
                                <th>Questions</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr data-entry-id="<?php echo e($result->id); ?>">
                                <td>

                                </td>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($result->total_points); ?></td>
                                <td>
                                    <?php $__currentLoopData = $result->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge badge-info"><?php echo e($question->question_text); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?php echo e(route('result.show', $result->id)); ?>" class="btn btn-success">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="<?php echo e(route('result.edit', $result->id)); ?>" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form id='supprimer<?php echo e($loop->iteration); ?>' action="<?php echo e(route('result.destroy', $result->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('delete'); ?>
                                            <button type="submit" onclick="event.preventDefault();confirm('Voulez vous vraiment supprimer cet élément ?')?document.getElementById('supprimer<?php echo e($loop->iteration); ?>').submit():''" class="btn" style="background-color:red !important; color:white !important" class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" class="text-center">Pas de resultat a une question</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- Content Row -->

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\EliteBook 830 G8\Documents\document_sauvegarde\studyhub\resources\views/professeur/results/index.blade.php ENDPATH**/ ?>