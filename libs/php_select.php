<?php
function phpCreatSelect($p_name, $c_name, $arr,$p_selected = '',$c_selected = '')
{
$flag = 'php_'.$p_name.'_'.$c_name;
?>

<script language="JavaScript"> 
<!-- 
var <?php echo $flag?> = new Array();
<?php
$i = 0;
if (is_array($arr))
{
	foreach($arr as $k => $v)
	{
		if (is_array($v['child']))
		{
			foreach($v['child'] as $k_c => $v_c)
			{
				echo $flag."[$i] = new Array('$v[value]','$v_c','$k_c');";
				$i ++;
			}
		}
	}
}
?>
function <?php echo $flag?>_changeselect(locationid) 
{ 
	var o_c = document.getElementById('<?php echo $c_name?>');
	o_c.length = 0; 
	o_c.options[0] = new Option('------',''); 
	for (i=0; i<<?php echo $flag?>.length; i++)
	{ 
		if (<?php echo $flag?>[i][0] == locationid) 
		{
			o_c.options[o_c.length] = new Option(<?php echo $flag?>[i][1], <?php echo $flag?>[i][2]);
		}
	} 
} 
//--> 
</script> 
<select name="<?php echo $p_name?>" id="<?php echo $p_name?>" onChange="<?php echo $flag?>_changeselect(this.value)"> 
<option value="">-------</option> 
<?php
foreach($arr as $k => $v)
	echo "<option value=$v[value] ".(($p_selected == $v['value'])?"selected":"").">$v[title]</option>";
?>
</select> 
<select name="<?php echo $c_name?>" id="<?php echo $c_name?>"> 
<option  value="">-------</option> 
<?php
if ($p_selected && is_array($arr))
{
	foreach($arr as $key => $val)
	{
		if (($val['value'] == $p_selected) && is_array($val['child'])){
			foreach($val['child'] as $k2 => $v2)
				echo "<option value='$k2' ".(($c_selected == $k2)?"selected":"").">$v2</option>";
		}
	}
}
?>
</select> 
<?php
}
?>