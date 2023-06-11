
<?php $__env->startSection('title', $product->name); ?>
<?php $__env->startSection('content'); ?>

<div class="container">

    <div class="row" style="margin-bottom: 3em">
        <div class="col-md-4 product-image">
            <div>
                <img src="<?php echo e(productImage($product->image)); ?>" width="100%" height="100%" id="current-image">
            </div>
            <div class="image-thumbnails">
                <?php if($images): ?>
                    <img src="<?php echo e(productImage($product->image)); ?>" class="image-thumbnail active">
                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <img src="<?php echo e(productImage($image)); ?>" class="image-thumbnail">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="product-details col-md-5 offset-md-1">
            <h2 class="lead" style="margin-top:1em"><?php echo e($product->name); ?></h2>
            <span class="badge badge-success" style="font-size: 1em"><?php echo e($stockLevel); ?></span>
            <p class="light-text"><?php echo e($product->details); ?></p>
            <h3 class="lead">IDR <?php echo e(format($product->price)); ?></h3>
            <p class="light-text"><?php echo $product->description; ?></p>
            <?php if($product->quantity > 0): ?>
                <form action="<?php echo e(route('cart.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                    <input type="hidden" name="name" value="<?php echo e($product->name); ?>">
                    <input type="hidden" name="price" value="<?php echo e($product->price); ?>">
                    <button type="submit" class="btn custom-border-n">Add to Cart</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
    <!-- <hr> -->
</div>
<?php echo $__env->make('partials.might-like', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end page content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        $(document).ready(function () {
            // force the height to be as as long as the width
            var w = $('#current-image').width();
            $('#current-image').css({'height': w + 'px'});

            $('.image-thumbnail').on('click', (e) => {
                $('.image-thumbnail').removeClass('active');
                $(e.currentTarget).addClass('active');
                if($(e.currentTarget).attr('src') != $('#current-image').attr('src')) {
                    $(e.currentTarget).addClass('active');
                    $('#current-image').animate({'opacity' : 0}, 300, function() {
                        $('#current-image').attr('src', $(e.currentTarget).attr('src'));
                        $('#current-image').animate({'opacity' : 1}, 400);
                    })
                }
            });

        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\e-commerce\ecommerce-laravel\resources\views/product.blade.php ENDPATH**/ ?>