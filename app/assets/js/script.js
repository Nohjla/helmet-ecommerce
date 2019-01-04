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
function confirmPass(){
	let pass = $("#hpassword").val();
	let cpass = $("#chpassword").val();
	if(pass == cpass){
		$("#passconf").text("Password matched");
		$("#passconf").css("color","green");
	}
	else{
		$("#passconf").text("Password did not match");
		$("#passconf").css("color","red");
	}
}

$(document).ready(()=>{
	$("#btn_changepass").click(()=>{
		let pass = $("#hpassword").val();
		$.ajax({
			url:"../controllers/change_password.php",
			method:"POST",
			data:{npass:pass},
			dataType:"text",
			success:function(data)
			{		
				alert(data);
				$("#hpassword").val('');	
				$("#chpassword").val('');	
			}

		});	

	})
});

$(document).ready(()=>{
	$("#btn_addBrand").click(()=>{
		let brand = $("#brand").val();
		$.ajax({
			url:"../controllers/add_brand.php",
			method:"POST",
			data:{brand:brand},
			dataType:"text",
			success:function(data){
				alert('New Brand' + ' '+ data + ' ' + 'is successfully added');
				location.reload();
			}

		});
	})
});

// $(document).ready(()=>{
// 	$("#btn_placeOrder").click(()=>{
// 		let payment_mode = $("#inputGroupSelect01").val();
// 		let shipping_adress = $("#shipping_add").val();
// 		$.ajax({
// 			url:"../controllers/order_confirmation.php",
// 			method:"POST",
// 			data:{payment_mode:payment_mode,shipping_adress:shipping_adress},
// 			dataType:"text",
// 			success:function(data){
// 				alert(data); 	
// 			}

// 		});
// 	})
// });


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


$('a[href="#"]').on("click",function(){
	//get the product id
	let productid = $(this).attr("data-id");
	let quantity = $("#quantity"+productid).val();
	
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
		$('#icart').html(data);
	})

	$("#subTotal" + id).text(newPrice);

	let a =0;
	$(".sub-total").each(function(id) {
		a = a + parseFloat($(this).text());
	});
	$("#grandTotal").text(a);

	// let sum = 0;

	// $.each(a, function(index, value){
	// 	sum += value;
	// });
	// console.log(sum);
 // 	$("#grandTotal").text(sum);


 }

function updateProductName(nid){
	let pname = $("#pname").val();
	$.ajax({
		url:"../controllers/update-product-name.php",
		method:"POST",
		data:{id:nid,name:pname},
		dataType:"text",
		success:function(data){
			alert(data);
			location.reload();
		}
	})
}
function updateProductPrice(pid){
	let pprice = $("#pprice").val();
	$.ajax({
		url:"../controllers/update-product-price.php",
		method:"POST",
		data:{id:pid,price:pprice},
		dataType:"text",
		success:function(data){
			alert(data);
			location.reload();
		}
	})

}
function updateProductDesc(did){
	let pdesc = $("#pdesc").val();
	$.ajax({
		url:"../controllers/update-product-description.php",
		method:"POST",
		data:{id:did,description:pdesc},
		dataType:"text",
		success:function(data){
			alert(data);
			location.reload();
		}
	})
}

function updateProductBrand(bid){
	let brand = $("#brand").val();
	$.ajax({
		url:"../controllers/update-product-brand.php",
		method:"POST",
		data:{id:bid,brand:brand},
		dataType:"text",
		success:function(data){
			alert(data);
			location.reload();
		}
	})
}

function deleteProduct(deleteItem){

	let ans = confirm("are you sure you want to delete this item");
 		if(ans){
 			$.ajax({
 				url:"../controllers/delete-item.php",
 				method:"POST",
 				data:{id:deleteItem},
 				dataType:"text",
 				success:function(data){
 					$("#productInfoTable").html(data);
 				}

 			})
 		}
}

function updateStatus(orderID){
	
	$.ajax({
		url:"../controllers/update-order-status.php",
		method:"POST",
		data:{id:orderID},
		dataType:"text",
		success:function(data){
			$("#transInfo").html(data)
		}
	})
}

function updateProduct(updateID){
	$.ajax({
		url:"../controllers/update-product.php",
		method:"POST",
		data:{id:updateID},
		dataType:"text",
		success:function(data){
			$("#productInfo").html(data);
		}
	})

}

function showProduct(productID){

		$.ajax({
			url:"../controllers/view-single-item.php",
			method:"POST",
			data:{id:productID},
			dataType:"text",
			success:function(data){
				$("#products").html(data);
			}
		})
	
}
function viewTracking(){
	let sdate = $("#startDate").val();
	let edate = $("#endDate").val();
	
	$.ajax({
		url:"../controllers/search-tracking.php",
		method:"POST",
		data:{sdate:sdate,edate:edate},
		dataType:"text",
		success:function(data){
			$("#trackingDiv").html(data);
		}
	})

}

function showTrans(transCode){
		$.ajax({
			url:"../controllers/transaction_item.php",
			method:"POST",
			data:{id:transCode},
			dataType:"text",
			success:function(data){
				$("#transaction_item").html(data);
			}
		})
	
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
					loadCart();
					location.reload();
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

function incrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal)) {
    parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(1);
  }
}

function decrementValue(e) {
  e.preventDefault();
  var fieldName = $(e.target).data('field');
  var parent = $(e.target).closest('div');
  var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

  if (!isNaN(currentVal) && currentVal > 1) {
    parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
  } else {
    parent.find('input[name=' + fieldName + ']').val(1);
  }
}

$('.input-group').on('click', '.button-plus', function(e) {
  incrementValue(e);
});

$('.input-group').on('click', '.button-minus', function(e) {
  decrementValue(e);
});

