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
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"><i class="icon-save"></i> Guardar</button>
                                <button type="reset" class="btn btn-danger"><i class="icon-remove"></i> Borrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            
            
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
            
            
        </div>
    </div>
</div>
<script type="text/javascript">
    function Calendario() {
        
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
    
        $("#calendario").fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        editable: true,
        
        events: [
            <?php foreach($consultas as $consulta) { ?>
            {
                title: '<?=$consulta['estado']?>',
                start: '<?=$consulta['fecha']?>',
                allDay: false
            },      
            <?php } ?>
        ]
    });
    }

</script>