<!DOCTYPE html>
<html>
<head>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<link type="text/css" href="styles.css" rel="stylesheet"/>

	
	</head>
	<body>
	<div id="livefyre"></div>
<script type="text/javascript">
function janrainSignOut(){
	janrain.capture.ui.endCaptureSession();
}
(function() {

	  
	  window.convConfig_0 = {"siteId":"362525","articleId":"4085","collectionMeta":"","checksum":"","el":"livefyre"};
	window.convConfig_4084 = {"siteId":"362507","articleId":"5","collectionMeta":"","checksum":"","el":"livefyre"};

	window.callback  = function(widget) {
	 
			window.changeConv = widget.changeCollection;
	};
		
	if (typeof window.janrain !== 'object') window.janrain = {};
	window.janrain.settings = {};
	window.janrain.settings.capture = {};

	// capture settings
	janrain.settings.capture.redirectUri = 'http://cmg.staging.voceconnect.com/wp-admin/admin-ajax.php?action=janrain_capture_redirect_uri';
	janrain.settings.capture.appId= '6z4jnndkpe6dmfx7vdg4c7hkmz';
	janrain.settings.capture.clientId = 'dhx8qu4jju5qmu36ye2qsf7kbyk2ccgg';
	janrain.settings.capture.responseType = 'token';
	janrain.settings.capture.captureServer = 'https://users.cmgdigital.com';
	janrain.settings.capture.registerFlow = 'socialRegistration';
	janrain.settings.packages = ['capture','login'];

	janrain.settings.capture.setProfileCookie = true;
	janrain.settings.capture.keepProfileCookieAfterLogout = true;
	janrain.settings.capture.setProfileData = 'true';
	janrain.settings.capture.federateEnableSafari = true;

	// styles
	janrain.settings.capture.stylesheets = ['http://cmg.staging.voceconnect.com/wp-content/themes/cmg/janrain-capture-screens/stylesheets/styles.css'];
	janrain.settings.capture.mobileStylesheets = ['http://cmg.staging.voceconnect.com/wp-content/themes/cmg/janrain-capture-screens/stylesheets/mobile-styles.css'];
	janrain.settings.capture.recaptchaPublicKey = '6LeVKb4SAAAAAGv-hg5i6gtiOV4XrLuCDsJOnYoP';

	// engage settings
	janrain.settings.appUrl = 'https://login.cmgdigital.com';
	janrain.settings.tokenAction = 'event';
		

	//backplane settings
	janrain.settings.capture.backplane = 1;
	janrain.settings.capture.backplaneBusName = 'coxmediagroup.com';
	janrain.settings.capture.backplaneVersion = 1.2;
	janrain.settings.capture.backplaneServerBaseUrl = 'https://cmg.janrainbackplane.com';
				

	// federate settings
	janrain.settings.capture.federate = 1;
	janrain.settings.capture.federateServer = 'https://sso.cmgdigital.com';
	janrain.settings.capture.federateXdReceiver = 'http://cmg.staging.voceconnect.com/wp-content/themes/vip/plugins/janrain-capture/xdcomm.html';
	janrain.settings.capture.federateLogoutUri = 'http://cmg.staging.voceconnect.com/wp-login.php?loggedout=true';
		
	function isReady() { janrain.ready = true; };
	if (document.addEventListener) {
		document.addEventListener("DOMContentLoaded", isReady, false);
	} else {
		window.attachEvent('onload', isReady);
	}

	var e = document.createElement('script');
	e.type = 'text/javascript';
	e.id = 'janrainAuthWidget'
	var url = document.location.protocol === 'https:' ? 'https://' : 'http://';
	url += 'd16s8pqtk4uodx.cloudfront.net/cmg/load.js';
	e.src = url;
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(e, s);
})();
</script><script type="text/javascript">function janrainCaptureWidgetOnLoad() {

	var readyFunction = authDelegate = fyre.conv.BackplaneAuthDelegate(window.Backplane);
	

	 fyre.conv.load(
		{network: 'jamiedupree.fyre.co'},
		[window.convConfig_0], 
	 window.callback
	);

	janrain.events.onCaptureBackplaneReady.addHandler(function() {
		janrain.events.onCaptureBackplaneReady.remove(all)		

			janrain.events.onCaptureBackplaneReady.removeHandlers();
		 
		});


	
	janrain.events.onCaptureLoginSuccess.addHandler(function(){
		/*location.reload(true);*/
		janrain.capture.ui.modal.close();
	});
	janrain.events.onCaptureRegistrationSuccess.addHandler(function(){
		/*location.reload(true);*/
		janrain.capture.ui.modal.close();
	});
	janrain.capture.ui.start();
}
</script><script type="text/javascript" src="http://zor.livefyre.com/wjs/v3.0/javascripts/livefyre.js"></script>	

<script>
(function() {
    if (typeof window.janrain !== 'object') window.janrain = {};
    if (typeof window.janrain.settings !== 'object') window.janrain.settings = {};
    
    janrain.settings.tokenUrl = 'http://www.coxmediagroup.com/';

    function isReady() { janrain.ready = true; 



    };
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



<a  onclick="window.changeConv(window.convConfig_4084)">Change</div>


<script>

</script>
</script>
</body>
</html>