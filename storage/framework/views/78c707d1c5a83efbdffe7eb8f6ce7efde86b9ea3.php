

<?php $__env->startSection('title', 'Shop'); ?>
<?php $__env->startSection('content'); ?>

<!-- start page content -->
<div class="container">
        <div class="row">
            <!-- start filter section -->
            <div class="col-md-2" style="margin-top:1em">
                <h4 class="filter-header">
                    By Category
                </h4>
                <ul class="filter-ul">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a class="text-center <?php echo e($category->name == $categoryName ? 'active-cat' : ''); ?>" href="<?php echo e(route('shop.index', ['category' => $category->slug])); ?>"><?php echo e($category->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <h4 class="filter-header">
                    By Tag
                </h4>
                <ul class="filter-ul">
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a class="text-center <?php echo e($tag->name == $tagName ? 'active-cat' : ''); ?>" href="<?php echo e(route('shop.index', ['tag' => $tag->slug])); ?>"><?php echo e($tag->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <!-- end filter section -->
            <!-- start products section -->
            <div class="col-md-8 offset-md-1">
                <div class="head row">
                    <div class="col-md-6">
                        <h2 class="content-head">
                            <?php echo e($categoryName); ?>

                        </h2>
                    </div>
                    <div class="col-md-6 text-right">
                        <span class='font-weight-bolder' style="font-size: 1.2em">Price: </span>
                        <span class="align-right"><a href="<?php echo e(route('shop.index', ['category'=> request()->category, 'tag'=> request()->tag, 'sort' => 'low_high'])); ?>" class="text-decoration-none <?php echo e(request()->sort == 'low_high' ? 'active-sort' : ''); ?>">Low to High</a></span>
                        <span class="align-right"><a href="<?php echo e(route('shop.index', ['category'=> request()->category, 'tag'=> request()->tag, 'sort' => 'high_low'])); ?>" class="text-decoration-none <?php echo e(request()->sort == 'high_low' ? 'active-sort' : ''); ?>">High to Low</a></span>
                    </div>
                </div>
                <!-- start products row -->
                <div class="row">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- start single product -->
                        <div class="col-md-6 col-sm-12 col-lg-4 product">
                            <a href="<?php echo e(route('shop.show', $product->slug)); ?>" class="custom-card">
                                <div class="card view overlay zoom">
                                    <img src="<?php echo e(productImage($product->image)); ?>" class="card-img-top img-fluid" alt="..." height="200px" width="200px">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($product->name); ?><span class="float-right">IDR <?php echo e(format($product->price)); ?></span></h5>
                                        
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- end single product -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="text-center">
                    <?php echo e($products->appends(request()->input())->links()); ?>

                </div>
                <!-- end products row -->
            </div>
            <!-- end products section -->
        </div>
    </div>
    <!-- end page content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\e-commerce\ecommerce-laravel\resources\views/shop.blade.php ENDPATH**/ ?>