function MYGO(flag)
{
	if(flag=="title_1")
	{
		document.getElementById("a1_0").style.display="block";
		document.getElementById("a1_1").style.display="none";
		document.getElementById("a2_0").style.display="none";
		document.getElementById("a2_1").style.display="block";
		document.getElementById("a3_0").style.display="none";
		document.getElementById("a3_1").style.display="block";
		document.getElementById("a4_0").style.display="none";
		document.getElementById("a4_1").style.display="block";
		document.getElementById("a1_info").style.display="block";
		document.getElementById("a2_info").style.display="none";
		document.getElementById("a3_info").style.display="none";
		document.getElementById("a4_info").style.display="none";
	}
	else if(flag=="title_2")
	{
		document.getElementById("a1_0").style.display="none";
		document.getElementById("a1_1").style.display="block";
		document.getElementById("a2_0").style.display="block";
		document.getElementById("a2_1").style.display="none";
		document.getElementById("a3_0").style.display="none";
		document.getElementById("a3_1").style.display="block";
		document.getElementById("a4_0").style.display="none";
		document.getElementById("a4_1").style.display="block";
		document.getElementById("a1_info").style.display="none";
		document.getElementById("a2_info").style.display="block";
		document.getElementById("a3_info").style.display="none";
		document.getElementById("a4_info").style.display="none";
	}
	else if(flag=="title_3")
	{
		document.getElementById("a1_0").style.display="none";
		document.getElementById("a1_1").style.display="block";
		document.getElementById("a2_0").style.display="none";
		document.getElementById("a2_1").style.display="block";
		document.getElementById("a3_0").style.display="block";
		document.getElementById("a3_1").style.display="none";
		document.getElementById("a4_0").style.display="none";
		document.getElementById("a4_1").style.display="block";
		document.getElementById("a1_info").style.display="none";
		document.getElementById("a2_info").style.display="none";
		document.getElementById("a3_info").style.display="block";
		document.getElementById("a4_info").style.display="none";
	}
	else if(flag=="title_4")
	{
		document.getElementById("a1_0").style.display="none";
		document.getElementById("a1_1").style.display="block";
		document.getElementById("a2_0").style.display="none";
		document.getElementById("a2_1").style.display="block";
		document.getElementById("a3_0").style.display="none";
		document.getElementById("a3_1").style.display="block";
		document.getElementById("a4_0").style.display="block";
		document.getElementById("a4_1").style.display="none";
		document.getElementById("a1_info").style.display="none";
		document.getElementById("a2_info").style.display="none";
		document.getElementById("a3_info").style.display="none";
		document.getElementById("a4_info").style.display="block";

	}

}

function MYW(flag)
{
	if(flag=="title_1")
	{
		document.getElementById("w1_0").style.display="block";
		document.getElementById("w1_1").style.display="none";
		document.getElementById("w2_0").style.display="none";
		document.getElementById("w2_1").style.display="block";
		document.getElementById("w3_0").style.display="none";
		document.getElementById("w3_1").style.display="block";
		document.getElementById("w1_info").style.display="block";
		document.getElementById("w2_info").style.display="none";
		document.getElementById("w3_info").style.display="none";
	}
	else if(flag=="title_2")
	{
		document.getElementById("w1_0").style.display="none";
		document.getElementById("w1_1").style.display="block";
		document.getElementById("w2_0").style.display="block";
		document.getElementById("w2_1").style.display="none";
		document.getElementById("w3_0").style.display="none";
		document.getElementById("w3_1").style.display="block";
		document.getElementById("w1_info").style.display="none";
		document.getElementById("w2_info").style.display="block";
		document.getElementById("w3_info").style.display="none";
	}
	else if(flag=="title_3")
	{
		document.getElementById("w1_0").style.display="none";
		document.getElementById("w1_1").style.display="block";
		document.getElementById("w2_0").style.display="none";
		document.getElementById("w2_1").style.display="block";
		document.getElementById("w3_0").style.display="block";
		document.getElementById("w3_1").style.display="none";
		document.getElementById("w1_info").style.display="none";
		document.getElementById("w2_info").style.display="none";
		document.getElementById("w3_info").style.display="block";
	}

}

function MYHOT_D(n,zx)
{
	var dd=n
		if(dd==0){
			document.getElementById('D0').className="D0";
			document.getElementById('D1').className="D1_1";
			document.getElementById('D2').className="D2_1";
			document.getElementById('D3').className="D3_1";
			document.getElementById('D4').className="D4_1";
			document.getElementById('D5').className="D5_1";
			document.getElementById('D6').className="D6_1";
			document.getElementById('myD0').style.display="";
			document.getElementById('myD1').style.display="none";
			document.getElementById('myD2').style.display="none";
			document.getElementById('myD3').style.display="none";
			document.getElementById('myD4').style.display="none";
			document.getElementById('myD5').style.display="none";
			document.getElementById('myD6').style.display="none";
		}
		else if(dd==1){
				document.getElementById('D0').className="D0_1";
				document.getElementById('D1').className="D1";
				document.getElementById('D2').className="D2_1";
			    document.getElementById('D3').className="D3_1";
			    document.getElementById('D4').className="D4_1";
			    document.getElementById('D5').className="D5_1";
			    document.getElementById('D6').className="D6_1";
				document.getElementById('myD0').style.display="none";
				document.getElementById('myD1').style.display="";
				document.getElementById('myD2').style.display="none";
				document.getElementById('myD3').style.display="none";
				document.getElementById('myD4').style.display="none";
				document.getElementById('myD5').style.display="none";
				document.getElementById('myD6').style.display="none";
	    }
		else if(dd==2){
				document.getElementById('D0').className="D0_1";
				document.getElementById('D1').className="D1_1";
				document.getElementById('D2').className="D2";
				document.getElementById('D3').className="D3_1";
			    document.getElementById('D4').className="D4_1";
			    document.getElementById('D5').className="D5_1";
			    document.getElementById('D6').className="D6_1";
				document.getElementById('myD0').style.display="none";
				document.getElementById('myD1').style.display="none";
				document.getElementById('myD2').style.display="";
				document.getElementById('myD3').style.display="none";
				document.getElementById('myD4').style.display="none";
				document.getElementById('myD5').style.display="none";
				document.getElementById('myD6').style.display="none";
		}
		else if(dd==3){
				document.getElementById('D0').className="D0_1";
				document.getElementById('D1').className="D1_1";
				document.getElementById('D2').className="D2_1";
				document.getElementById('D3').className="D3";
			    document.getElementById('D4').className="D4_1";
			    document.getElementById('D5').className="D5_1";
			    document.getElementById('D6').className="D6_1";
				document.getElementById('myD0').style.display="none";
				document.getElementById('myD1').style.display="none";
				document.getElementById('myD2').style.display="none";
				document.getElementById('myD3').style.display="";
				document.getElementById('myD4').style.display="none";
				document.getElementById('myD5').style.display="none";
				document.getElementById('myD6').style.display="none";
		}
		else if(dd==4){
				document.getElementById('D0').className="D0_1";
				document.getElementById('D1').className="D1_1";
				document.getElementById('D2').className="D2_1";
				document.getElementById('D3').className="D3_1";
			    document.getElementById('D4').className="D4";
			    document.getElementById('D5').className="D5_1";
			    document.getElementById('D6').className="D6_1";
				document.getElementById('myD0').style.display="none";
				document.getElementById('myD1').style.display="none";
				document.getElementById('myD2').style.display="none";
				document.getElementById('myD3').style.display="none";
				document.getElementById('myD4').style.display="";
				document.getElementById('myD5').style.display="none";
				document.getElementById('myD6').style.display="none";
		}
		else if(dd==5){
				document.getElementById('D0').className="D0_1";
				document.getElementById('D1').className="D1_1";
				document.getElementById('D2').className="D2_1";
				document.getElementById('D3').className="D3_1";
			    document.getElementById('D4').className="D4_1";
			    document.getElementById('D5').className="D5";
			    document.getElementById('D6').className="D6_1";
				document.getElementById('myD0').style.display="none";
				document.getElementById('myD1').style.display="none";
				document.getElementById('myD2').style.display="none";
				document.getElementById('myD3').style.display="none";
				document.getElementById('myD4').style.display="none";
				document.getElementById('myD5').style.display="";
				document.getElementById('myD6').style.display="none";
		}
		else if(dd==6){
				document.getElementById('D0').className="D0_1";
				document.getElementById('D1').className="D1_1";
				document.getElementById('D2').className="D2_1";
				document.getElementById('D3').className="D3_1";
			    document.getElementById('D4').className="D4_1";
			    document.getElementById('D5').className="D5_1";
			    document.getElementById('D6').className="D6";
				document.getElementById('myD0').style.display="none";
				document.getElementById('myD1').style.display="none";
				document.getElementById('myD2').style.display="none";
				document.getElementById('myD3').style.display="none";
				document.getElementById('myD4').style.display="none";
				document.getElementById('myD5').style.display="none";
				document.getElementById('myD6').style.display="";
		}

}

function MYHOT_E(n,zx)
{
	var dd=n
		if(dd==0){
			document.getElementById('E0').className="E0";
			document.getElementById('E1').className="E1_1";
			document.getElementById('E2').className="E2_1";
			document.getElementById('E3').className="E3_1";
			document.getElementById('E4').className="E4_1";
			document.getElementById('myE0').style.display="";
			document.getElementById('myE1').style.display="none";
			document.getElementById('myE2').style.display="none";
			document.getElementById('myE3').style.display="none";
			document.getElementById('myE4').style.display="none";
		}
		else if(dd==1){
				document.getElementById('E0').className="E0_1";
				document.getElementById('E1').className="E1";
				document.getElementById('E2').className="E2_1";
			    document.getElementById('E3').className="E3_1";
			    document.getElementById('E4').className="E4_1";
				document.getElementById('myE0').style.display="none";
				document.getElementById('myE1').style.display="";
				document.getElementById('myE2').style.display="none";
				document.getElementById('myE3').style.display="none";
				document.getElementById('myE4').style.display="none";
	    }
		else if(dd==2){
				document.getElementById('E0').className="E0_1";
				document.getElementById('E1').className="E1_1";
				document.getElementById('E2').className="E2";
				document.getElementById('E3').className="E3_1";
			    document.getElementById('E4').className="E4_1";
				document.getElementById('myE0').style.display="none";
				document.getElementById('myE1').style.display="none";
				document.getElementById('myE2').style.display="";
				document.getElementById('myE3').style.display="none";
				document.getElementById('myE4').style.display="none";
		}
		else if(dd==3){
				document.getElementById('E0').className="E0_1";
				document.getElementById('E1').className="E1_1";
				document.getElementById('E2').className="E2_1";
				document.getElementById('E3').className="E3";
			    document.getElementById('E4').className="E4_1";
				document.getElementById('myE0').style.display="none";
				document.getElementById('myE1').style.display="none";
				document.getElementById('myE2').style.display="none";
				document.getElementById('myE3').style.display="";
				document.getElementById('myE4').style.display="none";
		}
		else if(dd==4){
				document.getElementById('E0').className="E0_1";
				document.getElementById('E1').className="E1_1";
				document.getElementById('E2').className="E2_1";
				document.getElementById('E3').className="E3_1";
			    document.getElementById('E4').className="E4";
				document.getElementById('myE0').style.display="none";
				document.getElementById('myE1').style.display="none";
				document.getElementById('myE2').style.display="none";
				document.getElementById('myE3').style.display="none";
				document.getElementById('myE4').style.display="";
		}

}

function MYHOT_F(n,zx)
{
	var dd=n
		if(dd==0){
			document.getElementById('F0').className="F0";
			document.getElementById('F1').className="F1_1";
			document.getElementById('F2').className="F2_1";
			document.getElementById('F3').className="F3_1";
			document.getElementById('F4').className="F4_1";
			document.getElementById('F5').className="F5_1";
			document.getElementById('F6').className="F6_1";
			document.getElementById('myF0').style.display="";
			document.getElementById('myF1').style.display="none";
			document.getElementById('myF2').style.display="none";
			document.getElementById('myF3').style.display="none";
			document.getElementById('myF4').style.display="none";
			document.getElementById('myF5').style.display="none";
			document.getElementById('myF6').style.display="none";
		}
		else if(dd==1){
				document.getElementById('F0').className="F0_1";
				document.getElementById('F1').className="F1";
				document.getElementById('F2').className="F2_1";
			    document.getElementById('F3').className="F3_1";
			    document.getElementById('F4').className="F4_1";
			    document.getElementById('F5').className="F5_1";
			    document.getElementById('F6').className="F6_1";
				document.getElementById('myF0').style.display="none";
				document.getElementById('myF1').style.display="";
				document.getElementById('myF2').style.display="none";
				document.getElementById('myF3').style.display="none";
				document.getElementById('myF4').style.display="none";
				document.getElementById('myF5').style.display="none";
				document.getElementById('myF6').style.display="none";
	    }
		else if(dd==2){
				document.getElementById('F0').className="F0_1";
				document.getElementById('F1').className="F1_1";
				document.getElementById('F2').className="F2";
				document.getElementById('F3').className="F3_1";
			    document.getElementById('F4').className="F4_1";
			    document.getElementById('F5').className="F5_1";
			    document.getElementById('F6').className="F6_1";
				document.getElementById('myF0').style.display="none";
				document.getElementById('myF1').style.display="none";
				document.getElementById('myF2').style.display="";
				document.getElementById('myF3').style.display="none";
				document.getElementById('myF4').style.display="none";
				document.getElementById('myF5').style.display="none";
				document.getElementById('myF6').style.display="none";
		}
		else if(dd==3){
				document.getElementById('F0').className="F0_1";
				document.getElementById('F1').className="F1_1";
				document.getElementById('F2').className="F2_1";
				document.getElementById('F3').className="F3";
			    document.getElementById('F4').className="F4_1";
			    document.getElementById('F5').className="F5_1";
			    document.getElementById('F6').className="F6_1";
				document.getElementById('myF0').style.display="none";
				document.getElementById('myF1').style.display="none";
				document.getElementById('myF2').style.display="none";
				document.getElementById('myF3').style.display="";
				document.getElementById('myF4').style.display="none";
				document.getElementById('myF5').style.display="none";
				document.getElementById('myF6').style.display="none";
		}
		else if(dd==4){
				document.getElementById('F0').className="F0_1";
				document.getElementById('F1').className="F1_1";
				document.getElementById('F2').className="F2_1";
				document.getElementById('F3').className="F3_1";
			    document.getElementById('F4').className="F4";
			    document.getElementById('F5').className="F5_1";
			    document.getElementById('F6').className="F6_1";
				document.getElementById('myF0').style.display="none";
				document.getElementById('myF1').style.display="none";
				document.getElementById('myF2').style.display="none";
				document.getElementById('myF3').style.display="none";
				document.getElementById('myF4').style.display="";
				document.getElementById('myF5').style.display="none";
				document.getElementById('myF6').style.display="none";
		}
		else if(dd==5){
				document.getElementById('F0').className="F0_1";
				document.getElementById('F1').className="F1_1";
				document.getElementById('F2').className="F2_1";
				document.getElementById('F3').className="F3_1";
			    document.getElementById('F4').className="F4_1";
			    document.getElementById('F5').className="F5";
			    document.getElementById('F6').className="F6_1";
				document.getElementById('myF0').style.display="none";
				document.getElementById('myF1').style.display="none";
				document.getElementById('myF2').style.display="none";
				document.getElementById('myF3').style.display="none";
				document.getElementById('myF4').style.display="none";
				document.getElementById('myF5').style.display="";
				document.getElementById('myF6').style.display="none";
		}
		else if(dd==6){
				document.getElementById('F0').className="F0_1";
				document.getElementById('F1').className="F1_1";
				document.getElementById('F2').className="F2_1";
				document.getElementById('F3').className="F3_1";
			    document.getElementById('F4').className="F4_1";
			    document.getElementById('F5').className="F5_1";
			    document.getElementById('F6').className="F6";
				document.getElementById('myF0').style.display="none";
				document.getElementById('myF1').style.display="none";
				document.getElementById('myF2').style.display="none";
				document.getElementById('myF3').style.display="none";
				document.getElementById('myF4').style.display="none";
				document.getElementById('myF5').style.display="none";
				document.getElementById('myF6').style.display="";
		}

}
function MYHOT_G(n,zx)
{
	var dd=n
		if(dd==0){
			document.getElementById('G0').className="G0";
			document.getElementById('G1').className="G1_1";
			document.getElementById('G2').className="G2_1";
			document.getElementById('G3').className="G3_1";
			document.getElementById('myG0').style.display="";
			document.getElementById('myG1').style.display="none";
			document.getElementById('myG2').style.display="none";
			document.getElementById('myG3').style.display="none";
		}
		else if(dd==1){
				document.getElementById('G0').className="G0_1";
				document.getElementById('G1').className="G1";
				document.getElementById('G2').className="G2_1";
			    document.getElementById('G3').className="G3_1";
				document.getElementById('myG0').style.display="none";
				document.getElementById('myG1').style.display="";
				document.getElementById('myG2').style.display="none";
				document.getElementById('myG3').style.display="none";
	    }
		else if(dd==2){
				document.getElementById('G0').className="G0_1";
				document.getElementById('G1').className="G1_1";
				document.getElementById('G2').className="G2";
				document.getElementById('G3').className="G3_1";
				document.getElementById('myG0').style.display="none";
				document.getElementById('myG1').style.display="none";
				document.getElementById('myG2').style.display="";
				document.getElementById('myG3').style.display="none";
		}
		else if(dd==3){
				document.getElementById('G0').className="G0_1";
				document.getElementById('G1').className="G1_1";
				document.getElementById('G2').className="G2_1";
				document.getElementById('G3').className="G3";
				document.getElementById('myG0').style.display="none";
				document.getElementById('myG1').style.display="none";
				document.getElementById('myG2').style.display="none";
				document.getElementById('myG3').style.display="";
		}
}