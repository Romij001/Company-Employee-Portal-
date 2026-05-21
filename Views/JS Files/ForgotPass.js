function isPass_valid(pForm) {

	const emailMsg = document.getElementById("email_error_msg");
	const pwdMsg = document.getElementById("Password3_error_msg");
	const pwd1Msg = document.getElementById("Password4_error_msg");

	
	emailMsg.innerHTML = "";
	pwdMsg.innerHTML = "";
	pwd1Msg.innerHTML = "";

	let flag = true;
	const pattern =  /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    
  
	if (pForm.email.value === "") {
		emailMsg.innerHTML = "Email cannot be empty ";
		flag = false;
	}
	else {
		if (!pattern.test(pForm.email.value)) {
			emailMsg.innerHTML = "Email is not in correct format";
			flag = false;
		}
	}
	if (pForm.pwd3.value === "") {
		pwdMsg.innerHTML = "New Password cannot be empty";
		flag = false;
	}
	if (pForm.pwd4.value === "") {
		pwd1Msg.innerHTML = "Confirm Password cannot be empty";
		flag = false;
	}	

	if (!flag) return false;
	return true;

}