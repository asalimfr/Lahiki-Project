<?php $__env->startSection('style'); ?>
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<div class="box">
    
<div class="box-body">      
  <a class="btn btn-app" href="<?php echo e(URL::to('departement')); ?>">
    <i class="fa  fa-list"></i> Liste des départements
  </a>

  <a class="btn btn-app" href="<?php echo e(URL::to('departement/create')); ?>">
    <i class="fa fa-edit"></i> Ajouter un nouveau département
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





   <!-- general form elements disabled -->
  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Fiche du département</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Identifiant :</strong>
                <?php echo e($departement->id); ?>

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom du departement:</strong>
                <?php echo e($departement->nom); ?>

            </div>

            <div class="form-group">
                <strong>Pays du departement:</strong>
                <?php echo e($departement->pays->nom); ?>

            </div>
        </div>
           
          

        <div class="col-sm-3">
          
             <button type="button" class="btn btn-danger pull-right btn-block btn-sm" 
             data-toggle="modal" data-target="#modal-danger">Supprimer</button>
        </div>

       




          
       
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

  <div class="modal modal-danger fade" id="modal-danger">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Attention ! </h4>
      </div>
      <div class="modal-body">
        <p>Voulez-vous supprimer ce département ? &hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>      
        
          <?php echo Form::open(['method' => 'DELETE','route' => ['departement.destroy', $departement->id]]); ?>

            <?php echo Form::submit('Supprimer ce département', ['class' => 'btn btn-outline']); ?>

            <?php echo Form::close(); ?>

              

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  </div>
<!-- /.modal -->



<?php $__env->stopSection(); ?>



<?php $__env->startSection('jsscript'); ?>

<!-- page script -->
<script>





</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>