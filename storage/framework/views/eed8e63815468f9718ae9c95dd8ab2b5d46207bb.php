
<?php $__env->startSection('title', 'Cart'); ?>
<?php $__env->startSection('content'); ?>

<!-- start page content -->
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <?php if(Cart::instance('default')->count() > 0): ?>
            <h3 class="lead mt-4"><?php echo e(Cart::instance('default')->count()); ?> items in the shopping cart</h3>
            <table class="table table-responsive">
                <tbody>
                    <?php $__currentLoopData = Cart::instance('default')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <a href="<?php echo e(route('shop.show', $item->model->slug)); ?>">
                                    <img src="<?php echo e(productImage($item->model->image)); ?>" height="100px" width="100px">
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo e(route('shop.show', $item->model->slug)); ?>" class="text-decoration-none">
                                    <h3 class="lead light-text"><?php echo e($item->model->name); ?></h3>
                                    <p class="light-text"><?php echo e($item->model->details); ?></p>
                                </a>
                            </td>
                            <td>
                                <form action="<?php echo e(route('cart.destroy', [$item->rowId, 'default'])); ?>" method="POST" id="delete-item">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                </form>
                                <form action="<?php echo e(route('cart.save-later', $item->rowId)); ?>" method="POST" id="save-later">
                                    <?php echo csrf_field(); ?>
                                </form>
                                <button class="cart-option btn btn-danger btn-sm custom-border" onclick="
                                    document.getElementById('delete-item').submit();">
                                    remove
                                </button>
                                <button class="cart-option btn btn-success btn-sm custom-border" onclick="
                                document.getElementById('save-later').submit();">
                                    Save for later
                                </button>
                            </td>
                            <td class="">
                                <select class='quantity' data-id='<?php echo e($item->rowId); ?>' data-productQuantity='<?php echo e($item->model->quantity); ?>'>
                                    <?php for($i = 1; $i < 10; $i++): ?>
                                        <option class="option" value="<?php echo e($i); ?>" <?php echo e($item->qty == $i ? 'selected' : ''); ?>><?php echo e($i); ?></option>
                                    <?php endfor; ?>
                                </select>
                            </td>
                            <td>IDR <?php echo e(format($item->subtotal)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <hr>
            <div class="summary">
                <div class="row">
                    <div class="col-md-8">
                        <p class="light-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Est laborum perspiciatis ullam, aliquam eius deserunt iusto autem. Cumque omnis, architecto nostrum voluptatum quis temporibus alias suscipit quod reprehenderit. Quis, esse.
                        </p>
                    </div>
                    <div class="col-md-3 offset-md-1">
                        <p class="text-right light-text">Subtotal &nbsp; &nbsp;IDR <?php echo e(format(Cart::subtotal())); ?></p>
                        <p class="text-right light-text">Tax(21%) &nbsp; &nbsp;IDR <?php echo e(format(Cart::tax())); ?></p>
                        <p class="text-right">Total &nbsp; &nbsp; IDR <?php echo e(format(Cart::total())); ?></p>
                    </div>
                </div>
            </div>
            <div class="cart-actions">
                <a class="btn custom-border-n" href="<?php echo e(route('shop.index')); ?>">Continue Shopping</a>
                <a class="float-right btn btn-success custom-border-n" href="<?php echo e(route('checkout.index')); ?>">
                    Proceed to checkout
                </a>
            </div>
            <?php else: ?>
            <div class="alert alert-info">
                <h4 class="lead">No items in the cart <a class="btn custom-border-n" href="<?php echo e(route('shop.index')); ?>">Continue shopping</a></h4>
            </div>
            <?php endif; ?>
            <hr>
            <?php if(Cart::instance('saveForLater')->count() > 0): ?>
                <h3 class="lead"><?php echo e(Cart::instance('saveForLater')->count()); ?> item saved for later</h3>
                <table class="table table-responsive">
                    <tbody>
                        <?php $__currentLoopData = Cart::instance('saveForLater')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('shop.show', $item->model->slug)); ?>">
                                        <img src="<?php echo e(productImage($item->model->image)); ?>" height="100px" width="100px"></td>
                                    </a>
                                <td>
                                    <a href="<?php echo e(route('shop.show', $item->model->slug)); ?>" class="text-decoration-none">
                                        <h3 class="lead light-text"><?php echo e($item->model->name); ?></h3>
                                        <p class="light-text"><?php echo e($item->model->details); ?></p>
                                    </a>
                                </td>
                                <td>
                                    <button class="cart-option btn btn-danger btn-sm custom-border" onclick="
                                        document.getElementById('delete-form').submit();">
                                        remove
                                    </button>
                                    <button class="cart-option btn btn-success btn-sm custom-border" onclick="
                                    document.getElementById('add-form').submit();">
                                        Add to cart
                                    </button>
                                </td>
                                <td>$<?php echo e(format($item->model->price)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <form action="<?php echo e(route('cart.destroy', [$item->rowId, 'saveForLater'])); ?>" method="POST" id="delete-form">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                    </form>
                    <form action="<?php echo e(route('cart.add-to-cart', $item->rowId)); ?>" method="POST" id="add-form">
                        <?php echo csrf_field(); ?>
                    </form>

                </table>
            <?php else: ?>
                <div class="alert alert-primary" style="margin:2em">
                    <li>No items saved for later</li>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php echo $__env->make('partials.might-like', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end page content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script type="text/javascript">

$(document).ready(function () {
    $('.quantity').on('change', function() {
        const id = this.getAttribute('data-id')
        console.log(id)
        const productQuantity = this.getAttribute('data-productQuantity')
        axios.patch('/cart/' + id, {quantity: this.value, productQuantity: productQuantity})
            .then(response => {
                console.log(response)
                window.location.href = '<?php echo e(route('cart.index')); ?>'
            }).catch(error => {
                window.location.href = '<?php echo e(route('cart.index')); ?>'
            })
    });
});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Laravel\e-commerce\ecommerce-laravel\resources\views/cart.blade.php ENDPATH**/ ?>