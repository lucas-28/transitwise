document.getElementById("submit").addEventListener("click", function (e) {
  
    var y = document.getElementById("pw1").value;
    var z = document.getElementById("pw2").value;
    if (y != z) {
      alert("Passwords must match");
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