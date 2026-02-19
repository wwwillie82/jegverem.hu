(function() {

	var ajax;

	function ExternalLoad() {
		if(window.XMLHttpRequest) ajax = new window.XMLHttpRequest();
		else if(window.ActiveXObject) ajax = new window.ActiveXObject("MsXml2.XmlHttp");
	}

	ExternalLoad.prototype.SyncLoad = function(filename){
		console.log("sync start");
		ajax.open("GET", filename, false);
		ajax.send(null);
		console.log(ajax.responseText);
		ajax.onreadystatechange = function() {
			if(ajax.readyState == 4) {
				console.log("sync end");
			}
		};

	};

	ExternalLoad.prototype.OnLoad = function(elem, fn) {
		var _this = this;
		elem.onload = function() {fn.call(_this);};
		// IE
		elem.onreadystatechange = function() {
			if(elem.readyState == "complete") fn.call(_this);
		}
	};

	ExternalLoad.prototype.LoadJS = function(filename) {
		this.SyncLoad(filename);
		var elem = document.createElement("script");
		elem.setAttribute("src", filename);
		elem.setAttribute("type", "text/javascript");
		document.getElementsByTagName("head")[0].appendChild(elem);
		this.OnLoad(elem, function() {
			console.log(elem);
		});
	};

	ExternalLoad.prototype.LoadCSS = function(filename, media) {
		this.SyncLoad(filename);
		var elem = document.createElement("link");
		elem.setAttribute("src", filename);
		elem.setAttribute("type", "text/css");
		elem.setAttribute("rel", "stylesheet");
		if(media != undefined)
			elem.setAttribute("media", media);
		document.getElementsByTagName("head")[0].appendChild(elem);
		this.OnLoad(elem, function() {
			console.log(elem);
		});
	};

	window.ExternalLoad = new ExternalLoad();
})();