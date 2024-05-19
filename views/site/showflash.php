<?php
   use yii\bootstrap5\Alert;
   echo Alert::widget([
      'options' => ['class' => 'alert-danger'],
      'body' => Yii::$app->session->getFlash('greeting'),
   ]);
?>