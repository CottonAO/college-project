<div class="row">
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-4">
        <a href="<?php echo e(route('item', ['id' => $i->id])); ?>">
            <div class="card shadow-sm">
                <div class="img" style="background: url(<?php echo e($i->img); ?>) center center no-repeat; background-size: cover;"></div>
                <div class="card-body">
                    <h5 class="text-black"><?php echo e($i->model); ?> <?php echo e($i->name); ?></h5>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted"><?php echo e($i->price); ?> руб.</small>
                        <div class="btn-group">
                            <a href="<?php echo e(route('item', ['id' => $i->id])); ?>" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH C:\OpenServer\domains\deshop42\resources\views/incl/item.blade.php ENDPATH**/ ?>