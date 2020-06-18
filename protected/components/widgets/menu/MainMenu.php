<?php

class MainMenu extends CWidget {

	public function run() {
		$menuNodes = Category::model()->getNodes();

		return $this->render('mainMenu', array(
			'menuNodes' => $menuNodes)
		);
	}

}