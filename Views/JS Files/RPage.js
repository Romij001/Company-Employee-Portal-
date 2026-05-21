function isReg_valid(pForm) {

	const fnameMsg = document.getElementById("fname_error_msg");
	const lnameMsg = document.getElementById("lname_error_msg");
	const genderMsg = document.getElementById("gender_error_msg");
	const emailMsg = document.getElementById("email_msg");
	const pwdMsg = document.getElementById("password_msg");
	const pwd1Msg = document.getElementById("Cpassword_msg");

	fnameMsg.innerHTML = "";
	lnameMsg.innerHTML = "";
	genderMsg.innerHTML = "";
	emailMsg.innerHTML = "";
	pwdMsg.innerHTML = "";
	pwd1Msg.innerHTML = "";

	let flag = true;
	const pattern =  /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    
    if (pForm.fname.value === "") {
		fnameMsg.innerHTML = "First name can not be empty (JS)";
		flag = false;
	}
	if (pForm.lname.value === "") {
		lnameMsg.innerHTML = "Last name cannot be empty (JS)";
		flag = false;
	}
	if (pForm.gender.value === "") {
		genderMsg.innerHTML = "Gender option cannot be empty (JS)";
		flag = false;
	}
	if (pForm.email.value === "") {
		emailMsg.innerHTML = "Email cannot be empty (JS)";
		flag = false;
	}
	else {
		if (!pattern.test(pForm.email.value)) {
			emailMsg.innerHTML = "Email is not in correct format (JS)";
			flag = false;
		}
	}

(pForm.pwd1.value);
	if (pForm.pwd.value === "") {
		pwdMsg.innerHTML = "Password cannot be empty (JS)";
		flag = false;
	}	
	if (pForm.pwd1.value === "") {
		pwd1Msg.innerHTML = "Password cannot be empty (JS)";
		flag = false;
	}

	if (!flag) return false;
	return true;

}