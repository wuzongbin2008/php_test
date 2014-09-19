/**
 * 自定义Facebook multi-friend-input控件
 * @param input 文本输入框
 * @param fb_friends  当前登入者的所有Facebook好友
 */
function multi_friend_input(input,fb_friends,selected_rows,sel_fr) {
	//autoComplete
	console.log(sel_fr);
	$(input).autocomplete(fb_friends, {
        matchContains:true,
		minChars: 0,
		width: 456,
		scroll:1000,
		autoFill: false,
		formatItem: function(row, i, max) {
			return row.name;
		},
		formatMatch: function(row, i, max) {
			return row.name + " " + row.uid;
		},
		formatResult: function(row) {
			return row.name;
		}
	}).result(function(e,row){
		if(row)
		{
			var fb_profile=row;
			var fbid =row.uid;
			var fbname =row.name;
			
			//清空好友输入框
			if(!$("#span_"+fbid)[0])
			{
				//限制一次最多只可以选择16个好友
				var rows=parseInt(selected_rows);
				console.log("rows");console.log(rows);
				var sel_fr=parseInt(sel_fr);
				console.log("sel_fr");alert(sel_fr);
				var margin_left=4;
				   
				if(sel_fr<=16)
				{
					//用hiddle的方式，添加选中Facebook好友的信息到form
					$(input).before('<div class="fbid_span_out" name="fbid_span" id="span_'+fbid
							+'" ><input name="ids[]" id="h'+fbid+'" type="hidden" /><div class="fbid_span_name" id="fbid_name_'+fbid+'" >'
							+fbname+'</div><div onclick="remove_avatar(\''
							+fbid+'\',event)" class="fbid_span_x">&nbsp;x&nbsp;</div></div>');
					$(input).val("");
					
					sel_fr=sel_fr+1
					console.log("sel_fr");console.log(sel_fr);
					
					if($("#span_"+fbid)[0] && ($("#span_"+fbid).offset().left==184))
					{
						rows=rows+1;
						selected_rows=rows;
					}
					console.log("rows");console.log(rows);
					
					if(rows>2)
					{
						var average_width=parseInt((792-sel_fr*4-30)/sel_fr)-3*rows;
						console.log("average_width");console.log(average_width);
						
						var fbid_spans=$("div=[name=fbid_span]");
						$.each(fbid_spans, function(i, n){
							 console.log("i=",n);
							 if($(n).width()>average_width)
							 {
								 var n_fbid=$(n).attr("id").split("_")[1];
								 var sp_n=$("#fbid_name_"+n_fbid);
								 sp_n.css({"width":average_width-15,"height":"14px"});
								 $(n).css({"width":average_width}).attr("title",sp_n.text());
							 }
						}); 
						$(input).css({"width":"30px"});
					}else{
						//调节input的宽度；
						setInputPosition($("#selected_name"),$("#span_"+fbid),$(input));
					}
					
					//为没有alio-profile的Facebook好友创建一个alio-profile
					setRecepient("#alio-profile",fb_profile);
				}else {
					alert("你最多可以选择16个好友！");
				}
			}
			
			//给选中的div添加css
			$("div[name=fbid_span]").mouseover(function() {
				$(this).removeClass("fbid_span_out").addClass("fbid_span_over");
			}).mouseout(function() {
				$(this).removeClass("fbid_span_over").addClass("fbid_span_out");
			})
		}
	}).keydown(function(event){
		 //backspace删除选中好友
	     if(event.keyCode==8) {
	    	 if($(this).val().length==0)
	    	 {
		    	 var fbid_spans=$("div[name=fbid_span]");
		    	 //删除最后选中的好友
		    	 if(fbid_spans[fbid_spans.length-1])
		    	 {
		    		 //$(fbid_spans[fbid_spans.length-1]).remove();
		    		 remove_avatar(fbid_spans[fbid_spans.length-1],event);
		    	 }
	    	 }
	     }
	}).focus(function(){
		if($(this).val()=="Select receiver")
		  $(this).val("");
		//hideNote();
	});
}

/**
 * 调节input的宽度；
 * @param parent input的父容器
 * @param child  紧邻input的前一个兄弟控件
 * @param input  文本输入框
 */
function setInputPosition(parent,child,input){
	   var p=parent.offset();
	   var c=child.offset();
	   var Coefficient=14;
	   if(c)
	   {
		   //计算剩余的宽度
		   var w=parent.width()-(c.left-p.left)-child.width()-Coefficient;
	       //调节input宽度
		   input.css({"width":w+"px"});
	   }
}

/**
 * 移除选中的好友
 * @param fb_uid
 * @param event
 * @returns {Boolean}
 */
function remove_avatar(fb_uid,event)
{
	if(typeof fb_uid == "string")
    {
	    $('#span_'+fb_uid).remove();
    }else{
    	$(fb_uid).remove();
    }
	
	//调节input的宽度；
	var fbid_spans=$("div[name=fbid_span]");
	var last_fbid_span=fbid_spans[fbid_spans.length-1]
	setInputPosition($("#selected_name"),$(last_fbid_span),$("#friendname"));
	event.cancelBubble=true; 
	return false;
}