    <!-- BEGIN CONTAINER -->
    <div id="container" class="row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar-scroll">
        <div id="sidebar" class="nav-collapse collapse">

         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
               <input type="text" class="search-query" placeholder="Search" />
            </form>
         </div>
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->
          <ul class="sidebar-menu">
              <?php if($session['tipo_usuario'] == '1') { ?>
              <li class="sub-menu<?=($active=='dashboard')?" active":""?>">
                  <a class="" href="/dashboard/">
                      <i class="icon-dashboard"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <li class="sub-menu<?=($active=='categorias'||$active=='consultantes'||$active=='especializaciones'||$active=='profesionales'||$active=='profesiones')?" active":""?>">
                  <a href="javascript:;" class="">
                      <i class="icon-gears"></i>
                      <span>Administrar</span>
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li<?=($active=='categorias')?" class='active'":""?>><a class="" href="/categorias/">Categorías</a></li>
                      <li<?=($active=='consultantes')?" class='active'":""?>><a class="" href="/consultantes/">Consultantes</a></li>
                      <li<?=($active=='especializaciones')?" class='active'":""?>><a class="" href="/especializaciones/">Especializaciones</a></li>
                      <li<?=($active=='profesionales')?" class='active'":""?>><a class="" href="/profesionales/">Profesionales</a></li>
                      <li<?=($active=='profesiones')?" class='active'":""?>><a class="" href="/profesiones/">Profesiones</a></li>
                  </ul>
              </li>
              <?php } ?>
              <?php if($session['tipo_usuario'] == '2') { ?>
              <li class="sub-menu<?=($active=='dashboard')?" active":""?>">
                  <a class="" href="/dashboard/">
                      <i class="icon-dashboard"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <li class="sub-menu<?=($active=='perfil')?" active":""?>">
                  <a href="/usuarios/perfil/" class="">
                      <i class="icon-user-md"></i>
                      <span>Gestionar CV</span>
                  </a>
              </li>
              <li class="sub-menu<?=($active=='frecuencia')?" active":""?>">
                  <a class="" href="/consultas/frecuencia/">
                      <i class="icon-list"></i>
                      <span>Consultas</span>
                  </a>
              </li>
              
              <?php } ?>
              <?php if($session['tipo_usuario'] == '3') { ?>
              <li class="sub-menu<?=($active=='dashboard')?" active":""?>">
                  <a class="" href="/dashboard/">
                      <i class="icon-dashboard"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <li class="sub-menu<?=($active=='cartilla')?" active":""?>">
                  <a class="" href="/profesionales/cartilla/">
                      <i class="icon-user-md"></i>
                      <span>Cartilla</span>
                  </a>
              </li>
              <li class="sub-menu<?=($active=='vinculos')?" active":""?>">
                  <a class="" href="/profesionales/vinculos/">
                      <i class="icon-resize-small"></i>
                      <span>Vínculos</span>
                  </a>
              </li>
              <?php } ?>
          </ul>
         <!-- END SIDEBAR MENU -->
      </div>
    </div>
    <!-- END SIDEBAR -->
