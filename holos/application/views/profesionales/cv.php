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
                <div class="widget red">
                    <div class="widget-title">
                        <h4>
                            <i class="icon-tasks"></i> Profesional
                        </h4>
                        <span class="tools">
                            <a class="icon-chevron-down" href="javascript:;"></a>
                            <a class="icon-remove" href="javascript:;"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Nombre</label>
                                <div class="controls">
                                    <input type="text" class="small" value="<?=$profesional['nombre']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Apellido</label>
                                <div class="controls">
                                    <input type="text" class="small" value="<?=$profesional['apellido']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">CUIT</label>
                                <div class="controls">
                                    <input type="text" class="small" value="<?=$profesional['cuit']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Condición ante el IVA</label>
                                <div class="controls">
                                    <input type="text" class="small" value="<?=$condicioniva['condicion']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">IIBB</label>
                                <div class="controls">
                                    <input type="text" class="small" value="<?=$profesional['iibb']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Profesión</label>
                                <div class="controls">
                                    <?php foreach($profesiones as $profesion) { ?>
                                    <input type="text" class="small" value="<?=$profesion['profesion']?>" readonly>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Especialización</label>
                                <div class="controls">
                                    <?php foreach($especializaciones as $especializacion) { ?>
                                    <input type="text" class="small" value="<?=$especializacion['especializacion']?>" readonly>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Categoría</label>
                                <div class="controls">
                                    <?php foreach($categorias as $categoria) { ?>
                                    <input type="text" class="small" value="<?=$categoria['categoria']?>" readonly>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Dirección del Consultorio</label>
                                <div class="controls">
                                    <input type="text" class="small" value="<?=$profesional['direccion']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Zona</label>
                                <div class="controls">
                                    <input type="text" class="small" value="<?=$zona['zona']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Subzona</label>
                                <div class="controls">
                                    <input type="text" class="small" value="<?=$subzona['subzona']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Dirección alternativa</label>
                                <div class="controls">
                                    <input type="text" class="small" value="<?=$profesional['direccion2']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Zona alternativa</label>
                                <div class="controls">
                                    <input type="text" class="small" value="<?=$zona2['zona']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Subzona alternativa</label>
                                <div class="controls">
                                    <input type="text" class="small" value="<?=$subzona2['subzona']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Teléfono</label>
                                <div class="controls">
                                    <input type="text" class="small" value="<?=$profesional['telefono']?>" readonly>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" class="small" value="<?=$profesional['email']?>" readonly>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>