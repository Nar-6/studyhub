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
                    <h1 class="h3 mb-0 text-gray-800">Creer une epreuve</h1>
                    <a href="<?php echo e(route('epreuve.index')); ?>" class="btn btn-primary btn-sm shadow-sm">Retour</a>
                </div>
            </div>
            <div class="card-body">
                <form action="<?php echo e(route('epreuve.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('POST'); ?>
                    <div class="form-group">
                        <label for="nomEp">Nom_epreuve</label>
                        <input type="text" class="form-control" id="nomEp" placeholder="nom de l'epreuve" name="nomEp" value="<?php echo e(old('nomEp')); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="dateEp">Date_epreuve</label>
                        <input type="date" class="form-control" id="dateEp" placeholder="date Epreuve" name="dateEp" value="<?php echo e(old('dateEp')); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="heurDeb">Heure_de_debut</label>
                        <input type="time" class="form-control" id="heurDeb" placeholder="heure de Debut" name="heurDeb" value="<?php echo e(old('heurDeb')); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="heurFin">Heure de fin </label>
                        <input type="time" class="form-control" id="heurFin" placeholder="heure de Fin" name="heurFin" value="<?php echo e(old('heurFin')); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="numProf">Nom du prof</label>
                        <select  id="numProf" class="block mt-1 rounded-md border-gray-300 w-full"
                              name="numProf" >
                            <?php $__currentLoopData = $prof; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->numProf); ?>"><?php echo e($item->nomProf); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="codFil">Filiere</label>
                        <select  id="codFil" class="block mt-1 rounded-md border-gray-300 w-full"
                              name="codFil">
                            <?php $__currentLoopData = $filiere; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->codFil); ?>"><?php echo e($item->libFil); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="codMat">Matiere</label>
                        <select  id="codMat" class="block mt-1 rounded-md border-gray-300 w-full"
                              name="codMat" ">
                            <?php $__currentLoopData = $matiere; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->codMat); ?>"><?php echo e($item->libMat); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Creer une epreuve</button>
                </form>
            </div>
        </div>


    <!-- Content Row -->

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\EliteBook 830 G8\Documents\document_sauvegarde\studyhub\resources\views/professeur/epreuves/create.blade.php ENDPATH**/ ?>