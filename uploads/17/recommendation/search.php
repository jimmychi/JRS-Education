<?php
if(!empty($_GET['q'])) {
    search();
}
function search() {
    $con = mysql_connect('69.20.65.10','jimmytys', 'Studios54');
    mysql_select_db('colorlightoutput', $con);

    $q = mysql_real_escape_string($_GET['q'], $con);
	$q = strtolower($q);
	$sql = mysql_query("SELECT DISTINCT p.brandmodel FROM summary p WHERE LOWER(p.brandmodel) REGEXP '[[:<:]]$q'");
	//$sql = mysql_query("SELECT DISTINCT p.brandmodel FROM summary p WHERE LOWER(p.brandmodel) LIKE LOWER('%{$searchArray[0]}%{$searchArray[1]}%{$searchArray[2]}%')");

	
	
	/*
    $sql = mysql_query("
        SELECT
            p.title, SUBSTR(p.post,1,300) as post
        FROM Posts p
        WHERE p.title LIKE '%{$q}%' OR p.post LIKE '%{$q}%'
        ");
	*/
    //Create an array with the results
    $results=array();
    while($v = mysql_fetch_object($sql)){
        $results[] = array(
          'brandmodel'=>$v->brandmodel
		  //'brandmodel'=>$v->brandmodel,'model'=>$v->model
        );
    }

    //using JSON to encode the array
    echo json_encode($results);
}

