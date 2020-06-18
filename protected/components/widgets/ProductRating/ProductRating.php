<?php

class ProductRating extends CWidget {

	public $model;
	public $readOnly = TRUE;
	public $attribute = 'rating';
	public $starCount = 5;
	public $ratingStepSize = 1;
	public $maxRating = 10;
	public $allowEmpty = FALSE;
	public $focus = "function(value, link) {
				var tip = $('#rating_tip');
				tip[0].data = tip[0].data || tip.html();
				tip.html(link.title || 'value: '+value);
			}";
	public $blur = "function(value, link){
				if (!window.rating_selected) {
					var tip = $('#rating_tip');
					$('#rating_tip').html(tip[0].data || '');
				}
			}";
	public $callback = "function(value, link){
				window.rating_selected = true;
			}";

	public function run() {
		$product_rating_options = array(
			'model'				=> $this->model,
			'readOnly'			=> $this->readOnly,
			'attribute'			=> $this->attribute,
			'starCount'			=> $this->starCount,
			'ratingStepSize'	=> $this->ratingStepSize,
			'maxRating'			=> $this->maxRating,
			'titles'			=> array('', 'Хуже не бывает', 'Очень плохо', 'Плохо', 'Никак', 'Сносно', 'Нормально', 'Неплохо', 'Хорошо', 'Отлично', 'Лучше не бывает'),
			'allowEmpty'		=> $this->allowEmpty,
			'focus'				=> $this->focus,
			'blur'				=> $this->blur,
			'callback'			=> $this->callback
		);
		if ($this->readOnly) {
			$product_rating_options['name'] = 'rating' . $this->model->id;
		}

		return $this->render('productRating', array(
			'product_rating_options' => $product_rating_options)
		);
	}

}