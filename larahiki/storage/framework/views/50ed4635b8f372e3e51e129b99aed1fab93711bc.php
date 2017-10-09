<?php $__env->startSection('content'); ?>

<div class="box">
    
    <div class="box-body">      
      <a class="btn btn-app" href="<?php echo e(URL::to('user')); ?>">
        <i class="fa  fa-list"></i> Liste des administrateurs
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
    <h3 class="box-title">Ajouter un nouvel administrateur</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  
    <form role="form" method="POST" action="<?php echo e(route('user.store')); ?>">
      <?php echo e(csrf_field()); ?>


      

      <div class="box-body">
        <div class="form-group">
            <?php echo Form::label('nom', 'Nom'); ?>                  
            <?php echo Form::text('name', old('name'), array('class' => 'form-control', 'required')); ?>

            <?php if($errors->has('name')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('name')); ?></strong>
                </span>
            <?php endif; ?>
        </div>   

        <div class="form-group">
            <?php echo Form::label('email', 'Email'); ?>                  
            <?php echo Form::text('email', old('email'), array('class' => 'form-control', 'required')); ?>

            <?php if($errors->has('email')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('email')); ?></strong>
                  </span>
              <?php endif; ?>
        </div>   

        <div class="form-group">
          
            <label for="password">Mot de passe</label>
            <input name="password" type="password" class="form-control" id="password" required>
         

            <?php if($errors->has('password')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
            <?php endif; ?>
        </div>   

        <div class="form-group">
          
            <label for="password_confirmation">Confirmation du mot de passe</label>
            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" required>
          
        </div>
      </div>
      <div class="box-footer">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
  </form>
</div>
<!-- /.box -->



<?php $__env->stopSection(); ?>


<?php $__env->startSection('jsscript'); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>