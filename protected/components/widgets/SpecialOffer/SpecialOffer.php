<?php

class SpecialOffer extends CWidget {

	public $count = 1;

	public function run() {
		$products = Product::model()->mostPriority($this->count)->findAll();

		return $this->render('specialOffer', array(
			'products' => $products)
		);
	}

}