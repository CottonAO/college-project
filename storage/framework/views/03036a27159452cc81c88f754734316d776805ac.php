

<?php $__env->startSection('title'); ?>
    <?php echo e($item->model); ?> <?php echo e($item->name); ?> - Copy Star
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                <div class="border p-5">
                    <img src="<?php echo e($item->img); ?>" width="100%" alt="">
                </div>
            </div>
            <div class="col-8">
                <h2><?php echo e($item->model); ?> <?php echo e($item->name); ?> <span class="badge bg-warning text-dark"><?php echo e($item->year); ?></span></h2><hr>

                <p><b>Страна-производитель: </b><?php echo e($item->country); ?></p>
                <p><b>Год выпуска: </b><?php echo e($item->year); ?></p>
                <p><b>Модель: </b><?php echo e($item->model); ?></p>

                <h4 class="my-4"><?php echo e($item->price); ?> руб.</h4>

                <?php if(Auth::check()): ?>
                <?php if($item->amount > 0): ?>
                <button type="button" data-item="<?php echo e($item->id); ?>" onclick="addToCart(this)" class="btn btn-warning btn-sm"><b>Добавить в корзину</b></button>
                <?php else: ?>
                <button type="button" data-item="<?php echo e($item->id); ?>" onclick="addToCart(this)" class="btn btn-warning btn-sm" disabled><b>Добавить в корзину</b></button>
                <?php endif; ?>
                
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\deshop42\resources\views/item.blade.php ENDPATH**/ ?>