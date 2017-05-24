<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Alert;
use yii\web\IdentityInterface;
/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
               
            if (!$user || !$user->validatePassword($this->password)) {
                    return false;
            }
                 return true;
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
	$user = $this->getUser();
	if($user&&($user->password==md5($this->password.$user->saltpass))){
      return Yii::$app->user->login($this->getUser(),($this->rememberMe==1)?3600*24*7:0);
    }
	return false;
}
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::find()->where(['username'=>$this->username])->one();

        }

        return $this->_user;
    }
    public function getCityList($pid){
        $a = City::findAll(array('pid'=>$pid));
        return ArrayHelper::map($a,'id','name');
    }
}
