<?
/**************************************/
/*		@ CreatSelect(Smarty)		  */
/*		@ 2006.10.14				  */
/*		@ Designer AnVy				  */
/**************************************/
function CreatSelect($vars)
{
$thisJs = md5($vars['p'].$vars['c']);
?>

<script language="JavaScript"> 
<!-- 
var <?php echo $thisJs?> = new Array();
<?
$i = 0;
if (is_array($vars['v']))
{
	foreach($vars['v'] as $k => $v)
	{
		if (is_array($v['child']))
		{
			foreach($v['child'] as $k_c => $v_c)
			{
				echo "subcat[$i] = new Array('$v[value]','$v_c','$k_c');";
				$i ++;
			}
		}
	}
}
?>
function <?php echo $thisJs?>_changeselect(locationid) 
{ 
	var o_c = document.getElementById('<? echo $vars['c']?>');
	o_c.length = 0; 
	o_c.options[0] = new Option('請選擇',''); 
	for (i=0; i<<?php echo $thisJs?>.length; i++)
	{ 
		if (<?php echo $thisJs?>[i][0] == locationid) 
		{
			o_c.options[o_c.length] = new Option(<?php echo $thisJs?>[i][1], <?php echo $thisJs?>[i][2]);
		}
	} 
} 
//--> 
</script> 
<select name="<? echo $vars['p']?>" id="<? echo $vars['p']?>" onChange="<?php echo $thisJs?>_changeselect(this.value)"> 
<option value="">-------</option> 
<?
foreach($vars['v'] as $k => $v)
{
	echo "<option value=$v[value] ".(($vars['p_s'] == $v['value'])?"selected":"").">$v[title]</option>";
}
?>
</select> 
<select name="<? echo $vars['c']?>" id="<? echo $vars['c']?>"> 
<option  value="">-------</option> 
<?
if ($vars['p_s'] && is_array($vars['v']))
{
	foreach($vars['v'] as $key => $val)
	{
		if (($val['value'] == $vars['p_s']) && is_array($val['child'])){
			foreach($val['child'] as $k2 => $v2)
			{
				echo "<option value='$k2' ".(($vars['c_s'] == $k2)?"selected":"").">$v2</option>";
			}
		}
	}
}
?>
</select> 
<?
}
?>
