<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">CONVENIOS</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">home</a></li>
                    <li class="breadcrumb-item active">convenios</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>



<div class="modal-content col-10 m-auto">
    <div class="modal-header">
        <h4 class="modal-title">Agregar Nuevo Convenio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="/convenios/update" method="post">
            <div class="row">
                <div class="col-sm-2">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Año</label>
                        <input type="text" id="anio" name="anio" class="form-control" placeholder="Enter ..." value="<?= $convenio->anio ?>" >
                    </div>
                </div>
                <div class="col-sm-4">
                    <!-- text input -->
                    <input type="hidden" name="id" value="<?= $convenio->id ?>">
                    <div class="form-group">
                        <label>Institución/Facultad/Dirección</label>
                        <select class="select2" id="facultad_id" name="facultad_id"
                                data-placeholder="Selecciona un Estado" style="width: 100%;">
                            <?php if (empty($facultades)): ?>
                                <option value="">no se ecuentran facultades</option>

                            <?php else:?>
                                <?php for ($i = 0; $i < count($facultades); $i++): ?>
                                    <option <?php if($convenio->facultad_id === $facultades[$i]['id']) echo 'selected'; ?> value="<?= $facultades[$i]['id'] ?>">
                                        <?= $facultades[$i]['nombre'] ?>
                                    </option >
                                <?php endfor; ?>
                            <?php endif; ?>

                        </select>

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Institución</label>
                        <select class="select2" id="institucion_id" name="institucion_id"
                                data-placeholder="Selecciona un Estado" style="width: 100%;">
                            <?php if (empty($instituciones)): ?>
                                <option value="">no se ecuentran instituciones</option>

                            <?php else:?>
                                <?php for ($i = 0; $i < count($instituciones); $i++): ?>
                                    <option <?php if($convenio->institucion_id === $instituciones[$i]['id']) echo 'selected'; ?> value="<?= $instituciones[$i]['id'] ?>">
                                        <?= $instituciones[$i]['nombre'] ?>
                                    </option >
                                <?php endfor; ?>
                            <?php endif; ?>

                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Modalidad</label>
                        <select class="select2" id="modalidad_id" name="modalidad_id"
                                data-placeholder="Selecciona Modalidad" style="width: 100%;">
                            <?php if (empty($modalidades)): ?>
                                <option value="">no se ecuentran instituciones</option>

                            <?php else:?>
                                <?php for ($i = 0; $i < count($modalidades); $i++): ?>
                                    <option <?php if($convenio->modalidad_id === $modalidades[$i]['id']) echo 'selected'; ?>  value="<?= $modalidades[$i]['id'] ?>">
                                        <?= $modalidades[$i]['nombre'] ?>
                                    </option >
                                <?php endfor; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="nombre"> Nombre del Convenio </label>
                <textarea name="nombre" id="nombre" cols="10" rows="3" class="form-control is-valid"><?= $convenio->nombre ?></textarea>
            </div>
            <div>
                <div class="form-group">
                    <label class="col-form-label" for="objetivo"> Objetivo </label>
                    <textarea name="objetivo" id="objetivo" cols="10" rows="3"
                              class="form-control is-valid"> <?= $convenio->objetivo ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Resolución</label>
                        <textarea class="form-control is-valid" name="resolucion" id="resolucion"
                                  cols="5" rows="2"><?= $convenio->resolución ?></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- text input -->
                    <div class="form-group">
                        <label>Coordinador</label>
                        <textarea class="form-control is-valid" name="coordinador_convenio" id="coordinador_convenio"
                                  cols="5" rows="2"><?= $convenio->coordinador_convenio ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Fecha/inicio</label>
                            <input type="date" id="fecha_inicio" name="fecha_inicio"
                                   class="form-control" placeholder="Enter ..." value="<?= $convenio->fecha_inicio ?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>fecha/fin</label>
                            <input type="date" id="fecha_fin" name="fecha_fin"
                                   class="form-control" placeholder="Enter ..." value="<?= $convenio->fecha_fin ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit"
                            class="btn btn-primary">Actualizar
                    </button>
                </div>
                <!-- /.modal-content -->
            </div>
        </form>

    </div>

</div>

