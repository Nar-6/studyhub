<?php $__env->startSection('page-content'); ?>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 mt-2">
        <div class="card">
            <div class="card-body">
                <?php if(session()->has('error')): ?>
                <li class="alert alert-danger"><?php echo e(session()->get('error')); ?></li>
                <?php endif; ?>

            <form action="<?php echo e(route('login')); ?>" method="POST" class="form-product">
                <!-- il est important d'indiquer la methode post et egalement creer une route post
            et pour recuperer la valeur rentrée dans les champs par l'utilisateur on ajoute un type value -->
                <?php echo method_field('post'); ?>
                <?php echo csrf_field(); ?>

                <h4>Connexion</h4>
                <div class="form-group">
                        <label for="email">Email :</label>
                        <input class="form-control mt-2" type="text" id="email"
                        placeholder="Email" name="email" value="<?php echo e(old('email')); ?>" >
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text text-danger">
                        <?php echo e($message); ?>

                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>
                <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input class="form-control mt-2" type="password" id="password"
                        placeholder="Mot de passe" name="password" >
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="text text-danger">
                        <?php echo e($message); ?>

                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                </div>
                <button type=submit class="btn btn-primary btn-sm mt-2">Connexion</button>
            </form>
            <p class="mt-2">Mot de passe oublié ?  <a href="<?php echo e(route('password.request')); ?>">Réninitialiser votre mot de passe !</a></p>
            <!-- <p class="mt-2">Pas de compte ?  <a href="<?php echo e(route('register')); ?>">Inscrivez_vous!</a></p> -->

            </div>
        </div>
    </div>
    <div class="col-md-4"></div>

</div>


  <?php $__env->stopSection(); ?>


<?php echo $__env->make('./../layouts/app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\EliteBook 830 G8\Desktop\clone\studyhub\resources\views/user/login.blade.php ENDPATH**/ ?>