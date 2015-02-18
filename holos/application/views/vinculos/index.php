<?php switch ($session['tipo_usuario']) {
    case '2': ?>
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
                            <i class="icon-resize-small"></i> Vínculos
                        </h4>
                        <span class="tools">
                            <a class="icon-chevron-down" href="javascript:;"></a>
                            <a class="icon-remove" href="javascript:;"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-condensed table-bordered table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>Paciente</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($vinculos as $vinculo) { ?>
                                <tr>
                                    <td><?=$vinculo['nombre']?> <?=$vinculo['apellido']?></td>
                                    <td><?=date("d/m/Y", strtotime($vinculo['fecha']))?></td>
                                    <td><?=substr($vinculo['fecha'], 10, 9)?></td>
                                    <td><?=$vinculo['estado']?></td>
                                    <td>
                                        <?php if($vinculo['estado']=='Disponible') { ?>
                                        <a href="/vinculos/asignar/<?=$vinculo['idconsulta']?>/<?=$vinculo['idusuario']?>/">
                                            <button class="btn btn-success btn-small">
                                                <i class="icon-check"></i> Aceptar Vínculo
                                            </button>
                                        </a>
                                        <?php } else { ?>
                                        <label class="label <?=($vinculo['idusuario']==$vinculo['asignado']['idusuario'])?"label-success":"label-important"?>">
                                            Turno asignado a <?=$vinculo['asignado']['nombre']?> <?=$vinculo['asignado']['apellido']?>
                                        </label>
                                        <?php } ?>
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
<?php 
        break;
    case '3':
?>
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
                            <i class="icon-resize-small"></i> Vínculos
                        </h4>
                        <span class="tools">
                            <a class="icon-chevron-down" href="javascript:;"></a>
                            <a class="icon-remove" href="javascript:;"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-bordered table-condensed table-hover" id="sample_1">
                            <thead>
                                <tr>
                                    <th>Profesional</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($vinculos as $vinculo) { ?>
                                <tr>
                                    <td><a href="/profesionales/cv/<?=$vinculo['idusuario']?>/"><?=$vinculo['nombre']?> <?=$vinculo['apellido']?></a></td>
                                    <td><?=date("d/m/Y", strtotime($vinculo['fecha']))?></td>
                                    <td><?=substr($vinculo['fecha'], 10, 9)?></td>
                                    <td><a href="/consultas/crear/<?=$vinculo['idconsulta']?>/"><?=$vinculo['asignado']['estado']?></a></td>
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
<?php
        break;
}
?>