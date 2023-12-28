<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../images/favicon.png">
    <link href="../../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../iziToast-master/dist/css/iziToast.min.css">
    <link rel="stylesheet" href="../iziToast-master/dist/css/iziToast.css">

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
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">FullName</label>
                                            <input type="text" class="form-control name" placeholder="patient name" id="recipient-name" Required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Gender</label>
                                            <select class="form-control gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <!-- <input type="text" class="form-control gender" placeholder="One-line Description (option)" id="recipient-name"> -->
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Mobile</label>
                                            <input type="number" class="form-control mobile" placeholder="61xxxxxxxxx" id="recipient-name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Address</label>
                                            <input type="text" class="form-control address" placeholder="Yaqshid" id="recipient-name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Email</label>
                                            <input type="text" class="form-control email" placeholder="name@gmail.com" id="recipient-name">
                                        </div>
                                        <div class="mb-3 passContainer">
                                            <label for="message-text" class="col-form-label">Password</label>
                                            <input type="password" class="form-control password" placeholder="your password" id="recipient-name">
                                            <label for="show" class="col-form-label">
                                                <input type='checkbox' class='showPass mr-2' id="show" />
                                                Show Password
                                            </label>

                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Profile (Optional)</label>
                                            <input type="file" class="form-control profile_image" placeholder="One-line Description (option)" id="recipient-name">
                                            <div class="my-3">
                                                <img src="" hidden alt="" class="img-fluid view-image" style='width: 100px; height: 100px; border-radius: 20px; border: 1px solid green;'>
                                            </div>

                                        </div>
                                        <div class="mb-3">

                                            <input type="text" hidden class="form-control id" id="recipient-name">
                                        </div>

                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block ragister save">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="../login.php">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src='../js/jquery-3.3.1.min.js'></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="../iziToast-master/dist/js/iziToast.js"></script>
    <script src="../iziToast-master/dist/js/iziToast.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../vendor/global/global.min.js"></script>
    <script src="../../js/quixnav-init.js"></script>
    <script src='../js/jquery-3.3.1.min.js'></script>
    <script src="../js/validations.js"></script>
    <script src="../js/utils.js"></script>
    <script>
        $(document).ready(function() {
            $('.profile_image').change((e) => {
                var url = URL.createObjectURL(e.target.files[0])
                $('.view-image').attr("hidden", false);
                $('.view-image').attr('src', url);
            })
            $('.showPass').change((e) => {
                showAndHidePass(e.target.checked, $('.password'))
            })
            $(".save").click(function(event) {
                event.preventDefault();
                if ($(".name").val() == "" ||
                    $(".mobile").val() == "" || $(".gender").val() == "" || $(".address").val() == "" ||
                    $(".email").val() == "" || $(".password").val() == "") {
                    displayToast("All fields are required", "error", 3000);
                    return;
                }
                if (!hasValidFullName($(".name").val())) {
                    displayToast("FullName Must contain only alphabetical and spaces, and must be at least three words", "error", 3000);
                    return;
                }
                if (!checkNumericMobile($(".mobile").val())) {
                    displayToast("Mobile must be only numeric values", "error", 3000);
                    return;
                }
                if (!validMobile($(".mobile").val())) {
                    displayToast("Mobile must be only 9 or 10 digits", "error", 3000);
                    return;
                }
                if (!emailVerify($(".email").val())) {
                    displayToast("Incorrect Email Format", "error", 3000);
                    return;
                }
                adminCheck($('.email').val(), $(".mobile").val(), "patients", "", res => {
                    if (res) {
                        displayToast("Patient With this email or mobile already exists", "error", 3000);
                        return;
                    }
                    if ($(".profile_image")[0].files.length > 0) {
                        var data = new FormData();
                        data.append("name", $(".name").val())
                        data.append("gender", $(".gender").val())
                        data.append("mobile", $(".mobile").val())
                        data.append("address", $(".address").val())
                        data.append("email", $(".email").val())

                        data.append("password", $(".password").val())
                        data.append("hasProfile", true)
                        data.append("profile_image", $(".profile_image")[0].files[0])
                        data.append("action", "createPatient")
                        createPatient(data, true)
                    } else {
                        var data = {
                            name: $(".name").val(),
                            gender: $(".gender").val(),
                            mobile: $(".mobile").val(),
                            address: $(".address").val(),
                            email: $(".email").val(),

                            password: $(".password").val(),
                            hasProfile: false,
                            action: "createPatient"
                        }
                        createPatient(data)
                    }
                })

            });




            function createPatient(data, hasFile = false) {
                if (!hasFile) {
                    console.log(data.hasProfile)
                    $.ajax({
                        method: "POST",
                        dataType: "JSON",
                        url: "../Api/patient.api.php",
                        data: data,
                        success: (res) => {
                            window.location.href = "../login.php"
                        },
                        error: (res) => {
                            displayToast("Internal Server error occurred, please try again😢", "error", 2000)
                        }
                    })
                } else {
                    $.ajax({
                        method: "POST",
                        dataType: "JSON",
                        processData: false,
                        cache: false,
                        contentType: false,
                        url: "../Api/patient.api.php",
                        data: data,
                        success: (res) => {
                            console.log(res)
                            window.location.href = "../login.php"

                        },
                        error: (res) => {

                            displayToast("Internal Server error occurred 😢", "error", 2000)
                        }
                    })
                }


            }

            function displayToast(message, type, timeout) {
                if (type == "error") {
                    iziToast.error({
                        title: 'Error Encountered! ',
                        message: message,
                        backgroundColor: "#D83A56",
                        titleColor: "white",
                        messageColor: "white",
                        position: "topRight",
                        timeout: timeout
                    });
                } else if (type == "success") {
                    iziToast.success({

                        message: message,
                        backgroundColor: "#54B435",
                        titleColor: "white",
                        messageColor: "white",
                        position: "topRight",
                        timeout: timeout
                    });
                } else if (type == "ask") {
                    iziToast.question({
                        timeout: timeout,
                        close: false,
                        overlay: true,
                        displayMode: 'once',
                        id: 'question',
                        zindex: 999,
                        title: "Condirm!",
                        message: message,
                        position: 'topRight',
                        titleColor: "#86E5FF",
                        messageColor: "white",
                        backgroundColor: "#0081C9",
                        iconColor: "white",
                        buttons: [
                            ['<button style="background: #DC3535; color: white;"><b>YES</b></button>', function(instance, toast) {
                                alert("Ok Deleted...");
                                instance.hide({
                                    transitionOut: 'fadeOut'
                                }, toast, 'button');

                            }, true],
                            ['<button style="background: #ECECEC; color: #2b2b2b;">NO</button>', function(instance, toast) {
                                alert("Retuned");
                                instance.hide({
                                    transitionOut: 'fadeOut'
                                }, toast, 'button');

                            }],
                        ],
                        onClosing: function(instance, toast, closedBy) {
                            //  console.info('Closing | closedBy: ' + closedBy);
                        },
                        onClosed: function(instance, toast, closedBy) {
                            // console.info('Closed | closedBy: ' + closedBy);
                        }
                    });
                }
            }
        })
    </script>
    <!--endRemoveIf(production)-->
</body>

</html>