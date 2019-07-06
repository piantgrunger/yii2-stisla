<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends ActiveRecord implements IdentityInterface
{
	const STATUS_DELETED = 0;
	const STATUS_ACTIVE = 10;
	public $new_password, $old_password, $repeat_password;

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%user}}';
	}

	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			TimestampBehavior::className(),
		];
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['username', 'email'], 'required'],
			[['username', 'email', 'password_hash'], 'string', 'max' => 255],
			[['username', 'email'], 'unique'],
			[['email'], 'email'],
			['status','integer'],
			[['old_password', 'new_password', 'repeat_password'], 'string', 'min' => 6],
			[['repeat_password'], 'compare', 'compareAttribute' => 'new_password'],
			[['old_password', 'new_password', 'repeat_password'], 'required', 'when' => function ($model) {
				return (!empty($model->new_password));
			}, 'whenClient' => "function (attribute, value) {
                return ($('#user-new_password').val().length>0);
            }"],
			//['username', 'filter', 'filter' => 'trim'],
			//['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
		];
	}

	public function scenarios()
	{
		$scenarios = parent::scenarios();
		$scenarios['password'] = ['old_password', 'new_password', 'repeat_password'];
		return $scenarios;
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'username' => 'Username',
			'password_hash' => 'Password Hash',
			'email' => 'Email',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getRoles()
	{
		return $this->hasMany(AuthAssignment::className(), [
			'user_id' => 'id',
		]);
	}

	public static function findIdentity($id)
	{
		return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
	}
	/**
	 * @inheritdoc
	 */
	public static function findIdentityByAccessToken($token, $type = null)
	{
		throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
	}
	/**
	 * Finds user by username
	 *
	 * @param string $username
	 * @return static|null
	 */
	public static function findByUsername($username)
	{
		return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
	}
	/**
	 * Finds user by password reset token
	 *
	 * @param string $token password reset token
	 * @return static|null
	 */
	public static function findByPasswordResetToken($token)
	{
		if (!static::isPasswordResetTokenValid($token)) {
			return null;
		}
		return static::findOne([
			'password_reset_token' => $token,
			'status' => self::STATUS_ACTIVE,
		]);
	}
	/**
	 * Finds out if password reset token is valid
	 *
	 * @param string $token password reset token
	 * @return boolean
	 */
	public static function isPasswordResetTokenValid($token)
	{
		if (empty($token)) {
			return false;
		}
		$timestamp = (int) substr($token, strrpos($token, '_') + 1);
		$expire = Yii::$app->params['user.passwordResetTokenExpire'];
		return $timestamp + $expire >= time();
	}
	/**
	 * @inheritdoc
	 */
	public function getId()
	{
		return $this->getPrimaryKey();
	}
	/**
	 * @inheritdoc
	 */
	public function getAuthKey()
	{
		return $this->auth_key;
	}
	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey)
	{
		return $this->getAuthKey() === $authKey;
	}
	/**
	 * Validates password
	 *
	 * @param string $password password to validate
	 * @return boolean if password provided is valid for current user
	 */
	public function validatePassword($password)
	{
		return Yii::$app->security->validatePassword($password, $this->password_hash);
	}
	/**
	 * Generates password hash from password and sets it to the model
	 *
	 * @param string $password
	 */
	public function setPassword($password)
	{
		$this->password_hash = Yii::$app->security->generatePasswordHash($password);
	}
	/**
	 * Generates "remember me" authentication key
	 */
	public function generateAuthKey()
	{
		$this->auth_key = Yii::$app->security->generateRandomString();
	}
	/**
	 * Generates new password reset token
	 */
	public function generatePasswordResetToken()
	{
		$this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
	}
	/**
	 * Removes password reset token
	 */
	public function removePasswordResetToken()
	{
		$this->password_reset_token = null;
	}
}
