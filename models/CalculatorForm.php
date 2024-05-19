<?php

namespace app\models;

use Yii;
use yii\base\Model;


class CalculatorForm extends Model
{
    public $number1;
    public $number2;
    public $result;
    


    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['number1', 'number2'], 'required'],
            [['number1', 'number2'],  'number'],
        ];
    }

  
}
