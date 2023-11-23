

<?php $__env->startSection('title'); ?>
Copy Star - Интернет-магазин
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">Copy Star</h1>
        <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
        <button class="btn btn-warning btn-lg" type="button">Регистрация</button>
    </div>
</div>

<section id="catalog">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <h5>Категории</h5>
                <ul class="list-group">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('category', ['id' => $c->id])); ?>" class="category"><li class="list-group-item shadow-sm"><?php echo e($c->name); ?></li></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="col-9">
                <div class="d-flex justify-content-between mb-2 ">
                    <?php if(isset($catName)): ?>
                    <h5><?php echo e($catName->name); ?></h5>
                    <div>
                        <select id="sort" class="form-select d-inline-block" onchange="filter(this, event, <?php echo e($catName->id); ?>)" on>
                            <option selected disabled>Сортировать</option>
                            <option value="year">по году производства</option>
                            <option value="name">по наименованию</option>
                            <option value="price">по цене</option>
                        </select>
                    </div>
                    <?php else: ?>
                    <h5>Все товары</h5>
                    <div>
                        <select id="sort" class="form-select d-inline-block" onchange="filter(this, event)">
                            <option selected disabled>Сортировать</option>
                            <option value="year">по году производства</option>
                            <option value="name">по наименованию</option>
                            <option value="price">по цене</option>
                        </select>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div id="items">
                    <?php echo $__env->make('incl.item', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\deshop42\resources\views/index.blade.php ENDPATH**/ ?>