$(function() {
if (typeof localStorage.accepted === "undefined") +function(c){
var d = $("<div id='regulamin'>").prependTo("body").width("100%").height("100%")
                  .css("z-index", 9999).css("position", "fixed")
                  .css("top", 0).css("bottom", 0).css("left", 0).css("right", 0).css("background", "black")
		  .css("text-align", "center").css("font-family", "sans-serif")
		  .css("font-size", "14px").css("color", "white")

d.html(""+

"<div style='font-size: 50px; position: absolute; top: 0px; height: 60px; width: 100%;'>polski vichan</div>"+

"<div style='text-align: left; position: absolute; bottom: 80px; top: 60px;"+
"width: 100%; background-color: #ddd; overflow: auto; font-family: serif; color: #444;'>"+
"<div style='padding: 10px; white-space: pre-wrap; font-size: 12px;' id='regulamin-actual'>"+
"</div>"+
"</div>"+

"<div style='bottom: 0px; height: 80px; width: 100%; position: absolute;'>"+
"<div>Jeżeli akceptujesz regulamin, przepisz CAPTCHĘ i kliknij Akceptuję.</div>"+
"<div style='display: inline-block; border: 1px solid white; font-family: serif; padding: 3px;'>"+c+"</div>"+
"<form onsubmit=\"if ($('#captcha').val() == '"+c+"') { localStorage.accepted = 1; $('#regulamin').remove(); } return false;\""+
" style='display: inline-block;'>"+
"<input type='text' id='captcha' style='width: 100px;' />"+
"<input type='submit' value='Akceptuję' />"+
"</form>"+
"</div>"+

"");

$("#regulamin-actual").load("/regulamin.txt");

}("majus");
});
