function getCookie(name){
  var begin;
  var end;
  var cname=name+"=";
  var dc=document.cookie;
  if(dc.length>0){
    begin=dc.indexOf(cname);
    if(begin!=-1){
      begin+=cname.length;
      end=dc.indexOf(";",begin);
      if(end==-1) end=dc.length;
      return unescape(dc.substring(begin,end));
    }
  }
  return null;
}

function trim(str) {
	return (str + '').replace(/(\s+)$/g, '').replace(/^\s+/g, '');
}

function header(){
	//alert(u);
  document.write('<TABLE cellSpacing=0 cellPadding=0 width=800 align="center" border=0><TBODY><TR>');
  document.write('<TD width=486><A href="http://club.hinet.net/"><IMG height=47 src="/logog.jpg" width=133 border=0></A></TD>');
  document.write('<TD class=td_12 width=264>');
  document.write('<DIV align=right>');
  
  document.write('<table width="100%" border="0" cellspacing="0" height="13"><tr align="left">');
  document.write('<td class="bluesmallerNoUnderline">');
  getCookie(name);
  var unsigned='<a style="font-size:15px;" href="http://member.hinet.net/HiReg/checkcookieservlet?version=1.0&curl=http://match.club.hinet.net/authorize.php&siteid=11&sessionid=&channelurl=http://match.club.hinet.net/mems/LiveMemsLogined.php&others=&checksum=8fdab0584235311688a64019bf0c2bbf" target="_top" class="bluesmaller">登入</a>';
  
  var signed='<a style="font-size:15px;" href="http://member.hinet.net/MemberLogout/logout?OTPW=f83bc39d599875afb06cc4cbf097396e&siteID=11&curl=http://match.club.hinet.net/mems/LiveMemsLogout.php&others=&checksum=64782b60cacaad0888db11f4b2ad938a" target="_top" class="bluesmaller">登出</a>';
  
  if((getCookie("otpw")==null || getCookie("otpw")=="") && (getCookie("self_otpw")==null || getCookie("self_otpw")=="")) document.write(unsigned);
  else document.write(signed);
  document.write('<b>|</b> <a style="font-size:15px;" href="http://member.hinet.net/MemberCenter/index.jsp" class="bluesmaller">會員中心</a> ');
  document.write('<b>|</b> <a style="font-size:15px;" href="http://club.hinet.net/faq/faq.htm" class="bluesmaller">服務說明</a> ');
  document.write('<b>|</b> <a style="font-size:15px;" href="http://www.hinet.net" class="bluesmaller">Hinet首頁</a></td></tr></table>');
  
  document.write('</DIV>');  
  document.write('</TD></TR><TR><TD colSpan=2 height=35>');
  document.write('<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center"><tr align="center"><td align="center">');
  document.write('<iframe width="200" height="20" marginwidth="0" marginheight="0" frameborder="0"  scrolling="no" bordercolor="#F3F5FF"	src="http://p4u.hinet.net/html.ng/site=hinet&affiliate=club&spacedesc=clubt2&params.styles=textQ" target="_blank"></iframe></td>');
  document.write('<td align="center"><iframe width="200" height="20" marginwidth="0" marginheight="0" frameborder="0"  scrolling="no" bordercolor="#F3F5FF"	src="http://p4u.hinet.net/html.ng/site=hinet&affiliate=club&spacedesc=clubt3&params.styles=textQ" target="_blank"></iframe></td>');
  document.write('<td align="center"><iframe width="144" height="20" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" bordercolor="#F3F5FF" src="http://p4u.hinet.net/html.ng/site=hinet&affiliate=club&spacedesc=clubt3&params.styles=textQ" target="_blank"></iframe></td>');
  document.write('<td align="center"><iframe width="200" height="20" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" src="http://times.hinet.net/headlineNews/otherNews.htm" allowtransparency="true" target="_blank"></iframe>');
  document.write('<td align="center"></tr></table></TD></TR></TBODY></TABLE>');
  
 /* document.write('<table width="100%" border="0" cellpadding="0" cellspacing="0" background="images/hinet/hinet_head_bg.jpg"><tr>');
  document.write('<td rowspan="2">&nbsp;</td><td width="225"><a href="../index.html"><img src="images/hinet/hinet_head_logo.gif" width="225" height="50" border="0"></a></td>');
  document.write('<td width="545" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0"><tr>');
  document.write('<td width="255" rowspan="3" background="images/hinet/hinet_head_2.gif">');
  document.write('<table width="100%" height="50" border="0" cellpadding="0" cellspacing="0">');
  document.write('<tr><td><img src="images/spacer.gif" width="10" height="30"></td></tr>');
  document.write('<tr><td><span class="top">目前線上 43 人|今日瀏覽人數 3306 人</span></td></tr>');
  document.write('</table>');
  document.write('</td><td><img src="images/hinet/hinet_head_3.gif" width="290" height="25"></td></tr>');*/
 // headerurl();
}

function headerurl(){
  document.write('<tr><td class="top"><div align="right"><!-- <a href="http://rose.club.hinet.net/" class="top" target="_blank">兩岸交友</a> | --><a href="../pals/LivePalsSearchNewPal.php" class="top">搜尋芳鄰</a> | <a href="../faq/index.php" class="top">常見問題</a> | <a href="../faq/index.php" class="top">聯絡我們</a>&nbsp;</div>');
  document.write('</td></tr><tr><td><img src="images/spacer.gif" width="50" height="6"></td></tr></table></td><td rowspan="2">&nbsp;</td></tr>');
  document.write('<tr><td colspan="2">');
  document.write('<table width="100%" border="0" cellspacing="0" cellpadding="0" background="images/head_r2_c1.jpg"><tr>');
  document.write('<td>&nbsp;<!-- <img src="images/menu_dot.gif" width="26" height="25" align="absmiddle"><a href="../cuap/" class="menu">小信差</a> --></td>');
  document.write('<td><img src="images/menu_dot.gif" width="26" height="25" align="absmiddle"><a href="../esay/LiveEsayShowNewDiary.php" class="menu">草莓報社</a></td>');
  document.write('<td><img src="images/menu_dot.gif" width="26" height="25" align="absmiddle"><a href="../esay/LiveEsayShowNewAlbum.php" class="menu">自戀影城</a></td>');
  document.write('<td><img src="images/menu_dot.gif" width="26" height="25" align="absmiddle"><a href="#" class="menu" onMouseOver="headergochange(1);">玩美百貨</a></td>');
  document.write('<td><img src="images/menu_dot.gif" width="26" height="25" align="absmiddle"><a href="../gifs/LiveGifsIndex.php" class="menu">禮品廣場</a></td>');
  document.write('<td><img src="images/menu_dot.gif" width="26" height="25" align="absmiddle"><a href="../mbcs/LiveMbcsSelectIndex.php" class="menu">點數銀行</a></td>');
  document.write('<td><img src="images/menu_dot.gif" width="26" height="25" align="absmiddle"><a href="../mems/LiveMemsShowProfile.php" onClick="javascript: window.open(\'../chat/LiveChatIndex.php\',\'\',\'toolbar=no,location=no,directories=no,menubar=no,titlebar=no,resizable=yes\');" class="menu" target="_blank">聊天俱樂部</a></td>');
  document.write('</tr></table>');
  document.write('</td></tr></table>');
  document.write('<table width="100%" border="0" cellpadding="0" cellspacing="0" id="beautylist" onMouseOut="headergochange(2);" onMouseOver="headergochange(1);">');
  document.write('<tr><td bgcolor="#DDF4C6">&nbsp;</td><td width="770"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>');
  document.write('<td width="300">&nbsp;</td>');
  document.write('<td><img src="images/menu_dot2.gif" width="26" height="25" align="absmiddle"><a href="../deps/LiveDepsHouseIndex.php" class="menu">美屋館</a>　<img src="images/menu_dot2.gif" width="26" height="25" align="absmiddle"><a href="../deps/LiveDepsBeautyIndex.php" class="menu">美妝館</a></td>');
  document.write('<td width="170">&nbsp;</td>');
  document.write('</tr></table>');
  document.write('</td><td bgcolor="#DDF4C6">&nbsp;<img src="http://flow.ek21.com/access.gif?love_hn" width="0" height="0"></td></tr></table>');
  headergo();
}

function headerleftoption(){
  newutf8adserver(275);
//  document.write('<a href="../rule/index.php"><img src="images/notice_635x80.gif" width="635" height="80" border="0"></a>');
}

function headerrightoption(){
  document.write('<table width="100%" border="0" cellspacing="0" cellpadding="0">');
  document.write('<tr><td width="35"><img src="images/flag_dot.gif" width="35" height="30"></td><td width="85" background="images/flag_dot2.gif"><div align="center"><a href="../mems/LiveMemsLogin.php" class="textlink01">居民登入</a></div></td></tr>');
  document.write('<tr><td><img src="images/flag_dot.gif" width="35" height="30"></td><td background="images/flag_dot2.gif"><div align="center"><a href="../mems/LiveMemsAgreement.php" class="textlink01">加入同居</a></div></td></tr>');
  document.write('<tr><td colspan="2">');
  newutf8adserver(313);
  document.write('</td></tr></table>');
}

function floor(){
  document.write('<base target="_blank"><table align="center" border="0" cellpadding="0" cellspacing="0" width="775"><tr><td colspan="33">');
  document.write('<table width="65%" border="0" align="center" cellspacing="0" cellpadding="0"><tr><td height="24">');
  document.write('<table border="0" align="center" cellpadding="0" cellspacing="0"><tr><td class="bluesmallerNoUnderline">');
  document.write('<b>|</b> <a href="http://www.hinet.net/footer_privacy.html" class="footer">隱私權保護</a>');
  document.write('<b>|</b> <a href="http://www.hinet.net/footer_sitemap.htm" class="footer">網站地圖</a>');
  document.write('<b>|</b> <a href="http://www.hinet.net/footer_index1.htm" class="footer">刊登廣告</a>');
  document.write('<b>|</b> <a href="http://club.hinet.net/about/about.htm" class="footer">關於社群網</a>');
  document.write('<b>|</b> <a href="http://www.hinet.net/notify.htm" class="footer">系統公告</a>');
  document.write('<b>|</b> <a href="http://service.hinet.net/ncsc/index.htm" class="footer">聯絡我們</a> <b>|</b></td>');
  document.write('</tr></table></td></tr><tr><td align="center" height="2"><img src="images/hinet/pixellightblue.gif" width="573" height="2"></td></tr>');
  document.write('<tr><td align="center" height="27"><font size="2" color="#000000" class="copyright">');
  document.write('中華電信數據通信分公司地址 : 臺北市信義路一段21號 全區24小時免費服務電話 : 0800080412</font></td></tr><tr><td>');
  document.write('<table width="62%" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td width="12%">');
  document.write('<img src="images/hinet/logo_02.gif" width="39" height="20"></td><td width="88%" class="copyright">');
  document.write('copyright 2003 HiNet Internet Service by Chunghwa Telecom.</td></tr></table></td></tr></table></td></tr></table>');
  document.write('<img src="http://count.ek21.com/Count.php" width="0" height="0">');
}

function headergo(){
  beautylist.style.display="none";
}

function headergochange(x){
  if(x==2){
    beautylist.style.display="none";
  } else if(x==1) {
    beautylist.style.display="block";
  }
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}

function phpads_deliverActiveX(content){
        document.write(content);
}

function newadserver(x){
   if (!document.phpAds_used) document.phpAds_used = ',';
   phpAds_random = new String (Math.random()); phpAds_random = phpAds_random.substring(2,11);

   document.write ("<" + "script language='JavaScript' type='text/javascript' src='");
   document.write ("http://ad.ek21.com/adjs.php?n=" + phpAds_random);
   document.write ("&amp;what=zone:" + x);
   document.write ("&amp;exclude=" + document.phpAds_used);
   if (document.referer)
      document.write ("&amp;referer=" + escape(document.referer));
   document.write ("'><" + "/script>");
}

function newutf8adserver(x){
   if (!document.phpAds_used) document.phpAds_used = ',';
   phpAds_random = new String (Math.random()); phpAds_random = phpAds_random.substring(2,11);

   document.write ("<" + "script language='JavaScript' type='text/javascript' src='");
   document.write ("http://ad.ek21.com/adutf8js.php?n=" + phpAds_random);
   document.write ("&amp;what=zone:" + x);
   document.write ("&amp;exclude=" + document.phpAds_used);
   if (document.referer)
      document.write ("&amp;referer=" + escape(document.referer));
   document.write ("'><" + "/script>");
}
