<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "User".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $tel
 * @property string $photo
 * @property string $authKey
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
                         [['username', 'password', 'authKey'], 'required','message'=>'{attribute}不能为空!'],
            [['username', 'photo', 'authKey','email','saltpass','newpass','repass','password'], 'string', 'max' => 255],
            [['email'],'email','message'=>'{attribute}格式不正确!'],
            [['tel'], 'string', 'max' => 11],
            [['lastlogintime'],'integer','max'=>255],
            [['city','role','newpass','repass'],'string','max'=>20],
            [['sign'],'string','max'=>255],
            [['repass'],'compare','compareAttribute'=>'newpass','message'=>'两次输入不同'],
	  ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'password' => '密码',
            'tel' => '电话号码',
            'photo' => '照片',
            'authKey' => 'Auth Key',
	    'email' => '邮箱',
	    'newpass'=>'新密码',
	    'repass' => '再次确认',
	    'city' => '所在地',
	    'sign' => '个性签名',	
		           'createdtime' => '创建时间',        
];
    }
    public function behaviors()
    {
        return [
            [
                'class'=> TimestampBehavior::className(),
                'createdAtAttribute' => 'createdtime',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['createdtime','created_at'],
                    ],
                ]
        ];
    }
       public function getLog(){
        $data = Log::find()->with('article')->where(['to_uid'=>$this->id])->orderBy('id DESC');
        $dataprovide = new ActiveDataProvider([
            'query' => $data,
            'pagination'=>[
                'pageSize'=>6,
            ],
        ]);
        return $dataprovide;
    }	

    public static function findIdentity($id)
    {
        return self::find()->where(['id'=>$id])->one();
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }
        return null;
    }
    public static function findByUsername($username)
    {
        return null;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getAuthKey()
    {
        $user = self::find()->where(['username'=>$this->username])->one();
        return $user->authKey;
    }
    public function validateAuthKey($authKey)
    {
        return true;
    }
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    public static function findnamebyid($id){
        return self::find()->where(['id'=>$id])->one()->username;
    }
    public static function findrolebyid($id){
	return self::find()->where(['id'=>$id])->one()->role;
}
       public static function findsignbyid($id){
        return self::find()->where(['id'=>$id])->one()->sign;
}
	    public static function findimgbyid($id){
        return self::find()->where(['id'=>$id])->one()->photo;
    }
	    public static function findemailbyid($id){
        return self::find()->where(['id'=>$id])->one()->email;
    }
}
