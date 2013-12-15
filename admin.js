var systemUserToken = "eyJ0eXAiOiJqd3QiLCJhbGciOiJIUzI1NiJ9.eyJkb21haW4iOiJjb3huZXdzLmZ5cmUuY28iLCJ1c2VyX2lkIjoic3lzdGVtIiwiZXhwaXJlcyI6MTM5NDgzNzI3MCwiZGlzcGxheV9uYW1lIjoic3lzdGVtIn0.GxJA4AwFjGVWg1mTQO4RwMI25Rm87PwdVhIgFg6-I-Y";

function makeAdmin(data) {
	$("button.next:not(.cmOpenJanrainModal)").click(function(e) {
		e.preventDefault();
	});
	
	var $form = $(data.form);
	
	var sites = data.sites; 
	
	var networkAccess = null;
	var password = null;
		
	$("#accessForm .form").alpaca({
		"options": {
			"id":"passwordFieldAccess"
		},
		"schema": {
			"format":"password"
		}
	});
	
	$("#accessForm button.next").click(function(e) {
		$("#accessForm").hide("slide");
		$("#loader").show();
		
		var payload = {
			"type":"access",
			"password":Base64.encode($("#passwordFieldAccess").val())
		};
		
		$.ajax("authHandler.php",
			{
				type: "post",
				success: successHandler,
				
				error: errorHandler,
				
				data: payload
			});
	});
	
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
					"id":"passwordFieldNetwork"
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
		
		$("#loader").show();
		
		var payload = {
			"type":"network",
			"password":Base64.encode($("#passwordFieldNetwork").val())
		};
		
		$.ajax("authHandler.php",
				{
					type: "post",
					success: successHandler2,
					
					error: errorHandler2,
					
					data: payload
				});
		
	});
	
	for (var i = 0; i < sites.length; ++i) {
		var siteNode = $("<div class='sitelevel'>" + sites[i].url + "</div>").appendTo($("#sites .form"));
		
		var formNode = $("<div id='form-" + sites[i].id + ">").appendTo($(siteNode));
		
		$(".sitelevel:even").css("background-color", "#87CEFA");
		$(".sitelevel:odd").css("background-color", "#999999");

		select.options.id = sites[i].id;
		
		$(siteNode).alpaca(select);
	}
	
	$("#sites button.next").click(function(e) {
		$("#sites").hide("slide");
		
		var payload = {};
		
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
		
		
		for (var site in payload.sites) {
			$.ajax("createAssociations.php", {
				type: "post",
				
				data: {
					"user":window.userData.displayName,
					"type": (payload.sites[site].access == "Moderator") ? "admin" : payload.sites[site].access.toLowerCase(),
					"site_id":payload.sites[site].id
				}
			});
		}

		
		$("#message").delay(1000).show("slide");
	});
	
	var successHandler = function(e) {
		$("#loader").delay(1000).hide();
		$("#signin").delay(1000).show("slide");
	};
	
	var errorHandler = function(e) {
		$("#error").delay(1000).show("slide");
		$("#loader").delay(1000).hide();
		$("#accessForm").delay(1000).show("slide");
	};
	
	var successHandler2 = function(e) {
		$("#loader").delay(1000).hide();
		$("#sites").delay(1000).show("slide");
		$.ajax("createAssociations.php", {
			type: "post",
			
			data: {
				"user":window.userData.displayName,
				"type": networkAccess
			},
			
			success: successHandler3,
			error: errorHandler3
		});

	};
	
	var errorHandler2 = function(e) {
		$("#error2").delay(1000).show("slide");
		$("#loader").delay(1000).hide();
		$("#password").delay(1000).show("slide");
	};
	
	var successHandler3 = function(data) {
		console.log(data);
	};
	
	var errorHandler3 = successHandler3;
};



function createUser(user) {	
	
	$.get( "php/getToken-coxnews.php", {
			uid: user.uuid,
			dispname: user.displayName
		},
		tokenHandler
	);
	$("#signin").hide("slide");
	$("#network").delay(1000).show("slide");
};

function tokenHandler(data, textStatus, jqXHR) {
	fyre.conv.login(data);
};
