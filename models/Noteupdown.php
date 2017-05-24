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
class Noteupdown extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Noteupdown';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'note_id', 'user_id', 'createdtime'], 'required'],
            [['type', 'note_id', 'user_id', 'createdtime'], 'integer'],
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
            'note_id' => 'Note ID',
            'user_id' => 'User ID',
            'createdtime' => 'Createdtime',
        ];
    }


}

