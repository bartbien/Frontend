var gaStatController =
{
	cookieName : "stat_click",
	
	getStatNumber : function() {
		var statNumber = null;
		var cookie = document.cookie;
		cookieNameStart = cookie.indexOf(this.cookieName+"=");
		if (cookieNameStart!=-1) {
		    cookieStart = cookieNameStart+this.cookieName.length+1;
		    statNumber=cookie.substring(cookieStart,(cookieStart+4));
		}
		return statNumber;
	}
}
