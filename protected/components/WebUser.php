<?php
/**
 * User class
 */
class WebUser extends CWebUser {

	private $_account = NULL;

	/**
	 * Returns user's role in current network
	 * @return <type>
	 */
	public function getRole() {
        $currentNetworkName = Yii::app()->params['currentNetworkName'];
		$profile = $this->getProfileByNetwork($currentNetworkName);
		if ($profile) {
            return $profile->role;
        } else {
			//check if user exists in company network
			if ($this->id) {
				$profile = Profile::model()->find('account_id=? AND network_id=?', array($this->id, 1));
				if ($profile) {
					if ($profile->role >= Profile::ROLE_NETWORK_USER) {
						return Profile::ROLE_NETWORK_COMPANY_MEMBER;
					} elseif ($profile->role == Profile::ROLE_NETWORK_BANNED) {
						return Profile::ROLE_NETWORK_BANNED;
					}
				}
			}
			return Profile::ROLE_NETWORK_GUEST;
		}
    }

	public function getAccount() {
		if (!$this->isGuest && $this->_account === NULL) {
			//find user profile for the current network
			$this->_account = User::model()->findByPk($this->id);
        }
		if (!$this->_account) {
			$this->_account = new User();
		}
        return $this->_account;
    }

}