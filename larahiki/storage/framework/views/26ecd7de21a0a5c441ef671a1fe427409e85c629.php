<?php $__env->startSection('content'); ?>

<div class="box">
    
    <div class="box-body">      
      <a class="btn btn-app" href="<?php echo e(URL::to('pays/create')); ?>">
        <i class="fa fa-edit"></i> Ajouter un nouveau pays
      </a>
      
    </div>
    <!-- /.box-body -->
</div>
    <!-- /.box -->

<?php if($message = Session::get('success')): ?>
  <div class="alert alert-success">
    <p><?php echo e($message); ?></p>
  </div>
<?php endif; ?>



  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Liste des pays</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="myTable" class="table table-bordered table-striped" style="border-color: 222d32;">
        <thead>
        <tr>
          <th>Identifiant</th>
          <th>Nom</th>
          <th>Actions</th>
        </tr>
        </thead>


        <tbody>
            <?php $__currentLoopData = $pays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($value->id); ?></td>
                    <td><?php echo e($value->nom); ?></td>

                   
                    <td class="text-center">

                        <a class="btn btn-small btn-success" href="<?php echo e(route('pays.show', $value->id)); ?>"> 
                           <i class="fa fa-eye"></i>  Afficher</a>
                        <a class="btn btn-small btn-info" href="<?php echo e(URL::to('pays/' . $value->id . '/edit')); ?>">
                           <i class="fa fa-edit"></i>  Modifier</a>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        <tfoot>
        <tr>
          <th>Identifiant</th>
          <th>Nom</th>
          <th>Actions</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>



<?php $__env->stopSection(); ?>


<?php $__env->startSection('jsscript'); ?>

<!-- page script -->
<script>


$( document ).ready(function() {
  // Handler for .ready() called.

  $(function () {

    $('#myTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,

      language: {
            processing:     "Traitement en cours...",
            search:         "Rechercher&nbsp;:",
            lengthMenu:     "Afficher _MENU_ &eacute;l&eacute;ments",
            info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            infoPostFix:    "",
            loadingRecords: "Chargement en cours...",
            zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
            emptyTable:     "Aucune donnée disponible dans le tableau",
            paginate: {
                first:      "Premier",
                previous:   "Pr&eacute;c&eacute;dent",
                next:       "Suivant",
                last:       "Dernier"
            },
            aria: {
                sortAscending:  ": activer pour trier la colonne par ordre croissant",
                sortDescending: ": activer pour trier la colonne par ordre décroissant"
            }
        }  

      
    });
  });
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>