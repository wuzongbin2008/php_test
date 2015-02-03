/**
 * 验证Step信息是否填写完整
 * @param step
 * @returns {Boolean}
 */
function IsDone(step,cap_kind)
{
	var done=false;
	//验证Step信息是否填写完整
	if(step==2){
		//表单信息非空验证
	    var msg=$.trim($("#message").val());
	    if(msg && msg!="Write your message here"){
	    	done=true;
		}
	 }else if(step==3){
		if(cap_kind=="time")
		{
		   var date=$.trim($("#datepicker").val());
		   var hour=$.trim($("#hour").val());
		   var minute=$.trim($("#minute").val());
		   
		   //表单信息非空验证
		   $.log("date",IsDate(date,"mdy"));$.log("hour",IsHour(hour));$.log("minute",IsMinute(minute));
		   if(IsDate(date,"mdy") && IsHour(hour) && IsMinute(minute))
		   {
			   done=true;
		   }
		}else{
		   //表单信息非空验证
		   var question=$.trim($("#question").val());
		   var answer =$.trim($("#answer").val());
		   
		   done=((question && question !="Set Question") && (answer && answer !="Set Answer"))?true:false;
		}
	 }
	return done;
}
/**
 * 打开关闭的圆球capsule
 * @param left:左半球
 * @param right：右半球
 * @param speed：打开的速度
 */
function open_circle(left,right,speed,callback)
{
	 callback=(callback)?callback:function(){
		 $.log("unit_circle");
		 $("#xuan").hide();
		 $("#close_capsule_circle").hide();
		 $("#alio-capsule-create-content").fadeIn(0);
	 }
	 
	 $(left).animate({marginLeft:0},speed,callback);
	 $(right).animate({marginLeft:440},speed);
}

/**
 * 关闭的圆球capsule
 * @param left:左半球
 * @param right：右半球
 * @param speed：打开的速度
 */
function close_circle(left,right,speed,callback)
{
     //$.log(callback);
	 $(left).animate({marginLeft:220},speed,callback);
	 $(right).animate({marginLeft:0},speed);
}

/**
 * 显示表单内容，隐藏提示信息
 * @param elem 提示信息的触发控件
 * @param step 预留
 * @param msg  提示信息
 */
function showNote(elem,step,msg){
	var position=elem.offset();
	var left=position.left;
    var width=elem.width();
    var marginLeft=220;

    $("#error_m").text(msg);
	if((left<marginLeft) && !((marginLeft+left)>(left+width)))
	{
		left=left+marginLeft;
		 $("#error_arrow").css({"left":left+12,"top":position.top-52}).show();
	}else{
		left=left+elem.width()-$("#note_div").width();
		$("#error_arrow").css({"left":left+$("#note_div").width()-36,"top":position.top-52}).show();
	}
    $.log("left",left);
    $.log("note_div",$("#note_div"));
    //alert("note_div_ok1");
   
	$("#note_div").css({"left":left,"top":position.top-62}).show();
	//alert("note_div_ok2");
}

/**
 * 隐藏提示信息框
 */
function hideNote(){
	$("#note_div").hide();
	$("#error_arrow").hide();
}

/**
 * 左右滚动
 * @param opt  参数JSON
 * @param callback
 */
function Roll(opt,callback){
    //参数初始化
    if(!opt) var opt={};
    var _btn = $("#"+ opt.btn);//Shawphy按钮
    var parent=$(opt.parent);
    var timerID;
    var step=parseInt(opt.step);
    var done_step=parseInt(opt.done_step); 
    var direction=opt.direction;
    var _this=parent.eq(0).find("div:first");
    var lineW=_this.find("div:first").width(), //获取行宽
        line=opt.line?parseInt(opt.line,10):parseInt(parent.width()/lineW,10), //每次滚动的宽度，默认为一个div，即父容器宽度
        speed=opt.speed?parseInt(opt.speed,10):500; //卷动速度，数值越大，速度越慢（毫秒）
        
    if(line==0) line=1;
    var target_left;
    var rollWidth=line*lineW+opt.margin;
    var cap_kind=$$($("#alio-capsule-create")).cap_kind;
    
    //设置Step 3的文本
    if((step+1)==3 && cap_kind!="time")
    {
 		$("#step3_title").text("Set the question");
 		$("span[name=step3_desc]").text("The receiver can open this capsule only when the question be answered.");
    }
    
    $.log("step",step);
    //滚动函数
    if(direction=="left")
    {
    	//设置要滚动到的位置
    	 switch(step) {
		    case 1:                      
		      target_left=-200;
		      break;                     
		    case 2:
		      target_left=-580;
         }
		 _this.animate({left:target_left},speed,function(){
	    	   //设置上下步arrow的效果
	    	$.log("Roll_left2",_this.offset().left);
	    	   if($("#step"+step+"_arrow_left")[0])
	             $("#step"+step+"_arrow_left").fadeOut("slow");
	           if($("#step"+step+"_arrow_right")[0])
	             $("#step"+step+"_arrow_right").fadeOut("slow");
	           if($("#step"+(step+1)+"_arrow_left")[0])
	             $("#step"+(step+1)+"_arrow_left").fadeIn("slow");
	           if($("#step"+(step+1)+"_arrow_right")[0])
	             $("#step"+(step+1)+"_arrow_right").fadeIn("slow");
	           
	           //设置step circle的效果
	           $.log("done_step=",done_step);
	           if(step==done_step)
	           {   $.log("done");
		           $("#step"+step+"_circle").attr("src","images/done.png");
		           $("#step"+(step+1)+"_circle").attr("src","images/step_doing.png");
	           }else{
	        	   $.log("step+1=",(step+1));
	        	   if(IsDone(step+1,cap_kind)){
	        		   $("#step"+step+"_circle").attr("src","images/done.png");
			           $("#step"+(step+1)+"_circle").attr("src","images/done.png");
        		   }else{
        			   $("#step"+step+"_circle").attr("src","images/done.png");
    		           $("#step"+(step+1)+"_circle").attr("src","images/step_doing.png");
        		   } 
	           }
	           
	           //设置整个Step div的显示效果
	           $("#step"+(step)).animate({opacity: 0.5},"fast");
	           $("#step"+(step+1)).animate({opacity: 1},"fast");
	           
	           //隐藏说明文本
	           $("span[name=step"+(step)+"_desc]").hide();
	           $("span[name=step"+(step+1)+"_desc]").show();
	           $("#step"+(step)+"_title").removeClass("step_title").addClass("step_title_undo");
	           $("#step"+(step+1)+"_title").removeClass("step_title_undo").addClass("step_title");
	     });
    }else{
    	//设置要滚动到的位置
    	switch(step) {
		    case 2:                      
		      target_left=180;
		      break;                     
		    case 3:
		      target_left=-200;
         }
		 _this.animate({left:target_left},speed,function(){
	    		//设置上下步arrow的效果
	    		$.log("Roll_right2",_this.offset().left);
	    		if($("#step"+step+"_arrow_left")[0])
	              $("#step"+step+"_arrow_left").hide("slow");
	            if($("#step"+step+"_arrow_right")[0])
	              $("#step"+step+"_arrow_right").hide("slow");
	            if($("#step"+(step-1)+"_arrow_left")[0])
	              $("#step"+(step-1)+"_arrow_left").show("slow");
	            if($("#step"+(step-1)+"_arrow_right")[0])
	              $("#step"+(step-1)+"_arrow_right").show("slow");
	            
	            //设置step circle的效果
	            $("#step"+(step-1)+"_circle").attr("src","images/done.png");
		       	if(IsDone(step,cap_kind)){
		     	   $("#step"+step+"_circle").attr("src","images/done.png") ;
		     	}else{
		     	   $("#step"+step+"_circle").attr("src","images/step_undo.png") ;
		     	}
	            
	            //设置整个Step div的显示效果
	         	$("#step"+(step)).animate({opacity: 0.5},"fast");
	            $("#step"+(step-1)).animate({opacity: 1},"fast");
	            
	            //显示说明文本
	            $("span[name=step"+(step)+"_desc]").hide();
	            $("span[name=step"+(step-1)+"_desc]").show();
	            $("#step"+(step)+"_title").removeClass("step_title").addClass("step_title_undo");
	            $("#step"+(step-1)+"_title").removeClass("step_title_undo").addClass("step_title");
	     });
    }
    
    _btn.css("cursor","pointer");//Shawphy:向左向右鼠标事件绑定
}

/**
 * 实现英文单词首字母大写
 * @param str 要转化的字符串
 * @returns 
 */
function changeCase(str) { 
	var index; 
	var tmpStr; 
	var tmpChar; 
	var preString; 
	var postString; 
	var strlen; 
	tmpStr = str.toLowerCase(); 
	strLen = tmpStr.length; 
	
	if (strLen > 0) 
	{ 
		for (index = 0; index < strLen; index++) 
		{ 
			if (index == 0) 
			{ 
				tmpChar = tmpStr.substring(0,1).toUpperCase(); 
				postString = tmpStr.substring(1,strLen); 
				tmpStr = tmpChar + postString; 
			} 
			else 
			{ 
				tmpChar = tmpStr.substring(index, index+1); 
				
				if (tmpChar == " " && index < (strLen-1)) 
				{ 
					tmpChar = tmpStr.substring(index+1, index+2).toUpperCase(); 
					preString = tmpStr.substring(0, index+1); 
					postString = tmpStr.substring(index+2,strLen); 
					tmpStr = preString + tmpChar + postString; 
				} 
			} 
		} 
	}
	return tmpStr;
}

/**
 * 日期和时间不可以小于当前
 */
function IsValidDate(){
	var date=$.trim($("#datepicker").val());
	var hour=$.trim($("#hour").val());
	var minute=$.trim($("#minute").val());
	var invalid_elem;
	
	var now = new Date();
	var sl_date = new Date(date + " " + hour + ":" + minute);
	if(sl_date.getTime( ) <= now.getTime( ))
    {
	   return false;
    }else{
       return true;
    }
}

/**
 * 日期验证函数
 * @param dateString 被验证的日期字符串
 * @param formatString 日期格式
 * @returns {Boolean}
 */
function IsDate(dateString, formatString){
        formatString = formatString || "ymd";
        var m, year, month, day;
        switch(formatString){
            case "ymd" :
                m = dateString.match(new RegExp("^((\\d{4})|(\\d{2}))([-./])(\\d{1,2})\\4(\\d{1,2})$"));
                if(m == null )
                    return false;
                day = m[6];
                month = m[5]*1;
                year =  (m[2].length == 4) ? m[2] : GetFullYear(parseInt(m[3], 10));
                break;
            case "dmy" :
                m = dateString.match(new RegExp("^(\\d{1,2})([-./])(\\d{1,2})\\2((\\d{4})|(\\d{2}))$"));
                if(m == null )
                    return false;
                day = m[1];
                month = m[3]*1;
                year = (m[5].length == 4) ? m[5] : GetFullYear(parseInt(m[6], 10));
                break;
            case "mdy" :
                m = dateString.match(new RegExp("^(\\d{1,2})([-./])(\\d{1,2})\\2((\\d{4})|(\\d{2}))$"));
                if(m == null )
                    return false;
                month = m[1];
                day = m[3]*1;
                year = (m[5].length == 4) ? m[5] : GetFullYear(parseInt(m[6], 10));
                break;
            default :
                break;
        }
        if(!parseInt(month))
            return false;
        month = month==0 ?12:month;
        var date = new Date(year, month-1, day);
        return (typeof(date) == "object" && year == date.getFullYear() && month == (date.getMonth()+1) && day == date.getDate());
        function GetFullYear(y){
            return ((y<30 ? "20" : "19") + y)|0;
        }
 }

/**
 * 验证hour的正确性
 * @param hour
 */
function IsHour(hour){
	var hour=parseInt(hour);
	if(hour<0 || hour >23)
	{
		return false;
	}else{
	    return true;
	}
}

/**
 * 验证minute的正确性
 * @param minute
 */
function IsMinute(minute){
	var minute=parseInt(minute);
	if(minute<0 || minute >59)
	{
		return false;
	}else{
	    return true;
	}
}

/**
 * 计算time capsule还有多长时间可以打开
 * @param opentime  截止时间
 * @param id        显示时间信息的空间id
 */
function getOpenTime(opentime)
{    //$.log("opentime",opentime);
	 var now=new Date();
	 //var opentime=new Date(Date.parse(opentime)); //$.log('expire',opentime);
	 var leavings=opentime.getTime()-now.getTime( );//$.log("leavings",leavings);
	 var second=parseInt(leavings/1000);
	 var months=parseInt(second/(24*3600*30)); //$.log('months',months);
	 var day=parseInt(second/(24*3600)); 
	 var hour=parseInt(second%(24*3600)/3600);
	 var minute=parseInt(second%(24*3600)%3600/60);
	 var leftseconds=parseInt(second%(24*3600)%3600%60);

	return {months:months,day:day,hour:hour,minute:minute};
}

function convertTime(time){
    var timeleftmilli=time;
    var seconds=timeleftmilli/1000|0;
    var year=0;//seconds/(365*24*3600);
    var month=(seconds-year*(365*24*3600))/(24*3600*30)|0;
    var day=(seconds-month*30*24*3600)/(24*3600)|0;
    var hour=(seconds-month*30*24*3600-day*24*3600)/3600|0;
    var min=(seconds-month*30*24*3600-day*24*3600-hour*3600)/60|0;
    var sec=seconds%60;
    if(sec>0&&month>0){
        min=min+1;
    }
    var info={month:formatNumber(month),
                day:formatNumber(day),
                hour:formatNumber(hour),
                min:formatNumber(min),
                sec:formatNumber(sec)};
    return info;
}

function formatNumber(number,format){
        if(number<10){
            return "0"+number.toString();
        }
        return number;
}
var msgs={};
msgs.openedin={
name:"",
caption:"{{wallposter}}打开了您的{{cap_kind}}Capsule"
};
msgs.sendhelpreq={
name:"{{wallposter}}需要你的帮助",
caption:"通过各种努力，{{wallposter}}仍未能成功打开您的Q&A Capsule,快去帮帮他吧"
};
msgs.answerquestion={
name:"{{wallposter}}回答了您的帮助请求",
caption:"已经公布答案，快去看看吧"
};
function sendMsgToFBWall(msgtype,istime,callback){
    //post信息到Facebook墙上 '/'+fb_uid+'/feed',
    type=istime?"Time":"Q&A";
    var logo="http://www.google.com.hk/intl/zh-CN/images/logo_cn.png";
    var wallreceiver=$("#userlist .on").attr("fuid");
    var wallposter=$("#fb-profile").data("fb_profile");
    var obj={wallposter:wallposter};
    var defaultoption={picture:logo,
                       link:"http://www.google.com",
                       privacy:{"value": "CUSTOM",
                                "friends":"SOME_FRIENDS",
                                "allow":wallreceiver,
                                "deny":wallposter.id
                                }
                       };
    var msgoption=msgs[msgtype];
    msgoption.name=msgoption.name.replace("{{wallposter}}",wallposter.name);
    msgoption.name=msgoption.name.replace("{{cap_kind}}",type);
    msgoption.caption=msgoption.caption.replace("{{wallposter}}",wallposter.name);
    msgoption.caption=msgoption.caption.replace("{{cap_kind}}",type);
    $.extend(msgoption,defaultoption);
    $.log("msgoption=",msgoption);
    FB.api('/feed','post',msgoption);
}

function clearTimers(){
    	$.log("do clear timer");
	if(window.countTimer){
			window.clearTimeout(window.countTimer);
			window.countTimer=null;
			$.log("clear time out");
	}
    if(window.msgTimer){
        window.clearTimeout(window.msgTimer);
		window.msgTimer=null;
		$.log("clear msgTimer");
    }
}