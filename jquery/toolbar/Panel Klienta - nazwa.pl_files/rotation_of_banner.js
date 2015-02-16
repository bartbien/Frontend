var NtaRotationOfBanner =
{
	divBanerRotrationId:"",
	banners		 : {},
	itrName		 : "ntabrc",
	itr			 : 0,

	initialize: function(divBanerRotrationId,banners)
	{
		this.divBanerRotrationId = divBanerRotrationId
		this.banners = banners;
		this.getCurrentRotation();
	},

	rotate: function ()
	{
		this.itr++;
		if( this.itr>=this.banners.length ){
			this.itr = 0;
		}

		if( this.banners[this.itr] != undefined  )
		{

			var div = document.getElementById(this.divBanerRotrationId);
			if( div!=null )
			{
				div.innerHTML = this.banners[this.itr]
			}
		}
		this.setCurrentRotation();
	},

	getCurrentRotation:function()
	{
		var sp = document.cookie.split(';');
		var c = '';

		for(var i=0;i < sp.length;i++)
		{
			c = sp[i];
			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(this.itrName) == 0)
			{
				this.itr =  c.substring(this.itrName.length+1,c.length);
				this.itr = parseInt(this.itr);
				if( isNaN(this.itr) ){
					this.itr  = 0;
				}
				return this.itr;
			}
		}
		this.itr = 0 ;
		return this.itr;
	},

	setCurrentRotation: function ()
	{
		var date = new Date();
		document.cookie=this.itrName+"="+this.itr;
	}
};