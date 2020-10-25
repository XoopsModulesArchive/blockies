function getArticle(){
	if( i > count ){
		i = 0;
	}
	xoopsGetElementById("randomnews").innerHTML = links[i];
	i = i + 1;
}

if( !document.all && !document.getElementById ){
	getArticle();
}

function showText(){
	if( document.all || document.getElementById ){
		setInterval("getArticle()", timer);
	}
}

window.onload = showText
