<?php


namespace Solution;


class Solutions {

	public function ciclycRotation($array, $k) {

		$temp = array_fill(0, count($array) -1, null);
		for($i =0; $i < count($array); $i++) {
			//echo ($i+$k)%count($array);
			// echo count($array);
			$temp[($i+$k)%count($array)] = $array[$i];
		}

		return $temp;
	}

	public function nonduplicate($a) {

		foreach (array_count_values($a) as $key => $val) {
			if ($val == 1) {
				return $key;
			}
		}
	}
}