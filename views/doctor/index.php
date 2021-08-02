<?php

/* @var $this yii\web\View */

$this->title = 'Conecta Doctor';
?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <h3>Doctores disponibles</h3>
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                    <th>Valor Consulta</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($doctors as $doctor) { ?>
                    <tr>
                        <td><?php echo $doctor->NAME_DOCTOR. ' '.$doctor->LAST_DOCTOR ?></td>
                        <td><?php echo $doctor->NOTE_DOCTOR ?></td>
                        <td><?php echo '$'. number_format($doctor->VALUE_DOCTOR, 0, ",", "."); ?></td>
                        <td>
                            <button type="button" onclick="showModal(<?php echo $doctor->ID_DOCTOR ?>)" class="btn btn-primary">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </td>
                    </tr>
                <?php 
                } 
                ?>
            </tbody>
        </table>
        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content">
            <?php 
                if ($page - 1 >= 1) { ?>
                    <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page - 1; ?>">Anterior</a></li>
                <?php 
                }
                for ($i = 1; $i <= $num_pages; $i++) { 
                    if ($page == $i) {?>
                    <li class="page-item active"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php 
                    }
                    else { ?>
                    <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php 
                    }
                } 
                if ($page + 1 <= $num_pages) { ?>
                    <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page + 1; ?>">Siguiente</a></li>
                <?php } ?>   
            </ul>
        </nav>
    </div>
    <div class="col-md-1"></div>

    <!-- Modal -->
    <div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="nombre-doctor" class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p><strong>Consulta: </strong><span id="consulta"></span></p>
                    <p><strong>Rut: </strong><span id="rut"></span></p>
                    <p><strong>Género: </strong><span id="sexo"></span></p>
                    <p><strong>Teléfono: </strong><span id="telefono"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
