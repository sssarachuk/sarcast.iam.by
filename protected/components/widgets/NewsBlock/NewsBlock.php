<?php

class NewsBlock extends CWidget {

	public $limit = 3;

	public function run() {
		$news = Yii::app()->db->createCommand()
			->select('*')
			->from('news')
			//->where('id>=:id AND is_hidden=0', array(':id' => $this->current_id))
			->limit($this->limit)
			->order('id desc')
			->queryAll();
		return $this->render('newsBlock', array(
			'news' => $news)
		);
	}

}