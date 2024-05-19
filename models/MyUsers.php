<?php
namespace app\models;
use Yii;
use app\models\MyUser;

use yii\data\Pagination;
use yii\data\Sort;
use yii\db\ActiveRecord;
use yii\db\Query;
use yii\db\ActiveQuery;
use yii\data\ActiveDataProvider;




/**
 * This is the model class for table "users".
 *
 * @property int|null $id
 * @property string|null $name
 * @property string|null $email
 */
class MyUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'email'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
        ];
    }
}
