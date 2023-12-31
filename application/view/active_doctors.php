<?php
include_once "../include/session.php";
include_once "../include/permission.auth.php";

Permission::checkAuthPermissionSource("admin");

include '../include/links.php';
include '../include/header.php';
include '../include/sidebar.php';
?>


<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">

                </div>
            </div>

        </div>
        <!-- row -->
        <h6>Make Appointment On Specific Doctor </h6>
        <p class='text-muted'>Click On Pick Button To make Specific Appointment</p>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">

                    <div class="card-block table-border-style p-3">
                        <div class="row">
                            <div class="col-12 proffision_selection">
                                <label for="">Filter Doctor Profession</label>
                                <select id="single-select" class="form-control filter">

                                </select>
                            </div>
                            <div class="col-12 my-2">

                                <div class="row all-doctors">



                                </div>
                            </div>
                            <!-- <div class="col-12 mt-4">
                                <button class='btn btn-success create'>Create</button>
                                <button class='btn btn-primary'>Back</button>
                            </div> -->
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
<script>
    $(document).ready(function() {
        $(".filter").on("change", function() {

            if ($(".filter").val() == "all") {
                $(".all-doctors").html('');
                getDoctorshospital();
            } else {
                $(".all-doctors").html('');
                $.ajax({
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        action: "filterProfession",
                        pro: $('.filter').val()
                    },
                    url: "../Api/proffision.api.php",
                    beforeSend: () => {
                        $('.all-doctors').html(`  <div class="d-flex align-items-center mt-3">
  
  <div class="spinner-border ml-2" role="status" aria-hidden="true"></div>
  <strong class='ml-3'>Fetching Data...</strong>
</div>`)
                    },
                    success: (res) => {
                        $('.all-doctors').html("")
                        var {
                            data
                        } = res;
                        console.log(data);
                        if (data.length == 0) {
                            $('.all-doctors').html(`
                   <div class='p-3'>
                    <div class='alert alert-info'>
                    <strong>No Data Found Based on ${$(".filter").val()}</strong>
                    </div></div>
                    
                    `);
                            return;
                        }
                        data.forEach(value => {
                            var name = value.drName.split(" ")[0];
                            var review = 0;

                            getReviewNumber(value.drID, res => review = res);
                            console.log("the profile is", value.profile_image)
                            $('.all-doctors').append(`
                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6>From: ${value.hosName}</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <img src="../uploads/${value.profile_image}" class='img-fluid' style="border-radius: 10px; border: 1px solid green;" alt="">
                                                        <div class="my-2 ml-2">
                                                        <span class="badge badge-pill badge-primary">Reviews(All) - ${review}</span>
                                                           
                                                        </div>

                                                    </div>
                                                    <div class="col-6">
                                                       <div class="d-flex align-items-center">
                                                       <div class="name">
                                                        <strong>Dr. Name</strong><br>
                                                        <label for="">Dr. ${name}</label>
                                                       </div>
                                                       <div class="mt-3 ml-1">
                                                       <img src="../uploads/ver_icon.png" class="img-fluid" style="width: 30px; height: 30px"/>
                                                       </div>
                                                       </div>
                                                        <strong>Profession</strong><br>
                                                        <label for="">${value.pro_name}</label><br>
                                                        <strong>Mobile (Emerg Number)</strong><br>
                                                        <label for="">${value.mobile}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button class='btn btn-success pickup w-100' drID="${value.drID}">
                                                <i class="fa-regular fa-thumbs-up mr-2"></i>
                                                    Pickup</button>
                                            </div>
                                        </div>
                                    </div>`)
                        })

                    },
                    error: (err) => {
                        $('.all-doctors').html("");
                        console.log("error cooyured")
                        console.log(err);
                    }
                })
            }

        })



        $(".create").click(() => console.log(formatTime($(".from_time").val())));
        $(document).on("click", "button.pickup", function() {
            var id = $(this).attr("drID");
            window.location.href = "./booking.php?dr_id=" + id
        })

        getDoctorProffision();

        function formatTime(time) {
            var time = time.split(":");
            var hours = parseInt(time[0]);
            var minutes = parseInt(time[1]);

            var modifiedHours = hours - 12;
            if (modifiedHours < 0)
                modifiedHours += 12;
            convertedTime = modifiedHours + ":" + minutes.toString().padStart(2, '0');
            console.log(hours)
            return convertedTime + getTimePeriod(hours);
        };

        function getDoctorProffision() {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "readProffision",
                },
                url: "../Api/proffision.api.php",
                success: (res) => {
                    console.log(res);
                    var {
                        data
                    } = res;
                    option = ` <option value="all" selected>All</option>`
                    data.forEach(values => {
                        option += `<option value="${values.pro_name}">${values.pro_name}</option>`
                    });
                    $(".proffision_selection select").html(option);
                },
                error: (err) => {
                    console.log(err);
                }
            })
        };

        function getReviewNumber(id, response) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "getReviewNumber",
                    id: id
                },
                url: "../Api/doctor.api.php",
                success: (res) => {
                    console.log("number is ", res)
                    response(res.review);
                },
                error: (err) => {
                    console.log(err);
                    response("NULL");
                }
            })
        };

        function getDoctorshospital() {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    action: "readDoctorsHospital",
                },
                url: "../Api/doctor.api.php",
                beforeSend: () => {
                    $('.all-doctors').html(`  <div class="d-flex align-items-center mt-3">
  
  <div class="spinner-border ml-2" role="status" aria-hidden="true"></div>
  <strong class='ml-3'>Fetching Data...</strong>
</div>`)
                },
                success: (res) => {
                    $('.all-doctors').html("");

                    var {
                        data,

                    } = res;
                    console.log("data is ", res);

                    if (data.length == 0) {
                        $('.all-doctors').html(`
                   <div class='p-3'>
                    <div class='alert alert-info'>
                    <strong>No Data Found</strong>
                    </div></div>
                    
                    `);
                        return;
                    }
                    // <label for="" class='text-muted'>
                    //     <i class="fa-solid fa-circle-check"></i>
                    //     Verified</label>
                    data.forEach(value => {
                        var name = value.drName.split(" ")[0];
                        var review = 0;

                        getReviewNumber(value.drID, res => review = res);
                        console.log("review is 4", review)
                        $('.all-doctors').append(`
                    <div class="col-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6>From: ${value.hosName}</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <img src="../uploads/${value.profile_image}" class='img-fluid' style="border-radius: 10px; border: 1px solid green;" alt="">
                                                        <div class="my-2 ml-2">
                                                        <span class="badge badge-pill badge-primary">Reviews(All) - ${review}</span>
                                                           
                                                        </div>

                                                    </div>
                                                    <div class="col-6">
                                                       <div class="d-flex align-items-center">
                                                       <div class="name">
                                                        <strong>Dr. Name</strong><br>
                                                        <label for="">Dr. ${name}</label>
                                                       </div>
                                                       <div class="mt-3 ml-1">
                                                       <img src="../uploads/ver_icon.png" class="img-fluid" style="width: 30px; height: 30px"/>
                                                       </div>
                                                       </div>
                                                        <strong>Profession</strong><br>
                                                        <label for="">${value.pro_name}</label><br>
                                                        <strong>Mobile (Emerg Number)</strong><br>
                                                        <label for="">${value.mobile}</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <button class='btn btn-success pickup w-100' drID=${value.drID}>
                                                    <i class="fa-regular fa-thumbs-up mr-2"></i>
                                                    Pickup</button>

                                            </div>
                                        </div>
                                    </div>
                    
                    `)
                    })

                },
                error: (err) => {
                    $('.all-doctors').html("");
                    console.log(err);
                }
            })
        };
        getDoctorshospital();
        getDoctorProffision();

        function getTimePeriod(time) {
            if (parseInt(time) < 12)
                return "AM";
            return "PM";
        }
    })
</script>