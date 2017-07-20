$(document).ready(function(){

	$("#sleSearchQuery").bind('change', function(){
		var strValue = $(this).val();
		if(strValue.length > 3)
		{
			$.ajax({
				'type'		: 'GET',
				'url'		: strBaseURL+"userslist/getusers", 
				'ajax' 		: true,
				'data' 		: { search_query : strValue },
				'success' 	: function(response){ 
					var strHTML = "";
					response = jQuery.parseJSON(response);
					response = response.Users;
					for(var intCtr = 0; intCtr < response.length; intCtr++)
					{
						strHTML += "<tr>";
						strHTML += "<td>"+response[intCtr]['age']+"</td>";
						strHTML += "<td>"+response[intCtr]['gender']+"</td>";
						strHTML += "<td>"+response[intCtr]['filenumber']+"</td>";
						strHTML += "<td>"+response[intCtr]['addeddate']+"</td>";
						strHTML += "<td>"+response[intCtr]['score']+"</td>";
						strHTML += "<td>"+response[intCtr]['certile']+"</td>";
					}

					strHTML += "</tr>";

					$("#tblCustomerList tbody").html(strHTML);
				},
				'failure' 	: function(){}
			});    
		}
	});

});