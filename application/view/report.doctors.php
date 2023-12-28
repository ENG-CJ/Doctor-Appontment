<?php
include_once '../include/session.php';
include '../include/links.php';
include '../include/header.php';
include '../include/sidebar.php';
?>





<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>List of doctors</h4>
                    <span class="ml-1">Manage All operations</span>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="my-2">
                    <label for="">Filter & Print By Hospital</label>
                    <select name="" id="" class="form-select filter-doctors border-success">
                        <option value="all">All</option>

                    </select>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="my-2">
                    <button class="btn btn-success fetch-print">
                        Fetch & Print
                    </button>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="container-fluid mb-2 loading-area">

        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card print-area">
                    <div class="card-header">
                        <h5>All Doctors</h5>
                        <!-- <button id="addNew" data-toggle="modal" data-target="#exampleModal"
                            class="btn btn-primary float-right add">Add New</button> -->
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <div class="m-2 no-data">

                            </div>
                            <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>name</th>

                                        <th>Mobile</th>

                                        <th>email</th>
                                        <th>address</th>
                                        <th>verified</th>
                                        <!-- <th>description</th> -->
                                        <th>hospital</th>
                                        <!-- <th>password</th>
                                        <th>image</th> -->

                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" modal fade view_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">View Doctor</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body view_body">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!--**********************************
            Content body end
        ***********************************-->

                        <div class="modal fade doctorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add/Edit Doctor</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <input type="text" class="form-control name" placeholder="name" id="recipient-name">
                                            </div>
                                            <div class="mb-3">
                                                <div class="form-group proffision_selection">
                                                    <select name="proffision" class="form-control proffision_id">
                                                        <!-- <option value="" selected> Select Proffission</option> -->
                                                        <!-- <option value="1">male</option>
                                <option value="2">female</option> -->
                                                    </select>
                                                </div>
                                                <div class="form-group hospital_selection">
                                                    <select name="hospital" class="form-control hospital_id">
                                                        <!-- <option value="" selected> Select Hospital</option> -->

                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control mobile" placeholder="mobile" id="recipient-name">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control address" placeholder="address" id="recipient-name">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control email" placeholder="email" id="recipient-name">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control description" placeholder="description" id="recipient-name">
                                                </div>
                                                <div class="mb-3">
                                                    <input type="file" class="form-control image" placeholder="profile_image" id="recipient-name">
                                                    <p>Selected File: <span class="filename"></span></p>
                                                </div>
                                                <div class="mb-3 gender">
                                                    <label for=""> Gender:</label>
                                                    <input type="radio" name="gender" value="1" id="male"> Male &nbsp;
                                                    <input type="radio" name="gender" value="0" id="female"> Female &nbsp;
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" class="form-control password" placeholder="@password" id="recipient-name">
                                                    <input type="text" hidden class="form-control id" id="recipient-name">
                                                </div>
                                                <div class="mb-3" style="display: flex; align-items: center;">
                                                    <input type='checkbox' class='showPass mr-2' id="show" />
                                                    <label for="show" class="col-form-label">
                                                        Show Password
                                                    </label>

                                                </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary save">save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>





                    <?php
                    include '../include/footer.php';
                    ?>
                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
                    <script src="../js/validations.js"></script>

                    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
                    <script src="../iziToast-master/dist/js/iziToast.js"></script>
                    <script src="../iziToast-master/dist/js/iziToast.min.js"></script>
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script src='../js/jquery-3.3.1.min.js'></script>
                    <script src='../printThis.js'></script>

                    <script>
                        $(document).ready(function() {
                                $(".fetch-print").click(() => {
                                  

                                    $(".print-area").printThis();
                                })

                                $('.filter-doctors').change(() => {
                                    if ($('.filter-doctors').val().toLowerCase() == "all") {
                                        $('.no-data').html("")
                                        readAll();
                                    } else
                                        readHospitalDoctors($('.filter-doctors').val());
                                })

                                function getHospitalData() {
                                    $.ajax({
                                        method: "POST",
                                        dataType: "JSON",
                                        url: "../Api/hospital.api.php",
                                        data: {
                                            action: "readHospital"
                                        },
                                        beforeSend: () => {
                                            $(".filter-doctors").attr("disabled", true);
                                            $(".filter-doctors").html(`<option>Fetching All Hospitals</option>`);
                                        },
                                        success: (res) => {
                                            console.log("Hello console")
                                            $(".filter-doctors").attr("disabled", false);
                                            $(".filter-doctors").html('');
                                            var {
                                                data
                                            } = res;
                                            console.log(data)
                                            // alert(res);
                                            let option = '<option value="all" selected>All</option>';



                                            data.forEach(values => {
                                                option += `<option value="${values.hospital_id}">${values.hos_name}</option>`;
                                            });

                                            $(".filter-doctors").html(option);
                                        },
                                        error: (error) => {
                                            $(".filter-doctors").attr("disabled", false);
                                            $(".filter-doctors").html('');
                                            console.log(error);
                                        }
                                    })

                                }
                                getHospitalData();
                                // $('.view_Modal').modal("show")
                                $(".add").click(() => {
                                    getHospitalDataForAddingNewDoctor();
                                    getProfessionData();
                                    $(".save").text("save");
                                    clearInputData(
                                        $(".name"),
                                        $(".email"),
                                        $(".gender"),
                                        $(".password"),
                                        $(".mobile"),
                                        $(".address"),
                                        $(".proffision_id"),
                                        $(".hospital_id"),
                                        $(".proffision_id"),
                                        $(".description"),
                                        $(".image"),



                                    );
                                    $(".doctorModal").modal("show");


                                });
                                $(".save").click(() => {
                                    if ($(".email").val() == "") {
                                        displayToast("all fields are required", "error", 2000);
                                    } else if ($(".name").val() == "") {
                                        displayToast("all fields are required", "error", 2000);
                                    } else if ($(".password").val() == "") {
                                        displayToast("all fields are required", "error", 2000);
                                    } else if ($(".mobile").val() == "") {
                                        displayToast("all fields are required", "error", 2000);
                                    } else if ($(".address").val() == "") {
                                        displayToast("all fields are required", "error", 2000);
                                    } else if ($(".proffision_id").val() == "") {
                                        displayToast("all fields are required", "error", 2000);
                                    } else if ($(".hospital_id").val() == "") {
                                        displayToast("all fields are required", "error", 2000);
                                    } else if ($(".description").val() == "") {
                                        displayToast("all fields are required", "error", 2000);

                                    } else {

                                        if ($(".save").text() == "save") {
                                            var data = new FormData();
                                            data.append("name", $(".name").val())
                                            data.append("email", $(".email").val())
                                            data.append("gender", $(".gender").val())
                                            data.append("password", $(".password").val())
                                            data.append("mobile", $(".mobile").val())
                                            data.append("address", $(".address").val())
                                            data.append("proffision_id", $(".proffision_id").val())
                                            data.append("hospital_id", $(".hospital_id").val())
                                            data.append("description", $(".description").val())
                                            data.append("action", "createDoctor")
                                            data.append("profile_image", $(".image")[0].files[0])
                                            if (validateEmail($(".email").val())) {
                                                adminCheck($(".email").val(), "doctors", (result) => {
                                                    if (result) {
                                                        displayToast("doctor all ready exist please create new one 🤷‍♂😢️", "error", 2000);
                                                    } else {
                                                        $.ajax({
                                                            method: "POST",
                                                            dataType: "JSON",
                                                            processData: false,
                                                            cache: false,
                                                            contentType: false,
                                                            data: data,
                                                            url: "../Api/doctor.api.php",
                                                            success: (res) => {
                                                                console.log(res);
                                                                readAll();
                                                                $(".doctorModal").modal('hide');
                                                                displayToast("doctor Was Added Successfully 🔥", "success", 2000);
                                                            },
                                                            error: (error) => {
                                                                console.log(error);
                                                                displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                                                            }
                                                        })
                                                    }
                                                });
                                            } else {
                                                {
                                                    displayToast("please check the format of your email 🤷‍♂😢️", "error", 2000);
                                                }
                                            }



                                        } else {
                                            if ($(".image")[0].files.length > 0) {
                                                var data = new FormData();
                                                data.append("name", $(".name").val())
                                                data.append("email", $(".email").val())
                                                data.append("gender", $(".gender").val())
                                                data.append("password", $(".password").val())
                                                data.append("mobile", $(".mobile").val())
                                                data.append("address", $(".address").val())
                                                data.append("proffision_id", $(".proffision_id").val())
                                                data.append("hospital_id", $(".hospital_id").val())
                                                data.append("description", $(".description").val())
                                                data.append("id", $(".id").val())
                                                data.append("action", "updateDoctor")
                                                data.append("hasProfile", true)
                                                data.append("profile_image", $(".image")[0].files[0])
                                                if (validateEmail($(".email").val())) {
                                                    $.ajax({
                                                        method: "POST",
                                                        dataType: "JSON",
                                                        processData: false,
                                                        cache: false,
                                                        contentType: false,
                                                        data: data,
                                                        url: "../Api/doctor.api.php",
                                                        success: (res) => {
                                                            readAll();
                                                            $(".doctorModal").modal("hide");
                                                            displayToast("Doctor Was updated Successfully 🔥", "success", 2000);
                                                            console.log(res);
                                                        },
                                                        error: (error) => {
                                                            displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                                                            console.log(error);
                                                        }
                                                    })
                                                } else {
                                                    {
                                                        displayToast("please check the format of your email 🤷‍♂😢️", "error", 2000);
                                                    }
                                                }

                                            } else {
                                                data = {
                                                    name: $(".name").val(),
                                                    email: $(".email").val(),
                                                    password: $(".password").val(),
                                                    gender: $(".password").val(),
                                                    mobile: $(".mobile").val(),
                                                    address: $(".address").val(),
                                                    profision_id: $(".proffision_id").val(),
                                                    hospital_id: $(".hospital_id").val(),

                                                    description: $(".description").val(),
                                                    id: $(".id").val(),
                                                    action: "updateDoctor",
                                                    hasProfile: false
                                                }
                                                if (validateEmail($(".email").val())) {
                                                    $.ajax({
                                                        method: "POST",
                                                        dataType: "JSON",
                                                        data: data,
                                                        url: "../Api/doctor.api.php",
                                                        success: (res) => {
                                                            readAll();
                                                            $(".doctorModal").modal("hide");
                                                            displayToast("Doctor Was updated Successfully 🔥", "success", 2000);
                                                            console.log(res);
                                                        },
                                                        error: (error) => {
                                                            displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                                                            console.log(error);
                                                        }
                                                    })

                                                } else {
                                                    {
                                                        displayToast("please check the format of your email 🤷‍♂😢️", "error", 2000);
                                                    }
                                                }

                                            }
                                        }



                                    }

                                });
                                $(document).on('click', "a.viewBtn", function() {
                                    var id = $(this).attr('viewID');


                                    fetchDoctorData(id, res => displayViewedData(res.data[0]));
                                })


                                function displayViewedData(data) {
                                    var status = '';
                                    if (data.verified.toLowerCase() == "no")
                                        status = `<span class="badge rounded-pill bg-danger">Still Not Verified</span>`
                                    else
                                        status = `<span class="badge rounded-pill bg-success">Verified</span>`
                                    $('.view_body').html(`
                        <div class="card card-body p-2">
                        <div class="tes d-flex justify-content-between">
                            <div class="titles">
                                <h2>Dr, ${data.name}</h2>
                                <span>${data.pro_name}</span>
                            </div>
                            <div class="my-image">
                                <img src="../uploads/${data.profile_image}" alt="" class="img-fluid img-thumbnail" style='width: 110px; height: 110px'>
                            </div>
                        </div>

                    </div>
                    <div class="tes my-3 d-flex justify-content-between">

                        <h5>Gender</h5>
                        <span>${data.gender}</span>


                    </div>
                    <hr>
                    <div class="tes my-3 d-flex justify-content-between">

                        <h5>Mobile</h5>
                        <span>${data.mobile}</span>


                    </div>
                    <div class="tes my-3 d-flex justify-content-between">

                        <h5>Email</h5>
                        <span>${data.email}</span>


                    </div>
                    <div class="tes my-3 d-flex justify-content-between">

                        <h5>Address</h5>
                        <span>${data.address}</span>


                    </div>
                    <hr>
                    <div class="tes my-3 d-flex justify-content-between">

                        <h5>Special</h5>
                        <span>${data.pro_name}</span>


                    </div>
                    <div class="tes my-3 d-flex justify-content-between">

                        <h5>Hospital</h5>
                        <span>${data.hos_name}</span>


                    </div>
                    <div class="tes my-3 d-flex justify-content-between align-items-center">

                        <h5>Verified</h5>
                        ${status}


                    </div>
                    <hr>
                    <div class="tes my-3">

                        <h5>Description</h5>
                        <p>${data.description}</p>


                    </div>
                
                
                `)
                                    $('.view_Modal').modal("show");
                                }




                                $(document).on('click', "Button.unverify", function() {
                                    id = $(this).attr('unverID');
                                    unverify = "NO";


                                    swal({
                                            title: "UnVerify This Doctor?",

                                            icon: "warning",
                                            buttons: true,
                                            dangerMode: true,
                                        })
                                        .then((willDelete) => {
                                            if (willDelete) {

                                                $.ajax({
                                                    method: "POST",
                                                    dataType: "JSON",
                                                    data: {
                                                        action: "unverifyDoctor",
                                                        id,
                                                        unverify
                                                    },
                                                    url: "../Api/doctor.api.php",
                                                    beforeSend: () => {
                                                        $('.loading-area').html(` <div class="d-flex align-items-center">
                <strong>UnVerifying.....</strong>
                <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
            </div>`);
                                                        $('Button.unverify').attr("disabled", true);

                                                    },
                                                    success: (res) => {
                                                        $('.loading-area').html("")
                                                        $('Button.unverify').attr("disabled", false);
                                                        console.log(res);
                                                        readAll();
                                                        displayToast("Doctor Unverified Successfully 🔥", "success", 2000);

                                                    },
                                                    error: (err) => {
                                                        console.log(err);
                                                    }
                                                })

                                            } else {
                                                // swal("Your imaginary file is safe!");
                                            }
                                        });

                                    // end

                                });
                                $(document).on('click', "Button.verify", function() {
                                    id = $(this).attr('verID');
                                    verify = "YES";

                                    swal({
                                            title: "Verify This Doctor?",

                                            icon: "warning",
                                            buttons: true,
                                            dangerMode: true,
                                        })
                                        .then((willDelete) => {
                                            if (willDelete) {
                                                $.ajax({
                                                    method: "POST",
                                                    dataType: "JSON",
                                                    data: {
                                                        action: "verifyDoctor",
                                                        id,
                                                        verify
                                                    },
                                                    url: "../Api/doctor.api.php",
                                                    beforeSend: () => {
                                                        $('.loading-area').html(` <div class="d-flex align-items-center">
                <strong>Verifying.....</strong>
                <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
            </div>`);
                                                        $('Button.unverify').attr("disabled", true);

                                                    },
                                                    success: (res) => {
                                                        $('.loading-area').html("")
                                                        $('Button.unverify').attr("disabled", false);
                                                        console.log(res);
                                                        readAll();
                                                        displayToast("Doctor Verified Successfully 🔥", "success", 2000);

                                                    },
                                                    error: (err) => {
                                                        console.log(err);
                                                    }
                                                });

                                            } else {
                                                // swal("Your imaginary file is safe!");
                                            }
                                        });
                                    // END


                                })

                                $(document).on('click', "a.deleteButton", function() {
                                    id = $(this).attr('delID');

                                    swal({
                                            title: "Are you sure?",
                                            text: "Once deleted, you will not be able to recover this Data!",
                                            icon: "warning",
                                            buttons: true,
                                            dangerMode: true,
                                        })
                                        .then((willDelete) => {
                                            if (willDelete) {
                                                $.ajax({
                                                    method: "POST",
                                                    data: {
                                                        "id": id,
                                                        "action": "deleteDoctor"
                                                    },
                                                    url: "../Api/doctor.api.php",
                                                    success: (res) => {
                                                        swal("Data Has Been removed!", {
                                                            icon: "success",
                                                        });
                                                        readAll();
                                                    },
                                                    error: (res) => {
                                                        console.log(res)
                                                    }

                                                })

                                            } else {
                                                // swal("Your imaginary file is safe!");
                                            }
                                        });

                                })


                                function readHospitalDoctors(hospital_id) {
                                    $.ajax({
                                        method: "POST",
                                        dataType: "JSON",
                                        data: {
                                            action: "readSpecificHospitalDoctors",
                                            id: hospital_id
                                        },
                                        url: "../Api/doctor.api.php",
                                        success: function(res) {
                                            console.log(res);
                                            var {
                                                data
                                            } = res;
                                            if (data.length == 0) {
                                                $(
                                                    '.no-data').html(`
                                
                                <div class='alert alert-danger'>
                                <strong>No Data Found based on Specified Hospital</strong>
                                </div>
                                
                                `)
                                                // return;
                                            } else if (data.length != 0)
                                                $(
                                                    '.no-data').html("")

                                            displayDoctorsIntoTable(data)

                                        },
                                        error: (error) => {
                                            console.log(error);
                                        }
                                    })

                                }


                                function readAll() {
                                    $.ajax({
                                        method: "POST",
                                        dataType: "JSON",
                                        data: {
                                            action: "readDoctors"
                                        },
                                        url: "../Api/doctor.api.php",
                                        success: function(res) {
                                            console.log(res);
                                            var {
                                                data
                                            } = res;
                                            displayDoctorsIntoTable(data)

                                        },
                                        error: (error) => {
                                            console.log(error);
                                        }
                                    })

                                }

                                readAll();

                                function displayDoctorsIntoTable(data) {
                                    $('.table tbody').html('');
                                    var tr = "<tr>";
                                    data.forEach(values => {

                                        tr += `<td>${values.dr_id}</td>`;
                                        tr += `<td>${values.name}</td>`;



                                        tr += `<td>${values.mobile}</td>`;

                                        tr += `<td>${values.email}</td>`;
                                        tr += `<td>${values.address}</td>`;

                                        if (values.verified.toLowerCase() == 'no') {
                                            tr += `<td><span>Still Not Verified</span></td>`;
                                        } else {
                                            tr += `<td><span>Verified</span></td>`;
                                        };

                                        tr += `<td>${values.hos_name}</td>`;


                                        tr += "</tr>";
                                    });
                                    $(".table tbody").html(tr);
                                    $(".table").DataTable();
                                }

                                function getHospitalDataForAddingNewDoctor() {
                                    $.ajax({
                                        method: "POST",
                                        dataType: "JSON",
                                        url: "../Api/hospital.api.php",
                                        data: {
                                            action: "readHospital"
                                        },
                                        success: (res) => {
                                            var {
                                                data
                                            } = res;
                                            console.log(data)
                                            // alert(res);
                                            let option = '<option value="" selected>Select Hospital</option>';
                                            data.forEach(values => {
                                                option += `<option value="${values.hospital_id}">${values.hos_name}</option>`;
                                            });


                                            $(".hospital_selection select").html(option);
                                        },
                                        error: (error) => {
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
                                        success: (res) => {
                                            var {
                                                data
                                            } = res;
                                            console.log(data)
                                            // alert(res);
                                            let option = '<option value="" selected>Select Proffision</option>';

                                            data.forEach(values => {
                                                option += `<option value="${values.pro_id}">${values.name}</option>`;
                                            });


                                            $(".proffision_selection select").html(option);
                                        },
                                        error: (error) => {
                                            console.log(error);
                                        }
                                    })

                                }
                                const fetchDoctorData = (id, response) => {
                                    $.ajax({
                                        method: "POST",
                                        dataType: "JSON",
                                        data: {
                                            "action": "fetchingOne",
                                            id: id
                                        },
                                        url: "../Api/doctor.api.php",
                                        success: (res) => {
                                            response(res)
                                            console.log(res)
                                        },
                                        error: (res) => {
                                            console.log(res)
                                        },
                                    })
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

                                function clearInputData(...inputs) {
                                    inputs.forEach(input => {
                                        input.val("");
                                    })
                                }
                            }

                        )
                    </script>