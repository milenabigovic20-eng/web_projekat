
function InvalidMsg(textbox) {

    let regex = /^[A-Za-z]+$/

    if(textbox.name == 'fName') {
        if (textbox.value === '') {
            textbox.setCustomValidity('First name is required!');
            return false;
        } else if(!regex.test(textbox.value)) {
            textbox.setCustomValidity('First name must only contain letters!');
            return false;
        } else {
            textbox.setCustomValidity('');
        }
    } else if(textbox.name == 'lName') {
        if (textbox.value === '') {
            textbox.setCustomValidity('Last name is required!');
            return false;
        } else if(!regex.test(textbox.value)) {
            textbox.setCustomValidity('Last name must only contain letters!');
            return false;
        } else {
            textbox.setCustomValidity('');
        }
    } else if(textbox.name == 'email'){

         regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

        if (textbox.value === '') {
            textbox.setCustomValidity('E-mail is required!');
            return false;
        } else if(!regex.test(textbox.value)) {
            textbox.setCustomValidity('Please enter a valid e-mail address!');
            return false;
        } else {
            textbox.setCustomValidity('');
        }
    } else if (textbox.name == 'username'){

        regex = /^[a-zA-Z0-9]{5,16}$/;

        if (textbox.value === ''){
            textbox.setCustomValidity('Username is required!');
            return false;
        } else if (!regex.test(textbox.value)){
            textbox.setCustomValidity('Username must contain letters and be between 5 and 16 characters!');
            return false;
        } else{
            textbox.setCustomValidity('');
        }
    } else if (textbox.name == 'password') {

        regex = /^[a-zA-Z0-9]{7,}$/;

        if (textbox.value === ''){
            textbox.setCustomValidity('Password is required!');
            return false;
        } else if (!regex.test(textbox.value)){
            textbox.setCustomValidity('Password must be alphanumeric and must contain at least 7 characters!');
            return false;
        } else {
            textbox.setCustomValidity('');
        }
    }

    return true;
}
