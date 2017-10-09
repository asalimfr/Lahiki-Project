<?php $__env->startSection('content'); ?>

<div class="box">
    
    <div class="box-body">      
      <a class="btn btn-app" href="<?php echo e(URL::to('pays')); ?>">
        <i class="fa  fa-list"></i> Liste des pays
      </a>
      
    </div>
    <!-- /.box-body -->
</div>
    <!-- /.box -->

    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <strong>Oops!</strong> Il y'a des erreurs de saisie<br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

<?php if($message = Session::get('success')): ?>
  <div class="alert alert-success">
    <p><?php echo e($message); ?></p>
  </div>
<?php endif; ?>


<!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ajouter un nouveau pays</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo Form::open(array('route' => 'pays.store','method'=>'POST')); ?>

              <div class="box-body">
                <div class="form-group">
                    <?php echo Form::label('nom', 'Nom du pays'); ?>                  
                    <?php echo Form::text('nom', null, array('class' => 'form-control')); ?>

                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
              </div>
            <?php echo Form::close(); ?>

          </div>
          <!-- /.box -->



<?php $__env->stopSection(); ?>


<?php $__env->startSection('jsscript'); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>