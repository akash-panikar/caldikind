function checkEmail() {
    var email = document.getElementById('email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
        result.css("color", "red");
        email.focus;
        document.getElementById("result").innerHTML = "entered email is incorrect";
        return false;
    }
}

var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function () {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function () {
    document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function () {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
    }

    // Validate length
    if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
    }
}
//========================== Name validation ============================
function Validate(e) {
    var keyCode = e.keyCode || e.which;
    document.getElementById("name-message").innerHTML = "";
    //Regex for Valid Characters i.e. Alphabets.
    var regex = /^[A-Za-z' ]+$/;
    //Validate TextBox value against the Regex.
    var isValid = regex.test(String.fromCharCode(keyCode));
    if (!isValid) {
        document.getElementById("name-message").innerHTML = "Only Alphabets allowed.";
        document.getElementById("name-message").style.color = "red";
    }

    return isValid;
}

function validateStaffPincode(){
    var pin = document.getElementById('pincode').value;
    if(isNaN(pin)){
    document.getElementById("pin-message").innerHTML = 'Invalid input, enter only number';
    document.getElementById("pin-message").style.color ="red";
    document.getElementById('staff-submit').disabled = 'true';
    document.getElementById("staff-submit").style.background ="red";
    }
    else {
    document.getElementById("pin-message").innerHTML = '';
    document.getElementById('staff-submit').disabled = '';
    document.getElementById("staff-submit").style.background ="";
    }
}

// ---------------------------  Gender -------------------------------------------------------
function staffDropdownCheck()
{
    var genderCheck = document.getElementById("gender");
    var selectedOption = genderCheck.options[genderCheck.selectedIndex].value;
    if (selectedOption == 0) {
        document.getElementById("gender-message").innerHTML = 'Please select gender';
        document.getElementById("gender-message").style.color = "red";
    } else {
        document.getElementById("gender-message").innerHTML = '';
    }

    var typeCheck = document.getElementById("marstatus");
    var selectedVal = typeCheck.options[typeCheck.selectedIndex].value;
    if (selectedVal == 0) {
        document.getElementById("marital-message").innerHTML = 'Please select marital status';
        document.getElementById("marital-message").style.color = "red";
    }
    else {
        document.getElementById("marital-message").innerHTML = '';
    }
    
    var typeCheck = document.getElementById("shifttime");
    var selectedVal = typeCheck.options[typeCheck.selectedIndex].value;
    if (selectedVal == 0) {
        document.getElementById("shifttime-message").innerHTML = 'Please select shift timing';
        document.getElementById("shifttime-message").style.color = "red";
    }else {
        document.getElementById("shifttime-message").innerHTML = '';
    }
    
    var typeCheck = document.getElementById("designation");
    var selectedVal = typeCheck.options[typeCheck.selectedIndex].value;
    if (selectedVal == 0) {
        document.getElementById("designation-message").innerHTML = 'Please select designation';
        document.getElementById("designation-message").style.color = "red";
    }else {
        document.getElementById("designation-message").innerHTML = '';
    }
    
    var pinCheck = document.getElementById("pincode").value;
    if (pinCheck == '') {
        document.getElementById("pin-message").innerHTML = 'Pincode cannot be empty';
        document.getElementById("pin-message").style.color = "red";
    }else {
        document.getElementById("pin-message").innerHTML = '';
    }
    
    var addr1Check = document.getElementById("saddr1").value;
    if (addr1Check == '') {
        document.getElementById("saddr1-message").innerHTML = 'address cannot be empty';
        document.getElementById("saddr1-message").style.color = "red";
    }else {
        document.getElementById("saddr1-message").innerHTML = '';
    }
    
    var addr2Check = document.getElementById("saddr2").value;
    if (addr2Check == '') {
        document.getElementById("saddr2-message").innerHTML = 'address cannot be empty';
        document.getElementById("saddr2-message").style.color = "red";
    }else {
        document.getElementById("saddr2-message").innerHTML = '';
    }
    
    var cityCheck = document.getElementById("scity").value;
    if (cityCheck == '') {
        document.getElementById("scity-message").innerHTML = 'city cannot be empty';
        document.getElementById("scity-message").style.color = "red";
    }else {
        document.getElementById("scity-message").innerHTML = '';
    }
    
    var stateCheck = document.getElementById("state").value;
    if (stateCheck == '') {
        document.getElementById("state-message").innerHTML = 'state cannot be empty';
        document.getElementById("state-message").style.color = "red";
    }else {
        document.getElementById("state-message").innerHTML = '';
    }
    
    var nameCheck = document.getElementById("sfname").value;
    if (nameCheck == '') {
        document.getElementById("name-message").innerHTML = 'name cannot be empty';
        document.getElementById("name-message").style.color = "red";
    }else {
        document.getElementById("name-message").innerHTML = '';
    }
    
    var mobileCheck = document.getElementById("mobile").value;
    if (mobileCheck == '') {
        document.getElementById("mobile-message").innerHTML = 'mobile number cannot be empty';
        document.getElementById("mobile-message").style.color = "red";
    }else {
        document.getElementById("mobile-message").innerHTML = '';
    }
    
    var mobile2Check = document.getElementById("salternateno").value;
    if (mobile2Check == '') {
        document.getElementById("moible1-message").innerHTML = 'alternate mobile number cannot be empty';
        document.getElementById("moible1-message").style.color = "red";
    }else {
        document.getElementById("moible1-message").innerHTML = '';
    }
    
    var emailCheck = document.getElementById("email").value;
    if (emailCheck == '') {
        document.getElementById("email-message").innerHTML = 'email cannot be empty';
        document.getElementById("email-message").style.color = "red";
    }else {
        document.getElementById("email-message").innerHTML = '';
    }
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#image-tag').attr('src', e.target.result);   // img tag id will be id="image-tag"
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#check-img").change(function () {            //input id="check-img" onchange="imageValidation('check-img')"  (USE this function where you want to use image validation)
    readURL(this);
});

function imageValidation(id) {
    var formData = new FormData();
    var file = document.getElementById(id).files[0];
    formData.append("filedata", file);
    var fileType = file.type.split('/').pop().toLowerCase();
    if (fileType != "jpeg" && fileType != "jpg" && fileType != "png") {
        $.bootstrapGrowl("Invalid file type please select jpg, jpeg or png", {
            ele: 'body', // which element to append to
            type: 'danger', // (null, 'info', 'danger', 'success')
            offset: {from: 'top', amount: 650}, // 'top', or 'bottom'
            align: 'right', // ('left', 'right', or 'center')
            width: 400, // (integer, or 'auto')
            delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
            allow_dismiss: true, // If true then will display a cross to close the popup.
            stackup_spacing: 10 // spacing between consecutively stacked growls.
        });
        document.getElementById(id).value = '';
    }
    if (file.size > 1048576) {
        $.bootstrapGrowl("File size cannot be more than  1 MB", {
            ele: 'body', // which element to append to
            type: 'danger', // (null, 'info', 'danger', 'success')
            offset: {from: 'top', amount: 650}, // 'top', or 'bottom'
            align: 'right', // ('left', 'right', or 'center')
            width: 400, // (integer, or 'auto')
            delay: 4000, // Time while the message will be displayed. It's not equivalent to the *demo* timeOut!
            allow_dismiss: true, // If true then will display a cross to close the popup.
            stackup_spacing: 10 // spacing between consecutively stacked growls.
        });
        document.getElementById(id).value = '';
        return false;
    }
}