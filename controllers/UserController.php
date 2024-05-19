<?php
   namespace app\controllers;
   use yii\rest\ActiveController;
   use yii\web\Controller;
   class UserController extends ActiveController {
      public $modelClass = 'app\models\MyUsers';
   }
?>