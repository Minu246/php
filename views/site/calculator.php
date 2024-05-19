<!-- File: views/site/student.php -->

<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\CalculatorForm $model */


use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'calculator';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-calculator">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number1')->textInput() ?>

    <?= $form->field($model, 'number2')->textInput() ?>

    
    <?= $form->field($model, 'result')->textInput(['readonly'=>true]) ?>

    <div class="form-group">
        <?= Html::submitButton('ADD', ['class' => 'btn btn-warning','name'=>'operation','value'=>'add']) ?>
        <?= Html::submitButton('SUB', ['class' => 'btn btn-primary','name'=>'operation','value'=>'sub']) ?>
        <?= Html::submitButton('MUL', ['class' => 'btn btn-primary','name'=>'operation','value'=>'mul']) ?>
        <?= Html::submitButton('DIV', ['class' => 'btn btn-warning','name'=>'operation','value'=>'div']) ?>
    </div>


    
    <?php ActiveForm::end(); ?>
</div>
