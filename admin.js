function makeAdmin(data) {
	$("button.next:not(.cmOpenJanrainModal)").click(function(e) {
		e.preventDefault();
	});
	
	var $form = $(data.form);
	
	var sites = data.sites; 
	
	var networkAccess = null;
	var password = null;
		
	var networkNode = $("<div id='networkSettings'/>").appendTo($("#network .form"));

	var select = {
		"data": false,
		"options": {
			"showMessages":false
		},
		"schema": {
			"enum":["Moderator","Owner"]
		}
	};
	
	$(networkNode).alpaca(select);
	
	$("#network button.next").click(function(e) {
		
		$("#network").hide("slide");

		
		
		if ($("#networkSettings input[value='Moderator']").is(":checked")) {
			networkAccess = "moderator";
		} else if ($("#networkSettings input[value='Owner']").is(":checked")) {
			networkAccess = "owner";
		}

		
		if (networkAccess != null) {
			$("#password .form").alpaca({
				"options": {
					"id":"passwordField"
				},
				"schema": {
					"format":"password"
				}
			});
			
			$("#password").delay(1000).show("slide");
		} else {
			$("#sites").delay(1000).show("slide");
		}
	});
	
	$("#password button.next").click(function(e) {
		password = $("#passwordField").val();
		$("#password").hide("slide");
		$("#sites").delay(1000).show("slide");
	});
	
	for (var i = 0; i < sites.length; ++i) {
		var siteNode = $("<div class='sitelevel'>" + sites[i].url + "</div>").appendTo($("#sites .form"));
		
		var formNode = $("<div id='form-" + sites[i].id + ">").appendTo($(siteNode));
		
		$(".sitelevel:even").css("background-color", "#87CEFA");

		select.options.id = sites[i].id;
		
		$(siteNode).alpaca(select);
	}
	
	$("#sites button.next").click(function(e) {
		$("#sites").hide("slide");
		
		var payload = {};
		
		payload.password = $('#passwordField').val();
		payload.networkSettings = networkAccess;
		payload.sites = [];
		
		var sitesOptions = $("#sites input:checked");
		$(sitesOptions).each(function(i,el) {
			var siteId = $(el).parent().parent().attr('id');
			
			var siteAccess = null;
			
			if ($(el)[0].value != "") {
				siteAccess = $(el)[0].value;
				payload.sites.push({"id":siteId, "access":siteAccess});
			}
		});
		
		console.log(payload.sites);	
		
		$("#message").delay(1000).show("slide");
	})
}