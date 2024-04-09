<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">   
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
     crossorigin="anonymous"></script>
       <title>Accueil</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo e(route('article')); ?>">Laravel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse"
  data-target="#navbarNav" aria-controls="navbarNav"
  aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo e(route('article')); ?>">Accueil
            <span class="sr-only">*</span></a>
      </li>
      <?php if(auth()->guard()->check()): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('article.mine')); ?>">Mes articles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('logout')); ?>">Me deconnecter</a>
      </li>
      <?php else: ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('register')); ?>">Mon Compte</a>
      </li>
      <?php endif; ?>

    </ul>
  </div>
</nav>

<div class="container">
    <?php echo $__env->yieldContent('page-content'); ?>
</div>
  </div>
</body>
</html>
<?php /**PATH C:\Users\EliteBook 830 G8\Desktop\clone\studyhub\resources\views//////layouts/app1.blade.php ENDPATH**/ ?>