<?php

namespace app\models;

class Doctor
{
    /**
     * {@inheritdoc}
     */
    public static function getAll()
    {
        $json = file_get_contents('https://conectadoc.primedevelopers.cl/sistema/index.php?r=doctor/postulantes');
        $doctors = json_decode($json);
        return $doctors;
    }
    /**
     * {@inheritdoc}
     */
    public static function getList($page)
    {
        $list = Doctor::getAll();
        $limit_inf = 10*($page - 1);
        $limit_sup = 10*($page - 1) + 9;
        $total = [];

        for($i = $limit_inf; $i <= $limit_sup; $i++){
            if(isset($list[$i])){
                $total[] = $list[$i];
            }
        }
        return $total; 
    }
    /**
     * {@inheritdoc}
     */
    public static function getPages()
    {
        $list = Doctor::getAll();
        $limit = 10;
        $num_pages = ceil(count($list)/$limit);
        return $num_pages; 
    }
    /**
     * {@inheritdoc}
     */
    public function getDoctor($id)
    {
        $list = Doctor::getAll();

        foreach($list as $li){
            if($li->ID_DOCTOR == $id){
                $doctor = $li;
                break;
            }
        }
        return $doctor;
    }
    /**
     * {@inheritdoc}
     */
    public function getActividad()
    {
        $list = Doctor::getAll();
        $actividad = [];
        $activos = 0;
        $inactivos = 0;
    
        foreach($list as $li){
            if($li->STATUS_DOCTOR == 0){
                $activos = $activos + 1;
            }
            else {
                $inactivos = $inactivos + 1;
            }
        }
        $actividad = [
            'inactivos' => $inactivos,
            'activos' => $activos,
        ];

        return $actividad;
    }
    /**
     * {@inheritdoc}
     */
    public function getGenero()
    {
        $list = Doctor::getAll();
        $genero = [];
        $femenino = 0;
        $masculino = 0;
    
        foreach($list as $li){
            if($li->SEX_DOCTOR == 0){
                $masculino = $masculino + 1;
            }
            else {
                $femenino = $femenino + 1;
            }
        }
        $genero = [
            'masculino' => $masculino,
            'femenino' => $femenino,
        ];

        return $genero;
    }
    /**
     * {@inheritdoc}
     */
    public function getValorConsulta()
    {
        $list = Doctor::getAll();
        $valores = [];

        foreach($list as $li){
            if (!array_key_exists($li->VALUE_DOCTOR, $valores)) {
                $valores[$li->VALUE_DOCTOR] = 1;
            }
            else{
                $valores[$li->VALUE_DOCTOR] = $valores[$li->VALUE_DOCTOR] + 1;
            }
        }
        return $valores;
    }
}
