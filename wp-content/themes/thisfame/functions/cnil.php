<?
/*------------------------------------------------------------*\
    Intégration des crédits Hiboost
\*------------------------------------------------------------*/

if(session_id() == '') {
    session_start();
}
/*
function add_cnil() {
	if($_SESSION['cnil'] != 'true') {
		$couleurFondCookie     = "#222";
		$couleurTexteCookie    = "#fff";
		$mentionslegales       = get_bloginfo('url').'/mentions-legales/';
		$cookies               = get_bloginfo('url').'/gestion-des-cookies/';
		echo '<div id="#cookie-banner" style="font-family: Arial; position: fixed; color: ' . $couleurTexteCookie . '; bottom: 0px; left: 0px; display: block; width: 100%; padding: 5px; font-size: 12px; text-align: center; background-color: ' . $couleurFondCookie . '; z-index: 5000;">En continuant votre navigation, vous acceptez l\'utilisation des cookies afin d\'assurer le bon déroulement de votre visite et de réaliser des statistiques d\'audience. <a href="' . $mentionslegales  . '" style="color: ' . $couleurTexteCookie . '">En savoir plus</a></div>';
	}
	$_SESSION['cnil'] = 'true';
}
*/




function add_cnil(){

  $couleurFondCookie     = "#0D0C0C";
  $couleurTexteCookie    = "#fff";

  $couleurBoutons        = "#0a5d91";
  $couleurTexteBouton    = "#FFF";

  $styleBandeauCookie     = 'position: fixed; color: '.$couleurTexteCookie.'; bottom: 0; z-index:10000; background-color:'.$couleurFondCookie.'; text-align:center; width: 100%; padding:10px;';

  $styleExplication       = 'position: fixed; top: 0; right: 0; bottom: 0; left: 0; z-index: 10000;';
  $stylePopinExplication  = 'position: absolute; max-width: 500px; padding: 20px; left: 50%; background:#FFF; top: 50%; text-align: center;-moz-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%); -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.5);-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.5);box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.5);';

  $styleBoutons           = "border: none; display: inline-block; width: 130px; height: 45px; margin: 0 auto; margin-top: 0px; margin-top: 10px; padding: 0 15px; color: ".$couleurTexteBouton."; background-color: ".$couleurBoutons."; font-size: 14px; line-height: 41px; cursor: pointer;";
  ?>
  <script type="text/javascript">

  var tagAnalyticsCNIL = {}
  tagAnalyticsCNIL.CookieConsent = function() {
    var gaProperty = '<? the_field('ua', 'options') ?>'
    var disableStr = 'ga-disable-' + gaProperty;
    var firstCall = false;

    function getCookieExpireDate() {
      var cookieTimeout = 33696000000;
      var date = new Date();
      date.setTime(date.getTime()+cookieTimeout);
      var expires = "; expires="+date.toGMTString();
      return expires;
    }

    function checkFirstVisit() {
      var consentCookie = getCookie('hasConsent');
      if ( !consentCookie ) return true;
    }

    function showBanner(){
      var bodytag = document.getElementsByTagName('body')[0];
       var div = document.createElement('div');
       div.setAttribute('id','cookie-banner');
       div.innerHTML = '<div style="<?= $styleBandeauCookie ?>" id="cookie-banner-message" align="center">Ce site utilise Google Analytics. En continuant à naviguer, vous nous autorisez à déposer un cookie à des fins de mesure d\'audience. <a href="javascript:tagAnalyticsCNIL.CookieConsent.showInform()" style="text-decoration:underline; color: <?= $couleurTexteCookie ?>"> En savoir plus ou s\'opposer</a>.</div>';
       bodytag.appendChild(div,bodytag.firstChild);
       document.getElementsByTagName('body')[0].className+=' cookiebanner';
       createInformAndAskDiv();
     }

     function getCookie(NameOfCookie) {
       if (document.cookie.length > 0) {
         begin = document.cookie.indexOf(NameOfCookie+"=");
         if (begin != -1) {
           begin += NameOfCookie.length+1;
           end = document.cookie.indexOf(";", begin);
           if (end == -1) end = document.cookie.length;
           return unescape(document.cookie.substring(begin, end));
         }
       }
       return null;
     }

     function getInternetExplorerVersion() {
       var rv = -1;
       if (navigator.appName == 'Microsoft Internet Explorer') {
         var ua = navigator.userAgent;
         var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
         if (re.exec(ua) != null) rv = parseFloat( RegExp.$1 );
       } else if (navigator.appName == 'Netscape') {
         var ua = navigator.userAgent;
         var re = new RegExp("Trident/.*rv:([0-9]{1,}[\.0-9]{0,})");
         if (re.exec(ua) != null) rv = parseFloat( RegExp.$1 );
       }
       return rv;
     }

     function askDNTConfirmation() {
       var r = confirm("La signal DoNotTrack de votre navigateur est activé, confirmez vous activer la fonction DoNotTrack?")
       return r;
     }

     function notToTrack() {
       if ( (navigator.doNotTrack && (navigator.doNotTrack=='yes' || navigator.doNotTrack=='1')) || ( navigator.msDoNotTrack && navigator.msDoNotTrack == '1') ) {
         var isIE = (getInternetExplorerVersion()!=-1)
         if (!isIE){
           return true;
         }
         return false;
       }
     }

     function isToTrack() {
       if ( navigator.doNotTrack && (navigator.doNotTrack=='no' || navigator.doNotTrack==0 )) {
         return true;
       }
     }

     function delCookie(name ) {
       var path = ";path=" + "/";
       var hostname = document.location.hostname;
       if (hostname.indexOf("www.") === 0) hostname = hostname.substring(4);
       var domain = ";domain=" + "."+hostname;
       var expiration = "Thu, 01-Jan-1970 00:00:01 GMT";
       document.cookie = name + "=" + path + domain + ";expires=" + expiration;
     }

     function deleteAnalyticsCookies() {
       var cookieNames = ["__utma","__utmb","__utmc","__utmt","__utmv","__utmz","_ga","_gat"]
       for (var i=0; i<cookieNames.length; i++) delCookie(cookieNames[i])
     }

     function createInformAndAskDiv() {
       var bodytag = document.getElementsByTagName('body')[0];
       var div = document.createElement('div');
       div.setAttribute('id','inform-and-ask');
       div.style.width= window.innerWidth+"px" ;
       div.style.height= window.innerHeight+"px";
       div.style.display= "none";
       div.style.position= "fixed";
       div.style.top= "0";
       div.style.right= "0";
       div.style.bottom= "0";
       div.style.left= "0";
       div.style.background= "rgba(255,255,255,0.8)";
       div.style.zIndex= "200000";

       div.innerHTML = '<div style="<?= $styleExplication ?>" id="inform-and-consent"><div style="<?= $stylePopinExplication ?>"><span><b>Les cookies Google Analytics</b></span><br><div>Ce site utilise des cookies de Google Analytics, ces cookies nous aident à identifier le contenu qui vous interesse le plus ainsi qu\'à repérer certains dysfonctionnements. Vos données de navigations sur ce site sont envoyées à Google Inc<br /><br /><button name="S\'opposer" onclick="tagAnalyticsCNIL.CookieConsent.gaOptout(); tagAnalyticsCNIL.CookieConsent.hideInform();" id="optout-button" style="<?= $styleBoutons ?>" >S\'opposer</button> <button name="cancel" onclick="tagAnalyticsCNIL.CookieConsent.hideInform()" style="<?= $styleBoutons ?>" >Accepter</button></div></div>';
       bodytag.appendChild(div,bodytag.firstChild);
     }

     function isClickOnOptOut( evt) {
       return(evt.target.parentNode.id == 'cookie-banner' || evt.target.parentNode.parentNode.id =='cookie-banner' || evt.target.id == 'optout-button')
     }

     function consent(evt) {
      if (!isClickOnOptOut(evt) ) {
        if ( !clickprocessed) {
          evt.preventDefault();
          document.cookie = 'hasConsent=true; '+ getCookieExpireDate() +' ; path=/'; callGoogleAnalytics();
          clickprocessed = true;
          window.setTimeout(function() {
            evt.target.click();}, 1000)
          }
        }
      }

      function callGoogleAnalytics() {
        if (firstCall) return;
        else firstCall = true;
      }

    return {
       gaOptout: function() {
        document.cookie = disableStr + '=true;'+ getCookieExpireDate() +' ; path=/';
        document.cookie = 'hasConsent=false;'+ getCookieExpireDate() +' ; path=/';
        var div = document.getElementById('cookie-banner');
        window[disableStr] = true;
        clickprocessed = true;
        deleteAnalyticsCookies();
      }, showInform: function() {
        var div = document.getElementById("inform-and-ask");
        div.style.display = "";
      }, hideInform: function() {
        var div = document.getElementById("inform-and-ask");
        div.style.display = "none";
        var div = document.getElementById("cookie-banner");
        div.style.display = "none";
      }, start: function() {

      var consentCookie = getCookie('hasConsent');
      clickprocessed = false;
      if (!consentCookie) {
      if ( notToTrack() ) {
        tagAnalyticsCNIL.CookieConsent.gaOptout()
        alert("You've enabled DNT, we're respecting your choice")
      } else {
        if (isToTrack() ) {
          consent();
        } else {
          if (window.addEventListener) {
            window.addEventListener("load", showBanner, false);
            document.addEventListener("click", consent, false);
          } else {
            window.attachEvent("onload", showBanner);
            document.attachEvent("onclick", consent);
          }
        }
      }
    } else {
      if (document.cookie.indexOf('hasConsent=false') > -1) window[disableStr] = true;
      else callGoogleAnalytics();
    }
  }
}

}();

tagAnalyticsCNIL.CookieConsent.start();
var _gaq = _gaq || [];
_gaq.push(['_setAccount', gaProperty]);
_gaq.push(['_trackPageview']);
(function() {
  var ga = document.createElement('script');
  ga.type = 'text/javascript';
  ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(ga, s);
})();

</script>
  <?
}

add_action('wp_footer', 'add_cnil');
