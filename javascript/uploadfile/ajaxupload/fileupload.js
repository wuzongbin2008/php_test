/**
 * 设置点击文本上传文档控件
 * @param file_elem 用作触发FileUpload的控件
 * @param formid    当前Form的id
 */
function fileupload(file_elem,formid){
	/* 初始化控件*/
	var button = $(file_elem), interval;
	new AjaxUpload(button,formid,{
		name: '_attachments',
		autoSubmit: false,
		onChange : function(file, ext){
			//显示选中的文档
			$("#attachment").html(file);
			$("#delimg").show();
		}
	});
	
	//delete image
	$("#delimg").click(function(){
	   $("#attachment").text("++Attachment");
	   $("input[name='_attachments']").val(""); 
	   $(this).hide();
	});
}