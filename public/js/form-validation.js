// $.validator.setDefaults( {
// 	submitHandler: function () {
// 		alert( "submitted!" );
// 		// $.ajax({
//         //     url: "http://localhost:8080/store/saveajax", 
//         //     type: "POST",             
//         //     data: new FormData($(form)),
//         //     cache: false,             
//         //     processData: false,      
//         //     success: function(data) {
//         //         // $('#loading').hide();
//         //         // $("#message").html(data);
// 		// 		alert('success')
//         //     }
//         // });
//         return false;
// 	}
// } );

$( document ).ready( function () {
	$( "#store" ).validate( {
		rules: {
			code: {
				required: true,
				minlength: 5,
				maxlength: 50
			},
			name: {
				required: true,
				minlength: 5,
				maxlength: 100
			},
			country: "required",
			state: "required",
			city: {
				required: true,
				minlength: 2
			},
			postalcode: {
				minlength: 4,
				maxlength: 25
			},
			address1: {
				required: true,
				minlength: 5,
				maxlength: 255
			},
			store_image: {
				extension: "jpg|jpeg",
				maxsize: 300000,

			},
			
		},
		messages: {
			code:{
				required: "Please enter store code",
				minlength: "Store core must consist of at least 5 characters",
				maxlength: "Store code must note be more than 50 characters long",
			},
			name:{
				required: "Please enter store name",
				minlength: "Store name must consist of at least 5 characters",
				maxlength: "Store name must note be more than 100 characters long",
			},
			country: "Please select county",
			state: "Please select store",
			city:{
				required: "Please enter city",
				minlength: "City must consist of at least 2 characters",
			},
			postalcode:{
				minlength: "Postal code must consist of at least 4 characters",
				maxlength: "Postal code must note be more than 25 characters long",
			},
			address1:{
				required: "Please enter store address",
				minlength: "Store address must consist of at least 5 characters",
				maxlength: "Store address must note be more than 100 characters long",
			},
			store_image: {
				extension: "Please upload file in these format only (jpg, jpeg).",
				maxsize:" file size must be less than 300 KB."
			}
			
		},
		errorElement: "span",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );

			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else {
				error.insertAfter( element );
			}
		},
		highlight: function ( element, errorClass, validClass ) {
			$( element ).parents( ".row" ).addClass( "has-error" ).removeClass( "has-success" );
		},
		unhighlight: function (element, errorClass, validClass) {
			$( element ).parents( ".row" ).addClass( "has-success" ).removeClass( "has-error" );
		}
	} );
});

$(document).ready(function () {  
	$.ajax({  
		type: "GET",  
		url: "/store/getcities",  
		data: "{}",  
		success: function (data) { 
			var dataObj = JSON.parse(data)
			var s = '<option value="">Select country</option>';  
			for (var i = 0; i < dataObj.length; i++) {  

				s += '<option value="' + dataObj[i].country_id + '">' + dataObj[i].name + '</option>';  
			}  
			 $("#country").html(s);  
		}  
	}); 
	
	
	$('#country').on('change', function() {
		var country_id = $('option:selected', this).val();
		$.ajax({
		url: "/store/getstate",
		type: "POST",
		data: {
			country_id: country_id
		},
		cache: false,
		success: function(data){
			var dataObj = JSON.parse(data)
			var s = '<option value="">Select state/region</option>';  
			for (var i = 0; i < dataObj.length; i++) {  

				s += '<option value="' + dataObj[i].region_id + '">' + dataObj[i].name + '</option>';  
			}  
			 $("#state").html(s);  
		}
		});
	});
}); 

// $(function() {
//     $("#country").change(function() {
//         alert( $('option:selected', this).val() );
// 		$.ajax({  
// 			type: "POST",  
// 			url: "/store/getcities",  
// 			data: $('option:selected', this).val(),  
// 			success: function (data) { 
// 				var dataObj = JSON.parse(data)
// 				var s = '<option value="">Select country</option>';  
// 				for (var i = 0; i < dataObj.length; i++) {  
	
// 					s += '<option value="' + dataObj[i].country_id + '">' + dataObj[i].name + '</option>';  
// 				}  
// 				 $("#country").html(s);  
// 			}  
// 		});  
//     });
//});