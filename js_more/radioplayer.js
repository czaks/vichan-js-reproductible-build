(function(){

var fetchjson = function(url, fun_name, callback) {
  var cbwrapped = function(json) {
    document.getElementsByTagName('head')[0].removeChild(document.getElementById("jsonp-scripttag"));
    var cb = callback;
    cb(json);
  }
  eval(fun_name + " = cbwrapped;");
  
  var script = document.createElement('script');
  script.src = url + "?__nocache=" + Math.random();
  script.id = "jsonp-scripttag";
  document.getElementsByTagName('head')[0].appendChild(script);
};

var my_fetchjson = function() {
  fetchjson("//pl.vichan.net/rcpstatus.jsonp", "radio_status_reply", function(x) {
    $("#radio-howmuch").text(x.listeners);
    if (x.np._idle === undefined) {
      $("#radio-nowplaying").text(x.np.artist + " - " + x.np.title);
      $("#radio-ctr").show();
    }
    else {
      $("#radio-nowplaying").text("Nikt w tej chwili nie gra w radiu");
      $("#radio-ctr").hide();
    }
    
    radio_oga = x.listen_ogg;
    radio_mp3 = x.listen_mp3;
    
    if (!radio_playing && radio_initialized) {
      $("#radio-wrap").jPlayer("setMedia", {
	oga: radio_oga,
	mp3: radio_mp3
      });
    }
  });
  setTimeout(my_fetchjson, 20000);
};

var radiohtml = "<div id='radio-ctr' style='display: none; text-align: center; margin: 6px; font-size: 70%;'>" +
		"<strong><a href='http://radio.chanowa.org'>Radio Chłodna Piwnica 2.0</a></strong>: słuchaj: "+
		"<a href='http://stream.radio.chanowa.org:8010/loadbalancer.m3u?m=vorbis-hq.ogg'>Vorbis HQ</a>, "+
		"<a href='http://stream.radio.chanowa.org:8010/loadbalancer.m3u?m=mp3-mq.mp3'>MP3 MQ</a>, "+
		"<a href='http://stream.radio.chanowa.org:8010/loadbalancer.m3u?m=mp3-lq.mp3'>MP3 LQ</a>, "+
	        "<a href='http://radio.chanowa.org/radio.html' target='_blank'>Webplayer</a>, "+
		"<a href='http://rec.radio.chanowa.org'>Archiwum</a>"+
		". Słucha: "+
		"<span id='radio-howmuch'>0</span> anonków. "+
		
		"Gra: <span id='radio-nowplaying'>Ładowanie . . .</span><div id='radio-wrap'></div><div id='radio-inspect'></div></div>";

var radio_playing = false;
var radio_initialized = false;

var radio_oga = "http://stream.radio.chanowa.org:8000/vorbis-html5.ogg";
var radio_mp3 = "http://stream.radio.chanowa.org:8000/mp3-mq.mp3";


$(function(){
my_fetchjson();
$(radiohtml).insertBefore('hr:first');
});
})();
