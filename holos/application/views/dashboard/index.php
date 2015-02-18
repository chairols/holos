<?php switch ($session['tipo_usuario']) {
    case '1': ?>
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
            <div class="metro-nav metro-fix-view">
                <div class="metro-nav-block nav-block-orange">
                    <a data-original-title="" href="/categorias/" class="text-center">
                        <i class="icon-tags"></i>
                        <div class="info"><?=count($categorias)?></div>
                        <div class="status">Categorias</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-green">
                    <a data-original-title="" href="/consultantes/">
                        <i class="icon-user"></i>
                        <div class="info"><?=count($consultantes)?></div>
                        <div class="status">Consultantes</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-yellow">
                    <a data-original-title="" href="/profesionales/">
                        <i class="icon-user-md"></i>
                        <div class="info"><?=count($profesionales)?></div>
                        <div class="status">Profesionales</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-blue">
                    <a data-original-title="" href="/especializaciones/">
                        <i class="icon-hospital"></i>
                        <div class="info"><?=count($especializaciones)?></div>
                        <div class="status">Especializaciones</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-red">
                    <a data-original-title="" href="/profesiones/">
                        <i class="icon-stethoscope"></i>
                        <div class="info"><?=count($profesiones)?></div>
                        <div class="status">Profesiones</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
        break;
    case '2': ?>
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
            <div class="metro-nav metro-fix-view">
                <div class="metro-nav-block nav-block-orange double">
                    <a data-original-title="" href="/vinculos/" class="text-center">
                        <i class="icon-resize-small"></i>
                        <div class="info"><?=count($vinculos_pendientes)?></div>
                        <div class="status">Vínculos Pendientes</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
        break;
}
    ?>