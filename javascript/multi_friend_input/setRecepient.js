/**
 * 为Facebook好友创建alio-user-profile
 * @param elemid 具有alio-createProfile事件的元素#id
 * @param fb_profile
 */
function setRecepient(elemid,fb_profile)
{    
	 var elem = $(elemid);
	 var app = $$(elem).app;
	 var profile_account="facebook-"+fb_profile.uid;
	 var userCtx={};
	     userCtx.id=fb_profile.uid;
	     userCtx.name=profile_account;
	 
	 //获取Facebook好友的alio-profile资料
	 app.view('alioarca-user-profile', {
		    key: profile_account,
		    success : function(userDoc) {
		      $.log('load alio_userprofile success');
		      $.log("len",userDoc.rows.length);
		      $.log(userDoc);
		      if ( userDoc.rows.length>0 ) {
		    	  //用hiddle的方式，添加选中Facebook好友的alio-user-profile.id到form
		         $("#h"+fb_profile.uid).val(userDoc.rows[0].id);
		      }else{
		    	  $.log('alio-load-user-profile not found in db');
		    	  elem.trigger("alio-createProfile", [userCtx,"setRecepient"]);
		      }
		    },
		    error : function() {
		      $.log('load aliouser_profile error');
		      elem.trigger("alio-createProfile",[userCtx]);
		    }
	  });	      
}