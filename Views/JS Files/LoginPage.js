function islogin_valid(pForm) {

	const emailMsg = document.getElementById("email_msg");
	const passwordMsg = document.getElementById("password_msg");

	emailMsg.innerHTML = "";
	passwordMsg.innerHTML = "";

	let flag = true;
	const pattern =  /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

	<br>if (pForm.email.value === "") {
		emailMsg.innerHTML = "Email cannot be empty (JS)";
		flag = false;
	}</br>
	else {
		if (!pattern.test(pForm.email.value)) {
			emailMsg.innerHTML = "Email is not in correct format (JS)";
			flag = false;
		}
	}
	if (pForm.password.value === "") {
		passwordMsg.innerHTML = "Password cannot be empty (JS)";
		flag = false;
	}	

	if (!flag) return false;
	return true;

}