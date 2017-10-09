<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="/css/easy-autocomplete.css"> 
    <link rel="stylesheet" href="/css/easy-autocomplete.themes.css"> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="box">
    
    <div class="box-body">      
      <a class="btn btn-app" href="<?php echo e(URL::to('utilisateur')); ?>">
        <i class="fa  fa-list"></i> Liste des utilisateurs
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
              <h3 class="box-title">Modifier un utilisateur</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo Form::model($utilisateur, ['method' => 'PATCH','route' => ['utilisateur.update', $utilisateur->id]]); ?>

              <div class="box-body">
                <div class="form-group">
                    <?php echo Form::label('nom', 'Nom de l\'utilisateur'); ?>                  
                    <?php echo Form::text('nom', null, array('class' => 'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('prenom', 'Prénom'); ?>                  
                    <?php echo Form::text('prenom', null, array('class' => 'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('email', 'Mail'); ?>                  
                    <?php echo Form::text('email', null, array('class' => 'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('password', 'Mot de passe'); ?>                  
                    <?php echo Form::text('password', null, array('class' => 'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('avatar', 'Avatar'); ?>                  
                    <?php echo Form::text('avatar', null, array('class' => 'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('adresse', 'Adresse'); ?>                  
                    <?php echo Form::text('adresse', null, array('class' => 'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('ville_id', 'Ville'); ?>       
                                                                                                                        
                         <input class="input-signtype" name="ville_text"  value="<?php echo e($utilisateur->ville != null ? $utilisateur->ville->nom : ''); ?>" 
                            id="ville_autocomplete" type="text" placeholder="Ville" required="">
                             <input name="ville_id" type="hidden" id="ville_id" value="<?php echo e($utilisateur->ville_id); ?>"/>
                    
                </div>
                <div class="form-group">
                    <?php echo Form::label('etablissement_id', 'Etablissement'); ?>       
                    
                                                                                                                     
                         <input class="input-signtype" name="etablissement_text"  value="<?php echo e($utilisateur->etablissement != null ? $utilisateur->etablissement->nom : ''); ?>" 
                            id="etablissement_autocomplete" type="text" placeholder="Etablissement">
                             <input name="etablissement_id" type="hidden" id="etablissement_id" value="<?php echo e($utilisateur->etablissement != null ? $utilisateur->etablissement_id : ''); ?>"/>
                                                 
                </div>
                <div class="form-group">
                    <?php echo Form::label('tel_fixe', 'Téléphone fixe'); ?>                  
                    <?php echo Form::text('tel_fixe', null, array('class' => 'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('tel_portable', 'Téléphone portable'); ?>                  
                    <?php echo Form::text('tel_portable', null, array('class' => 'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('is_accueilleur', 'Peut auccueillir'); ?><br>                                                          
                    <?php echo e(Form::radio('is_accueilleur', '1', ($utilisateur->is_accueilleur == '1'))); ?> Oui &nbsp;&nbsp; <?php echo e(Form::radio('is_accueilleur', '0', ($utilisateur->is_accueilleur == '0'))); ?> Non
              
                </div>

                <div class="form-group">
                    <?php echo Form::label('apropos', 'A propos'); ?>                  
                    <?php echo Form::textarea('apropos', null, array('class' => 'form-control', )); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('nb_vues', 'Nombre de vues'); ?>                  
                    <?php echo Form::text('nb_vues', null, array('class' => 'form-control')); ?>

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

    <script src="/js/jquery.easy-autocomplete.min.js"></script> 




       <script>

        // <?php echo e(URL::to('search/autocompleteVille')); ?>

        var options = {

          url: function(phrase) {
            return "<?php echo e(URL::to('search/autocompleteVille')); ?>";
          },

          getValue: function(element) {
            return element.name;
          },

          ajaxSettings: {
            dataType: "json",
            method: "GET",
            data: {
              dataType: "json"
            }
          },

          preparePostData: function(data) {
            data.phrase = $("#ville_autocomplete").val();
            return data;
          },

          list: {

                onSelectItemEvent: function() {
                    var value = $("#ville_autocomplete").getSelectedItemData().id;
                    $("#ville_id").val(value).trigger("change");
                },
                maxNumberOfElements: 100,
                match: {
                    enabled: true
                }
            },
          
          //theme: "plate-dark",




          requestDelay: 400
        };
        $("#ville_autocomplete").easyAutocomplete(options);


        // <?php echo e(URL::to('search/autocompleteVille')); ?>

        var options2 = {

          url: function(phrase) {
            return "<?php echo e(URL::to('search/autocompleteEtablissement')); ?>";
          },

          getValue: function(element) {
            return element.name;
          },

          ajaxSettings: {
            dataType: "json",
            method: "GET",
            data: {
              dataType: "json"
            }
          },

          preparePostData: function(data) {
            data.phrase = $("#etablissement_autocomplete").val();
            return data;
          },

          list: {

                onSelectItemEvent: function() {
                    var value = $("#etablissement_autocomplete").getSelectedItemData().id;
                    $("#etablissement_id").val(value).trigger("change");
                },
                maxNumberOfElements: 100,
                match: {
                    enabled: true
                }
            },
          
          //theme: "plate-dark",


          requestDelay: 400
        };
        $("#etablissement_autocomplete").easyAutocomplete(options2);





        $('div.easy-autocomplete').css('width', '100%');
        $('input.input-signtype').css('width', '100%');
        //$('div.easy-autocomplete').css('line-height', '40px');

        
        </script>       
    
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>