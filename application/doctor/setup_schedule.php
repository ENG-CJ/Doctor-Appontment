<?php
include_once "../include/session.php";
include_once "../include/permission.auth.php";

Permission::checkAuthPermissionSource("doctor");
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

        </div>
        <!-- row -->
        <div class="message-handler">

        </div>

        <h6>Create or Setup New Schedule </h6>
        <p class='text-muted'>This Schedule Will Be Available On Public </p>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>NOTE- </strong>It is not possible to create a schedule with the same date for a specific doctor. Each doctor can only have one schedule on any given date.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-block table-border-style p-3">
                        <div class="row">
                            <!-- <div class="col-6">
                                <label for="">Doctor</label>
                                <select name="" id="" class="form-control doctors">
                                    <option value="">Select Doctor</option>
                                </select>
                            </div> -->
                            <div class="col-12">
                                <label for="">Schedule Date</label>
                                <input type="date" name="" id="" class='form-control date'>
                            </div>
                            <div class="col-6 mt-4">
                                <label for="">From time </label>
                                <input type="time" name="" id="" class='form-control from_time'>
                            </div>
                            <div class="col-6 mt-4">
                                <label for="">To time </label>
                                <input type="time" name="" id="" class='form-control to_time'>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="">Range Number (How Many Patients Are Allowed)</label>
                                <input type="number" name="" id="" class='form-control range'>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="">Duration in minutes</label>
                                <input type="number" name="" placeholder="duration in minutes" maxlength="2" min="10" max="90" value="20" id="" class='form-control duration'>
                                <label for="" class="text-muted">default 20m</label>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="">Card Price $</label>
                                <input type="number" name="" id="" placeholder="Price is dollar" maxlength="2" min="10" max="50" value="10" class='form-control price'>
                                <label for="" class="text-muted">default $10</label>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="">Available (default yes)</label>
                                <input type="text" disabled value='yes' name="" id="" class='form-control available'>
                                <p class='text-danger text-muted'> Yes, Means This schedule Will be available on public.</p>
                            </div>
                            <div class="col-12 mt-4">
                                <button class='btn btn-success create'>Create</button>
                                <button class='btn btn-primary back'>Back</button>
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
        const validateSchedule = (date, response) => {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/schedule.api.php",
                data: {
                    action: "validateSchedule",
                    dr: $('.doctors').val(),
                    date: date
                },
                success: (res) => {
                    response(res)

                },
                error: (res) => {
                    console.log(res)
                    displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }
        $('.back').click(() => window.location.href = "./schedule.php")
        $(".create").click(() => {

            if ($(".date").val() == "" || $(".from_time").val() == "" || $('.to_time').val() == "" ||
                $(".duration").val() == "" || $('.price').val() == "" || $(".range").val() == "") {
                displayToast("All fields are required.", "error", 4000)
                return;
            }



            if (parseInt($('.duration').val()) > 90 || parseInt($('.duration').val()) < 10) {
                displayToast("duration must be anywhere between 10 and 90 minutes.", "error", 4000)
                return;
            }
            if (parseInt($('.price').val()) > 50 || parseInt($('.price').val()) < 0) {
                displayToast("price must be vary between $0 and $50.", "error", 4000)
                return;
            }

            var data = {
                // dr_id: $(".doctors").val(),
                fromTime: formatTime($(".from_time").val()),
                toTime: formatTime($(".to_time").val()),
                date: $(".date").val(),
                range: $(".range").val(),
                available: "yes",
                price: $('.price').val(),
                duration: $('.duration').val(),
                action: "createSchedule"

            }
            validateSchedule($(".date").val(), res => {
                if (res.data.length > 0) {
                    swal("Oops!", "The selected date already has an existing  schedule.", "error", {
                        icon: "error"
                    })
                } else {
                    $.ajax({
                        method: "POST",
                        dataType: "JSON",
                        url: "../Api/schedule.api.php",
                        data: data,
                        success: (res) => {
                            displayToast(res.message, "success", 4000)
                        },
                        error: (res) => {
                            console.log(res)
                            displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                        }
                    })
                }
            })



        });

        function loadDoctors() {
            $.ajax({
                method: "POST",
                dataType: "JSON",
                url: "../Api/schedule.api.php",
                data: {
                    action: "loadDoctors",
                },
                success: (res) => {
                    console.log(res)

                    var htmlOptions = "<option value=''>Select Doctor</option>"
                    res.data.forEach(value => {
                        htmlOptions += `<option value='${value.dr_id}'>${value.name}</option>`
                    })
                    $(".doctors").html(htmlOptions)
                },
                error: (res) => {
                    console.log(res)
                    // displayToast("Internal Server Error Ocurred 🤷‍♂😢️", "error", 2000);
                }
            })
        }
        loadDoctors()

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
        }

        function getTimePeriod(time) {
            if (parseInt(time) < 12)
                return "AM";
            return "PM";
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