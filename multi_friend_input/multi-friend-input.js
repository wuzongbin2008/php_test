/**
 * 自定义Facebook multi-friend-input控件
 * @param input 文本输入框
 * @param fb_friends  当前登入者的所有Facebook好友
 */
function multi_friend_input(input,fb_friends) {
	//autoComplete
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
				//用hiddle的方式，添加选中Facebook好友的信息到form
				$(input).before('<div class="fbid_span_out" name="fbid_span" id="span_'+fbid+'" ><input name="ids[]" id="h'+fbid+'" type="hidden" />'+fbname+'<span onclick="remove_avatar(\''+fbid+'\',event)" class="fbid_span_x">&nbsp;x</span>&nbsp;&nbsp;</div>');
				$(input).val("");
				
				//为没有alio-profile的Facebook好友创建一个alio-profile
				setRecepient("#alio-profile",fb_profile);
				
				//调节input的宽度；
				setInputPosition($("#selected_name"),$("#span_"+fbid),$(input));
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
		    		 $(fbid_spans[fbid_spans.length-1]).remove();
                     //调节input的宽度；
				     //setInputPosition($("#selected_name"),$(fbid_spans[fbid_spans.length-1]),$(input));
		    	 }
	    	 }
	     }
	}).focus(function(){
		if($(this).val()=="Select receiver")
		  $(this).val("");
		hideNote();
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
	$('#span_'+fb_uid).remove();
	//$("#avatar_"+fb_uid).remove(); //显示头像功能保留
	//调节input的宽度；
	var fbid_spans=$("div[name=fbid_span]");
	var last_fbid_span=fbid_spans[fbid_spans.length-1]
	setInputPosition($("#selected_name"),$(last_fbid_span),$("#friendname"));
	event.cancelBubble=true; 
	return false;
}
