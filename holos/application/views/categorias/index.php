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
                            <i class="icon-tasks"></i> Categorías Existentes
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
                                    <th><i class="icon-tags"></i> Categoría</th>
                                    <th><i class="icon-dollar"></i> Honorario</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($categorias as $categoria) { ?>
                                <tr>
                                    <td><?=$categoria['categoria']?></td>
                                    <td><?=number_format($categoria['honorario'], 2)?></td>
                                    <td>
                                        <a href="/categorias/editar/<?=$categoria['idcategoria']?>">
                                            <button class="btn btn-info">
                                                <i class="icon-edit"></i>
                                            </button>
                                        </a>
                                        <a href="/categorias/borrar/<?=$categoria['idcategoria']?>">
                                            <button class="btn btn-danger">
                                                <i class="icon-remove"></i>
                                            </button>
                                        </a>
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
                            <i class="icon-plus"></i> Agregar Categoría
                        </h4>
                        <span class="tools">
                            <a class="icon-chevron-down" href="javascript:;"></a>
                            <a class="icon-remove" href="javascript:;"></a>
                        </span>
                    </div>
                    <div class="widget-body form">
                        <form class="form-horizontal" method="post">
                            <div class="control-group">
                                <label class="control-label">Categoría</label>
                                <div class="controls">
                                    <input type="text" class="small" name="categoria" required autofocus>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Honorario</label>
                                <div class="controls">
                                    <input type="text" class="small" name="honorario" required>
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