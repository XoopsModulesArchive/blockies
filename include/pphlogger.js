// ------------------------------------------------------------------------- //
//               Blockies - Block hacks/enhancements for XOOPS               //
//                 More info at: <http://www.brandycoke.com/>                //
// ------------------------------------------------------------------------- //
// Based on:                                                                 //
//           XOOPS <http://xoops.codigolivre.org.br/>                                   //
//           PPhlogger <http://www.phpee.com/>                                   //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
// ------------------------------------------------------------------------- //
// ------------------------ ORIGINAL FILE CREDITS -------------------------- //
/* -----------------------------------------------
   POWER PHLOGGER - v.2.2.3
   (c) 2000-2002 www.phpee.com
   contact: webmaster@phpee.com
  ------------------------------------------------ */

// define some defaults -------------------------------------
if(showme==null) var showme='n';
if(st==null)     var st='js';    // st means show-type


// get the user agent name ----------------------------------
v = navigator.appName;

// get the screen resolution --------------------------------
c=0;
if (v != "Netscape") c = screen.colorDepth;
else c = screen.pixelDepth;

// get the screen size --------------------------------------
s = screen.width+"x"+screen.height;

// get the document's title ---------------------------------
t = escape(document.title);

// get the document's referrer -------------------------------
var f = "";

// if pp_frames is true then try getting the framed referral (without error checking)
if (typeof(pp_frames) != "undefined")
	if (pp_frames)
		f = top.document.referrer;

// get the referral for non-multi-domained-framed sites using a Netscape browser
if ((f == "") || (f == "[unknown origin]") || (f == "unknown") || (f == "undefined"))
	if (document["parent"] != null) 
		if (parent["document"] != null) // ACCESS ERROR HERE!
			if (parent.document["referrer"] != null) 
				if (typeof(parent.document) == "object")
					f = parent.document.referrer; 

// get the referral for the current document if a framed referral wasn't found
if ((f == "") || (f == "[unknown origin]") || (f == "unknown") || (f == "undefined"))
	if (document["referrer"] != null) 
		f = document.referrer;

// convert all the unknown's into blank
if ((f == "") || (f == "[unknown origin]") || (f == "unknown") || (f == "undefined"))
	f = "";

// escape the referral
f = escape(f);

// getting data ready to send -------------------------------
r="?id="+id+"&referer="+f+"&r="+s+"&c="+c+"&showme="+showme+"&st="+st+"&title="+t;

// adding logid if called by st='phpjs'
if(jslogid==null) var jslogid = 0;
else r = r + "&jslogid="+jslogid;


if (st=='js') { // calling PowerPhlogger by JavaScript-tag
	if (v != "Microsoft Internet Explorer") {
		r = r+"&url="+document.URL; // $HTTP_REFERER problem with NS,...
	}
	document.open();
	document.write("<script language=\"JavaScript\" type=\"text/javascript\" src=\""+pph_host+r+"\"></script>");
	document.close();
} else { // calling PowerPhlogger by IMG-tag
	rand = Math.round(1000*Math.random());
	r = r+"&b="+rand;  //force the page to load the IMG
	document.open();
	document.write("<img src=\""+pph_host+r+"\" alt=\"\" border=\"0\">");
	document.close();
}