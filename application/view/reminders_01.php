<?php
include_once "../include/session.php";
include_once "../include/permission.auth.php";

Permission::checkAuthPermissionSource("admin");
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
                    <h4>All Reminders</h4>
                    <span class="ml-1">Manage User Reminders For Appointments</span>
                </div>
            </div>

        </div>
        <!-- row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-light border-0" style='border-radius: 18px; box-shadow: -1px 1px 53px -1px rgba(206,206,206,0.75);
-webkit-box-shadow: -1px 1px 53px -1px rgba(206,206,206,0.75);
-moz-box-shadow: -1px 1px 53px -1px rgba(206,206,206,0.75);'>
                    <div class="card-header border-0">
                        <h5>Reminders</h5>
                        <button id="addNew" data-toggle="modal" data-target="#exampleModal" class="btn btn-success float-right add">Add New</button>
                    </div>
                    <div class="card-block table-border-style p-3">
                        <div class="table-responsive">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>user</th>



                                        <th>title</th>
                                        <th>read</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>

                            </table>
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






<div class="modal fade diagnoseModal" tabindex="-1" aria-labelledby="exampleModalLabel">
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add/Edit Symptom</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning fade show confirm-alert mb-2" hidden role="alert">
                    <strong>Please confirm before making changes to the special name (other)</strong>
                    <br>
                    <button type="button" class="btn btn-danger continue">
                        Accept Changes
                    </button>
                    <button type="button" class="btn btn-success cancel">
                        Cancel Changes
                    </button>
                </div>
                <form>
                    <div class="mb-3">

                        <input type="text" class="form-control name border-danger" placeholder="Symptom name (example: madax xanuun)" id="recipient-name">
                    </div>
                    <div class="mb-3">

                        <input type="text" class="form-control description" placeholder="You Can optionally add one-line description" id="recipient-name">
                        <label for="" class='mx-1 my-1'>[Optional]</label>

                    </div>
                    <div class="mb-3">


                        <input type="text" hidden class="form-control id" id="recipient-name">
                        <input type="text" hidden class="form-control special" id="recipient-name">
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


<div class="modal fade reminder-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-lg bounceInLeft" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLongTitle">
                    Config Reminder Message
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-2">
                <div class="my-2">
                    <label for="">Patient</label>
                    <select name="" id="" class="form-select patients">
                        <option value="">Select</option>
                    </select>
                </div>
                <div class="my-2">
                    <label for="">Which Appointment</label>
                    <select name="" id="" class="form-select appointment_id">
                        <option value="">Select</option>
                    </select>
                </div>
                <div class="my-2">
                    <label for="">Title [Optional]</label>
                    <input type="text" name="" value="Reminder" id="title" class="form-control title">
                </div>

                <div class="my-2">
                    <label for="">message *</label>
                    <textarea name="" id="" placeholder="Message Description (required)" cols="5" rows="6" class="message form-control"></textarea>
                </div>
                <div class="my-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input sendEmail" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Send Email Instead Of Reminder!</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-success configure">configure</button>
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
<script src="../js/utils.js"></script>

<script src='../js/jquery-3.3.1.min.js'></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
<script src="../iziToast-master/dist/js/iziToast.js"></script>
<script src="../iziToast-master/dist/js/iziToast.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(() => {

        $(".patients").change(() => {
            if ($(".patients").val() == "") {
                var option = "<option value=''>Select</option>"
                $('.appointment_id').html(option);
                return;
            }


            fetchAndFill($(".patients").val(), res => {
                var {
                    data,
                    hasData
                } = res;
                var option = "<option value=''>Select</option>"
                if (hasData) {
                    $(".appointment_id").attr("disabled", false);
                    data.forEach(value => {
                        option += `<option value='${value.appo_id}'>${value.appo_date}</option>`;
                    })
                    $(".appointment_id").html(option);
                } else {
                    var option = "<option value=''>No active Appointments For the selected patient</option>"
                    $(".appointment_id").attr("disabled", true);
                    $(".appointment_id").html(option);
                }
            });

        })

        var canSend = false;
        $('.sendEmail').on("change", (e) => {
            canSend = e.target.checked;
            console.log(e.target.checked)
        })

        $(".add").click(function() {
            $(".appointment_id").attr("disabled", false);

            option = `<option value=''>Select</option>`;

            $(".appointment_id").html(option);
            $(".sendEmail").prop("disabled", false);
            $(".sendEmail").prop("checked", false);
            $(".reminder-modal").modal("show")
            $(".configure").text("configure");
            $('.sendEmail').attr("checked", false);
            canSend = false;
            $(".title").val("Reminder"),
                clearInputData(
                    $(".message"),

                    $(".patients").val(""),
                    $(".appointment_id").val("")
                );
        });

        const readSelections = (from, response) => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    "action": "readSelections",
                    from: from
                },
                url: "../Api/appointments.api.php",
                success: (res) => {
                    response(res)
                },
                error: (err) => {
                    console.log(err)
                }

            })
        }

        function fetchAndFill(id, response) {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    "action": "readPatientAppointmentData",
                    id: id
                },
                url: "../Api/appointments.api.php",
                beforeSend: () => {
                    $(".appointment_id").attr("disabled", false);
                    var option = "<option value=''>Fetching..</option>"
                    $(".appointment_id").html(option);
                },
                success: (res) => {
                    response(res)
                },
                error: (err) => {
                    console.log(err)
                }

            })
        }
        const validateReminderWithAppointment = (patient, appointment, response) => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    "action": "validateReminderWithAppointment",
                    pat_id: patient,
                    appo_id: appointment,
                },
                url: "../Api/appointments.api.php",
                success: (res) => {
                    response(res)
                },
                error: (err) => {
                    console.log(err)
                }

            })
        }
        readSelections("patients", (response) => {
            var {
                data,
                hasData
            } = response;
            var option = "<option value=''>Select</option>"
            if (hasData) {
                $(".patients").attr("disabled", false);
                data.forEach(value => {
                    option += `<option value='${value.pat_id}'>${value.name}</option>`;
                })
                $(".patients").html(option);
            } else {
                var option = "<option value=''>No Patients Found!</option>"
                $(".patients").attr("disabled", true);
                $(".patients").html(option);
            }


        })
        // readSelections("appointment", (response) => {
        //     var {
        //         data,
        //         hasData
        //     } = response;
        //     var option = "<option value=''>Select</option>"
        //     if (hasData) {
        //         $(".appointment_id").attr("disabled", false);
        //         data.forEach(value => {
        //             option += `<option value='${value.appo_id}'>${value.appo_date}</option>`;
        //         })
        //         $(".appointment_id").html(option);
        //     } else {
        //         var option = "<option value=''>No active Appointments</option>"
        //         $(".appointment_id").attr("disabled", true);
        //         $(".appointment_id").html(option);
        //     }


        // })

        const readReminders = () => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    "action": "readReminders"
                },
                url: "../Api/appointments.api.php",
                success: (res) => {
                    var tr = "<tr>"
                    var {
                        data,
                        hasData
                    } = res;
                    console.log(data)
                    if (!hasData) {
                        $(".table tbody").html("")
                        return
                    }
                    data.forEach(value => {
                        tr += `<td>${value.id}</td>`
                        tr += `<td>${value.name}</td>`

                        tr += `<td>${value.title}</td>`

                        if (value.isRead.toLowerCase() == "true")
                            tr += `<td class='text-success fw-bold'>${value.isRead}</td>`
                        else
                            tr += `<td class='text-danger fw-bold'>${value.isRead}</td>`

                        tr += `<td><a class='btn btn-success editButton text-light fw-bold' editID=${value.id}}>Edit</a>
                      <a class='btn btn-danger deleteReminder text-light fw-bold' delID=${value.id}>Delete</a></td>`
                        tr += '</tr>'

                        console.log(value)
                    })
                    $(".table tbody").html(tr)
                    $(".table").DataTable()
                    console.log(tr)



                },
                error: (err) => {
                    console.log(err)
                }

            })
        }
        readReminders()
        const findSpecificReminder = (data, response) => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: data,
                url: "../Api/appointments.api.php",
                beforeSend: () => {
                    $(".configure").attr("disabled", true);
                },
                success: (res) => {
                    $(".configure").attr("disabled", false);
                    response(res)
                },
                error: (res) => {
                    displayToast(res.responseText, "error", 5000);
                    $(".configure").attr("disabled", false);
                    console.log(res)
                }
            })
        }
        const isNotValidReminderMethod = (value) => {
            return value.toLowerCase() == "call" || value.toLowerCase() == "none" || value.toLowerCase() == "email"
        }


        $(".configure").click(() => {

            if ($(".message").val() == "" || $(".patients").val() == "" || $(".appointment_id").val() == "") {
                displayToast("Fill Required Fields", "error", 3000);
                return;
            }

            if ($(".configure").text().toLowerCase() == "configure") {
                // check matching validation
                validateReminderWithAppointment($(".patients").val(), $(".appointment_id").val(), res => {

                    if (res.hasData) {

                        // reminder method checker
                        var isNotValidMethod = isNotValidReminderMethod(res.data[0].reminder);
                        if (isNotValidMethod) {
                            swal("Configuration Error", "Configuring the reminder method is unavailable for [call, none and email].To call the patient, simply view the mobile number.To send an email, tick the box provided below.",
                                "error");
                            return;
                        }
                        // email sending checker
                        if (canSend) {
                            var data = {
                                "title": $(".title").val(),
                                "message": $(".message").val(),
                                user_id: $(".patients").val(),
                                action: "sendEmailPatch"
                            }
                            $.ajax({
                                method: "POST",
                                dataType: "JSON",
                                data: data,
                                url: "../Api/appointments.api.php",
                                beforeSend: () => {
                                    $(".configure").attr("disabled", true);
                                },
                                success: (res) => {
                                    $(".configure").attr("disabled", false);
                                    if (res.error != "") {
                                        displayToast(res.error, "error", 4000);
                                        return;
                                    }
                                    displayToast("Email Was Sent To the Selected Patient", "success", 4000);
                                    $('.reminder-modal').modal("hide");
                                    readReminders();
                                },
                                error: (res) => {
                                    $(".configure").attr("disabled", false);
                                    displayToast(res.responseText, "error", 5000);
                                    console.log(res)
                                }
                            })

                        } else {
                            var data = {
                                "title": $(".title").val(),
                                "message": $(".message").val(),
                                appo_id: $(".appointment_id").val(),
                                user_id: $(".patients").val(),
                                action: "configureReminder"
                            }
                            findSpecificReminder({
                                user_id: $(".patients").val(),
                                appo_id: $(".appointment_id").val(),
                                action: "findReminderData"
                            }, res => {
                                $(".configure").attr("disabled", false);
                                if (res.hasData) {
                                    displayToast("Reminder with this appointment and patient has already created", "error", 4000);
                                    return;
                                }
                                $.ajax({
                                    method: "POST",
                                    dataType: "JSON",
                                    data: data,
                                    url: "../Api/appointments.api.php",
                                    beforeSend: () => {
                                        $(".configure").attr("disabled", true);
                                    },
                                    success: (res) => {
                                        $(".configure").attr("disabled", false);
                                        displayToast("Reminder Configured", "success", 4000);
                                        $('.reminder-modal').modal("hide");
                                        readReminders();
                                    },
                                    error: (res) => {
                                        $(".configure").attr("disabled", false);
                                        displayToast(res.responseText, "error", 5000);
                                        console.log(res)
                                    }
                                })
                            })
                        }

                    } else {
                        swal("Matching Error", "There are no appointments scheduled for the chosen date or the specific appointment for this patient.", "error");
                    }
                })


            } else {
                // validating matching parameters
                validateReminderWithAppointment($(".patients").val(), $(".appointment_id").val(), res => {
                    if (res.hasData) {
                        // if it has data (matching coorect)
                        var isNotValidMethod = isNotValidReminderMethod(res.data[0].reminder);
                        if (isNotValidMethod) {
                            // if it has not valid eminder method
                            swal("Configuration Error", "Configuring the reminder method is unavailable for [call, none and email].To call the patient, simply view the mobile number.To send an email, tick the box provided below.",
                                "error");
                            return;
                        } else {
                            //if it has valid
                            // updation process
                            var data = {
                                "title": $(".title").val(),
                                "message": $(".message").val(),
                                appo_id: $(".appointment_id").val(),
                                user_id: $(".patients").val(),
                                action: "updateReminder"
                            }
                            $.ajax({
                                method: "POST",
                                dataType: "JSON",
                                data: data,
                                url: "../Api/appointments.api.php",
                                beforeSend: () => {
                                    $(".configure").attr("disabled", true);
                                },
                                success: (res) => {
                                    $(".configure").attr("disabled", false);
                                    displayToast("Reminder Updated", "success", 4000);
                                    $('.reminder-modal').modal("hide");
                                    readReminders();
                                },
                                error: (res) => {
                                    $(".configure").attr("disabled", false);
                                    displayToast(res.responseText, "error", 5000);
                                    console.log(res)
                                }
                            })
                        }

                    } else {
                        swal("Matching Error", "There are no appointments scheduled for the chosen date or the specific appointment for this patient.", "error");
                    }

                })


            }
        })

        const fetchReminderData = (id) => {

            $.ajax({
                method: "POST",
                dataType: "JSON",
                data: {
                    "action": "fetchReminderData",
                    id: id
                },
                url: "../Api/appointments.api.php",
                success: (main_response) => {
                    fetchAndFill(main_response.data[0].user, res => {
                        var {
                            data,
                            hasData
                        } = res;
                        var option = "<option value=''>Select</option>"
                        if (hasData) {
                            $(".appointment_id").attr("disabled", false);
                            data.forEach(value => {
                                option += `<option value='${value.appo_id}'>${value.appo_date} - ${value.appo_id}</option>`;
                            })
                            $(".appointment_id").html(option);

                            // run other things
                            $(".sendEmail").attr("disabled", true);
                            $(".sendEmail").prop("checked", false);
                            // console.log(res)
                            $('.patients').val(main_response.data[0].user)
                            $('.appointment_id').val(main_response.data[0].appo_id)
                            $('.title').val(main_response.data[0].title)
                            $('.message').val(main_response.data[0].message)
                            $('.id').val(main_response.data[0].id)
                            $('.configure').text("Edit")
                            $(".reminder-modal").modal("show")


                        } else {
                            var option = "<option value=''>No active Appointments For the selected patient</option>"
                            $(".appointment_id").attr("disabled", true);
                            $(".appointment_id").html(option);
                            $(".sendEmail").attr("disabled", true);
                            $(".sendEmail").prop("checked", false);

                            $('.patients').val(main_response.data[0].user)
                            // $('.appointment_id').val(main_response.data[0].appo_id)
                            $('.title').val(main_response.data[0].title)
                            $('.message').val(main_response.data[0].message)
                            $('.id').val(main_response.data[0].id)
                            $('.configure').text("Edit")
                            $(".reminder-modal").modal("show")
                        }
                    });




                },

                error: (res) => {
                    console.log("there is ", res)
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



        $(document).on("click", "a.editButton", function() {
            var id = $(this).attr('editID')

            fetchReminderData(id)

        })

        function clearInputData(...inputs) {
            inputs.forEach(input => {
                input.val("");
            })
        }
        $(document).on("click", "a.deleteReminder", function() {
            var id = $(this).attr('delID')
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
                                "action": "deleteReminder"
                            },
                            url: "../Api/appointments.api.php",
                            success: (res) => {
                                swal("Data Has Been removed!", {
                                    icon: "success",
                                });
                                readReminders();
                            },
                            error: (res) => {
                                console.log(res)
                                displayToast("There is an error during deletion process", "error", 4000);
                            }

                        })

                    } else {
                        // swal("Your imaginary file is safe!");
                    }
                });

        })


    })
</script>