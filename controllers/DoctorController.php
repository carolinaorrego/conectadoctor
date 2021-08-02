<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Doctor;

class DoctorController extends Controller
{
    /**
     * Muestra vista index doctores
     *
     * @return string
     */
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $page = $request->get('page');

        if($page == NULL){
            $page = 1;
        }

        $doctors = Doctor::getList($page);
        $num_pages = Doctor::getPages();

        return $this->render('index', [
            'doctors' => $doctors,
            'num_pages' => $num_pages,
            'page' => $page,
        ]);
    }
    /**
     * Obtiene doctor por id
     *
     * @return string
     */
    public function actionDoctor()
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $doctor = Doctor::getDoctor($id);
        return json_encode($doctor);
    }
}
