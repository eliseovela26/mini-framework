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
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">


        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-12">

                <!-- TABLE: LATEST ORDERS -->
                <div class="card">
                    <div class="card-header border-transparent header-list">
                        <h3 class="card-title">Convenios</h3>
                        <div class="card-footer clearfix">
                            <a href="#" data-toggle="modal" data-target="#modal-xl"
                               class="btn btn-sm btn-info float-left">Nuevo convenio</a>
                        </div>
                        <div class="search ml-5" >
                            <form method="GET" action="">
                                <div class="input-group mb-3 ">
                                    <input type="text" class="form-control" name="search" placeholder="Buscar por nombre" aria-label="Nome squadra" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive" id="section_convenio">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Año</th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th>Fecha de termino</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($convenios)): ?>
                                    <tr>
                                        No hay usuarios registrados
                                    </tr>
                                    <?php else:?>
                                    <tr <?php for ($i = 0; $i < count($convenios); $i++): ?> >

                                            <td><?= $i +1 ?></td>
                                            <td><?= $convenios[$i]['anio'] ?></td>
                                            <td><?= $convenios[$i]['nombre'] ?></td>
                                            <td><?= $convenios[$i]['estado'] ?></td>
                                            <td><?= $convenios[$i]['fecha_fin'] ?></td>
                                            <td class="flex-row">
                                                <a   href="/convenios/edit?id=<?= $convenios[$i]['id'] ?>" class="btn btn-outline-primary btn-block"><i
                                                            class="fas fa-edit"></i>Editar
                                                </a>

                                                <form action="/convenios/destroy" method="post">
                                                    <input type="hidden" name="id" value="<?= $convenios[$i]['id']?>">
                                                    <button type="submit"
                                                            class="btn btn-outline-info btn-block btn-flat"><i
                                                                class="fa fa-trash"></i><Eliminar></Eliminar>
                                                    </button>
                                                </form>

                                            </td>
                                    </tr <?php endfor; ?>>

                                    <?php endif; ?>
                                </tbody>
                            </table>

                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->

                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!--/. container-fluid -->
</section>

<?php
    include_once "create.php";
?>




