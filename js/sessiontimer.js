(function() {
	var session_timeout = 540 * 1000;
	var remaining = session_timeout + 60000;

	var xmlhttp = false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
		}
	}

	if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
		try {
			xmlhttp = new XMLHttpRequest();
		} catch (e) {
			xmlhttp = false;
		}
	}

	function p(n) {
		if (n.toString().length < 2) n = "0" + n;
		return n;
	}

	function WriteTimer() {
		var obj = document.getElementById("session_timer");
		var remaining_seconds = p(Math.floor(remaining / 1000) % 60);
		var remaining_minutes = Math.floor((remaining / 60000) % 60);
		obj.innerHTML = remaining_minutes + ":" + remaining_seconds;
	}

	function redirectTo(addr) {
		window.document.location.pathname = addr;
	}

	function AddTime(seconds) {
		remaining += seconds * 1000;
	}

	function SubTime(seconds) {
		remaining -= seconds * 1000;
	}

	function SessionTimeout() {
		if (confirm("1 perc múlva lejár a munkamenet, szeretné meghosszabbítani?")) {
			//xmlhttp.open("GET", "/session_touch");
			xmlhttp.open("GET", "/admin/index/user_refresh:true");
			xmlhttp.send(null);
			AddTime(540);
			setTimeout(function() {
				SessionTimeout();
			}, session_timeout);
		} else {
			return false;
		}
	}

	setTimeout(function() {
		SessionTimeout();
	}, session_timeout);
	
	setInterval(function() {
		if (remaining <= 1000) {
			// kickout
			redirectTo("/admin/index/user_logout:true");
		}
		SubTime(1);
		WriteTimer();
	}, 1000);

	window.RefreshSession = function() {
		AddTime(600-(remaining/1000));
		WriteTimer();
		xmlhttp.open("GET", "/admin/index/user_refresh:true");
		xmlhttp.send(null);
	}
	
})();