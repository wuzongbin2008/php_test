		//<![CDATA[

		// Funtion that show/hide layers and call the Ajax object
		function loadTree(id){
			if (document.getElementById("c"+id).style.display=="none"){
				document.getElementById("c"+id).style.display="inline";

			if(document.getElementById("c"+id).innerHTML == ""){
				document.getElementById("c"+id).innerHTML="loading...";  // place to insert a preloading icon .... web2.0 like

				target = document.getElementById("c"+id);
				var myConn = new XHConn();
				if (!myConn) alert("XMLHTTP not available. Try a newer/better browser.");
				myConn.connect("tree_sub.php", "POST", "id="+id, showTree);
				}
			} else {
				document.getElementById("c"+id).style.display="none";
				}
		}

		// Funtion whenDone XHConn is complete
		showTree = function(oXML) {
			target.innerHTML = oXML.responseText;
			if(oXML.responseText == "")
				target.style.display="none";
		}

		//]]>