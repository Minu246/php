<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * studentForm is the model behind the student form.
 */
class StudentForm extends Model
{
    public $name;
    public $age;
    public $address;
    public $subject1;
    public $subject2;
    public $subject3;
    
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'age', 'address', 'subject1','subject2','subject3'], 'required'],
            [['name', 'address'], 'string'],
            ['age', 'integer'],
            [['subject1', 'subject2', 'subject3'], 'string', 'max' => 255],

        ];
    }
    public function register()
    {
        // Logic to save student data to database goes here
        return true; // Return true on success, false on failure
    }
}
