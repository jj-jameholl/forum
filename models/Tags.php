<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Tags".
 *
 * @property integer $id
 * @property string $name
 * @property integer $times
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['times'], 'integer'],
            [['name'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'times' => 'Times',
        ];
    }
    public static function Findtags(){
        $tags =Tags::find()->orderBy('times DESC')->all();
        $count=Tags::find()->orderBy('times DESC')->count();
        $Tag = array();
        $count = 1;
        if($count>0){
            foreach($tags as $tag){
                $Tag[$tag->name] = ceil($count/3)+1;
                $count++;
            }
        }
        return $Tag;
    }
}

