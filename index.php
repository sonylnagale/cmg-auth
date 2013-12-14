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
	<script type="text/javascript" src="http://www.alpacajs.org/js/alpaca.min.js"></script>
	<link type="text/css" href="http://www.alpacajs.org/css/alpaca.min.css" rel="stylesheet"/>
	<link type="text/css" href="styles.css" rel="stylesheet"/>
	<script src="http://media.fe2.cmgdigital.com/shared/media/2013-12-11-12-58-43/web/common/javascript/core.socialhub.js?version=2013-12-11"></script>
	<script src="http://media.fe2.cmgdigital.com/shared/media/2013-12-11-12-58-43/web/common/javascript/janrain/lib/janrain.js"></script>
	<script src="janrain.js"></script>
	<script src="admin.js"></script>
	
	<script>
	
	
		$(document).ready(function() {
			makeAdmin({"form":"#form", "sites":<?php echo $sites; ?>});
			
			$(".capture_modal_open").click(function(e) {
			
				e.preventDefault();	
                e.stopPropagation();
                janrain.capture.ui.modal.open('signIn');
             });
		});
	</script>
</head>

<body>

	<form id="cmg-form">
		<h2>Hello!</h2>
		<div id="form" class="slide">
			<div id="signin">
				<h3>Welcome!</h3>
				<a href="#" class="next capture_modal_open">Sign In</a>
			</div>
			<div id="network">
				<h3>What kind of <strong>Network Level</strong> access should you have?</h3>
				<div class="form"></div>
				<button class="next">Next</button>
			</div>
			<div id="password" class="slide">
				<h3>Great! Please enter the password.</h3>
				<div class="form"></div>
				<button class="next">Next</button>
				
			</div>
			<div id="sites" class="slide">
				<h3>What should be your <strong>Site Level</strong> permissions?</h3>
				<div class="form"></div>
				<button class="next">Submit</button>
			</div>
			<div id="message" class="slide">
				<h3>Success/failure message</h3>
			</div>
		</div>
	</form>

</body>
</html>