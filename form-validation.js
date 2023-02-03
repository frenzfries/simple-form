$(document).ready(function() {
  $("#myForm").submit(function(e) {
    e.preventDefault();

    var fullName = $("#fullName").val();
    var email = $("#email").val();
    var mobileNumber = $("#mobileNumber").val();
    var dob = $("#dob").val();
    var gender = $("#gender").val();

    // Client-side validation

    // Validate full name (text only and characters like comma and period)
    if (!/^[a-zA-Z,.]+$/.test(fullName)) {
      alert("Full name should contain only letters, commas, and periods.");
      return false;
    }

    // Validate email address
    if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
      alert("Invalid email address format.");
      return false;
    }

    // Validate mobile number
    if (!/^\d{11}$/.test(mobileNumber)) {
      alert("Invalid mobile number format.");
      return false;
    }

    // Compute age based on selected date of birth
    var today = new Date();
    var birthdate = new Date(dob);
    var age = today.getFullYear() - birthdate.getFullYear();
    var m = today.getMonth() - birthdate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthdate.getDate())) {
      age--;
    }
    $("#age").val(age);

    // Submit the form using AJAX
    $.ajax({
      type: "POST",
      url: "submit-form.php",
      data: { fullName: fullName, email: email, mobileNumber: mobileNumber, dob: dob, gender: gender, age: age },
      success: function(response) {
        alert("Form submitted successfully!");
      }
    });
  });
});
