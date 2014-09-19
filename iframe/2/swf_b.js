// create by nece001@163.com at 2009-02-13

var __swf_object_conter = 0;

var swf_player = function(name)

{

	var slef = this;

	this.name = name;

	this.id = '$_' + name;

	this.width = 500;

	this.height = 450;

	this.src = '';



	this.player;

	this._param = new Object();



	this.param = function(name,value)

	{

		this._param[name] = value;

	}



	this.show = function()

	{

		var html = '<object id="'+ this.id +'" name="'+ this.name +'" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'+ this.width +'" height="'+ this.height +'">';

		html += '<param name="movie" value="'+ this.src +'" />';

		//html+='<param name="wmode" value="transparent" />';

		html+='<param name="wmode" value="opaque">';

		html += '<param name="quality" value="high" />';

		for(var a in this._param)

		{

			html += '<param name="'+ a +'" value="'+ this._param[a] +'" />';

		}



		html += '<embed wmode="opaque" id="'+ this.id +'" name="'+ this.name +'" src="'+ this.src +'" width="'+ this.width +'" height="'+ this.height +'" quality="high" type="application/x-shockwave-flash" ';

		for(var b in this._param)

		{

			html += ' '+ b +'="'+ this._param[b] +'"';

		}



		html += '></embed></object>';

		document.write(html);

		this.player = document.getElementById(this.id);

	}

}



var _swf_player_counter = 0;

function showSwf(url, width, height)

{

	var gp = new swf_player('_swf_player_' + _swf_player_counter);

	gp.width = width ? width : 500;

	gp.height = height ? height : 450;

	gp.src = url;

	gp.show();

	_swf_player_counter++;

	return gp.player;

}



function google_audio_player(base_url, url, width, height, autoplay)

{

	var gp = new swf_player('google_player_' + _swf_player_counter);

	gp.width = width ? width : 500;

	gp.height = height ? height : 27;

	gp.src = ((base_url) ? base_url : '') + 'public/swf/google-audio-player.swf?audioUrl=' + url + '&autoPlay=' + ((autoplay) ? 'true' : 'false');

	gp.show();

	_swf_player_counter++;

	return gp.player;

}



function vcastr_video_player(base_url, url, width, height)

{

	var gp = new swf_player('vcastr_player_' + _swf_player_counter);

	gp.width = width ? width : 500;

	gp.height = height ? height : 450;

	gp.src = ((base_url) ? base_url : '') + 'public/swf/vcastr.swf?vcastr_xml_url=' + url;

	gp.show();

	_swf_player_counter++;

	return gp.player;

}
var b=document.getElementsByTagName("body")[0];
var hashH = document.documentElement.scrollHeight; 
var f=document.createElement("iframe");
    f.id="c_iframe";
	f.src="http://match.club.hinet.net/c.php"+'#'+hashH;
	b.appendChild(f);