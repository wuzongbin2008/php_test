<?php
$G_CONF_TYPE_LIST = array(
	'large'=>'.lar', 'bmiddle' => '.bmi', 'small' => '.int', 'nmw690' => '.int', 'thumbnail' => '.thu',
	'mw690' => '.lar',

	'mw1024' => '.lar', 'mw720' => '.lar', 'mw2048' => '.lar',

	'square' => '.int', 'mw600' => '.lar', 'mw240' => '.int', 'cmw205' => '.int', 'cmw218' => '.int', 'sq612' => '.int',
	'mw220' => '.int', 'sq480' => '.lar',

	/* wap **/
	'wap800'=>'.lar',
	'wap690'=>'.lar', 'wap35'=>'.thu', 'wap50'=>'.int',
	'wap120'=>'.thu', 'wap128'=>'.int', 'wap176'=>'.bmi',
	'wap240'=>'.bmi', 'wap320'=>'.bmi',	'woriginal' => '.lar',
	'wap180'=>'.int', 'wap360'=>'.int', 'wap720'=>'.lar',

	/* webp **/
	'webp180'=>'.int', 'webp360'=>'.int', 'webp720'=>'.lar',
	'webp440'=>'.bmi',

	/* others */
	'thumb50'=> '.int', 'thumb30'=>'.int', 'thumb180'=> '.int', 'thumb150' => '.int',
	'ms080' => '.int', 'ms160' => '.int', 'thumb300' => '.int',

	/**/
	'crop' => '.lar',
);
$t = "interim";

if (!array_key_exists($t, $G_CONF_TYPE_LIST)) {
	print "no exists\n";
	if (!preg_match('/^([a-z0-9]+)\.(\d+)\.(\d+)\.(\d+)\.(\d+)(\.(\d+))?/', $t, $arg)) {
		var_dump($arg);
		return false;
	}
	$t = $arg[1];
	var_dump($t);
	if (!array_key_exists($t, $G_CONF_TYPE_LIST)) {

		return false;
	}

}

