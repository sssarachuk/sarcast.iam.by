<?php

class LeftMenu extends CWidget {

	public function run() {
		$menuNodes = Category::model()->getNodes();
		/*$menuNodes = array();
		foreach ($nodes as $node) {
			$menuNodes[] = array('label' => str_repeat("&nbsp;", ($node->level-1)*2) . " " . $node->title, 'url' => '/category/'.$node->page_name);
		}
		return $this->render('leftMenu', array(
			'menuNodes' => $menuNodes)
		);*/
		
		return $this->render('leftMenu', array(
			'menuNodes' => $menuNodes)
		);
	}

}