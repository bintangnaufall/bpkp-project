      function attemptLogin() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        // Simulate login success (replace this with your actual login logic)
        if (username === "your_username" && password === "your_password") {
          document.getElementById("successAlert").style.display = "block";
          setTimeout(function () {
            // Redirect to success page or perform necessary actions
            window.location.href = "success.html";
          }, 2000); // Redirect after 2 seconds
        } else {
          document.getElementById("errorAlert").style.display = "block";
        }
      }
