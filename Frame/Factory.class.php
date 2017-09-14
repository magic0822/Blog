<?php

/**
 * Factory
 */
class Factory {
	/**
	 * @param string $model_name
	 * @return object
	 */
	public static function M($model_name) {
		static $model_list = array();
		if(!isset($model_list[$model_name])) {
			$model_list[$model_name] = new $model_name;
		}
		return $model_list[$model_name];
	}
}