<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Updown".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $comment_id
 * @property integer $user_id
 * @property integer $createdtime
 */
class Updown extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Updown';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'comment_id', 'user_id', 'createdtime'], 'required'],
            [['type', 'comment_id', 'user_id', 'createdtime'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'comment_id' => 'Comment ID',
            'user_id' => 'User ID',
            'createdtime' => 'Createdtime',
        ];
    }

}

