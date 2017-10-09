<?php $__env->startSection('content'); ?>




<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>Admin</b>LAHIKI.net</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Connectez-vous avec vos identifiants</p>

    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('login')); ?>">
      <?php echo e(csrf_field()); ?>

      <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?> has-feedback">
        <input name="email" type="email" class="form-control" placeholder="Email" value="<?php echo e(old('email')); ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?php if($errors->has('email')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('email')); ?></strong>
            </span>
        <?php endif; ?>
      </div>
      <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?> has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Mot de passe">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php if($errors->has('password')): ?>
            <span class="help-block">
                <strong><?php echo e($errors->first('password')); ?></strong>
            </span>
        <?php endif; ?>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Se souvenir de moi
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Connexion</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>