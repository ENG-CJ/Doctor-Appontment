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

$errors = array();
$success = array();
if (isset($_POST['change_password'])) {
    if (empty($_POST['newPassword']) || empty($_POST['confirm'])) {
        $errors['error'] = 'New Password and Confirm password is required';
    } else if ($_POST['confirm'] != $_POST['newPassword']) {
        $errors['error'] = 'Confirm Password must be same as  new password';
    } else {
        $newPassword = $_POST['newPassword'];
        $sql = "UPDATE admins set password='$newPassword' where admin_id='$id'";
        $result = mysqli_query($conn->getConnection(), $sql);
        if ($result) {
            $success = array("message" => "Your Security has been changes");
        }
    }
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
                    <?php print_r($data) ?>
                    <h4>Hi, welcome back!</h4>
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
                        <?php
                        if (count($errors) > 0) {
                        ?>
                            <div class="alert alert-danger">
                                <strong><?php echo $errors['error'] ?></strong>
                            </div>

                        <?php
                        }
                        if (count($success) > 0) {
                        ?>
                            <div class="alert alert-success">
                                <strong><?php echo $success['message'] ?></strong>
                            </div>

                        <?php
                        }

                        ?>
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
                                                            <input type="email" value="<?php echo $data['email'] ?>" placeholder="Email" class="form-control">
                                                        </div>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">

                                                            <label>Username</label>
                                                            <input type="text" placeholder="username" value="<?php echo $data['username'] ?>" class="form-control">

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <input type="text" disabled value="<?php echo $data['status'] ?>" placeholder="Apartment, studio, or floor" class="form-control">
                                                    </div>


                                                    <button class="btn btn-success" type="submit">Save Changes</button>
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
                                                            <input type="password" name="newPassword" placeholder="password" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Confirm Password</label>
                                                            <input type="password" name="confirm" placeholder="Password" class="form-control">
                                                        </div>
                                                    </div>



                                                    <button class="btn btn-primary" name='change_password' type="submit">change</button>
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
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="../iziToast-master/dist/js/iziToast.js"></script>
<script src="../iziToast-master/dist/js/iziToast.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../../vendor/global/global.min.js"></script>
<script src="../../js/quixnav-init.js"></script>
<script src="../../js/custom.min.js"></script>

<script>
    $(document).ready(() => {
        $('.change_password').click((e) => {
            e.preventDefault();
            if ($(".newPassword").val() == "" || $(".confirm").val() == "") {
                $('.error').html(`
                <div class='alert alert-danger'><strong>fill required fields</strong></div>
                `)
            } else if ($(".confirm").val() !=$(".newPassword").val()) {
                $('.error').html(`
                <div class='alert alert-danger'><strong>confirm pass mus be same as new passwod</strong></div>
                `)
            }
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/proffision.api.php",
                data: data,
                success: (res) => {
                    if (!res.status) {
                        displayToast("Error Occurred during creation", "error", 4000);
                        return;
                    }
                    console.log(res)
                    $(".proffisionModal").modal("hide")
                    readProffision();
                    $(".table").DataTable();
                    displayToast("The Data has been added..👋", "success", 2000)

                },
                error: (res) => {
                    console.log(res)
                    displayToast("Internal Server error occurred 😢", "error", 2000)
                }
            })
        })
    })
</script>