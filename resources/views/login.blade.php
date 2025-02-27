<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BPKP Kalbar</title>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="icon" href="{{asset('img/bpkp_logo.ico')}}" type="image/x-icon" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href={{ asset('/css/bootstrap.min.css') }} type="text/css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">



    <style>
      @import url("https://fonts.googleapis.com/css2?family=Open+Sans&display=swap");
      body {
        font-family: "Open Sans", sans-serif;
      }
      body {
        background: url('/img/bg-login.jpg') no-repeat center center fixed;
        background-size: cover;
        backdrop-filter: brightness(60%);
        overflow-y: hidden;
      }

      .login-box {
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        padding: 20px;
        background-color: white;
      }

      #logo {
        width: 150px;
        margin: 0 auto;
        display: block;
        margin-bottom: 15px;
      }

      .form-control {
        border: none;
        border-bottom: 2px solid #ddd;
        border-radius: 0;
        background-color: #fff !important;
      }

      .shadow-bottom {
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      }
      .password-input-wrapper {
        position: relative;
      }

      .toggle-password {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
      }
      input {
        border: none;
        background: none;
        padding: 0;
        margin: 0;
        outline: none;
        box-shadow: none;
      }

      .input-form {
        border: #D3D9DE solid 2px; 
        height: 40px;
        padding-left: 7px;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        background: #E8F0FE;
      }
      .checkbox-form {
        width: 20px;
        height: 20px;
      }

      .checkbox-form {
        appearance: none; /* Hapus style bawaan */
        -webkit-appearance: none;
        -moz-appearance: none;
        
        width: 20px;
        height: 20px;
        border: 2px solid #D3D9DE; /* Warna border */
        background-color: transparent; /* Background transparan */
        display: inline-block;
        cursor: pointer;
        position: relative;
      }
      
      .checkbox-form:checked::before {
        content: "✔"; /* Simbol centang */
        font-size: 16px;
        color: black; /* Warna centang biru */
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
      }

    </style>
  </head>
  <body>
    <div class="container">
      <div
        class="row justify-content-center align-items-center"
        style="height: 100vh"
      >
        <div class="col-md-3 col-lg-4 login-box" style="border-top: 4px solid #0d6efd">
          {{-- <p class="text-center">Aplikasi Manajemen Surat</p> --}}
          <img id="logo" src="{{asset('img/bpkp_logo.png')}}" alt="logo"/>
          <div class="text-center pb-4 bold fw-semibold d-flex align-items-center justify-content-center" style="border-bottom: 2px solid #0d6efd">
            <div class="col-md-9">
              Badan Pengawasan Keuangan dan Pembangunan
            </div> 
          </div>

          @if(session()->has('loginError'))
            <script src="{{ asset('js/iziToast.min.js') }}"></script>
            <script>
                iziToast.show({
                    title: 'Login Gagal',
                    message: "NIP atau Password anda tidak sesuai",
                    position: 'topRight',
                    color: 'red',
                });
            </script>
          @endif

          <div class="bold text-center fw-semibold">
            <p class="m-0 pt-2">Aplikasi Manajemen Surat</p>
            {{-- <p>Halaman Login</p> --}}
          </div>

          <form id="loginForm" action="/login" method="post" class="mt-3">
            @csrf
            <div class="mb-3">
              <div class="d-flex">
                <input type="text" class="input-form w-100" id="nip" name="nip" placeholder="NIP" value="{{ old('nip') }}" autofocus/>
                <div class="d-flex justify-content-center" style="background-color:#E9ECEF; width:40px; border-top:#D3D9DE solid 2px; border-right:#D3D9DE solid 2px; border-bottom:#D3D9DE solid 2px; border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
                  <i class="bi bi-person-fill" style="font-size: 24px"></i>
                </div>
              </div>
              @error('nip')
                <small style="color:red;" class="bold fw-semibold">{{ $message }}</small>
              @enderror
            </div>
            
            <div class="mb-3">
              <div class="d-flex">
                <input type="password" class="input-form w-100" id="password" placeholder="Password" name="password" value="{{ old('password') }}"/>
                <div class="d-flex justify-content-center" style="background-color:#E9ECEF; width:40px; border-top:#D3D9DE solid 2px; border-right:#D3D9DE solid 2px; border-bottom:#D3D9DE solid 2px; border-top-right-radius: 5px; border-bottom-right-radius: 5px;">
                  <i class="bi bi-lock-fill" style="font-size: 24px"></i>
                </div>
              </div>
              @error('password')
                <small style="color:red;" class="bold fw-semibold">{{ $message }}</small>
              @enderror
              {{-- <div class="password-input-wrapper">
                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}"/>
                <span toggle="#password" class="toggle-password" onclick="togglePasswordVisibility()">
                  <i class="bi bi-eye-fill" id="eye" aria-hidden="true"></i>
                </span>
              </div> --}}
            </div>
            <div class="d-flex mb-2">
              <input type="checkbox" class="checkbox-form me-1" id="showPass">
              <p style="margin-top: -2.5px">Tampilkan kata sandi</p>
            </div>
            <button type="submit" class="btn btn-primary w-100 text-white" id="btnlogin">
              Masuk
            </button>
          </form>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/iziToast.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>
    <script src="{{ asset('assets/js/forms-extras.js')}}"></script>

    <script>
      $(document).ready(function () {
        $("#showPass").on("change", function () {
          if ($(this).prop("checked")) {
            $("#password").attr("type", "text");
          }else {
            $("#password").attr("type", "password");
          }
        });

        $("#nip").on("input", function () {
          $(this).val($(this).val().replace(/\D/g, "")); // Hapus semua karakter selain angka
        });
        $("#nip").on("input", function () {
          let value = $(this).val().replace(/\s/g, ""); // Hapus spasi yang sudah ada
          if (value.length > 8) {
            value = value.slice(0, 8) + " " + value.slice(8); // Tambahkan spasi setelah 8 digit
          }
          if (value.length > 15) {
            value = value.slice(0, 15) + " " + value.slice(15); // Tambahkan spasi setelah 8 digit
          }
          if (value.length > 17) {
            value = value.slice(0, 17) + " " + value.slice(17); // Tambahkan spasi setelah 8 digit
          }
          if (value.length > 21) { // Maksimal 18 angka (karena 21 termasuk spasi)
            value = value.slice(0, 21); // Potong agar tidak lebih dari 18 angka
          }
          $(this).val(value);
        });
      });
          // function togglePasswordVisibility() {
              // var passwordInput = $('#password');
              // var eyeIcon = $('#eye');

              // if (passwordInput.attr('type') === "password") {
              //     passwordInput.attr('type', 'text');
              //     eyeIcon.removeClass('bi-eye-fill');
              //     eyeIcon.addClass('bi-eye-slash-fill');
              // } else {
              //     passwordInput.attr('type', 'password');
              //     eyeIcon.removeClass('bi-eye-slash-fill');
              //     eyeIcon.addClass('bi-eye-fill');
              // }
          // }
          // $(document).ready(function () {
          //     var csrfToken = $('meta[name="csrf-token"]').attr('content');
          //         $.ajaxSetup({
          //             headers: {
          //             'X-CSRF-TOKEN': csrfToken
          //             },
          //         });
  
          //         let openToasts = 0;
  
          //         function showToast( jenis, title, message) {   
          //             if (openToasts < 3) {
          //                 iziToast[jenis]({
          //                     title: title,
          //                     message: message,
          //                     position: "topCenter",
          //                     timeout: 3000,
          //                     onOpening: function () {
          //                         openToasts++;
          //                     },
          //                     onClosing: function () {
          //                         openToasts--;
          //                     }
          //                 });
          //             }
          //         }
  
          //     // $('#btnlogin').click(function (e) {
          //     //     e.preventDefault();
  
          //     //     var nip = $("#nip").val();
          //     //     var password = $("#password").val();
          //     //     var token = csrfToken;
  
          //     //     // if(nip.length == "") {
          //     //     //     showToast("warning", "Oops..", "Please enter your <b>NIP</b>");
          //     //     // } else if(password.length == "") {
          //     //     //     showToast("warning", "Oops..", "please enter your <b>password</b>");
          //     //     // } else if (!/^\d+$/.test(nip)) {
          //     //     //     showToast("warning", "Oops..", "Please enter your NIP using only <b>numbers</b>");
          //     //     //     return false;
          //     //     // } else {
          //     //     //   iziToast.warning({
          //     //     //       icon: 'fas fa-spinner fa-spin',
          //     //     //       title: 'Loading...',
          //     //     //       message: 'Mohon Tunggu Sebentar',
          //     //     //       position: 'topCenter',
          //     //     //   });

          //     //       // setTimeout(function() {
          //     //         iziToast.destroy();
          //     //         $.ajax({
          //     //           url: '{{route('login')}}',
          //     //           type: "POST",
          //     //           dataType: "JSON",
          //     //           cache: false,
          //     //           data: {
          //     //               "nip": nip,
          //     //               "password": password,
          //     //               "_token": token
          //     //           },
          //     //           success:function(response){
          //     //             console.log(response);
          //     //               if (response.success) {
          //     //                   iziToast.success({
          //     //                       title: "Login Success",
          //     //                       message: response.success,
          //     //                       timeout: 2000,
          //     //                       position: "topCenter",
          //     //                       closeOnClick: true,
          //     //                       onClosing: function () {
          //     //                         if (response.status == "admin") {
          //     //                           window.location.href = '/dashboard';
          //     //                       }else {
          //     //                         window.location.href = '/surat/disposisi_surat';
          //     //                       }
          //     //                   }
          //     //                 })
          //     //               } else if (response.error) {
          //     //                   showToast("error", "Login Error", response.error);
          //     //               }
          //     //           },
          //     //           error:function(error){
          //     //               showToast("error", "Login Error", "something went wrong");
          //     //           }
          //     //         });
          //     //       // },2000);
          //     //     // }
          //     // });
          // });
  </script>
  </body>
</html>

