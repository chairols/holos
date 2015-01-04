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
            <?php if(strlen(validation_errors())) { ?>
            <div class="span12">
                <div class="widget red">
                    <div class="widget-title">
                        <h4>
                            <i class="icon-exclamation-sign"></i> Alerta
                        </h4>
                        <span class="tools">
                            <a class="icon-chevron-down" href="javascript:;"></a>
                            <a class="icon-remove" href="javascript:;"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <?=validation_errors('<div class="alert alert-error">', '</div>')?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4>
                            <i class="icon-resize-small"></i> Vínculo
                        </h4>
                        <span class="tools">
                            <a class="icon-chevron-down" href="javascript:;"></a>
                            <a class="icon-remove" href="javascript:;"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">Texto</label>
                                <div class="controls">
                                    <textarea rows="3" name="texto" class="span12" required autofocus></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Archivo adjunto</label>
                                <div class="controls">
                                    <input type="file" name="adjunto">
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"><i class="icon-save"></i> Guardar</button>
                                <button type="reset" class="btn btn-danger"><i class="icon-remove"></i> Borrar</button>
                            </div>
                        </form>
                        <div class="control-group">
                            <hr>
                        </div>
                        <table class="table table-hover table-advance table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Texto</th>
                                    <th>Adjunto</th>
                                    <th>Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($respuestas as $respuesta) { ?>
                                <tr>
                                    <td>
                                        <?php if($respuesta['idtipo_usuario'] == '2') { ?>
                                        <span class="label label-important label-mini">
                                            <?=$respuesta['nombre']?> <?=$respuesta['apellido']?>
                                        </span>
                                        <?php } ?>
                                        
                                        <?php if($respuesta['idtipo_usuario'] == '3') { ?>
                                        <span class="label label-success label-mini">
                                            <?=$respuesta['nombre']?> <?=$respuesta['apellido']?>
                                        </span>
                                        <?php } ?>
                                    </td>
                                    <td><?=$respuesta['texto']?></td>
                                    <td>
                                        <?php if($respuesta['adjunto'] == '') { ?>
                                        No hay adjunto
                                        <?php } else { ?>
                                        <a href="<?=$respuesta['adjunto']?>" target="_blank"><i class="icon-file-alt"></i> Ver adjunto</a>
                                        <?php } ?>
                                    </td>
                                    <td><?=date('d-m-Y H:i:s', strtotime($respuesta['timestamp']))?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="widget blue">
                    <div class="widget-title">
                        <h4>
                            <i class="icon-resize-small"></i> Vínculos Existentes
                        </h4>
                        <span class="tools">
                            <a class="icon-chevron-down" href="javascript:;"></a>
                            <a class="icon-remove" href="javascript:;"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>