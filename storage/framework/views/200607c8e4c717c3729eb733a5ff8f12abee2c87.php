<?php $__env->startSection('title', __('page.home.title')); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark"><i class="icon fas fa-file-alt"></i> Orden</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <?php if(count( $errors ) > 0): ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-fw fa-times-circle"></i></button>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div style="margin-bottom: 1em;">
                                    <i class="fa fa-fw fa-exclamation-circle"></i> <?php echo e($error); ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>                                                                    
                    <?php endif; ?>
                    <?php if(session('update')): ?>
                        <?php
                            switch (session('update')['status']) {
                                case 'PAYED':
                                    $class = 'success';
                                    $icon = 'thumbs-up';
                                    break;
                                case 'PENDING':
                                    $class = 'warning';
                                    $icon = 'hourglass-half';
                                    break;
                                case 'REJECTED':
                                    $class = 'danger';
                                    $icon = 'times-circle';
                                    break;                                
                                case 'REFUNDED':
                                    $class = 'danger';
                                    $icon = 'history';
                                    break;                                
                                default:
                                    $class = 'info';
                                    $icon = 'plus-circle';
                                    break;
                            }
                        ?>
                        <div class="alert alert-<?php echo e($class); ?> alert-dismissible"> 
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-fw fa-times-circle"></i></button>
                            <h5><?php echo e(session('update')['status']); ?></h5>
                            <i class="fa fa-fw fa-<?php echo e($icon); ?>"></i> El estado de esta transaccion es <?php echo e(session('update')['status']); ?>.
                            <div style="margin-bottom: 1em;">
                                Esta es la razon:  <?php echo e(session('update')['message']); ?>

                            </div> 
                        </div>    
                    <?php endif; ?>                                                            
                    <div class="card">
                        <div class="card-header bg-gradient-orange">
                            <h3 class="card-title"><i class="icon fas fa-receipt"></i> Detalle de la Orden</h3>
                        </div>                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <i class="fa fa-fw fa-tags"></i> <label>Cantidad:</label>
                                        <span class="text-orange"><?php echo e($order->quantity); ?></span>
                                    </div>                                
                                </div>    
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <i class="fa fa-fw fa-dollar-sign"></i> <label>Total:</label>
                                        <span class="text-orange"><?php echo e($order->total_format); ?></span>
                                    </div>                                
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <i class="fa fa-fw fa-eye"></i> <label>Estado:</label>
                                        <span class="text-orange"><?php echo e($order->status); ?></span>
                                    </div>                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <i class="fa fa-fw fa-calendar-plus"></i> <label>Creada:</label>
                                        <span class="text-orange"><?php echo e($order->created_at); ?></span>
                                    </div>                                
                                </div>    
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <i class="fa fa-fw fa-calendar-check"></i> <label>Actualizada:</label>
                                        <span class="text-orange"><?php echo e($order->updated_at); ?></span>
                                    </div>                                
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <i class="fa fa-fw fa-calendar-minus"></i> <label>Eliminada:</label>
                                        <span class="text-orange"><?php echo e($order->deleted_at); ?></span>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a class="btn bg-secondary" href="<?php echo e(route('orders.index')); ?>">
                                <i class="fas fa-chevron-circle-left"></i> Volver
                            </a>
                            <?php if(!$viewAny): ?>
                                <?php switch($order->status):
                                    case ("CREATED"): ?>
                                        <?php if($order->transactions->count() == 0 || $order->transactions->first()->current_status != "PENDING"): ?>
                                            <a href="<?php echo e(route('orders.pay',["order" => $order->id])); ?>" class="btn bg-warning float-right">
                                                <i class="fa fa-fw fa-credit-card"></i> Pagar
                                            </a>
                                        <?php else: ?>
                                            <div class="alert alert-warning float-right">
                                                <h5><i class="icon fas fa-exclamation-triangle"></i> Esta orden tiene una transaccion pendientes, hasta que no se resuelva este no se puede realizar otro intento de pago.</h5>
                                            </div>                                            
                                        <?php endif; ?>                                        
                                        <?php break; ?>
                                    <?php case ("PAYED"): ?>
                                        <div class="alert alert-success float-right">
                                            <h5><i class="icon fas fa-thumbs-up"></i> Esta orden ya se encuentra pagada.</h5>
                                        </div>
                                        <?php break; ?>
                                    <?php default: ?>
                                        <div class="alert alert-danger float-right">
                                            <h5><i class="icon fas fa-ban"></i> Esta orden ya no puede ser pagada.</h5>
                                        </div>
                                <?php endswitch; ?>
                            <?php endif; ?>
                        </div>                        
                    </div>
                    <div class="card">
                        <div class="card-header bg-gradient-olive">
                            <h3 class="card-title"><i class="icon fas fa-file-invoice-dollar"></i> Transacciones</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>                            
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="tbl_transactions" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Estado</th>
                                                <th>Referencia</th>
                                                <th>Creado</th>
                                                <th>Actualizado</th>
                                                <th>Eliminado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $order->transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <?php echo e($transaction->current_status); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($transaction->reference); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($transaction->created_at); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($transaction->updated_at); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($transaction->deleted_at); ?>

                                                    </td>                                                    
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tbl_transactions').DataTable({
                "processing": true,                
                "columnDefs": [ 
                    {
                        "className": "text-center", 
                        "targets": "_all"
                    },                    
                ],
                "order": [2, "desc"],
                "scrollX": true,
                "bPaginate": true,
                "bLengthChange": true,
                "bFilter": true,
                "bInfo": true,
                "bAutoWidth": true,                
            });
        });        
    </script>    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\hecto\OneDrive\Escritorio\evertec\resources\views/web/orders/view.blade.php ENDPATH**/ ?>