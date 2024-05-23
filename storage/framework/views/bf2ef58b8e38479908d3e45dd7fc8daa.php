<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Modification d'une question</h1>
                    <a href="<?php echo e(route('question.index')); ?>" class="btn btn-primary btn-sm shadow-sm">Retour</a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('question.update', $question->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <div class="form-group">
                        <label for="question_text">question test</label>
                        <input type="text" class="form-control" id="question_text" placeholder="question text" name="question_text" value="<?php echo e(old('question_text', $question->question_text)); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="numEp">epreuve</label>
                        <select class="form-control" name="numEp" id="numEp">
                            <?php $__currentLoopData = $epreuves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $numEp => $epreuve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e($numEp == $question->numEp ? 'selected' : null); ?> value="<?php echo e($numEp); ?>"><?php echo e($epreuve); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Modifier la question</button>
                </form>
            </div>
        </div>


    <!-- Content Row -->

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\EliteBook 830 G8\Documents\document_sauvegarde\studyhub\resources\views/professeur/questions/edit.blade.php ENDPATH**/ ?>