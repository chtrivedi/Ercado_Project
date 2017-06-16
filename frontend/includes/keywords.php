<?php

$reskey = selectAllRecords("keywords where colname = $key");
$arrkey=mysql_fetch_array($reskey);
		
@$pagetitle = $arrkey['titletag'];
@$keywordtag = $arrkey['keywordtag'];
@$descrtag = $arrkey['descrtag'];
@$alttag = $arrkey['alttag'];

define('PAGETITLE', $pagetitle);
define('METAKEYWORDS', $keywordtag);
define('METADESCR', $descrtag);
define('ALTTAG', $alttag);

?>