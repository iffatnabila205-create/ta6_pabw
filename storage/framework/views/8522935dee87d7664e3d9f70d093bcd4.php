<?php $__env->startSection('title', 'Login | TOUGAR'); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/login.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <?php if(session('status')): ?>
    <div class="message success" id="flash"><?php echo e(session('status')); ?></div>
  <?php endif; ?>
  <?php if($errors->any()): ?>
    <div class="message error" id="flash"><?php echo e($errors->first()); ?></div>
  <?php endif; ?>

  <div class="login-container">

    <!-- LEFT IMAGE -->
    <div class="login-image">
      <div class="overlay">
        <h1>TOUGAR</h1>
        <p>Menjelajahi Keindahan Alam & Budaya Garut</p>
      </div>
    </div>

    <!-- RIGHT FORM -->
    <div class="login-form">
      <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="TOUGAR Logo" class="logo">

      <h2>Login Akun</h2>
      <p>Silakan masuk untuk melanjutkan perjalanan wisata Anda</p>

      <form method="POST" action="<?php echo e(route('login.attempt')); ?>">
        <?php echo csrf_field(); ?>
        <div class="input-group">
          <i class="fa fa-user"></i>
          <input type="text" name="username" value="<?php echo e(old('username')); ?>" placeholder="Username" required autofocus>
        </div>

        <div class="input-group">
          <i class="fa fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required>
        </div>

        <div class="options">
          <label>
            <input type="checkbox" name="remember" value="1"> Ingat saya
          </label>
          <a href="<?php echo e(route('password.forgot')); ?>">Lupa password?</a>
        </div>

        <button type="submit">Masuk</button>
        


        <p class="register">
          Belum punya akun? <a href="<?php echo e(route('register')); ?>">Daftar sekarang</a>
        </p>
      </form>
    </div>

  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>setTimeout(function(){var f=document.getElementById('flash');if(f)f.remove();},4000);</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\azhar\tougar\resources\views/auth/login.blade.php ENDPATH**/ ?>