<?php

class MainMenuMobile extends CWidget {

	public function run() {
		$menuNodes = Category::model()->getNodes();
         
		return $this->render('mainMenuMobile', array(
			'menuNodes' => $menuNodes)
		);
	}

}