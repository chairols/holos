<div id="main-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3 class="page-title">
                    <?=$title?>
                </h3>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span12">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4>
                            <i class="icon-tasks"></i> Profesionales Existentes
                        </h4>
                        <span class="tools">
                            <a class="icon-chevron-down" href="javascript:;"></a>
                            <a class="icon-remove" href="javascript:;"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-striped table-bordered table-advance table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th><i class="icon-user"></i> Profesional</th>
                                    <th><i class="icon-user-md"></i> Profesión</th>
                                    <th><i class="icon-paper-clip"></i> Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($profesionales as $profesional) { ?>
                                <tr>
                                    <td><?=$profesional['nombre']?> <?=$profesional['apellido']?></td>
                                    <td>
                                        <?php foreach($profesional['profesiones'] as $profesion) { ?>
                                        <?=$profesion['profesion']?> 
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a class="btn dropdown-toggle element" data-placement="top" data-toggle="tooltip" href="/profesionales/cv/<?=$profesional['idusuario']?>/" data-original-title="Ver CV">
                                            <i class="icon-user-md"></i>
                                        </a>
                                        <a class="btn dropdown-toggle element" data-placement="top" data-toggle="tooltip" href="/profesionales/agenda/<?=$profesional['idusuario']?>/" data-original-title="Agenda">
                                            <i class="icon-calendar"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>