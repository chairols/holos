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
                            <i class="icon-user"></i> Perfil
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
                                    <input type="text" class="small" name="nombre" value="<?=$usuario['nombre']?>" required autofocus>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Apellido</label>
                                <div class="controls">
                                    <input type="text" class="small" name="apellido" value="<?=$usuario['apellido']?>" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">CUIT</label>
                                <div class="controls">
                                    <input type="text" class="small" name="cuit" maxlength="15" value="<?=$usuario['cuit']?>" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Condición ante el IVA</label>
                                <div class="controls">
                                    <select name="condicion" data-placeholder="Seleccionar Condición ante el IVA" class="chzn-select">
                                        <?php foreach($condicionesiva as $condicion) { ?>
                                        <option value="<?=$condicion['idcondicion']?>"<?=($condicion['idcondicion']==$usuario['condicioniva'])?" selected":""?>><?=$condicion['condicion']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">IIBB</label>
                                <div class="controls">
                                    <input type="text" class="small" name="iibb" maxlength="20" value="<?=$usuario['iibb']?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Profesión</label>
                                <div class="controls">
                                    <select name="profesiones[]" data-placeholder="Seleccionar Profesión" class="chzn-select" multiple="multiple" tabindex="6">
                                        <?php foreach($profesiones as $profesion) { ?>
                                        <option value="<?=$profesion['idprofesion']?>"<?=($profesion['idprofesion'])?" selected":""?>><?=$profesion['profesion']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Especialización</label>
                                <div class="controls">
                                    <select name="especializaciones[]" data-placeholder="Seleccionar Especialización" class="chzn-select" multiple="multiple" tabindex="6">
                                        <?php foreach($especializaciones as $especializacion) { ?>
                                        <option value="<?=$especializacion['idespecializacion']?>"<?=($especializacion['idusuario'])?" selected":""?>><?=$especializacion['especializacion']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Categoría</label>
                                <div class="controls">
                                    <select name="categorias[]" data-placeholder="Seleccionar Categoría" class="chzn-select" multiple="multiple" tabindex="6">
                                        <?php foreach($categorias as $categoria) { ?>
                                        <option value="<?=$categoria['idcategoria']?>"<?=($categoria['idcategoria'])?" selected":""?>><?=$categoria['categoria']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Dirección del Consultorio</label>
                                <div class="controls">
                                    <input type="text" class="small" name="direccion" value="<?=$usuario['direccion']?>" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Zona</label>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Subzona</label>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Dirección alternativa</label>
                                <div class="controls">
                                    <input type="text" class="small" name="direccion2" value="<?=$usuario['direccion2']?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Zona alternativa</label>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Subzona alternativa</label>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Teléfono</label>
                                <div class="controls">
                                    <input type="text" class="small" name="telefono" value="<?=$usuario['telefono']?>" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input type="text" class="small" name="email" value="<?=$usuario['email']?>" disabled>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Contraseña</label>
                                <div class="controls">
                                    <input type="password" class="small" name="password">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Reescribir Contraseña</label>
                                <div class="controls">
                                    <input type="password" class="small" name="password2">
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