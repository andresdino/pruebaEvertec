<?php $__env->startSection('title', __('page.home.title')); ?>

<?php $__env->startSection('layout_topnav', true); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark"><i class="icon fas fa-home"></i> Home</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('orders.store')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="card">
                            <div class="card-header bg-gradient-purple">
                                <h3 class="card-title"><i class="fa fa-fw fa-file-contract"></i> Crear Orden</h3>
                            </div>
                            <div class="card-body">
                                <?php if(count( $errors ) > 0): ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-fw fa-times-circle"></i></button>
                                        <h5><i class="icon fas fa-ban"></i> No se pudo crear la orden.</h5>
                                        <?php if($errors->has('msg_0')): ?>
                                            <?php echo e($errors->first('msg_0')); ?>

                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <div class="card">
                                            <div class="card-header bg-gradient-orange">
                                                <h3 class="card-title"><i class="fa fa-fw fa-tag"></i> Producto</h3>
                                            </div>
                                            <div class="card-body">
                                                <img src="https://picsum.photos/1200/800" class="rounded mx-auto d-block img-fluid" alt="Responsive image" />
                                                <div class="row">
                                                    <div class="col-md-6 text-center">
                                                        <h2 class="text-orange"><?php echo e(config('config.product_name')); ?></h2>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h3><i class="fa fa-fw fa-hand-holding-usd"></i> Precio: <h4 class="text-orange">$ <?php echo e(config('config.product_price')); ?></h4></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Cantidad <i class="text-primary fa fa-fw fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Cantidad del producto"></i>:</label>
                                                    <div class="input-group mb-3">
                                                        <input type="number" min="1" max="100" step="1" class="form-control <?php echo e($errors->has('quantity') ? 'is-invalid' : ''); ?>" id="quantity" name="quantity" placeholder="Ingresa cantidad." required value="<?php echo e(old("quantity")); ?>">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-balance-scale-left"></span>
                                                            </div>
                                                        </div>
                                                        <?php if($errors->has('quantity')): ?>
                                                            <div class="invalid-feedback">
                                                                <?php echo e($errors->first('quantity')); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div >
                                                        <h3><i class="fa fa-fw fa-funnel-dollar"></i> Total.</h3>
                                                    </div>
                                                    <div >
                                                        <h4 class="text-orange" id="total">xxxxxx</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn bg-warning float-right"> <i class="fa fa-fw fa-cart-plus"></i> Crear</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script type="text/javascript">
        let price=<?php echo e(config('config.product_price')); ?>;
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            $('#quantity').change(function() {
                $("#total").html('$ '+ currencyFormat(price * $(this).val()));
            } );
        });
        function currencyFormat(num) {
            return num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\evertec\resources\views/home.blade.php ENDPATH**/ ?>