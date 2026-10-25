<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'TOUGAR | TOUR GARUT'); ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body <?php echo $__env->yieldContent('body-attrs'); ?>>

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\Hi\Downloads\tougar\resources\views/layouts/app.blade.php ENDPATH**/ ?>