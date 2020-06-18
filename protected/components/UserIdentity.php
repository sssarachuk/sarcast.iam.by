<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

	protected $_id;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {
		$passwordHash = self::passhash($this->password);
		$user = User::model()->findByAttributes(array('email' => $this->username));
        if ($user === NULL) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
		} elseif($user->password !== $passwordHash) {
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		} else {
            $this->_id = $user->id;
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
	}

	public function getId() {
		return $this->_id;
    }

	/**
	 * Generates password hash
	 * @param string $password
	 * @return string
	 */
	public static function passhash($password) {
		$secretWord = 'ВиталийВикторович';
		$hash = sha1($password . $secretWord);
		return $hash;
	}

}