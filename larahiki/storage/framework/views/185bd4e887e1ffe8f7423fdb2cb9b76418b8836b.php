<?php if(Auth::check()): ?>
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/adminlte/dist/img/avatar.png" class="img-circle" alt="">
        </div>
        <div class="pull-left info">
          <p><?php echo e(Auth::user()->name); ?></p>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU PRINCIPAL</li>
        

        <li>
          <a href="<?php echo e(URL::to('home')); ?>">
            <i class="fa  fa-pie-chart"></i> <span>Tableaux de bord</span>            
          </a>
        </li>

        <li>
          <a href="<?php echo e(URL::to('rencontre')); ?>">
            <i class="fa fa-compress"></i> <span>Rencontres</span>            
          </a>
        </li>

        <li>
          <a href="<?php echo e(URL::to('utilisateur')); ?>">
            <i class="fa fa-users"></i> <span>Utilisateurs</span>            
          </a>
        </li>

        <li>
          <a href="<?php echo e(URL::to('actualite')); ?>">
            <i class="fa fa-newspaper-o"></i> <span>Actualités</span>            
          </a>
        </li>

        <li>
          <a href="<?php echo e(URL::to('mediatheque')); ?>">
            <i class="fa fa-film"></i> <span>Médias</span>            
          </a>
        </li>

        <li>


          <a href="<?php echo e(URL::to('pays')); ?>">
            <i class="fa fa-globe"></i> <span>Pays</span>            
          </a>
        </li>

        <li>
          <a href="<?php echo e(URL::to('departement')); ?>">
            <i class="fa fa-cubes"></i> <span>Départements</span>            
          </a>
        </li>

        <li>
          <a href="<?php echo e(URL::to('ville')); ?>">
            <i class="fa  fa-building"></i> <span>Villes</span>            
          </a>
        </li> 
        <li>
          <a href="<?php echo e(URL::to('user')); ?>">
            <i class="fa fa-key"></i> <span>Administrateurs</span>            
          </a>
        </li>      


      </ul>
    </section>
    <!-- /.sidebar -->

    <?php endif; ?>
