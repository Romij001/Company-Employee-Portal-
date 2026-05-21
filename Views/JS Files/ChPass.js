function isChPass_valid(pForm) {

	const pwdMsg = document.getElementById("password_msg");
	const pwd1Msg = document.getElementById("New_password_msg");
	const pwd2Msg = document.getElementById("Retype_password_msg");

    pwdMsg.innerHTML = "";
	pwd1Msg.innerHTML = "";
	pwd2Msg.innerHTML = "";

	let flag = true;
	const pattern =  /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    
    if (pForm.pwd.value === "") {
		pwdMsg.innerHTML = "Current Password cannot be empty (JS)";
		flag = false;
	}

	
	if (pForm.pwd1.value === "") {
		pwd1Msg.innerHTML = "New Password cannot be empty (JS)";
		flag = false;
	}	
	if (pForm.pwd2.value === "") {
		pwd2Msg.innerHTML = "Retype Password cannot be empty (JS)";
		flag = false;
	}

	if (!flag) return false;
	return true;

}