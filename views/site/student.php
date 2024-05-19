<!-- File: views/site/student.php -->

<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\StudentForm $model */


use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Student Registration';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-student">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'subject1')->textInput() ?>

    <?= $form->field($model, 'subject2')->textInput() ?>

    <?= $form->field($model, 'subject3')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Register', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
