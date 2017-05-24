<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "Note".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $content
 * @property integer $up
 * @property integer $down
 * @property integer $createdtime
 */
class Note extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Note';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'content', 'createdtime'], 'required'],
            [['user_id', 'up', 'down', 'createdtime'], 'integer'],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'content' => 'Content',
            'up' => 'Up',
            'down' => 'Down',
            'createdtime' => 'Createdtime',
        ];
    }
    public static function findnote(){
        $query = self::find()->orderBy('createdtime DESC');
        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
            'pagination'=>[
                'pageSize'=>30
            ]
        ]);
        return $dataProvider;
    }
}

