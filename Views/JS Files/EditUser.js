function isEditUser_valid(pForm) {

	const fnameMsg = document.getElementById("fname_error_msg");
	const lnameMsg = document.getElementById("lname_error_msg");
	const genderMsg = document.getElementById("gender_error_msg");
	const emailMsg = document.getElementById("email_msg");
	

	fnameMsg.innerHTML = "";
	lnameMsg.innerHTML = "";
	genderMsg.innerHTML = "";
	emailMsg.innerHTML = "";


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



	if (!flag) return false;
	return true;

}