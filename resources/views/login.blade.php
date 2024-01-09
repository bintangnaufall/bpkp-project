<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BPKP Kalbar</title>
    <link rel="icon" href="asset/img/bpkp_logo.ico" type="image/x-icon" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <div
        class="row justify-content-center align-items-center"
        style="height: 100vh"
      >
        <div class="col-md-6 col-lg-4 login-box">
          <p class="text-center">Aplikasi Manajemen Surat</p>
          <img id="logo" src="asset/img/bpkp_logo.png" alt="logo" />
          <div class="text-center pb-3 bold fw-semibold">
            Badan Pengawasan Keuangan dan Pembangunan
          </div>
          <form id="loginForm">
            <div class="mb-3">
              <label for="username" class="form-label fw-medium"
                >Username</label
              >
              <input type="text" class="form-control" id="username" />
            </div>
            <div class="mb-3 pb-3">
              <label for="password" class="form-label fw-medium"
                >Password</label
              >
              <input type="password" class="form-control" id="password" />
            </div>
            <button
              type="button"
              class="btn btn-primary w-100"
              onclick="attemptLogin()"
            >
              LOGIN
            </button>
          </form>
          <div class="mt-3" id="successAlert" style="display: none">
            <div class="alert alert-success" role="alert">Login Berhasil!</div>
          </div>
          <div class="mt-3" id="errorAlert" style="display: none">
            <div class="alert alert-danger" role="alert">
              Login Gagal! Coba cek username and password.
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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
    </script>
  </body>
</html>

