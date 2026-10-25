<?php $__env->startSection('title', 'TOUGAR - Smart Tourism Garut'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/landing.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="main-bg">

<!-- Navbar -->
<nav class="navbar">
<h2 class="logo">TOUGAR | Tour Garut</h2>

<ul>
<li><a href="<?php echo e(route('beranda')); ?>">Beranda</a></li>
<li><a href="#wisata">Destinasi</a></li>
<li><a href="<?php echo e(route('login')); ?>">Login</a></li>
</ul>
</nav>

<!-- Hero -->
<section class="hero">

<div class="hero-text">
<h1>Jelajahi Keindahan Garut</h1>
<p>Temukan destinasi wisata terbaik bersama TOUGAR</p>

<a href="#wisata">
<button>Mulai Jelajah</button>
</a>

</div>

</section>

<!-- Destinasi -->
<section id="wisata" class="wisata">

<h2>Destinasi Populer</h2>

<div class="card-container">

<div class="card">
<img src="<?php echo e(asset('assets/img/papandayan.jpeg')); ?>">
<h3>Gunung Papandayan</h3>
<p>Keindahan gunung dengan padang edelweiss.</p>
</div>

<div class="card">
<img src="<?php echo e(asset('assets/img/santolo.webp')); ?>">
<h3>Pantai Santolo</h3>
<p>Pantai terkenal dengan pasir putih.</p>
</div>

<div class="card">
<img src="<?php echo e(asset('assets/img/situ-bagendit.jpg')); ?>">
<h3>Situ Bagendit</h3>
<p>Danau wisata yang terkenal di Garut.</p>
</div>

</div>

</section>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/landing.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\azhar\tougar\resources\views/pages/landing.blade.php ENDPATH**/ ?>