<?php

class SeeAlso extends CWidget {

	public $current_id;
	public $offset = 1;
	public $limit = 1;

	public function run() {
		$products = Yii::app()->db->createCommand()
			->select('*')
			->from('product')
			->where('id>=:id AND is_hidden=0', array(':id' => $this->current_id))
			->limit($this->limit, $this->offset)
			->queryAll();
		if (!$products) {
			//если не найдено следующих товаров
			//количество оставшихся записей до конца таблицы
			$count = Yii::app()->db->createCommand()
				->select('id')
				->from('product')
				->where('id>=:id AND is_hidden=0', array(':id' => $this->current_id))
				->queryColumn();
			$count = count($count);
			//записи с начала таблицы с учётом оставшихся в конце
			$products = Yii::app()->db->createCommand()
				->select('*')
				->from('product')
				->where('id>=:id AND is_hidden=0', array(':id' => 1))
				->limit($this->limit, $this->offset - $count)
				->queryAll();
		}

		return $this->render('seeAlso', array(
			'products' => $products)
		);
	}

}