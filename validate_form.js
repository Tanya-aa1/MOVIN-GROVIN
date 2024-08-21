// validate_form.js

document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("registrationForm");

    form.addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });

    function validateForm() {
        var user_id = document.getElementById("user_id").value;
        var name = document.getElementById("name").value;
        var pass = document.getElementById("pass").value;
        var phone_no = document.getElementById("phone_no").value;
        var dob = document.getElementById("dob").value;
        var gender = document.getElementById("gender").value;
        var city = document.getElementById("city").value;

        if (user_id === "" || name === "" || pass === "" || phone_no === "" || dob === "" || gender === "" || city === "") {
            alert("All fields must be filled out");
            return false;
        }
        if (!isAlphanumeric(user_id)) {
            alert("User ID must be alphanumeric");
            return false;
        }

        if (!isAlphabetic(name)) {
            alert("Name must contain only alphabetic characters");
            return false;
        }


        if (!isValidPassword(pass)) {
            alert("Password must be at least 8 characters and contain at least one alphabet, one numeric character, and one special character.");
            return false;
        }

        if (!isNumeric(phone_no)) {
            alert("Phone number must be numeric");
            return false;
        }

        if (!isValidDate(dob)) {
            alert("Invalid date of birth format");
            return false;
        }

        if (!isAlphabetic(city)) {
            alert("City must contain only alphabetic characters");
            return false;
        }

      
        return true; // Form is valid

    }
        function isAlphanumeric(input) {
            var alphanumericRegex = /^[a-zA-Z0-9]+$/;
            return alphanumericRegex.test(input);
        }
    
        function isNumeric(input) {
            var numericRegex = /^\d+$/;
            return numericRegex.test(input);
        }
    
        function isValidDate(input) {
            var dateRegex = /^\d{4}-\d{2}-\d{2}$/;
            return dateRegex.test(input);
        }

        function isValidPassword(input) {
            // Password must be at least 8 characters and contain at least one alphabet, one numeric character, and one special character
            var passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/;
            return passwordRegex.test(input);
        }
        function isAlphabetic(input) {
            

            var alphabeticRegex = /^[a-zA-Z\s]+$/;
            return alphabeticRegex.test(input);
        }
    
});
