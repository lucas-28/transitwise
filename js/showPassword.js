
  document.getElementById("checkbox1" ).addEventListener("click", function() {
    var x = document.getElementById("myInput1");
    if (x.type === "password") {
    x.type = "text";
    } else {
      x.type = "password";
    }
    
  });
  console.log('success');


document.getElementById("checkbox2" ).addEventListener("click", function() {
  var x = document.getElementById("myInput2");
  if (x.type === "password") {
  x.type = "text";
  } else {
    x.type = "password";
  }
  
});

document.getElementById("checkbox3" ).addEventListener("click", function() {
  var x = document.getElementById("myInput3");
  if (x.type === "password") {
  x.type = "text";
  } else {
    x.type = "password";
  }
  
});

function showPassword(input) {
  console.log(input);
  
}
      

document.getElementById("submit").addEventListener("click", function (e) {
  
  var y = document.getElementById("myInput2").value;
  var z = document.getElementById("myInput3").value;
  if (y != z) {
    alert("Passwords do not match");
    e.preventDefault();
  }
  else if(y.length < 8) {
    alert("Password must be at least 8 characters long");
    e.preventDefault();
  }
  else if(y.length > 16) {
    alert("Password must be less than 16 characters long");
    e.preventDefault();
  }
  else if(y.search(/[a-z]/) < 0) {
    alert("Password must contain at least one lowercase letter");
    e.preventDefault();
  }
  else if (y.search(/[A-Z]/) < 0) {
    alert("Password must contain at least one uppercase letter");
    e.preventDefault();
  }
  else if (y.search(/[0-9]/) < 0) {
    alert("Password must contain at least one digit");
    e.preventDefault();
  }
  else {
    console.log(document.getElementById("change-password"));
    
  }
});

        