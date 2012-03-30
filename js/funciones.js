//*****************************************************************
//Funcion para efecto del menú vertical
// =============================================================== 
//                -------- M6 menu ------ 
// script written by Gerard Ferrandez - Ge-1-doot - December 2005 
// http://www.dhteumeuleu.com 
// updated Feb 2010 - namespaced 
// =============================================================== 
// 
 
var M6 = function () { 
	var P,T; 
	var over = -1; 
	/////////////////////////////////// 
	var fontSize = 18; 
	var lensFX = 1; 
	var num = true; 
	var color = "#000"; 
	var selected = "#3C3C82"; 
	/////////////////////////////////// 
	var zoom = function (s){ 
		if(s!=over){ 
			over = s; 
			var i = 0,o; 
			while (o = P[i]) { 
				o.style.fontSize=Math.floor(fontSize / (Math.abs(i - s) + lensFX) + 8)+"px"; 
				o.style.color=(i==s)?selected:color; 
				i++; 
			} 
		} 
	} 
	//////////////////////////////////////////////////////////// 
	var init = function () { 
		P = document.getElementById("menu").getElementsByTagName("a"); 
		var i = 0,o; 
		while (o = P[i]) { 
			if(num){ 
				x=(i+1)+"."; 
				if(x.length<3)x="0"+x; 
				o.innerHTML = x+o.innerHTML; 
			} 
			o.style.width = "100%"; 
			o.i = i; 
			o.onmouseover= function() { 
				zoom(this.i); 
			} 
			i++; 
		} 
		zoom(0); 
	} 
	//////////////////////////////////////////////////////////// 
	return { 
		init : init 
	} 
}(); 
 
 
onload = function(){ 
	M6.init(); 
}
//*****************************************************************