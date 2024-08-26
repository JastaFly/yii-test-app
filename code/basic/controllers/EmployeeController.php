<?php

namespace app\controllers;

use app\models\Employee;
use Yii;
use yii\web\Controller;

class EmployeeController extends Controller
{
    public function actionIndex()
    {
        $request = Yii::$app->request->post();
        $result = '';

        if ($request) {
            $result = $this->requestHandler($request);
        }

        return $this->render('index', ['save_result' => $result]);
    }

    public function actionList()
    {
        $employers = Employee::find()->all();

        return $this->render('list', ['employers' => $employers]);
    }

    private function requestHandler($request)
    {
        $model = new Employee($request['username']);
        $result['to_load'] = $model->load($request);
        $result['success'] = $model->save();
        $result['error'] = $model->getErrors();

        return $result;
    }
}
