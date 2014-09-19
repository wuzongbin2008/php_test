

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>
	AjaxPro.NET实现的简单高效的Tree——51aspx.com
</title><link type="text/css" href="css/tree.css" rel="stylesheet" /></head>
<body>
    <form name="form1" method="post" action="dir_tree.aspx" id="form1">
<div>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMjA3Njg3MzY0MmRkuHDGM6LNtub5kX2VMozYiXeTBT4=" />
</div>

<script type="text/javascript" src="/Test2008/ajax/common.ashx"></script><script type="text/javascript" src="/Test2008/ajax/Test_TreeView_Ajax_tree,App_Web_rktgzp_n.ashx"></script>
    <div>
        <div id="Panel1" style="height:424px;width:251px;">
	
            <div id="CategoryTree" class="TreeMenu"></div>
        
</div>
        <script language="jscript">
            var tree = document.getElementById("CategoryTree");
            var root = document.createElement("li");
            var li_father;
            var iCategoryID; 
            
            root.id = "li_0";
            tree.appendChild( root );
            
            ExpandSubCategory(0,'');
            
            ///添加子节点
            function ExpandSubCategory(categoryID,path)
            {
                
                var liFather = document.getElementById( "li_" + categoryID );
               //liFather=obj;
             
               if(categoryID!=0)
                  iCategoryID=liFather.id;
               
                if( liFather.getElementsByTagName("li").length > 0)
                {  
                    ChangeStatus( categoryID );
                    return;
                }
                liFather.className = "Opened";
                SwitchNode(categoryID, true );
               
                //仅获取当前节点的子Nodes
               // Test_TreeView_Ajax_tree.GetSubCategory( categoryID, GetSubCategory_callback );
               Test_TreeView_Ajax_tree.GetSubCategory(categoryID,GetSubCategory_callback );
            }  
            
            ///      
            function SwitchNode(CategoryID, show )
            {
                var li_father = document.getElementById("li_" + CategoryID);

                if( show )
                {
                    var ul = document.createElement("ul");
                    ul.id = "ul_note_" + CategoryID;
                    
                    var note = document.createElement("li");
                    note.className = "Child";              
                    
                    var img = document.createElement("img");
                    img.className = "s";
                    img.src = "css/s.gif";                    
                    
                    var a = document.createElement("a");
                    a.href = "javascript:void(0);";
                    a.innerHTML = "Please waiting...";
                    
                    note.appendChild(img);
                    note.appendChild(a);
                    ul.appendChild(note);
                    li_father.appendChild(ul);  //alert('ok'); alert(li_father.id+show);                              
                }   
                else
                {
                    var ul = document.getElementById("ul_note_" + CategoryID );
                    
                    if( ul )
                    {
                        li_father.removeChild(ul);
                    }
                }             
            }
            
            ///
            function GetSubCategory_callback( response )
            {  
               var dt = response.value.Tables[0];
//               if( dt.Rows.length > 0 )
//               {    
//                    var iCategoryID = dt.Rows[0].FatherID;                       
//               }  
                                          
               var li_father = document.getElementById("li_" + iCategoryID );
			   alert(iCategoryID);
               //li_father=li_father.parentNode;
               var id;
               
               var ul = document.createElement("ul"); 
               for( var i = 0; i < dt.Rows.length; i++ )
               { 
                    id=Math.floor(Math.random()*100000000000000000000);
               
                    if( dt.Rows[i].IsChild == 1 )
                    {
                        var li = document.createElement("li");
                        li.className = "Child";
                        //li.id = "li_" + dt.Rows[i].CategoryID;
                        li.id = "li_" + id;
                        var img = document.createElement("img");
                        //img.id = dt.Rows[i].CategoryID;
                        img.id=id;
                        img.className = "s";
                        img.src = "css/s.gif";
                        var a = document.createElement("a");
                        a.href = "javascript:OpenDocument('" + dt.Rows[i].CategoryID + "');";
                        a.innerHTML = dt.Rows[i].CategoryName;                                          
                    }
                    else
                    {
                        var li = document.createElement("li");
                        li.className = "Closed";
                        //li.id = "li_" + dt.Rows[i].CategoryID;
                        li.id = "li_" + id;
                        var img = document.createElement("img");
                        //img.id = dt.Rows[i].CategoryID;
                        img.id = id;
                        img.className = "s";
                        img.src = "css/s.gif";
                        img.onclick = function(){ ExpandSubCategory(id,dt.Rows[i].CategoryID); };
                        img.alt = "Expand/collapse";
                        var a = document.createElement("a");
                        a.href = "javascript:ExpandSubCategory('"+id+"','" +dt.Rows[i].CategoryID+ "');";
                        a.innerHTML = dt.Rows[i].CategoryName;                               
                    }
                    li.appendChild(img);
                    li.appendChild(a);
                    ul.appendChild(li);
               }
               li_father.appendChild(ul);
               SwitchNode( iCategoryID, false );
            }          
            
            //单击叶节点时, 异步从服务端获取单个节点的数据.
            function OpenDocument( CategoryID )
            {                
                Test_TreeView_Ajax_tree.GetNameByCategoryID( CategoryID, GetNameByCategoryID_callback );
            }
           
            function GetNameByCategoryID_callback( response )
            {
                alert( response.value );
            }
            
            function ChangeStatus(CategoryID)
            {
                var li_father = document.getElementById("li_" + CategoryID );
                if( li_father.className == "Closed" )
                {
                    li_father.className = "Opened";
                }
                else
                {
                    li_father.className = "Closed";
                }
           }              
        </script>          
    </div>
    <input type="submit" name="Button1" value="Button" id="Button1" />
    
<div>

	<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWAgKo1syqBgKM54rGBmC8D3KYruNB8Z2e7fbqhfAqVEBA" />
</div></form>
</body>
</html>
