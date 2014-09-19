<?
  header("Cache-Control: no-cache");
  header("Pragma: no-cache");
  header("Expires: Tue, Jan 12 1999 05:00:00 GMT");
  header("Content-Type: text/html; charset=utf-8");

  include_once "config.php";
  include_once $Server_Path."library/class.FastTemplate.php";
  include_once $Server_Path."library/mems/LiveMemsCfactory.php";
  //ѼƳ]w 
  require_once("heading.php");
 //ϥHinet|tεnJphp 
  require_once("HinetMBRz.php");
	
   for($i=0;$i<count($PartnetDomain);$i++){
      setcookie("Domain","@Hinet",0,"/",".".$PartnetDomain[$i]);
   }
   
/*   if(isset($_COOKIE["otpw"]) && empty($_COOKIE["sn"])){
      header("Location: http://club.hinet.net/Clublogin/login.jsp?channelurl=http://match.club.hinet.net/mems/LiveMemsLogined.php");
      return;
   }*/
   
   /* qHnJϰ*/
	$CheckSumComponent=new CheckSum;

	$CheckSum=$CheckSumComponent->Sum($version,$curl,$siteid,$sessionid,$curl_in,$others_in);

	$LoginURL=trim($serverURL."/HiReg/checkcookieservlet?version=".$version."&curl=".$curl."&siteid=".$siteid."&sessionid=".$sessionid."&channelurl=".$curl_in."&others=".$others_in."&checksum=".trim($CheckSum));
//echo $LoginURL;
    //iAOchannelnJ(cookie otpw)A|bnJAiHredirect$LoginURL@{ˬd
	$session_otpw = $_SESSION["otpw"]; 

	$cookie_otpw =$_COOKIE["otpw"];//ݬ hinet.netcht.com.twxuite.netdomainio

	if ((strlen($session_otpw)==0)&&(strlen($cookie_otpw)!=0))

		header("location: ".$LoginURL);	

	/*if ($cookie_otpw==$session_otpw)
    {*/
		$CheckSum_out=$CheckSumComponent->LogoutCheckSum($cookie_otpw,$siteid,$curl_out,$others_out);

		$LogoutURL=$serverURL."/MemberLogout/logout?OTPW=".$cookie_otpw."&siteID=".$siteid."&curl=".$curl_out."&others=".$others_out."&checksum=".$CheckSum_out;

	/*}*/

   /* qHnJϰ*/


   $MemsVars = new LiveMemsCglobal();
   $LiveMems = new LiveMemsCfactory();
   $MemberInfo=$LiveMems->GetLiveOnline();
   $MemberProfile=$LiveMems->GetMemberProfileByUID($MemberInfo["UID"]);
   unset($LiveMems);

   include_once $Server_Path."option/index.php";

   $HeaderInfo="header";

   $tpl = new FastTemplate($Server_Path."templates/reps");
   $tpl->define(array(apg6 => "hinetindex.html"));
   $tpl->assign("HEADER",$HeaderInfo);
   $tpl->assign("LoginURL",trim($LoginURL));
   $tpl->assign("LogoutURL",trim($LogoutURL));
   $tpl->assign("FUNCTION_OPTION",$FunctionOption[$MemberProfile["GENDER"]]);
   $tpl->parse(MAIN, "apg6");
   $tpl->FastPrint(MAIN);
   return;
?>
