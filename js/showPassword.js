function myPassword() {
          var x = document.getElementById("myInput1");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
        /*Shows the user their confirm password when checked*/
        function myConfirmPassword() {
          var x = document.getElementById("myInput2");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }