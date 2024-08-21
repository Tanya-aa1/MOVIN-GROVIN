
document.addEventListener("DOMContentLoaded", function() {
    var form2 = document.getElementById("registrationForm2");

    form2.addEventListener("submit", function(event) {
        if (!validateForm()) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });

    function validateForm() {
        var tuser_id = document.getElementById("tuser_id").value;
        var tname = document.getElementById("tname").value;
        var tpass = document.getElementById("tpass").value;
        var tphone_no = document.getElementById("tphone_no").value;
        var tdob = document.getElementById("tdob").value;
        var tgender = document.getElementById("tgender").value;
        var tcity = document.getElementById("tcity").value;
        var qual=document.getElementById("qual").value;
        var pay=document.getElementById("pay").value;
        var pay_no =document.getElementById("pay_no").value;

        if (tuser_id === "" || tname === "" || tpass === "" || tphone_no === "" || tdob === "" || tgender === "" || tcity === "" || qual==="" || pay ==="" || pay_no==="") {
            alert("All fields must be filled out");
            return false;
        }
        if (!isAlphanumeric(tuser_id)) {
            alert("User ID must be alphanumeric");
            return false;
        }

        if (!isAlphabetic(tname)) {
            alert("Name must contain only alphabetic characters");
            return false;
        }


        if (!isValidPassword(tpass)) {
            alert("Password must be at least 8 characters and contain at least one alphabet, one numeric character, and one special character.");
            return false;
        }

        if (!isNumeric(tphone_no)) {
            alert("Phone number must be numeric");
            return false;
        }

        if (!isValidDate(tdob)) {
            alert("Invalid date of birth format");
            return false;
        }

        if (!isAlphabetic(tcity)) {
            alert("City must contain only alphabetic characters");
            return false;
        }

        if (!isValidAccountNumber(pay_no)) {
            alert('Invalid account number. Please enter a valid account number.');
            return false; // Prevent form submission
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
        function isValidAccountNumber(input) {
            // Customize the regular expression based on your criteria
            var accountNumberRegex = /^[a-zA-Z0-9]+$/;
            return accountNumberRegex.test(input);
        }
        
    
});
