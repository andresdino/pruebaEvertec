<?php $__env->startSection('title', __('page.home.title')); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="m-0 text-dark"><i class="icon fas fa-copy"></i> Ordenes</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <div class="card-header bg-gradient-orange">
                            <h3 class="card-title"><i class="icon fas fa-clone"></i> Ordenes</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="tbl_orders" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <?php if($viewAny): ?>
                                                    <th>Usuario</th>
                                                <?php endif; ?>
                                                <th>Estado</th>
                                                <th>Cantidad</th>
                                                <th>Total</th>
                                                <th>Creado</th>
                                                <th>Actualizado</th>
                                                <th>Eliminado</th>
                                                <th>Acciones <i class="icon fas fa-toolbox"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <?php echo e($order->id); ?>

                                                    </td>
                                                    <?php if($viewAny): ?>
                                                        <td>
                                                            <?php echo e($order->name_user); ?>

                                                        </td>
                                                    <?php endif; ?>
                                                    <td>
                                                        <?php echo e($order->status); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($order->quantity); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($order->total_format); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($order->created_at); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($order->updated_at); ?>

                                                    </td>
                                                    <td>
                                                        <?php echo e($order->deleted_at); ?>

                                                    </td>                                                    
                                                    <td>
                                                        <a class="btn bg-warning" target="_blank" href="<?php echo e(route('orders.show', ["order" => $order->id])); ?>">
                                                            <i class="fas fa-eye"></i> Ver
                                                        </a>
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
            $('#tbl_orders').DataTable({
                "processing": true,                
                "columnDefs": [ 
                    {
                        "className": "text-center", 
                        "targets": "_all"
                    },
                    {
                        "targets": [ 7 ],
                        "orderable": false,
                    },                    
                ],
                "order": [0,"desc"],
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\evertec\resources\views/web/orders/list.blade.php ENDPATH**/ ?>