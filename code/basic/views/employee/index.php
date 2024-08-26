<?php

use app\models\Employee;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/*echo '<pre>';
var_dump($save_result);
echo '</pre>'*/;

$employee = new Employee();
$this->title = 'Главная';
$from = ActiveForm::begin(['id' => 'add-employee', 'options' => ['name' => 'add-employee']]);
echo $from->field($employee, 'username')->textInput(['placeholder' => 'Имя сотрудника', 'name' => 'username'])->label('Имя сотрудника:');
echo $from->field($employee, 'email')->textInput(['placeholder' => 'vasya-pupkin@mail.ru', 'name' => 'email'])->label('E-mail:');
echo $from->field($employee,'attestation_date')->widget('yii\jui\DatePicker', ['name' => 'attestation_date'])->label('Дата аттестации:');
/*echo $from->field($employee, 'password')->passwordInput()->label('Пароль');
echo $from->field($employee, 'repeat_password')->passwordInput()->label('Подтвердите пароль');*/
echo Html::submitButton('Добавить');
ActiveForm::end(); ?>


