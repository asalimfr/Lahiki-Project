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
  <a class="btn btn-app" href="<?php echo e(URL::to('rencontre')); ?>">
    <i class="fa  fa-list"></i> Liste des rencontres
  </a>

  <a class="btn btn-app" href="<?php echo e(URL::to('rencontre/create')); ?>">
    <i class="fa fa-edit"></i> Ajouter une nouvelle rencontre
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
      <h3 class="box-title">Fiche de la rencontre</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Identifiant :</strong>
                <?php echo e($rencontre->id); ?>

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date de la rencontre : </strong>
                <?php echo e(date('d/m/Y', strtotime($rencontre->date_rencontre))); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Accueillant : </strong>
                <?php echo e($rencontre->accueillant->email); ?> - <?php echo e($rencontre->accueillant->nom); ?> <?php echo e($rencontre->accueillant->prenom); ?>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Accueilli : </strong>
                <?php echo e($rencontre->accueilli->email); ?> - <?php echo e($rencontre->accueilli->nom); ?> <?php echo e($rencontre->accueilli->prenom); ?>

            </div>
        </div>
      
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lieu :</strong>
                <?php echo e($rencontre->lieu_rencontre); ?>

            </div>
        </div>
      
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ville :</strong>
                <?php echo e($rencontre->ville->nom); ?>

            </div>
        </div>
      
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>GPS X :</strong>
                <?php echo e($rencontre->gps_x); ?>

            </div>
        </div>
      
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>GPS Y :</strong>
                <?php echo e($rencontre->gps_y); ?>

            </div>
        </div>
      
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Commentaire :</strong>
                <?php echo e($rencontre->commentaire); ?>

            </div>
        </div>
      
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Utilisateur accueilli ? :</strong>
                 <?php echo e(($rencontre->is_accueilli == '1' ? 'Oui' : 'Non')); ?>

            </div>
        </div>
      
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Note :</strong>
                <?php echo e($rencontre->note); ?>

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
        <p>Voulez-vous supprimer cette rencontre ? &hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Annuler</button>      
        
          <?php echo Form::open(['method' => 'DELETE','route' => ['rencontre.destroy', $rencontre->id]]); ?>

            <?php echo Form::submit('Supprimer cette rencontre', ['class' => 'btn btn-outline']); ?>

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