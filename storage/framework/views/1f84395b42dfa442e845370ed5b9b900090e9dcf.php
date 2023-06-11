<div class="suggestions">
    <div class="container" style="padding-top: 3em">
        <h3 class="lead" style="margin-bottom: 2em">You might also like</h3>
        <!-- start products row -->
        <div class="row">
            <?php $__currentLoopData = $mightLike; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- start single product -->
                <div class="col-md-6 col-sm-12 col-lg-4 product">
                    <a href="<?php echo e(route('shop.show', $product->slug)); ?>" class="custom-card">
                        <div class="card view overlay zoom">
                            <img src="<?php echo e(productImage($product->image)); ?>" class="card-img-top img-fluid" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($product->name); ?><span class="float-right">$ <?php echo e(format($product->price)); ?></span></h5>
                                
                            </div>
                        </div>
                    </a>
                </div>
                <!-- end single product -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- end products row -->
    </div>
</div>
<!--  end suggestions --><?php /**PATH D:\Laravel\e-commerce\ecommerce-laravel\resources\views/partials/might-like.blade.php ENDPATH**/ ?>