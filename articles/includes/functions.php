<?php
	function displaypaging($url, $totrecs, $lmt, $pag, $width, $tblclass){
		//echo "Hello"; die;
		if($pag==0) $pag=1;
		$nextpage=$pag+1;
		$prevpage=$pag-1;
		$totalpages = ceil($totrecs / (float)$lmt);
		if($totalpages>1){		
			echo 	'<table cellpadding=0 cellspacing=0 width='.$width.' class='.$tblclass.'><tr><td>';
					if($pag>1){
						echo 	'<a href='.$url.'&page='.$prevpage.' class='.$tblclass.'1'.'>Prev</a>';
					}else{
						echo 'Prev';
					}
			echo ' | ';
					if($pag<$totalpages){
						echo	'<a href='.$url.'&page='.$nextpage.' class='.$tblclass.'1'.'>Next</a>';
					}else{
						echo 'Next';
					}
			echo '</td><td align=right>Pages : ';
				for($ipg=1;$ipg<=$totalpages;$ipg++){
					if($pag==$ipg){
						echo $ipg.'&nbsp;&nbsp;';
					}else{
						echo '<a href='.$url.'&page='.$ipg.' class='.$tblclass.'1'.'>'.$ipg.'</a>&nbsp;&nbsp;';
					}
				}
			echo '</td></tr></table>';
		}
	}
	

?>