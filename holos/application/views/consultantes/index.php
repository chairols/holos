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
                            <i class="icon-tasks"></i> Consultantes Existentes
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
                                    <th><i class="icon-user"></i> Consultante</th>
                                    <th><i class="icon-info-sign"></i> Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($consultantes as $consultante) { ?>
                                <tr>
                                    <td><?=$consultante['nombre']?> <?=$consultante['apellido']?></td>
                                    <td>
                                        <?php if($consultante['activo'] == '1') { ?>
                                        <a href="/consultantes/activar/<?=$consultante['idusuario']?>/0/">
                                            <span class="label label-success"><i class="icon-thumbs-up"></i> ACTIVO</span>
                                        </a>
                                        <?php } else { ?>
                                        <a href="/consultantes/activar/<?=$consultante['idusuario']?>/1/">
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
                            <i class="icon-plus"></i> Agregar Consultante
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
                                <label class="control-label">Fecha de Nacimiento</label>
                                <div class="controls">
                                    <input id="dp1" type="text" size="16" class="m-ctrl-medium" name="fecha_nacimiento" required>
                                </div>

                            </div>
                            <div class="control-group">
                                <label class="control-label">Dirección</label>
                                <div class="controls">
                                    <input type="text" clas="small" name="direccion" required>
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
        $('#dp1').datepicker({
            format: 'yyyy-mm-dd',
            language: 'es'
        });
        
        $(".chzn-select-deselect").chosen({
            allow_single_deselect:true
        });
        
        cambiar();
        
        $("#zona").change(function() {
            cambiar();
        });
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
</script>