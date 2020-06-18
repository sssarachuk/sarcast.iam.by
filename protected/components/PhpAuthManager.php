<?php

class PhpAuthManager extends CPhpAuthManager {

	public function init(){
		//roles - in config/auth.php
		if ($this->authFile === NULL){
			$this->authFile = Yii::getPathOfAlias('application.config.auth').'.php';
        }
		parent::init();

		//default role for guests
		if (!Yii::app()->user->isGuest) {
			//link role with user ID from UserIdentity.getId()
			$this->assign(Yii::app()->user->role, Yii::app()->user->id);
		}
	}
}