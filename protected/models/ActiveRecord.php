<?php

class ActiveRecord extends CActiveRecord {

	/**
	 * Custom behaviors for all models
	 * @param array $behaviors
	 * @return array
	 */
	public function behaviors($behaviors = NULL) {
		$customBehaviors = array();
		if (isset($this->created_at) && isset($this->updated_at)) {
			$customBehaviors =  array(
				'CTimestampBehavior' => array(
					'class' => 'zii.behaviors.CTimestampBehavior',
					'createAttribute' => 'created_at',
					'updateAttribute' => 'updated_at'
				)
			);
		} elseif (isset($this->created_at)) {
			$customBehaviors =  array(
				'CTimestampBehavior' => array(
					'class' => 'zii.behaviors.CTimestampBehavior',
					'createAttribute' => 'created_at',
					'updateAttribute' => NULL
				)
			);
		} elseif (isset($this->updated_at)) {
			$customBehaviors =  array(
				'CTimestampBehavior' => array(
					'class' => 'zii.behaviors.CTimestampBehavior',
					'createAttribute' => NULL,
					'updateAttribute' => 'updated_at'
				)
			);
		}

		if ($behaviors) {
			$customBehaviors = array_merge($behaviors, $customBehaviors);
		}
		return $customBehaviors;
	}

}