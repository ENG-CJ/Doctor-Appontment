<?php

include_once "../include/session.php";
include_once "../include/permission.auth.php";

Permission::checkAuthPermissionSource("admin");

include '../include/links.php';
include '../include/header.php';
include '../include/sidebar.php';
include_once '../config/conn.db.php';


$id = $_SESSION['user_id'];
$data = array();

$sql = "SELECT *FROM admins where admin_id='$id'";
$result = mysqli_query($conn->getConnection(), $sql);
if ($result) {
    $rows = mysqli_fetch_array($result);
    $data = array(
        "admin_d" => $rows['admin_id'],
        "username" => $rows['username'],
        "email" => $rows['email'],
        "status" => $rows['status'],
        "password" => $rows['password'],
    );
}



?>


<!-- 
Content body start
*********************************** -->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">

                    <h4>My Profile</h4>
                    <!-- <p class="mb-0">Your business dashboard template</p> -->
                </div>
            </div>

        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo"></div>
                            <div class="profile-photo">
                                <img src="../uploads/default.png" class="img-fluid rounded-circle" alt="">
                            </div>
                        </div>
                        <div class="profile-info">
                            <div class="row justify-content-center">
                                <div class="col-xl-8">
                                    <div class="row">
                                        <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                            <div class="profile-name">
                                                <h4 class="text-primary"><?php echo $data['username'] ?></h4>
                                                <p><?php echo strtoupper($_SESSION['type']) ?></p>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                            <div class="profile-email">
                                                <h4 class="text-muted"><?php echo $data['email'] ?></h4>
                                                <p>Email</p>
                                            </div>
                                        </div>
                                        <!-- <div class="col-xl-4 col-sm-4 prf-col">
                                                    <div class="profile-call">
                                                        <h4 class="text-muted">(+1) 321-837-1030</h4>
                                                        <p>Phone No.</p>
                                                    </div>
                                                </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="info-body">

                        </div>





                        <div class="profile-tab">

                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">

                                    <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Setting</a>
                                    </li>
                                    <li class="nav-item"><a href="#privacy-settings" data-toggle="tab" class="nav-link">Privacy</a>
                                    </li>
                                </ul>
                                <div class="tab-content">


                                    <div id="profile-settings" class="tab-pane fade active show">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Account Setting</h4>

                                                <form>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Email</label>
                                                            <input type="email" value="<?php echo $data['email'] ?>" placeholder="Email" class="form-control email">
                                                        </div>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">

                                                            <label>Username</label>
                                                            <input type="text" placeholder="username" value="<?php echo $data['username'] ?>" class="form-control username">

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <input type="text" disabled value="<?php echo $data['status'] ?>" placeholder="Apartment, studio, or floor" class="form-control">
                                                    </div>

                                                    <div class="my-2">
                                                        <div class="card border-0 bg-light" style='border-radius: 18px; box-shadow: -1px 1px 53px -1px rgba(179,180,186,0.75);
-webkit-box-shadow: -1px 1px 53px -1px rgba(179,180,186,0.75);
-moz-box-shadow: -1px 1px 53px -1px rgba(179,180,186,0.75);'>
                                                            <div class="card-header">
                                                                <h4 class="text-danger fw-bold">
                                                                    Danger Area
                                                                </h4>

                                                            </div>
                                                            <div class="card-body">
                                                                <div class="my-2">
                                                                    <p class='fw-bold text-danger'>if you disable your account, you will not be able to login again <br> until your account has been released or activated</p>
                                                                    <button class="btn btn-danger disable">Disable My Account</button>
                                                                </div>
                                                                <hr>
                                                                <div class="my-2">
                                                                    <p class='fw-bold text-danger'>If your account is deleted, your data will be lost.</p>
                                                                    <button class="btn btn-danger delete">Delete My Account</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <button class="btn btn-success saveChanges" type="submit">Save Changes</button>
                                                </form>



                                            </div>
                                        </div>
                                    </div>
                                    <div id="privacy-settings" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h4 class="text-primary">Security/ Change Password</h4>
                                                <form method='POST'>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>New Password</label>
                                                            <input type="password" name="newPassword" placeholder="password" class="form-control newPassword">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Confirm Password</label>
                                                            <input type="password" name="confirm" placeholder="Password" class="form-control confirm">
                                                        </div>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="showPass">
                                                            <input type="checkbox" name="" id="showPass" class="check mr-2">
                                                            Show Password

                                                        </label>
                                                    </div>



                                                    <button class="btn btn-primary change_password" name='change_password' type="submit">change</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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
            Content body end
        ***********************************-->





</div>



<?php
include '../include/footer.php';


?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script src='../js/jquery-3.3.1.min.js'></script>
<script src='../js/utils.js'></script>
<script src='../js/validations.js'></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="../iziToast-master/dist/js/iziToast.js"></script>
<script src="../iziToast-master/dist/js/iziToast.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../../vendor/global/global.min.js"></script>
<script src="../../js/quixnav-init.js"></script>
<script src="../../js/custom.min.js"></script>

<script>
    $(document).ready(() => {
        $(".disable").click((e) => {
            e.preventDefault();
            swal({
                    title: "confirm to Disable Your account?",
                    text: "Once disabled, you will no longer be active!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            method: "POST",
                            data: {

                                "action": "disableAccount"
                            },
                            url: "../Api/admins.api.php",
                            success: (res) => {
                                swal("Account Has been disabled!", {
                                    icon: "success",
                                });
                                window.location.href = "../";
                            },
                            error: (res) => {
                                console.log(res)
                                swal("Internal Error Occurred!", {
                                    icon: "error",
                                });
                            }

                        })

                    } else {
                        // swal("Your imaginary file is safe!");
                    }
                });


        })
        $(".delete").click((e) => {
            e.preventDefault();
            swal({
                    title: "confirm to delete Your account?",
                    text: "Once disabled, you will no longer be active!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            method: "POST",
                            data: {

                                "action": "deleteOne"
                            },
                            url: "../Api/admins.api.php",
                            success: (res) => {
                                swal("Account Has been Deleted!", {
                                    icon: "success",
                                });
                                window.location.href = "../";
                            },
                            error: (res) => {
                                console.log(res)
                                swal("Internal Error Occurred!", {
                                    icon: "error",
                                });
                            }

                        })

                    } else {
                        // swal("Your imaginary file is safe!");
                    }
                });


        })


        $(".check").click((e) => {
            showAndHidePass(e.target.checked, $(".newPassword"))
            showAndHidePass(e.target.checked, $(".confirm"))
        })
        $('.change_password').click((e) => {

            e.preventDefault();
            if ($(".newPassword").val() == "" || $(".confirm").val() == "") {
                showInfoOrErrorMessages("Fill All Required Fields", $(".info-body"), "error")
            } else if ($(".confirm").val() != $(".newPassword").val()) {
                showInfoOrErrorMessages("confirm pass mus be same as new password", $(".info-body"), "error")
            } else {
                var data = {
                    "password": $(".newPassword").val(),
                    action: "updatePassAdmin"
                }
                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    url: "../Api/admins.api.php",
                    data: data,
                    success: (res) => {
                        if (res.error != "") {
                            showInfoOrErrorMessages(res.error, $(".info-body"), "error")
                            return;
                        }
                        showInfoOrErrorMessages(res.message, $(".info-body"), "success")

                    },
                    error: (res) => {
                        console.log(res)
                        // displayToast("Internal Server error occurred 😢", "error", 2000)
                    }
                })
            }

        })
        $('.saveChanges').click((e) => {

            e.preventDefault();
            if ($(".username").val() == "" || $(".email").val() == "") {
                showInfoOrErrorMessages("Fill All Required Fields", $(".info-body"), "error")
            } else if (!emailVerify($(".email").val())) {
                showInfoOrErrorMessages("Incorrect Email Format use (example@gmail.com)", $(".info-body"), "error")
            } else if (!containsOnlyAlphanumeric($(".username").val())) {
                showInfoOrErrorMessages("Username Cannot contain any special character also cannot start numerical value, also cannot contain any spaces", $(".info-body"), "error")
            } else {
                var data = {
                    "username": $(".username").val(),
                    "email": $(".email").val(),
                    action: "updateAdminData"
                }
                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    url: "../Api/admins.api.php",
                    data: data,
                    success: (res) => {
                        if (res.error != "") {
                            showInfoOrErrorMessages(res.error, $(".info-body"), "error")
                            return;
                        }
                        showInfoOrErrorMessages(res.message, $(".info-body"), "success")

                    },
                    error: (res) => {
                        console.log(res)
                        // displayToast("Internal Server error occurred 😢", "error", 2000)
                    }
                })
            }

        })
    })
</script>