<?php
include './include/links.php';
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Login</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png" />
  <link href="../css/style.css" rel="stylesheet" />
</head>

<body class="h-100">
  <div class="authincation h-100">
    <div class="container-fluid h-100">
      <div class="row justify-content-center h-100 align-items-center">
        <div class="col-md-6">
          <div class="authincation-content">
            <div class="row no-gutters">
              <div class="col-xl-12">
                <div class="auth-form">
                  <div class="error-handler"></div>
                  <h4 class="text-center mb-4">Sign in your account</h4>
                  <form>
                    <div class="form-group table">
                      <label for="">User Type</label>
                      <select name="" class="form-control UserType">
                        <option value="doctors" selected>Doctor</option>
                        <option value="patients"> patient</option>


                      </select>
                    </div>

                    <div class="form-group">
                      <label><strong>Email</strong></label>
                      <input type="email" class="form-control email" placeholder="user@gmail.com" />
                    </div>
                    <div class="form-group">
                      <label><strong>Password</strong></label>
                      <input type="password" class="form-control password" placeholder="user@password" />
                    </div>
                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                      <div class="form-group">
                        <!-- <div class="form-check ml-2">
                                                    <input class="form-check-input" type="checkbox" id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember me</label>
                                                </div> -->
                      </div>
                      <div class="form-group">
                        <a href="#" class='forget'>Forgot Password?</a>
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary btn-block check">
                        Sign me in
                      </button>
                    </div>
                  </form>
                  <div class="new-account mt-3">
                    <p>
                      Don't have an account?
                      <a class="text-primary" href="./page-register.html">Sign up</a>
                    </p>
                  </div>
                  <div class="mt-3">
                    <p>

                      <a class="text-primary" href="index.php">Back</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- modals -->
  <div class="modal fade loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Verification Modal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="email-error-handler">

          </div>
          <form>
            <div class="mb-3">
              <p class='text-dark'>Please fill below your Email to verify✔ </p>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control emailVerification" placeholder="email" id="recipient-name">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary emailSend">Send</button>
        </div>
      </div>
    </div>
  </div>
  <!-- the modal that allows the user to change the password -->

  <div class="modal fade newPasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Verification Code</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="verify-error-handler">

          </div>
          <form>
            <div class="mb-3">
              <p>Enter the verification code that we sent you in your Email </p>
            </div>
            <div class="mb-3">
              <input type="number" class="form-control verCode" placeholder="Verificatio Code" id="recipient-name">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary code">Continue</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Password Changer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="pass-error-handler">

          </div>
          <form>
            <div class="mb-3">
              <input type="text" class="form-control newPassword" placeholder="new Password" id="recipient-name">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control confirmPassword" placeholder="Confirm" id="recipient-name">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary updatePass">Update</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body">
          <div class="alert alert-primary info-body">
            <strong class='info-message'>message</strong>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary continue">Continue to Update Your Password</button>
        </div>
      </div>
    </div>
  </div>

  <!--**********************************
        Scripts
    ***********************************-->
  <!-- Required vendors -->
  <script src="./vendor/global/global.min.js"></script>
  <script src="./js/quixnav-init.js"></script>
  <script src="./js/custom.min.js"></script>
  <script src="./js/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
  <script src="../iziToast-master/dist/js/iziToast.js"></script>
  <script src="../iziToast-master/dist/js/iziToast.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src='../js/jquery-3.3.1.min.js'></script>


  <script>
    $(document).ready(() => {
      const clearVerifyCode = () => localStorage.clear();
      clearVerifyCode();

      function emailVerify(email) {
        // Regular expression for validating an Email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[a-zA-Z]{2,}$/;

        // Test the email against the regular expression
        return emailRegex.test(email);
      }

      function displayMessage(message) {
        $(".error-handler").html(`
                <div class="alert alert-danger">
                      <strong class='text-dark'>${message}</strong>
                    </div>

            `);
        setTimeout(() => {
          $(".error-handler").html("");
        }, 3000);
      }


      $(".check").click((e) => {
        e.preventDefault();
        if ($(".email").val() == "" || $(".password").val() == "") {
          displayMessage("Provide, Email And Password To continue 👇..")
        } else if (!emailVerify($(".email").val())) {
          displayMessage("Incorrect Email Format👇..")

        } else {
          $.ajax({
            method: "POST",
            dataType: "JSON",
            data: {
              email: $(".email").val(),
              pass: $(".password").val(),
              table: $(".table select").val(),
              action: "loginType",
            },
            url: "./Api/auth.api.php",
            success: (res) => {
              console.log(res);
              const {
                isFound,
                data
              } = res;
              console.log(data)
              if (isFound) {
                window.location.href = "./view/dashboard.php";
              } else {
                displayMessage("Incorrect Email address or password");
              }
            },
            error: (err) => {
              console.log(err);
              displayMessage(err.responseText);
            },
          });
        }
      });


      $(".forget").click(function() {

        $(".loginModal").modal('show');
      });
      $(".continue").click(function() {
        $(".newPasswordModal").modal('show');
        $('.infoModal').modal("hide");
      });

      $(".emailSend").click(function() {
        email = $(".emailVerification").val();
        if (email == "") {
          $('.email-error-handler').html(`
        <div class='alert alert-danger'>
        <strong class='text-light'>Please Fill The Email field</strong>
        </div>
        
        `)

          setTimeout(() => {
            $('.email-error-handler').html("")
          }, 3000);

          return;
        }

        if (!emailVerify(email)) {
          $('.email-error-handler').html(`
        <div class='alert alert-danger'>
        <strong class='text-light'>Incorrect Email format</strong>
        </div>
        
        `)

          setTimeout(() => {
            $('.email-error-handler').html("")
          }, 3000);

          return;
        }


        $.ajax({
          method: "POST",
          dataType: "JSON",
          data: {
            email: email,
            action: "emailVer",
            table: $(".table select").val()
          },
          url: './Api/auth.api.php',
          beforeSend: () => {
            $(".emailSend").attr("disabled", true);
            $(".emailSend").text("Processing...");
          },
          success: (res) => {
            $(".emailSend").attr("disabled", false);
            $(".emailSend").text("send");
            var {
              data,
              isExist,
              code,
              message,
              error
            } = res
            if (isExist) {
              localStorage.setItem("code", code)
              localStorage.setItem("table", $(".table select").val())

              $(".loginModal").modal('hide');
              $('.info-body').html(`<strong>${message}</strong>`);
              $('.infoModal').modal("show");

            } else {
              $('.email-error-handler').html(`
        <div class='alert alert-danger'>
        <strong class='text-light'>${email} Does not exists</strong>
        </div>
        
        `)

              setTimeout(() => {
                $('.email-error-handler').html("")
              }, 3000);

              return;
            }
            console.log(res);


          },
          error: (err) => {
            $(".emailSend").attr("disabled", false);
            $(".emailSend").text("send");
            console.log(err);
          }
        })
      });


      $(".code").click(function() {
        if ($('.verCode').val() == "") {
          $('.verify-error-handler').html(`
                <div class='alert alert-danger'>
                <strong class='text-light fw-bold'>Code is Required..</strong>
                </div>
                
                `)

          setTimeout(() => {
            $('.verify-error-handler').html("");
          }, 3000);
          return;
        }
        if ($('.verCode').val() == localStorage.getItem("code")) {
          $(".newPasswordModal").modal("hide");
          $(".updateModal").modal('show');

        } else {
          $('.verify-error-handler').html(`
                <div class='alert alert-danger'>
                <strong class='text-light fw-bold'>Invalid Verification Code</strong>
                </div>
                
                `)

          setTimeout(() => {
            $('.verify-error-handler').html("");
          }, 3000);
          return;

        }
      });

      $(".updatePass").click((e) => {
        e.preventDefault();
        if ($(".newPassword").val() == "" || $(".confirmPassword").val() == "") {
          $('.pass-error-handler').html(`
                <div class='alert alert-danger'>
                <strong class='text-light fw-bold'>All Fields Are required</strong>
                </div>
                
                `)

          setTimeout(() => {
            $('.pass-error-handler').html("");
          }, 3000);
          return;
        }
        if ($(".newPassword").val() != $(".confirmPassword").val())

        {
          $('.pass-error-handler').html(`
                <div class='alert alert-danger'>
                <strong class='text-light fw-bold'>Confirm Password must be same as new password</strong>
                </div>
                
                `)

          setTimeout(() => {
            $('.pass-error-handler').html("");
          }, 3000);
          return;

        }
        data = {
          email: $(".emailVerification").val(),
          password: $(".newPassword").val(),
          action: "updateUser",
          table: localStorage.getItem("table")
        };
        $.ajax({
          method: "POST",
          dataType: "JSON",
          data: data,
          url: './Api/auth.api.php',
          success: (res) => {
            console.log(res);
            $('.pass-error-handler').html(`
                <div class='alert alert-success'>
                <strong>Your password has been changed</strong>
                </div>
                
                `)

            setTimeout(() => {
              $('.pass-error-handler').html("");
              localStorage.clear()
              $(".updateModal").modal('hide');
              $(".emailVerification").val("")
              $(".newPassword").val("")
              $(".confirmPassword").val("")
              $('.verCode').val("")
            }, 3000);


           
          },
          error: (err) => {
            console.log(err);
          }
        })
      })





    });
  </script>
</body>

</html>