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
                    <div class="widget-title hidden-print">
                        <h4>
                            <i class="icon-list"></i> Listado
                        </h4>
                        <span class="tools">
                            <a class="icon-chevron-down" href="javascript:;"></a>
                            <a class="icon-remove" href="javascript:;"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <div class="row-fluid invoice-list">
                            <div class="span4">
                                <h4>Profesional</h4>
                                <ul class="unstyled">
                                    <li><?=$usuario['nombre']?> <?=$usuario['apellido']?></li>
                                </ul>
                            </div>
                            <div class="span4 pull-right">
                                <h4>Período</h4>
                                <ul class="unstyled">
                                    <li><?=$periodo?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="space20"></div>
                        <div class="row-fluid">
                            <table class="table table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Paciente</th>
                                        <th>Categoría</th>
                                        <th>Honorario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0; ?>
                                    <?php foreach($liquidacion as $liq) { ?>
                                    <tr>
                                        <td><?=substr($liq['fecha'], 8, 2)?>/<?=substr($liq['fecha'], 5, 2)?>/<?=substr($liq['fecha'], 0, 4)?></td>
                                        <td><?=substr($liq['fecha'], 11, 5)?></td>
                                        <td><?=$liq['nombre']?> <?=$liq['apellido']?></td>
                                        <td><?=$liq['categoria']?></td>
                                        <td>$ <?=number_format($liq['honorario'], 2)?></td>
                                    </tr>
                                    <?php $total += $liq['honorario']; ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="space20"></div>
                        <div class="row-fluid">
                            <div class="span4 invoice-block pull-right">
                                <ul class="unstyled amounts">
                                    <li><strong>Total : </strong>$ <?=number_format($total, 2)?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="space20"></div>
                        <div class="row-fluid text-center">
                            <a class="btn btn-inverse btn-large hidden-print" onclick="javascript:window.print();">Imprimir <i class="icon-print"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>