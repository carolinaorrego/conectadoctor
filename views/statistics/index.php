<?php

/* @var $this yii\web\View */

$this->title = 'Conecta Doctor';
?>
<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Actividad</div>
            <div class="panel-body">
            <?php 
                if(isset($actividad['activos']) && $actividad['inactivos']){
            ?>
                    <input class="activo" type="hidden" value="<?php  echo $actividad['activos']; ?>">
                    <input class="inactivo" type="hidden" value="<?php echo $actividad['inactivos']; ?>">
                    <canvas id="actividad" width="400" height="400"></canvas>
            <?php 
                }
            ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-heading">Género</div>
        <div class="panel-body">
            <?php 
                if(isset($genero['masculino']) && $genero['femenino']){
            ?>
                    <input class="masculino" type="hidden" value="<?php  echo $genero['masculino']; ?>">
                    <input class="femenino" type="hidden" value="<?php echo $genero['femenino']; ?>">
                    <canvas id="genero" width="400" height="400"></canvas>
            <?php 
                }
            ?>
        </div>
    </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Valores Consulta</div>
            <div class="panel-body">
                <?php 
                    if(isset($valores)){
                        foreach($valores as $key => $valor){?>
                            <input class="key" type="hidden" value="<?php  echo $key; ?>"> 
                            <input class="valores" type="hidden" value="<?php  echo $valor; ?>">      
                <?php 
                        }
                    }?>
                <canvas id="valores" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
</div>
