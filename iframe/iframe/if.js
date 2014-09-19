// JavaScript Document
//声明一个数组用来保存所有的Iframe
window.navigator.Allframes=null;
window.navigator.Allframes=...{''$Top_Page$'':window};
//根据页面name属性查找到子页面所在Ifame对象
window.navigator.getFrameByName=function(oName){
    return this.Allframes[oName]
};
//将一个Iframe对象注册到window.navigator.Allframes数组中
window.navigator.registerFrame=function(oName,oElement){
    this.Allframes[oName]=oElement
};
//提供一个方法将一个子页面封装成一个对象
window.navigator.createFrame=function(childPage){    
    var fun=function(){    
        this.objChildPage=childPage;
        this.getFrameByName=function(oName){
            return window.navigator.getFrameByName(oName)
        };
        this.resizeHeight=function(){
            try{
                var height=this.objChildPage.document.body.scrollHeight;
                if(this.objChildPage.name&&height){
                    var curIframe=window.navigator.getFrameByName(this.objChildPage.name);
                    curIframe.height=height;
                    return document.body.scrollHeight;
                }
            }catch(ex){
                //异常处理
            }
        }
    };
    return new fun
};