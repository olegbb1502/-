var date = new Date();

var options = {
  year: 'numeric',
  month: 'numeric',
  day: 'numeric',
};
var  local_date = date.toLocaleString("ru", options);
// alert( date.toLocaleString("ru", options) ); 

document.getElementById("date_input").value = local_date;


var service = document.getElementById("service");

var service_option = document.createElement("option");
service_option.value = "engine";
document.getElementById("service_list").appendChild(service_option);
service_option.innerHTML = "Engine";

var reg = document.getElementById("reg_button");
reg.addEventListener("click", global_func);

function global_func() {
	emailValidation();
}

var vehicle_type = document.getElementById("vehicle_type");

var option = document.createElement("option");
option.value = "type_1";
document.getElementById("vehicle_type").appendChild(option);
option.innerHTML = "Audi";


/*var isCallVehicleType = false;
vehicle_type.addEventListener("click" , addVehicleTypes);

function addVehicleTypes() {
	if (isCallVehicleType == false) {
			var option = document.createElement("option");
			option.value = "type_1";
			document.getElementById("vehicle_type").appendChild(option);
			option.innerHTML = "Audi";
			isCallVehicleType = true;
		};
}*/

function emailValidation() {

	var t1 = document.getElementById("email");
	var t2 = t1.getElementsByTagName("form")[0];
	var t3 = t2.firstElementChild.value;
	var t4 = t2.lastElementChild.value;

	if (t3 == t4) {
		for(var i = 0 ; i < t3.length; i++) {
			if(t3[i] == '@' ) {
				for(var j = i; j < t3.length; j++ ) {
					if( (t3[j] == '.') && ( t3.length - j > 2) && ( t3.length - j < 5) ) {
						addNewCustomer();
						return;
					}
				}
			}
		}
	};

	alert("Your e-mail adress doesn`t match!")
}

function addNewCustomer() {
	var log_in = 'kfjdjghjz';
	var password = 'jzig';
	alert('Your log-in: ' + log_in + '\nYour password: ' + password);
}