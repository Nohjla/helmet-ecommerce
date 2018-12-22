function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
// email validation

function validate() {
  var $result = $("#result");
  var email = $("#username").val();
  $result.text("");

  if (validateEmail(email)) {
    $result.text(email + " is valid");
    $result.css("color", "green");
  } else {
    $result.text(email + " is not valid");
    $result.css("color", "red");
  }
  return false;
}
// username validation


$("#username").keyup("click", validate);

$(document).ready(()=>{
	$("#btn_register").click(()=>{
		let lname = $("#lname").val();
		let fname = $("#fname").val();
		let mname = $("#mname").val();
		let gender = $("input[name='gender']:checked").val();
		let bday = $("#bday").val();
		let contact = $("#contact").val();
		let address = $("#address").val();
		let username = $("#username").val();
		let password = $("#password").val();
		let cpassword = $("#cpassword").val();

		let error_log = 0;
		
		if(lname == ""){
			$("#lname").prev().css("color","#dc3545");
			$("#lname").prev().html("required(*)");
			error_log = 1;
		}

		if(fname == ""){
			$("#fname").prev().css("color","#dc3545");
			$("#fname").prev().html("required(*)");
			error_log = 1;
		}

		if(!gender){
			$("#err_gender").css("color","#dc3545");
			$("#err_gender").html("required(*)");
			error_log = 1;
		}

		if(bday == ""){
			$("#bday").prev().css("color","#dc3545");
			$("#bday").prev().html("required(*)");
			error_log = 1;
		}

		if(contact == ""){
			$("#contact").prev().css("color","#dc3545");
			$("#contact").prev().html("required(*)");
			error_log = 1;
		}

		if(address == ""){
			$("#address").prev().css("color","#dc3545");
			$("#address").prev().html("required(*)");
			error_log = 1;
		}


		if(username == ""){
			$("#username").prev().css("color","#dc3545");
			$("#username").prev().html("required(*)");
			error_log = 1;
		}

		if(password == ""){
			$("#password").prev().css("color","#dc3545");
			$("#password").prev().html("required(*)");
			error_log = 1;
		}

		if(cpassword == ""){
			$("#cpassword").prev().css("color","#dc3545");
			$("#cpassword").prev().html("required(*)");
			error_log = 1;
		}

		if (password != cpassword) {
			$("#password").prev().css("color","#dc3545");
			$("#password").prev().html("password did not match");
			$("#cpassword").prev().css("color","#dc3545");
			$("#cpassword").prev().html("password did not match");
			error_log = 1;
		}


		if (error_log == 0) {
			$.ajax({
				url:"../controllers/add-register.php",
				method:"POST",
				data:{lname:lname,mname:mname,fname:fname,gender:gender,bday:bday,contact:contact,address:address,username:username,password:password},
				dataType:"text",
				success:function(data)
				{
					alert(data);
					$("#lname").val('');
					$("#fname").val('');
					$("#mname").val('');
					$("input[name='gender']:checked").val('');
					$("#bday").val('');
					$("#contact").val('');
					$("#address").val('');
					$("#delivery_address").val('');
					$("#username").val('');
					$("#password").val('');
					$("#cpassword").val('');
				}
			});
		}
	})
});
// validation registration


$("button#addToCart").on("click",function(){
	//get the product id
	let productid = $(this).attr("data-id");
	let quantity = $("#quantity"+productid).val();

	console.log("Product Id :" + productid);
	console.log("Quantity :" + quantity);
	
	$.ajax({
		url:"../controllers/addToCart.php",
		method:"POST",
		data:{productid:productid,quantity:quantity},
		dataType:"text",
		success:function(data){
			$('#icart').html(data);
		}
	})	

})
// add to cart


function loadCart(){
	$.get("../controllers/loadcart.php",function(data){

		$("#loadcart").html(data);

	});
}



$(document).ready(function(){

	loadCart();
});
// view cart

function changeNoItems(id){

	let items =	$("#quantity" + id).val();
	let price = $("#price" + id).text();
	let newPrice = items * price;
	let grandtotal = items * newPrice;

	$.post("../controllers/updateCart.php",{id:id,quantity:items},function(data){
		console.log(data);
		$('#icart').html(data);
	})

	$("#subTotal" + id).text(newPrice);

	let a =0;
	$(".sub-total").each(function(id) {
		a = a + parseFloat($(this).text());
		console.log(a);
	});
	$("#grandTotal").text(a);

	// let sum = 0;

	// $.each(a, function(index, value){
	// 	sum += value;
	// });
	// console.log(sum);
 // 	$("#grandTotal").text(sum);


 }

 function deleteItem(id){

 		let ans = confirm("are you sure");
 		if(ans){
		 	$.ajax({
				url:"../controllers/remove_product.php",
				method:"POST",
				data:{itemId:id},
				dataType:"text",
				success:function(data){
					$('a[href="cart.php"]').html(data);
					console.log(data);
					loadCart();
				}
			})	
 		}
 }
function showCategories(categoryID){
	// alert(categoryID);
	// document.getElementById('nowCategories').innerHTML = "Category" + " " + categoryID;
	console.log(categoryID);
	$.ajax({
			url:"../controllers/show_items.php",
			method:"POST",
			data:{
				categoryID:categoryID
			},
			dataType:"text",
			success: function(data){
				$("#products").html(data)
			}
		});
}

function findCategories(fcategoryID){

	console.log(fcategoryID);
	$.ajax({
			url:"../controllers/find_items.php",
			method:"POST",
			data:{
				fcategoryID:fcategoryID
			},
			dataType:"text",
			success: function(data){
				$("#products").html(data)
			}
		});
}

