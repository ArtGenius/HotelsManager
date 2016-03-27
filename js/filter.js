hotels = [];
firms = [];
addresses = [];
rangs = [];
fields = [ {
	value : "hotels"
}, {
	value : "firms"
}, {
	value : "addresses"
}, {
	value : "rangs"
}, ];
$(document).ready(function() {
	// ============HOTELS===============
	$("#add_hotel").click(function() {
		hotels.push($("#hotel_name").val());
		$("#hotel_list").html(print(hotels));
	});
	// ============FIRMS===============
	$("#add_firm").click(function() {
		firms.push($("#firm_name").val());
		$("#firm_list").html(print(firms));
	});
	// ============ADRESSES===============
	$("#add_address").click(function() {
		addresses.push($("#address_name").val());
		$("#address_list").html(print(addresses));
	});
	// ============RANGS===============
	$("#add_rang_value").click(function() {
		rangs.push($("#rang_value").val());
		$("#rang_list").html(print(rangs));
	});
	$("#add_rang_range").click(function() {
		rangs.push({
			from : $("#rang_from").val(),
			to : $("#rang_to").val()
		});
		$("#rang_list").html(print(rangs));
	});

	$("#constrains_ready").click(function() {
		$("#result").load("edit.php", {"hotels":hotels, "addresses":addresses, "firms":firms, "ranks":rangs});
	});
});
function printJSON() {
	var map = {
		hotels : hotels,
		firms : firms,
		addresses : addresses,
		rangs : rangs,
		fields : fields
	}
	return JSON.stringify(map);
}
function print(list) {
	var result;
	result = "<ul>";
	for (var i = list.length - 1; i >= 0; i--) {
		var value = list[i].value;
		var from = list[i].from;
		var to = list[i].to;
		if (value == null && from == null && to == null) {
			result += "<li>" + list[i] + "</li>";
		} else if (value == null) {
			result += "<li>from  " + from + "   to " + to + "</li>";
		} else {
			result += "<li>" + value + "</li>";
		}
		;

	}
	;
	result += "</ul>";
	return result;
}