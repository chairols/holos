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
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4>
                            <i class="icon-dollar"></i> Liquidación
                        </h4>
                        <span class="tools">
                            <a class="icon-chevron-down" href="javascript:;"></a>
                            <a class="icon-remove" href="javascript:;"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form class="form-horizontal" method="POST" action="/liquidacion/listar/">
                            <div class="control-group">
                                <label class="control-label">Profesional</label>
                                <div class="controls">
                                    <select name="profesional" data-placeholder="Seleccionar Profesional..." class="chzn-select">
                                        <?php foreach($profesionales as $profesional) { ?>
                                        <option value="<?=$profesional['idusuario']?>"><?=$profesional['nombre']?> <?=$profesional['apellido']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Fecha</label>
                                <div class="controls">
                                    <input id="reservation" name="fecha" type="text" class="m-ctrl-medium">
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"><i class="icon-list"></i> Listar</button>
                                <button type="reset" class="btn btn-danger"><i class="icon-remove"></i> Borrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>