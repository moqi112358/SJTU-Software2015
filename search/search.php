<?php
	$keyword = strtolower(trim($_POST['searchKeyWord']));
	$type = trim($_POST['searchType']);
	exec("perl count_v2.pl $keyword $type", $out);
	$result = "";
	$number = count($out);
	if ($number <= 3){
		$result = "<tr><td>No Results</td></tr>";
	}else{
		for ($i = 2; $i < $number - 1; ++$i){
			$result .= "<tr class = \"searchResult\">";
			$resArray = explode("|", $out[$i]);
			foreach ($resArray as $value) {
				$result .= "<td>".$value."</td>";
			}
			$result .= "</tr>";
		}
	}
	echo $result;
?>