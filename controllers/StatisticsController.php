<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Doctor;

class StatisticsController extends Controller
{
    /**
     * Muestra vista estadisticas
     *
     * @return string
     */
    public function actionIndex()
    {
        $actividad = Doctor::getActividad();
        $genero = Doctor::getGenero();
        $valores = Doctor::getValorConsulta();

        return $this->render('index', [
            'actividad' => $actividad,
            'genero' => $genero,
            'valores' => $valores,
        ]);
    }
}