<?php

for ($i=1; $i <= 7170; $i++) { 

	$search_url = 'https://www.myauto.ge/ka/search/?stype=0&currency_id=3&det_search=0&ord=1&category_id=m0&page='.$i;
	$content = file_get_contents($search_url);
	// print $content;
	$item = preg_match_all('/ka\/detail\/(\d*)\"/s', $content ,$estimates);

	$ids = [];
	foreach ( $estimates[1] as $k => $v) {
	    if ($k % 2 == 0) {
	        $ids[] = $v;
	    }
	}

	file_put_contents('ids.txt', implode("\n", $ids)."\n", FILE_APPEND);
	file_put_contents('pages.txt', count($ids) . ' ids from page '.$i."\n", FILE_APPEND);

}