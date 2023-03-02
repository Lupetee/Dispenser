<?php $__env->startSection('content-header', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
		<!-- -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                  <h3><?php echo e($products_count); ?></h3>
                <p>Total Products</p>
              </div>
              <div class="icon">
              <i class="fas fa-dolly-flatbed"></i>
              </div>
              <a href="<?php echo e(route('products.index')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                  <h3><?php echo e($orders_count); ?></h3>
                <p>Orders Count</p>
              </div>
              <div class="icon">
              <i class="fas fa-chart-line"></i>
              </div>
              <a href="<?php echo e(route('orders.index')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        
    </div>

    <div class="row"><!-- -->
   
          <!-- ./col -->

      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo e($customers_count); ?></h3>

            <p>Total Patients</p>
          </div>
          <div class="icon">
          <i class="fas fa-users"></i>
          </div>
          <a href="<?php echo e(route('customers.index')); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
</div><!-- -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\P102JOPH1\Desktop\Thesiis\POS-Laravel\resources\views/home.blade.php ENDPATH**/ ?>