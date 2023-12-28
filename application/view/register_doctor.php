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
                                    <div class="alert alert-warning">
                                        <strong class='text-dark'>
                                            <i class="fa-solid fa-circle-info mr-2"></i>
                                            Please note that your account verification process will be completed within the next 12 hours..</strong>
                                    </div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form>
                                        <div class="mb-3">
                                            <input type="text" class="form-control name" placeholder="your full name" id="recipient-name">
                                        </div>
                                        <div class="mb-3 gender">
                                            <label for="message-text" class="col-form-label">Gender</label>
                                            <select class="form-control my_gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>

                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group proffision_selection">
                                                <select name="proffision" class="form-control proffision_id">

                                                </select>
                                            </div>
                                            <div class="form-group hospital_selection">
                                                <select name="hospital" class="form-control hospital_id">

                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <input type="number" class="form-control mobile" placeholder="61xxxxxxx" id="recipient-name">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control address" placeholder="your address e.g Hodan..." id="recipient-name">
                                            </div>
                                            <div class="mb-3">
                                                <input type="email" class="form-control email" placeholder="example@gmail.com" id="recipient-name">
                                            </div>




                                            <div class="mb-3">
                                                <input type="password" class="form-control password" placeholder="your@password" id="recipient-name">
                                                <input type="text" hidden class="form-control id" id="recipient-name">
                                            </div>
                                            <div class="mb-3" style="display: flex; align-items: center;">
                                                <input type='checkbox' class='showPass mr-2' id="show" />
                                                <label for="show" class="col-form-label">
                                                    Show Password
                                                </label>

                                            </div>


                                            <div class="mb-3">
                                                <label for="">Profile *</label>
                                                <input type="file" class="form-control profile_image" placeholder="profile_image" id="recipient-name">
                                                <div class="my-3">
                                                    <img src="" hidden alt="" class="img-fluid view-image" style='width: 100px; height: 100px; border-radius: 20px; border: 1px solid green;'>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Description *</label>
                                                <textarea class="form-control description" placeholder="The definition of your entity will be outlined by your profile description." id="recipient-name" rows="10" cols="15"></textarea>
                                            </div>

                                            <div class="text-center mt-4">
                                                <button type="submit" class="btn btn-primary btn-block save">Sign me
                                                    up</button>
                                            </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="../">Sign
                                                in</a></p>
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
    <script src='../js/jquery-3.3.1.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="../iziToast-master/dist/js/iziToast.js"></script>
    <script src="../iziToast-master/dist/js/iziToast.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../vendor/global/global.min.js"></script>
    <script src="../../js/quixnav-init.js"></script>
    <script src="../js/validations.js"></script>
    <script src="../js/utils.js"></script>

    <!--endRemoveIf(production)-->
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
                if ($(".name").val() == "" || $(".proffision_id").val() == "" ||
                    $(".hospital_id").val() == "" || $(".mobile").val() == "" || $(".address").val() == "" ||
                    $(".email").val() == "" || $(".password").val() == "" || $(".description").val() == "" ||
                    $(".profile_image").val() == "") {
                    displayToast("all fields are required", "error", 3000);

                } else if (!hasValidFullName($(".name").val())) {
                    displayToast("FullName Must contain only alphabetical and spaces, and must be at least three words", "error", 3000);
                } else if (!validMobile($(".mobile").val())) {
                    displayToast("Mobile must be only 9 or 10 digits", "error", 3000);
                } else if (!emailVerify($(".email").val())) {
                    displayToast("Incorrect Email Format", "error", 3000);
                } else {
                    adminCheck($(".email").val(), "doctors", (result) => {
                        if (result) {
                            displayToast("Doctor all ready exist please create new one 🤷‍♂😢️", "error", 2000);
                        } else {

                            var extension = $(".profile_image").val().split(".")[1];
                            if (!includesExtension(extension)) {
                                displayToast("This extension is not allowed please provide valid extension", "error", 2000);
                                return;
                            }

                        
                            var data = new FormData();
                            data.append("name", $(".name").val())
                            data.append("email", $(".email").val())
                            data.append("gender", $(".my_gender").val())
                            data.append("password", $(".password").val())
                            data.append("mobile", $(".mobile").val())
                            data.append("address", $(".address").val())
                            data.append("proffision_id", $(".proffision_id").val())
                            data.append("hospital_id", $(".hospital_id").val())
                            data.append("description", $(".description").val())
                            data.append("action", "createDoctor")
                            data.append("profile_image", $(".profile_image")[0].files[0])
                            data.append("action", "registerDoctor")
                            createDoctor(data, true)

                        }
                    })


                }
            });

            function createDoctor(data, hasFile = false) {
                if (!hasFile) {
                    console.log(data.hasProfile)
                    $.ajax({
                        method: "POST",
                        dataType: "JSON",
                        url: "../Api/doctor.api.php",
                        data: data,
                        success: (res) => {
                            console.log(res)
                            window.location.href = "../index.php"
                            displayToast("The Data has been added..👋", "success", 2000)

                        },
                        error: (res) => {
                            console.log(res)
                            displayToast("Internal Server error occurred 😢", "error", 2000)
                        }
                    })
                } else {
                    $.ajax({
                        method: "POST",
                        dataType: "JSON",
                        processData: false,
                        cache: false,
                        contentType: false,
                        url: "../Api/doctor.api.php",
                        data: data,
                        success: (res) => {
                            console.log(res)
                            displayToast("The Data has been added..👋", "success", 2000)

                        },
                        error: (res) => {
                            console.log(res)
                            displayToast("Internal Server error occurred 😢", "error", 2000)
                        }
                    })
                }

            }

            function getHospitalData() {
                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    url: "../Api/hospital.api.php",
                    data: {
                        action: "readHospital"
                    },
                    beforeSend: () => {
                        $(".hospital_selection select").attr("disabled", true);
                        $(".hospital_selection select").html(`<option>Fetching All Hospitals</option>`);
                    },
                    success: (res) => {
                        $(".hospital_selection select").attr("disabled", false);
                        $(".hospital_selection select").html('');
                        var {
                            data
                        } = res;
                        console.log(data)
                        // alert(res);
                        let option = '<option value="" selected>Select The Hospital You Are Working</option>';



                        data.forEach(values => {
                            option += `<option value="${values.hospital_id}">${values.hos_name}</option>`;
                        });

                        $(".hospital_selection select").html(option);
                    },
                    error: (error) => {
                        $(".hospital_selection select").attr("disabled", false);
                        $(".hospital_selection select").html('');
                        console.log(error);
                    }
                })

            }

            function getProfessionData() {
                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    url: "../Api/proffision.api.php",
                    data: {
                        action: "readProffision"
                    },
                    beforeSend: () => {
                        $(".proffision_selection select").attr("disabled", true)
                        $(".proffision_selection select").html(`
                        <option>Fetching Professions</option>
                        `)
                    },
                    success: (res) => {
                        $(".proffision_selection select").attr("disabled", false)
                        $(".proffision_selection select").html('')
                        var {
                            data
                        } = res;
                        console.log(data)

                        let option = '<option value="" selected>Select Your Specialty</option>';

                        data.forEach(values => {
                            option += `<option value="${values.pro_id}">${values.pro_name}</option>`;
                        });


                        $(".proffision_selection select").html(option);
                    },
                    error: (error) => {
                        $(".proffision_selection select").attr("disabled", false)
                        $(".proffision_selection select").html('')
                        console.log(error);
                    }
                })

            }
            getHospitalData();
            getProfessionData();

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
        });
    </script>
</body>

</html>