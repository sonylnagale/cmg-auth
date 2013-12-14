<?php

require_once('executor.php');

$executor = new Executor();

$domain_id = 308;

$sites = $executor->getSites();

?>

<!DOCTYPE html>
<html>
<head>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script src="underscore-min.js"></script>
	<script type="text/javascript" src="http://www.alpacajs.org/js/alpaca.min.js"></script>
	<link type="text/css" href="http://www.alpacajs.org/css/alpaca.min.css" rel="stylesheet"/>
	<link type="text/css" href="styles.css" rel="stylesheet"/>
	<script src="admin.js"></script>
	<script src="b64.js"></script>

	<script>
	var cmg = cmg || {};
	
	cmg._ = _;
	cmg.query = jQuery;
	
	cmg.mediaurl = 'http://media.fe2.cmgdigital.com/shared/media/2013-12-11-12-58-43/web/common/';
	cmg.site_meta = {
		domain : 'www.fe2.ajc.com',
		media_type : 'newspaper',
		site_name : 'ajc',
		premium_status : ''
	};
	var site_domain = 'www.fe2.ajc.com';
	cmg.ajax_include_url = 'http://www.fe2.ajc.com/common-admin/ajax-include/';

	cmg.dfp_ad_slots = [];

	cmg.janrain_capture_server = 'https://cmg.dev.janraincapture.com/';
	cmg.janrain_js_url = 'd16s8pqtk4uodx.cloudfront.net/cmg-dev/load.js';
	cmg.janrain_app_id = 'u8wz9dtmm99upmpu52bazczfq3';
	cmg.janrain_federate_server = 'https://cmg-dev.janrainsso.com/';
	cmg.janrain_client_id = "" || '5cdyk76ckd8j6ux7pc4xyx8szpj28g5b';
	
	
		$(document).ready(function() {
		
			janrain.init();
			
			makeAdmin({"form":"#form", "sites":<?php echo $sites; ?>});
			
			$(".cmJanrainOpenModal").click(function(e) {
				e.preventDefault();	
                e.stopPropagation();
                janrain.capture.ui.modal.open('signIn');
                
                janrain.events.onCaptureLoginSuccess.removeHandler();
                
                janrain.events.onCaptureLoginSuccess.addHandler(function(result){
                console.log(result);
                	janrain.capture.ui.modal.close();

                  	$("#cmg-form h2").text("Hello, " + result.userData.displayName);
			       	createUser(result.userData);
			   	});
             });
		});
	</script>
	
	<script src="http://media.fe2.cmgdigital.com/shared/media/2013-12-11-12-58-43/web/common/javascript/janrain/lib/janrain.js"></script>
	
		<script type="text/javascript">
(function() {
    if (typeof window.janrain !== 'object') window.janrain = {};
    if (typeof window.janrain.settings !== 'object') window.janrain.settings = {};
    
    janrain.settings.tokenUrl = 'http://www.coxmediagroup.com/';

    function isReady() { janrain.ready = true; };
    if (document.addEventListener) {
      document.addEventListener("DOMContentLoaded", isReady, false);
    } else {
      window.attachEvent('onload', isReady);
    }

    var e = document.createElement('script');
    e.type = 'text/javascript';
    e.id = 'janrainAuthWidget';

    if (document.location.protocol === 'https:') {
      e.src = 'https://rpxnow.com/js/lib/cmg-dev/engage.js';
    } else {
      e.src = 'http://widget-cdn.rpxnow.com/js/lib/cmg-dev/engage.js';
    }

    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(e, s);
    
    
})();
</script>
</head>

<body>

	<form id="cmg-form">
		<h2>Hello and Welcome!</h2>
		
		<div id="loader" class="slide">
			<img src="ajax-loader.gif" />
		</div>
		<div id="accessForm" class="slide">
			<h3>To get started, please enter the <strong>Access Password</strong><br /> (<em>not</em> your user password
			but the password provided)</h3>
			<p id="error">Sorry, that's not correct. Please try again.</p>
			<div class="form"></div>
			<button class="next">Continue</button>
		</div>
		<div id="form" class="slide">
			<div id="signin">
				<h3>Thanks! Now please sign in with your own credentials:</h3>
				<a  class="next cmJanrainOpenModal">Sign In</a>
			</div>
			<div id="network">
				<h3>What kind of <strong>Network Level</strong> access should you have?</h3>
				<div class="form"></div>
				<button class="next">Next</button>
			</div>
			<div id="password" class="slide">
				<h3>Great! Please enter <strong>Network Permission Password</strong></h3>
				<p id="error2">Sorry, that's not correct. Please try again.</p>
				
				<div class="form"></div>
				<button class="next">Next</button>
				
			</div>
			<div id="sites" class="slide">
				<h3>What should be your <strong>Site Level</strong> permissions?</h3>
				<div class="form"></div>
				<button class="next">Submit</button>
			</div>
			<div id="message" class="slide">
				<h3>Thanks! Your permissions are in queue to be stored.</h3>
			</div>
		</div>
	</form>

	<div style="display:none;" id="signIn">
    <div class="capture_header">
        <h1>Sign In / Register</h1>
    </div>
    <div class="capture_signin">
        <h2>Sign in with your existing account</h2>
        {* loginWidget *} <br />
    </div>
    <div class="capture_backgroundColor">
        <div class="capture_signin">
            <h2>Sign in with your email</h2>
                    {* #userInformationForm *}
                        {* traditionalSignIn_emailAddress *}
                        {* traditionalSignIn_password *}
                        <div class="capture_form_item">
                                {* traditionalSignIn_signInButton *}
                            <a href="#" data-capturescreen="forgotPassword" id="forgotPasswordLink">Forgot your password?</a>
                        </div>
                    {* /userInformationForm *}
        </div>
    </div>
    <div class="capture_newUser capture_signin">
        <h2>New User?</h2>
        <a href="#" class="capture_btn capture_primary" data-capturescreen="traditionalRegistration">Create a New Account</a>
    </div>
</div>
<div style="display:none;" id="returnSocial">
    <div class="capture_header">
        <h1>Sign In / Register</h1>
    </div>
    <div class="capture_signin">
        <h2>Welcome Back {* welcomeName *}</h2>
        {* loginWidget *}
        <div class="capture_centerText switchLink"><a href="#" data-cancelcapturereturnexperience="true">Use another account</a></div>
    </div>
</div>
<div style="display:none;" id="returnTraditional">
    <div class="capture_header">
        <h1>Sign In / Register</h1>
    </div>
    <div class="capture_backgroundColor">
        <div class="capture_signin">
            <h2>Welcome back. Please sign in</h2>
            {* #userInformationForm *}
                {* traditionalSignIn_emailAddress *}
                {* traditionalSignIn_password *}
                <div class="capture_form_item">
                    {* traditionalSignIn_signInButton *}
                    <a href="#" data-capturescreen="forgotPassword" id="forgotPasswordLink">Forgot your password?</a>
                </div>
                <div class="capture_centerText switchLink"><a href="#" data-cancelcapturereturnexperience="true">Use another account</a></div>
            {* /userInformationForm *}
        </div>
    </div>
</div>
<div style="display:none;" id="socialRegistration" class="capture_lrg_footer">
    <div class="capture_header">
        <h1>You're Almost Done!</h1>
    </div>
    <div class="capture_signup">
        <h2>Select a display name and password</h2>
        {* #socialRegistrationForm *}
            {* socialRegistration_displayName *}
            {* socialRegistration_emailAddress *}
            {* traditionalRegistration_password *}
            {* traditionalRegistration_passwordConfirm *}
            <h2>Tell us about yourself</h2>
            {* registration_firstName *}
            {* registration_lastName *}
            {* registration_postalZip *}
            {* registration_birthday *}
            {* registration_gender *}
            <div class="capture_form_item">
                <label>*Indicates Required Field</label>
            </div>
            {* agreeToTerms *}
            <div class="capture_footer">
                <div class="capture_left">
                    {* backButton *}
                </div>
                <div class="capture_right">
                {* socialRegistration_signInButton *}
                </div>
            </div>
        {* /socialRegistrationForm *}
    </div>
</div>
<div style="display:none;" id="traditionalRegistration">
    <div class="capture_header">
        <h1>Create a New Account</h1>
    </div>
    <div class="capture_signup">
        <h2>Select a display name and password</h2>
        <p>Already have an account? <a href="#" data-capturescreen="signIn">Sign In</a></p>
        {* #registrationForm *}
            {* traditionalRegistration_displayName *}
            {* traditionalRegistration_emailAddress *}
            {* traditionalRegistration_password *}
            {* traditionalRegistration_passwordConfirm *}
            <h2>Tell us about yourself</h2>
            {* registration_firstName *}
            {* registration_lastName *}
            {* registration_postalZip *}
            {* registration_birthday *}
            {* registration_gender *}
            <div class="capture_form_item">
                <label>*Indicates Required Field</label>
            </div>
            {* agreeToTerms *}
            <div class="capture_footer">
                <div class="capture_left">
                    {* createAccountButton *}
                </div>
            </div>
        {* /registrationForm *}
    </div>
</div>
<div style="display:none;" id="traditionalRegistrationBlank">
    <div class="capture_header">
        <h1>Create a New Account</h1>
    </div>
    <div class="capture_signup">
        <p>Already have an account? <a href="#" data-capturescreen="signIn">Sign In</a></p>
        {* #registrationFormBlank *}
            {* registration_firstName *}
            {* registration_lastName *}
            {* traditionalRegistration_displayName *}
            {* traditionalRegistration_emailAddressBlank *}
            {* registration_birthday *}
            {* registration_gender *}
            {* registration_postalZip *}
            {* traditionalRegistration_passwordBlank *}
            {* traditionalRegistration_passwordConfirmBlank *}
            <div class="capture_form_item">
                <label>*Indicates Required Field</label>
            </div>
            {* agreeToTerms *}
            <div class="capture_footer">
                <div class="capture_left">
                    {* backButton *}
                </div>
                <div class="capture_right">
                {* createAccountButton *}
                </div>
            </div>
        {* /registrationForm *}
    </div>
</div>

<div style="display:none;" id="registrationSuccess">
    <div class="capture_header">
        <h1>Thank you for registering!</h1>
    </div>
    <div class="capture_success">
        <p>We have sent you a confirmation email. Please check your email and click on the link to activate your account.</p>
        <div class="capture_footer">
            <span onclick="janrain.capture.ui.modal.close()" class="capture_btn capture_primary">Close</span>
        </div>
    </div>
</div>

<div style="display:none;" id="registrationSuccessConfirmed">
    <div class="capture_header">
        <h1>Thank you for registering!</h1>
    </div>
    <div class="capture_success">
        <p>We look forward to seeing you frequently. Visit us and sign in to update your profile, receive the latest news and keep up to date with mobile alerts.</p>
        <div class="capture_footer">
            <span onclick="janrain.capture.ui.modal.close()" class="capture_btn capture_primary">Close</span>
        </div>
    </div>
</div>

<div style="display:none;" id="forgotPassword">
    <div class="capture_header">
        <h1>Create a new password</h1>
    </div>
    <div class="retrieve_password">
        <p>Don't worry, it happens. We'll send you a link to create a new password.</p>
        {* #forgotPasswordForm *}
            {* forgotPassword_emailAddress *}
            <div class="capture_footer">
                <div class="capture_left">
                    {* backButton *}
                </div>
                <div class="capture_right">
                    {* forgotPassword_sendButton *}
                </div>
            </div>
        {* /forgotPasswordForm *}
    </div>
</div>

<div style="display:none;" id="forgotPasswordSuccess">
    <div class="capture_header">
        <h1>Email sent</h1>
    </div>
    <div class="retrieve_password">
        <p>We have sent you an email with a link to change your password.</p>
        <div class="capture_footer">
            <a href="#" onclick="janrain.capture.ui.modal.close()" class="capture_btn capture_primary">Close</a>
        </div>
    </div>
</div>

<div style="display:none;" id="forgotPasswordSuccess">
    <div class="capture_header">
        <h1>Create a new password</h1>
    </div>
    <div class="retrieve_password">
        <p>We've sent an email with instructions to create a new password. Your existing password has not been changed.</p>
        <div class="capture_footer">
            <a href="#" onclick="janrain.capture.ui.modal.close()" class="capture_btn capture_primary">Close</a>
        </div>
    </div>
</div>
<div style="display:none;" id="mergeAccounts">
    {* mergeAccounts *}
</div>
<div style="display:none;" id="traditionalAuthenticateMerge">
    <div class="capture_header">
        <h1>Sign in to complete account merge</h1>
    </div>
    <div class="capture_signin">
    {* #tradAuthenticateMergeForm *}
        {* traditionalSignIn_emailAddress *}
        {* mergePassword *}
        <div class="capture_footer">
            <div class="capture_left">
                {* backButton *}
            </div>
            <div class="capture_right">
                {* traditionalSignIn_signInButton *}
            </div>
        </div>
     {* /tradAuthenticateMergeForm *}
    </div>
</div>
<div style="display:none;" id="resendVerification">
    <div class="capture_header">
        <h1>Resend Email Verification</h1>
    </div>
    <div class="retrieve_password">
        <p>To sign in you must verify your email address. Fill out the form below and we'll send you an email to verify.</p>
        {* #resendVerificationForm *}
            {* resendVerification_emailAddress *}
            <div class="capture_fox_buttoncol">
                {* newPasswordFormButton *}
            </div>
         {* /resendVerificationForm *}
    </div>
</div>
<div style="display:none;" id="resendVerificationSuccess">
    <div class="capture_header">
        <h1>Your Verification Email Has Been Sent</h1>
    </div>
    <div class="retrieve_password">
        <p>Check your email for a link to verify your email address.</p>
        <div class="capture_footer">
            <a href="#" data-capturescreen="signIn" class="capture_btn capture_primary">Sign in</a>
        </div>
    </div>
</div>
	
<script>    
    var cx_siteName = "ajc";
    var cx_rsID = "coxnewspaperdev";
    var cx_marketpath = "ga: atlanta";
    var cx_medium = "newspaper";

    var s_account = cx_rsID;

    
    if (("test" == "prod") &&
        (!((/www.prod.ajc/.test(window.location.host))
        || (/m.prod.ajc/.test(window.location.host))))) {
            if (cx_medium == "radio" || cx_medium == "tv" || cx_medium == "newspaper" ) {
                s_account = s_account+",coxglobal";
            }
        }
    else {
        
        s_account = "coxradiodev,coxnewspaperdev,coxtvdev";
    }
//]]></script>

<script type="text/javascript">//<![CDATA[
    cmg.s_coxnews = {};
    cmg.s_coxnews.siteName=cx_siteName;
    cmg.s_coxnews.linkInternalFilters = "javascript:,doubleclick.net,alt.coxnewsweb.com,legacy.com,uclick.com,signin.cmgdigital.com,www.test.ajc.com,outbrain.com";
    cmg.s_coxnews.server = window.location.host;
    cmg.s_coxnews.prop13 = cmg.s_coxnews.eVar13 = document.title.replace("| www.test.ajc.com", "");

    var revpathArray = document.getElementsByName("cmg_revpath");
    var pathNameStr = "";
    if(revpathArray.length > 0 && revpathArray[0].content !== ""){
        pathNameStr = revpathArray[0].content;
    } else {
        pathNameStr = window.location.pathname.split(/[#?]/)[0];
        if(pathNameStr === "/"){
            pathNameStr = "/homepage";
        }
    }
    if(pathNameStr.length > 99){
        pathNameStr = pathNameStr.substr(0,98) + "/";
    }
    cmg.s_coxnews.pageName = cmg.s_coxnews.eVar55 = pathNameStr;


    
    cmg.s_coxnews.prop63 = cmg.s_coxnews.eVar63 = location.protocol + '//' + location.host + location.pathname + location.search;

    
    if (cmg.s_coxnews.prop13.length == 0) {
        cmg.s_coxnews.prop13 = cmg.s_coxnews.eVar13 = "no page title available";
    }
    cmg.s_coxnews.hier3 = cmg.s_coxnews.channel = cmg.s_coxnews.eVar56 = "no category";

    

    
    if(cx_medium=="radio" || cx_medium=="tv" || cx_medium=="newspaper") {
        cmg.s_coxnews.hier1 = cx_marketpath+"|"+cx_medium+"|"+cx_siteName;
        cmg.s_coxnews.hier2 = cx_medium+"|"+cx_marketpath+"|"+cx_siteName;
        
        var search_page_re = new RegExp(cmg.s_coxnews.server+"\/search");
        var search_match = search_page_re.exec(window.location);
        if(search_match != null){
            cmg.s_coxnews.eVar1 = cmg.s_coxnews.getQueryParam('q');
            if(cx_no_results){
                cmg.s_coxnews.events = "event13,event14";
                cmg.s_coxnews.prop46 = "no";
            } else {
                cmg.s_coxnews.events = "event13";
                cmg.s_coxnews.prop46 = "yes";
            }
            if(cmg.s_coxnews.getQueryParam("searchType") == "web"){
                cmg.s_coxnews.eVar45=cmg.s_coxnews.prop45 = "web";
            } else {
                cmg.s_coxnews.eVar45=cmg.s_coxnews.prop45 = "site";
            }
        }
        if (cx_medium == "radio") {
            cmg.s_coxnews.eVar43=cmg.s_coxnews.prop43 = "";
        }
        else if (cx_medium == "tv") {
            cmg.s_coxnews.eVar43=cmg.s_coxnews.prop43 = "tv";
        }
        else if (cx_medium == "newspaper") {
           cmg.s_coxnews.eVar43=cmg.s_coxnews.prop43 = "newspaper";
        }
    }
    
    
cmg.s_coxnews.hier3 = "news|education";
cmg.s_coxnews.list1 = "topics";
cmg.s_coxnews.prop21 = "ajc";
cmg.s_coxnews.eVar21 = "ajc";
cmg.s_coxnews.prop16 = "non-mobile site";
cmg.s_coxnews.eVar16 = "non-mobile site";
cmg.s_coxnews.prop22 = "flat pages";
cmg.s_coxnews.eVar22 = "flat pages";
cmg.s_coxnews.prop42 = "ajc";
cmg.s_coxnews.eVar42 = "ajc";
cmg.s_coxnews.prop14 = "education";
cmg.s_coxnews.eVar14 = "education";
cmg.s_coxnews.prop4 = "";
cmg.s_coxnews.eVar4 = "";
cmg.s_coxnews.prop5 = "";
cmg.s_coxnews.eVar5 = "";
cmg.s_coxnews.prop6 = "";
cmg.s_coxnews.eVar6 = "";
cmg.s_coxnews.prop7 = "24";
cmg.s_coxnews.eVar7 = "24";
cmg.s_coxnews.prop17 = "";
cmg.s_coxnews.eVar17 = "";
cmg.s_coxnews.prop1 = "1057";
cmg.s_coxnews.eVar12 = "1057";
cmg.s_coxnews.prop2 = "";
cmg.s_coxnews.eVar2 = "";
cmg.s_coxnews.prop3 = "";
cmg.s_coxnews.eVar3 = "";
cmg.s_coxnews.pageName = "/re/305/18988/socialhub/";
cmg.s_coxnews.eVar55 = "/re/305/18988/socialhub/";
cmg.s_coxnews.channel = "news";
cmg.s_coxnews.eVar56 = "news";

    
    if (cmg.site_meta.media_type === 'premium') {
        if (cmg.site_meta.premium_status === 'premium') {
            var auth_url = 'http://www.test.ajc.com/profile/janus-auth/';
            cmg.authorization.check(auth_url, function(json) {
                if (json.authorized) {
                    cmg.s_coxnews.eVar52=cmg.s_coxnews.prop52 = "full page";
                }
                else {
                    cmg.s_coxnews.eVar52=cmg.s_coxnews.prop52 = "stubbed";
                }
            });
        }
    } else {
        
        if (cmg.site_meta.premium_status === 'premium') {
            cmg.s_coxnews.eVar52=cmg.s_coxnews.prop52 = "stubbed";
        }
    }

    
    
    

    
    var cookie = cmg.get_cookie ? cmg.get_cookie('ur_metrics') : false;
    if (cookie) {
        
        var cpp = {"prop2": {"start": 25, "length": 50}, "eVar2": {"start": 25, "length": 50}, "eVar12": {"start": 0, "length": 4}, "prop6": {"start": 18, "length": 5}, "prop4": {"start": 8, "length": 5}, "prop5": {"start": 13, "length": 5}, "eVar3": {"start": 4, "length": 4}, "prop7": {"start": 23, "length": 2}, "eVar5": {"start": 13, "length": 5}, "prop1": {"start": 0, "length": 4}, "eVar7": {"start": 23, "length": 2}, "eVar6": {"start": 18, "length": 5}, "eVar4": {"start": 8, "length": 5}, "prop3": {"start": 4, "length": 4}};
        for (prop in cpp) {
            cmg.s_coxnews[prop] = cmg.query.trim(cookie.substr(
                    cpp[prop].start,
                    cpp[prop].length));
        }
    }

    
    for (key in cmg.s_coxnews) {
        if (key.match(/prop|eVar|hier/) !== null) {
            cmg.s_coxnews[key] = cmg.s_coxnews[key].toLowerCase();
        }
    }

    cmg.query(document).ready(function () {
        
        var s_code = cmg.s_coxnews.t();
        if (s_code) { cmg.query('#cm_s_code').text(s_code); }
    });
//]]></script>
<script type="text/javascript" src="http://media.test.cmgdigital.com/shared/media/2013-12-13-01-14-09/web/common/javascript/omniture_core.js"></script>
<!-- requires javascript/omniture_event.js --><script type="text/javascript" src="http://media.test.cmgdigital.com/shared/media/2013-12-13-01-14-09/web/common/javascript/modules/omniture_utilities.min.js"></script>

</body>
</html>