<?php $__env->startSection('content'); ?>

<div class="box">
    
    <div class="box-body">      
      <a class="btn btn-app" href="<?php echo e(URL::to('ville')); ?>">
        <i class="fa  fa-list"></i> Liste des villes
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
              <h3 class="box-title">Modifier une ville</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <?php echo Form::model($ville, ['method' => 'PATCH','route' => ['ville.update', $ville->id]]); ?>


              <div class="box-body">
                <div class="form-group">
                    <?php echo Form::label('nom', 'Nom de la ville'); ?>                  
                    <?php echo Form::text('nom', null, array('class' => 'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('code_postal', 'Code Postal de la ville'); ?>                  
                    <?php echo Form::text('code_postal', null, array('class' => 'form-control')); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('code_departement', 'Code département de la ville'); ?>                  
                    <?php echo Form::text('code_departement', null, array('class' => 'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('gps_x', 'GPS X de la ville'); ?>                  
                    <?php echo Form::text('gps_x', null, array('class' => 'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('gps_y', 'GPS Y de la ville'); ?>                  
                    <?php echo Form::text('gps_y', null, array('class' => 'form-control')); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('photo', 'Photo de la ville'); ?>

                
                <a class="btn color-4 size-2 hover-7 be-ava-user style-2" id="lfm" data-input="thumbnail" data-preview="holder">
                    <img id="holder" src="<?php echo e(($ville->photo != null ? $ville->photo : '/img/ava_10.jpg' )); ?>" style="margin-top:15px;max-height:100px;">
                  
                  <i class="fa fa-picture-o"></i> Choisir image

                  
                  </a>
                  <input id="thumbnail" class="form-control" type="hidden" name="photo">
                

                </div>

                 <div class="form-group">
                    <?php echo Form::label('departement_id', 'Département'); ?>       
                    <?php echo Form::select('departement_id', $departementSelect, $ville->departement_id,['class' => 'form-control']); ?>

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


    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>


    <script>

    // Load image
    $('#lfm').filemanager('photos');


    </script>       
    
    


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>