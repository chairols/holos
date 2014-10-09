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
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                                <tr>
                                    <th><i class="icon-user"></i> Consultante</th>
                                    <th><i class="icon-stethoscope"></i> Profesión</th>
                                    <th><i class="icon-hospital"></i> Especialización</th>
                                </tr>
                            </thead>
                            <tbody>
                                
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
                                    <div class="input-append date" id="dpYears" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                        <input class="m-ctrl-medium" size="16" type="text" value="12-02-2012" readonly>
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
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
                            </div>
                            <div class="control-group">
                                <label class="control-label">Subzona</label>
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