<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="/css/easy-autocomplete.css"> 
    <link rel="stylesheet" href="/css/easy-autocomplete.themes.css"> 
@endsecti

<?php $__env->startSection('content'); ?>

<div class="box">
    
    <div class="box-body">      
      <a class="btn btn-app" href="<?php echo e(URL::to('rencontre')); ?>">
        <i class="fa  fa-list"></i> Liste des rencontres
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
              <h3 class="box-title">Modifier une rencontre rencontre</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo Form::model($rencontre, ['method' => 'PATCH','route' => ['rencontre.update', $rencontre->id]]); ?>

              <div class="box-body">
                <div class="form-group">
                    <?php echo Form::label('date_rencontre', 'Date rencontre'); ?>                  
                    <?php echo Form::date('date_rencontre', date('Y-m-d', strtotime($rencontre->date_rencontre)), array('class' => 'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('accueillant_id', 'Email de l\'accueillant'); ?>       
                    <?php echo Form::select('acceuillant_id', $accueillantSelect, $rencontre->acceuillant_id, ['class' => 'form-control']); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('accueilli_id', 'Email de l\'accueilli'); ?>       
                    <?php echo Form::select('accueilli_id', $accueilliSelect, $rencontre->accueilli_id, ['class' => 'form-control']); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('lieu_rencontre', 'Lieu du rencontre'); ?>                  
                    <?php echo Form::text('lieu_rencontre', null, array('class' => 'form-control')); ?>

                </div>
              
                <div class="form-group">
                    <?php echo Form::label('ville_id', 'Ville'); ?>       
                                                                                                                        
                         <input class="input-signtype" name="ville_text"  value="<?php echo e($rencontre->ville != null ? $rencontre->ville->nom : ''); ?>" 
                            id="ville_autocomplete" type="text" placeholder="Ville" required="">
                             <input name="ville_id" type="hidden" id="ville_id" value="<?php echo e($rencontre->ville_id); ?>"/>
                    
                </div>
                <div class="form-group">
                    <?php echo Form::label('etat', 'Etat de la rencontre'); ?>                  
                    <?php echo Form::select('etat', ['ENCOURS' => 'En cours', 'OK' => 'Accueilli', 'KO' => 'Annulé'], null, array('class' => 'form-control')); ?>

                </div> 

                <div class="form-group">
                    <?php echo Form::label('gps_x', 'Coordonnées X du gps (format google DD) '); ?>                  
                    <?php echo Form::text('gps_x', null, array('class' => 'form-control')); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('gps_y', 'Coordonnées Y du gps (format google DD) '); ?>                  
                    <?php echo Form::text('gps_y', null, array('class' => 'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('commentaire', 'Commentaire'); ?>                  
                    <?php echo Form::textarea('commentaire', null, array('class' => 'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('is_accueilli', 'Utilisateur accueilli ?'); ?><br>                                      
                    
                    <?php echo e(Form::radio('is_accueilli', '1', ($rencontre->is_accueilli == '1'))); ?> Oui 
                    &nbsp;&nbsp; <?php echo e(Form::radio('is_accueilli', '0', ($rencontre->is_accueilli == '0'))); ?> Non
                </div>

                <div class="form-group">
                    <?php echo Form::label('note', 'Note /10 sur la qualité de l\accueil'); ?>                  
                    <?php echo Form::text('note', null, array('class' => 'form-control')); ?>


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


        $('div.easy-autocomplete').css('width', '100%');
        $('input.input-signtype').css('width', '100%');
        //$('div.easy-autocomplete').css('line-height', '40px');

        
        </script>       

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>