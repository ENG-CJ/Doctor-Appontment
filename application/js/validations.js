function adminCheck(email, mobile, table, username, callback) {
  console.log("the data is ", email, mobile, username, table);
  data = {
    email: email,
    mobile: mobile,
    table: table,
    username: username,
    action: "validateUser",
  };
  $.ajax({
    method: "POST",
    dataType: "json",
    data: data,
    url: "../Api/auth.api.php",
    success: (res) => {
      callback(res.isFound);
    },
    error: (err) => {
      console.log("the data is ", email, mobile, username, table);
      console.log(err);
      callback(false); // Assuming you want to handle errors by passing false
    },
  });
}
 function validDate(selectedDate) {
  var today = new Date();
  var day = String(today.getDate()).padStart(2, "0");
  var month = String(today.getMonth() + 1).padStart(2, "0"); // Months are zero-based
  var year = today.getFullYear();
  var formattedDate = `${year}-${month}-${day}`;
  console.log("Formatted date:", formattedDate);

   if (selectedDate < formattedDate) {
     return false;
   }
   return true;
 }
function checkAndRetrieveCardNumber(date, getCardNumber) {
  data = {
    date: date,
    action: "checkAndRetrieveCardNumber",
  };
  $.ajax({
    method: "POST",
    dataType: "json",
    data: data,
    url: "../Api/appointments.api.php",
    success: (res) => {
      getCardNumber(res);
    },
    error: (err) => {
      
      console.log(err);
      getCardNumber(null); // Assuming you want to handle errors by passing false
    },
  });
}

function containsOnlyAlphanumeric(username) {
  const pattern = /^[a-zA-Z][a-zA-Z0-9]*$/;

  return pattern.test(username);
}
function containsOnlyAlphabeticAndSpaces(name) {
  const pattern = /^[a-zA-Z\s]*$/;

  // Check if the name matches the pattern
  return pattern.test(name);
}

function emailVerify(email) {
  // Regular expression for validating an Email
  const emailRegex = /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/;

  // Test the email against the regular expression
  return emailRegex.test(email);
}

function hasValidFullName(name) {
  let regex = /^[a-zA-Z]+\s[a-zA-Z]+\s[a-zA-Z]+$/;

  return regex.test(name);
}

function validMobile(mobile) {
  return mobile.length >= 9 && mobile.length <= 10;
}
function checkNumericMobile(mobileNumber) {
  const pattern = /^[0-9]+$/;
  return pattern.test(mobileNumber);
}

function includesExtension(extension) {
  var ext = ["jpg", "png", "jpeg"];
  var converted = extension.toLowerCase();
  return ext.includes(converted);
}
