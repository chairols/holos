<div id="main-content">
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <h3 class="page-title">
                    <?=$title?> de <?=$profesional['nombre']?> <?=$profesional['apellido']?>
                </h3>
            </div>
        </div>
        
        <div class="row-fluid">
            <div class="span6">
                <div class="widget blue">
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
        
       
        $("#calendario").fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        editable: true,
        
        events: [
            <?php foreach($disponibles as $disponible) { ?>
                <?php if($disponible['fecha'] > date("Y-m-d 00:00:00", time())) { ?>
                    {
                        title: '<?=$disponible['estado']?>',
                        start: '<?=$disponible['fecha']?>',
                        allDay: false,
                        url: '/consultas/crear/<?=$disponible['idconsulta']?>/'
                    },
                <?php } ?>
            <?php } ?>
        ]
    });
    }

</script>