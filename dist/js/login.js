
        function togglePassword() {
          var passwordInput = document.getElementById("password");
          var toggleIcon = document.getElementById("toggleIcon");

          if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleIcon.name = "eye-off-outline";
          } else {
            passwordInput.type = "password";
            toggleIcon.name = "eye-outline";
          }
        }