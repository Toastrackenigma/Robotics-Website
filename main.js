function $(id) {
	return document.getElementById(id);
}
var account = false;
function toggleAccount() {
	account = !account;
	$("login").style.display = ["none","block"][account+0]
}
var ajax = new Object();
ajax.doAfter = "";
ajax.result = "";
ajax.request = function(x,y) {
	var k = Object.keys(x);
	$("ajax").contentDocument.body.innerHTML = "<form method=\""+y+"\" id=\"form\" action=\"main.php\"></form>";
	for (i=0;i<k.length;i++) {
		$("ajax").contentDocument.getElementById("form").insertAdjacentHTML("beforeend","<input type=\"hidden\" name=\""+k[i]+"\" id=\"form_"+i+"\">");
		$("ajax").contentDocument.getElementById("form_"+i).value = x[k[i]];
	}
	$("ajax").contentDocument.getElementById("form").submit();
}
ajax.doneLoading = function() {
	ajax.result = $("ajax").contentDocument.getElementById("result").innerHTML;
	eval(ajax.doAfter);
}
function runLogin() {
	if (ajax.result=="") {
		$("loginerror").innerHTML = "Incorrect Name or Password!"
		$("login").style.animation = "err 0.5s linear";
		setTimeout("$('login').style.animation = '';",500)
	}
	else {
		$("login").innerHTML = "<center><span style=\"font-size:64px;\"><i class=\"fa fa-check\"></i></span><br>Logging you in...</center>";
		setTimeout("window.location.reload();",300)
	}
}