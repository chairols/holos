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
                            <i class="icon-tasks"></i> Profesional Existentes
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
                                    <th><i class="icon-user-md"></i> Profesional</th>
                                    <th><i class="icon-info-sign"></i> Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($profesionales as $profesional) { ?>
                                <tr>
                                    <td><?=$profesional['nombre']?> <?=$profesional['apellido']?></td>
                                    <td>
                                        <?php if($profesional['activo'] == '1') { ?>
                                        <a href="/profesionales/activar/<?=$profesional['idusuario']?>/0/">
                                            <span class="label label-success"><i class="icon-thumbs-up"></i> ACTIVO</span>
                                        </a>
                                        <?php } else { ?>
                                        <a href="/profesionales/activar/<?=$profesional['idusuario']?>/1/">
                                            <span class="label label-important"><i class="icon-thumbs-down"></i> INACTIVO</span>
                                        </a>
                                        <?php } ?>
                                    </td>
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
                            <i class="icon-plus"></i> Agregar Profesional
                        </h4>
                        <span class="tools">
                            <a class="icon-chevron-down" href="javascript:;"></a>
                            <a class="icon-remove" href="javascript:;"></a>
                        </span>
                    </div>
                    <div class="widget-body form">
                        <form class="form-horizontal" method="post">
                            <div class="control-group">
                                <label class="control-label">Nombre</label>
                                <div class="controls">
                                    <input type="text" class="small" name="nombre" required autofocus>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Apellido</label>
                                <div class="controls">
                                    <input type="text" class="small" name="apellido" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">CUIT</label>
                                <div class="controls">
                                    <input type="text" class="small" name="cuit" maxlength="15" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Condición ante el IVA</label>
                                <div class="controls">
                                    <select name="condicioniva" data-placeholder="Seleccionar Condición ante el IVA" tabindex="6">
                                        <?php foreach($condicionesiva as $condicion) { ?>
                                        <option value="<?=$condicion['idcondicion']?>"><?=$condicion['condicion']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">IIBB</label>
                                <div class="controls">
                                    <input type="text" class="small" name="iibb" maxlength="20">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Profesión</label>
                                <div class="controls">
                                    <select name="profesiones[]" data-placeholder="Seleccionar Profesión" class="chzn-select" multiple="multiple" tabindex="6">
                                        <?php foreach($profesiones as $profesion) { ?>
                                        <option value="<?=$profesion['idprofesion']?>"><?=$profesion['profesion']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Especialización</label>
                                <div class="controls">
                                    <select name="especializaciones[]" data-placeholder="Seleccionar Especialización" class="chzn-select" multiple="multiple" tabindex="6">
                                        <?php foreach($especializaciones as $especializacion) { ?>
                                        <option value="<?=$especializacion['idespecializacion']?>"><?=$especializacion['especializacion']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Categoría</label>
                                <div class="controls">
                                    <select name="categorias[]" data-placeholder="Seleccionar Categorías" class="chzn-select" multiple="multiple" tabindex="6">
                                        <?php foreach ($categorias as $categoria) { ?>
                                        <option value="<?=$categoria['idcategoria']?>"><?=$categoria['categoria']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Dirección del Consultorio</label>
                                <div class="controls">
                                    <input type="text" class="small" name="direccion" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Zona</label>
                                <div class="controls">
                                    <select data-placeholder="Seleccione Zona" tabindex="-1" id="zona" name="zona">
                                        <?php foreach($zonas as $zona) { ?>
                                        <option value="<?=$zona['idzona']?>"><?=$zona['zona']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Subzona</label>
                                <div class="controls">
                                    <select data-placeholder="Seleccione Subzona" tabindex="-1" name="subzona" id="resultado">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Dirección alternativa</label>
                                <div class="controls">
                                    <input type="text" class="small" name="direccion2">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Zona alternativa</label>
                                <div class="controls">
                                    <select data-placeholder="Seleccione Zona" tabindex="-1" id="zona2" name="zona2">
                                        <?php foreach($zonas as $zona) { ?>
                                        <option value="<?=$zona['idzona']?>"><?=$zona['zona']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Subzona alternativa</label>
                                <div class="controls">
                                    <select data-placeholder="Seleccione Subzona" tabindex="-1" name="subzona2" id="resultado2">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Teléfono</label>
                                <div class="controls">
                                    <input type="text" class="small" name="telefono" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="email" class="small" name="email" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Contraseña</label>
                                <div class="controls">
                                    <input type="password" class="small" name="password" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Reescribir Contraseña</label>
                                <div class="controls">
                                    <input type="password" class="small" name="password2" required>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"><i class="icon-save"></i> Guardar</button>
                                <button type="reset" class="btn btn-danger"><i class="icon-remove"></i> Borrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script type="text/javascript">
    function inicio() {
        
        cambiar();
        cambiar2();
        
        $("#zona").change(function() {
            cambiar();
        });
        
        $("#zona2").change(function() {
            cambiar2();
        });
        
        $('#tags_1').tagsInput({width:'220'});
    }
    
    function cambiar() {
        $.ajax({
            type: 'GET',
            url: '/subzonas/ajax/'+$("#zona").val(),
            beforeSend: function() {
                $("#resultado").html("<img src='/assets/img/ajax-loader.gif'>");
            },
            success: function(data) {
                $("#resultado").html(data);
            }
        });
    }
    
    function cambiar2() {
        $.ajax({
            type: 'GET',
            url: '/subzonas/ajax/'+$("#zona2").val(),
            beforeSend: function() {
                $("#resultado2").html("<img src='/assets/img/ajax-loader.gif'>");
            },
            success: function(data) {
                $("#resultado2").html(data);
            }
        });
    }
        
</script>