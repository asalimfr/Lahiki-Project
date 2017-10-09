<?php $__env->startSection('content'); ?>

<div class="box">
    
    <div class="box-body">      
      <a class="btn btn-app" href="<?php echo e(URL::to('actualite')); ?>">
        <i class="fa  fa-list"></i> Liste des actualités
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
              <h3 class="box-title">Ajouter une nouvelle actualité</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo Form::open(array('route' => 'actualite.store','method'=>'POST')); ?>

            <input type="hidden" name="utilisateur_id" value="<?php echo e(Auth::id()); ?>"> 
              <div class="box-body">
                <div class="form-group">
                    <?php echo Form::label('titre', 'Titre'); ?>                  
                    <?php echo Form::text('titre', null, array('class' => 'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('categorie', 'Catégorie'); ?>                  
                    <?php echo Form::text('categorie', null, array('class' => 'form-control')); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('media', 'Image de l\'actualité'); ?>

                
                <a class="btn color-4 size-2 hover-7 be-ava-user style-2" id="lfm" data-input="thumbnail" data-preview="holder">
                    <img id="holder" src="/img/ava_10.jpg" style="margin-top:15px;max-height:100px;">                  
                  <i class="fa fa-picture-o"></i> Choisir image                  
                  </a>
                  <input id="thumbnail" class="form-control" type="hidden" name="media">
                </div>
                <div class="form-group">
                    <?php echo Form::label('resume', 'Résumé'); ?>                  
                    <?php echo Form::textarea('resume', null, array('class' => 'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('contenu', 'Contenu'); ?>                  
                    <?php echo Form::textarea('contenu', null, array('class' => 'form-control', )); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('date_publication', 'Date publication'); ?>                  
                    <?php echo Form::date('date_publication', null, array('class' => 'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('date_expiration', 'Date expiration'); ?>                  
                    <?php echo Form::date('date_expiration', null, array('class' => 'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('is_accueil', ' Afficher accueil'); ?><br>                                      
                    <?php echo Form::radio('is_accueil', '1', false); ?> Oui &nbsp;&nbsp; <?php echo Form::radio('is_accueil', '0', true); ?> Non
              
                </div>
                <div class="form-group">
                    <?php echo Form::label('nb_vues', 'Nombre de vues'); ?>                  
                    <?php echo Form::text('nb_vues', null, array('class' => 'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('jaime', 'Nombre de j\'aime'); ?>                  
                    <?php echo Form::text('jaime', null, array('class' => 'form-control')); ?>

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

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script>

<script>
CKEDITOR.replace('contenu', options);
</script>




    <script>

    // Load image
    $('#lfm').filemanager('photos');


    </script>  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>