<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo e(url('/')); ?>">
                <div class="sidebar-brand-text mx-3"><?php echo e(__('Homepage')); ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

        


            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('epreuve.index')); ?>">
                    <i class="fas fa-cogs"></i>
                    <span><?php echo e(__('Epreuves')); ?></span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('question.index')); ?>">
                    <i class="fas fa-cogs"></i>
                    <span><?php echo e(__('Question')); ?></span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('option.index')); ?>">
                    <i class="fas fa-cogs"></i>
                    <span><?php echo e(__('Option')); ?></span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('professeur_results')); ?>">
                    <i class="fas fa-cogs"></i>
                    <span><?php echo e(__('Result')); ?></span></a>
            </li>



        </ul>
<?php /**PATH C:\Users\EliteBook 830 G8\Documents\document_sauvegarde\studyhub\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>