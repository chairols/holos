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
            <div class="span6" data-tablet="span6 fix-margin" data-desktop="span6">
                <div class="widget red">
                    <div class="widget-title">
                        <h4>
                            <i class="icon-calendar"></i> Agenda
                        </h4>
                        <span class="tools">
                            <a class="icon-chevron-down" href="javascript:;"></a>
                            <a class="icon-remove" href="javascript:;"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <div id="calendario" class="has-toolbar"></div>
                    </div>
                </div>
            </div>
            
            <div class="span6">
                <div class="widget green">
                    <div class="widget-title">
                        <h4>
                            <i class="icon-list"></i> Categorías
                        </h4>
                        <span class="tools">
                            <a class="icon-chevron-down" href="javascript:;"></a>
                            <a class="icon-remove" href="javascript:;"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <table class="table table-condensed table-striped">
                            <thead>
                                <tr>
                                    <th>Categoría</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($categorias as $categoria) { ?>
                                <?php if($categoria['idusuario']) { ?>
                                <tr>
                                    <td><label style="background-color: <?=$categoria['color']?>; color: #FFFFFF; text-align: center"><?=$categoria['categoria']?></label></td>
                                </tr>
                                <?php } ?>
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
                            <i class="icon-list"></i> Frecuencia de Consultas
                        </h4>
                        <span class="tools">
                            <a class="icon-chevron-down" href="javascript:;"></a>
                            <a class="icon-remove" href="javascript:;"></a>
                        </span>
                    </div>
                    <div class="widget-body form">
                        <form class="form-horizontal" method="post">
                            <div class="control-group">
                                <label class="control-label">Día</label>
                                <div class="controls">
                                    <input id="dp1" name="dia" type="text" size="16" class="m-ctrl-medium" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Hora</label>
                                <div class="controls">
                                    <div class="bootstrap-timepicker">
                                        <input id="timepicker1" name="hora" type="text" class="m-ctrl-medium" required>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Categoría</label>
                                <div class="controls">
                                    <select name="categoria">
                                    <?php foreach($categorias as $categoria) { ?>
                                    <?php if($categoria['idusuario']) { ?>
                                        <option value="<?=$categoria['idcategoria']?>"><?=$categoria['categoria']?></option>
                                    <?php } ?>
                                    <?php } ?>
                                    </select>
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
            
            <div class="row-fluid">
                <div class="span6 offset6">
                    <div class="widget yellow">
                        <div class="widget-title">
                            <h4>
                                <i class="icon-list"></i> Consultas
                            </h4>
                            <span class="tools">
                                <a class="icon-chevron-down" href="javascript:;"></a>
                                <a class="icon-remove" href="javascript:;"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <table class="table table-bordered table-condensed table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($consultas as $consulta) { ?>
                                    <tr>
                                        <td><?=date("d/m/Y", strtotime($consulta['fecha']))?></td>
                                        <td><?=date("H:i:s", strtotime($consulta['fecha']))?></td>
                                        <td><?=$consulta['estado']?></td>
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
</div>
<script type="text/javascript">
    function Calendario() {
        
       
        $("#calendario").fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        
        events: [
            <?php foreach($consultas as $consulta) { ?>
            {
                title: '<?=$consulta['estado']?>',
                start: '<?=$consulta['fecha']?>',
                allDay: false,
                color: '<?=$consulta['color']?>'
            },      
            <?php } ?>
        ]
    });
    }

</script>