<?php
include_once '../config/conn.db.php';
include_once './delivery_email.php';
// header ("Content-type: application/json");
$action = $_POST['action'];

class Appointment extends DatabaseConnection
{
    public function getNumberOfAppointments($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT * FROM appointment
WHERE appo_date='$date' AND dr_id='$dr_id' AND status!='complete'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("status" => true, "rows" => mysqli_num_rows($result));
            }
        }
        echo json_encode($response);
    }
    public function getSpecificPatient($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT * FROM appointment
WHERE appo_date='$date' AND pat_id='$pat_id' AND dr_id='$dr' AND status!='complete'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("status" => true, "rows" => mysqli_num_rows($result));
            }
        }
        echo json_encode($response);
    }
    public function loadAppointmentsForPatient($conn)
    {
        extract($_POST);
        session_start();
        $current_user=$_SESSION['user_id'];
        $response = array();
        $data = array();
        $sql = "SELECT appo_id,appo_date,diagnose.name as diagnose,doctors.name as doctor,
        appointment.status, appointment.symptom_description FROM appointment
JOIN doctors
on doctors.dr_id=appointment.dr_id
JOIN diagnose on appointment.diagnose_id=diagnose.diganose_id
WHERE appointment.pat_id='$current_user'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc())
                    $data[] = $rows;
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }
    public function fetchAppointment($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT *FROM appointment where appo_id='$id'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc())
                    $data[] = $rows;
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }
    public function fetchReminderData($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT *FROM reminder where id='$id'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc())
                    $data[] = $rows;
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }
    public function makeReview($conn)
    {
        extract($_POST);
        $response = array();
        session_start();
        $current_id=$_SESSION['user_id'];
        $data = array();
        $sql = "INSERT INTO reviews(`review`,`dr_id`,`pat_id`,`appo_id`,`description`) VALUES('$review','$id','$current_id','$appo_id','$description')";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {

                $response = array("status" => true, "message" => "Thanks For Reviewing. ");
            }
        }
        echo json_encode($response);
    }
    public function validateReview($conn)
    {
        extract($_POST);
        $response = array();
        session_start();
        $current_id = $_SESSION['user_id'];
        $data = array();
        $sql = "SELECT *FROM reviews where pat_id='$current_id ' AND appo_id='$appo_id'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                if ($result) {
                    while ($rows = $result->fetch_assoc())
                        $data[] = $rows;
                    $response = array("status" => true, "data" => $data);
                }
            }
        }
        echo json_encode($response);
    }
    public function countReviews($conn)
    {
        extract($_POST);
        $response = array();

        $sql_1 = "SELECT COUNT(*) as unsatisfied FROM `reviews` WHERE review='unsatisfied' AND dr_id='$dr_id';";
        $sql_2 = "SELECT COUNT(*) as satisfied FROM `reviews` WHERE review='satisfied' AND dr_id='$dr_id';";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql_1);
            if ($result) {
                $result2 = $conn->query($sql_2);
                if ($result2) {
                    $row_1 = $result->fetch_assoc();
                    $row_2 = $result2->fetch_assoc();

                    $response = array("status" => true, "satisfied" => $row_2['satisfied'], "unsatisfied" => $row_1['unsatisfied']);
                }
            }
        }
        echo json_encode($response);
    }
    public function loadDescriptions($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT description FROM reviews where `dr_id`='$dr_id' LIMIT 4;";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc())
                    $data[] = $rows;
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }
    public function getCardPriceAndTiming($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT card_price,duration FROM schedules where `date`='$date' AND dr_id='$dr';";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc())
                    $data[] = $rows;
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }
    public function activeAppointments($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT appo_date as Date,appointment.status FROM appointment
WHERE appointment.dr_id=4 AND status='inprogress';";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc())
                    $data[] = $rows;
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }
    public function loadAppointmentsForDoctor($conn)
    {
        session_start();
        $id = $_SESSION['USER_ID'];
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT appo_id,appo_date,status,created_at,diagnose.diganose_id,diagnose.name as diagnose,diagnose.description, patients.name as patient,patients.gender,patients.mobile FROM appointment
JOIN patients
ON appointment.pat_id=patients.pat_id
JOIN diagnose
ON appointment.diagnose_id=diagnose.diganose_id
WHERE appointment.dr_id='$id';";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc())
                    $data[] = $rows;
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }
    public function loadAppointmentsForAdmin($conn)
    {
        // session_start();
        // $id = $_SESSION['USER_ID'];
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT reminder,appo_id,appo_date,status,created_at,diagnose.diganose_id,diagnose.name as diagnose,diagnose.description, patients.pat_id,patients.name as patient,patients.gender,patients.mobile, doctors.name as doctor,doctors.profile_image FROM appointment
JOIN patients
ON appointment.pat_id=patients.pat_id
JOIN diagnose
ON appointment.diagnose_id=diagnose.diganose_id
JOIN doctors
ON appointment.dr_id=doctors.dr_id;";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc())
                    $data[] = $rows;
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }
    public function readEditAppointmentData($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT appointment.appo_id,appointment.appo_date,appointment.diagnose_id,
appointment.dr_id,appointment.symptom_description, appointment.pat_id,appointment.reminder FROM appointment
WHERE appointment.appo_id='$id'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc())
                    $data[] = $rows;
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }
    public function configureReminder($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "INSERT INTO `reminder`(`user`, `appo_id`, `title`, `isRead`, `message`) 
        VALUES ('$user_id','$appo_id','$title','false','$message')";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {

                $response = array("status" => true, "message" => "configured");
            }
        }
        echo json_encode($response);
    }
    public function updateReminder($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "UPDATE `reminder` SET `user`='$user_id', `appo_id`='$appo_id', `title`='$title', `message`='$message'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {

                $response = array("status" => true, "message" => "configured");
            }
        }
        echo json_encode($response);
    }
    public function findReminderData($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT *From reminder where user='$user_id' and appo_id='$appo_id'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc())
                    $data[] = $rows;
                if (count($data) > 0)

                    $response = array("status" => true, "hasData" => true);
                else
                    $response = array("status" => true, "hasData" => false);
            }
        }
        echo json_encode($response);
    }
    public function getReminderData($conn)
    {
        session_start();
        $current_id=$_SESSION['user_id'];
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT *From reminder where user='$current_id' and isRead='false'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc())
                    $data[] = $rows;
                if (count($data) > 0)

                    $response = array("status" => true, "hasData" => true);
                else
                    $response = array("status" => true, "hasData" => false);
            }
        }
        echo json_encode($response);
    }
    public function getRemindersAsList($conn)
    {
        extract($_POST);
        $response = array();
         session_start();
        $current_id=$_SESSION['user_id'];
        $data = array();
        $sql = "SELECT *From reminder where user='$current_id' and isRead='false'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc())
                    $data[] = $rows;
                if (count($data) > 0)

                    $response = array("status" => true, "hasData" => true, "data" => $data);
                else
                    $response = array("status" => true, "hasData" => false);
            }
        }
        echo json_encode($response);
    }
    public function readReminders($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT * From reminder
JOIN patients
ON reminder.user=patients.pat_id";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc())
                    $data[] = $rows;
                if (count($data) > 0)

                    $response = array("status" => true, "hasData" => true, "data" => $data);
                else
                    $response = array("status" => true, "hasData" => false);
            }
        }
        echo json_encode($response);
    }
    public function readReviewsForAdmin($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT proffision.pro_name,reviews.id,reviews.description,doctors.name as drName,doctors.profile_image,doctors.email,doctors.dr_id
FROM reviews
JOIN doctors
ON reviews.dr_id=doctors.dr_id
JOIN proffision
ON doctors.profision_id=proffision.pro_id
";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc())
                    $data[] = $rows;
                if (count($data) > 0)

                    $response = array("status" => true, "hasData" => true, "data" => $data);
                else
                    $response = array("status" => true, "hasData" => false);
            }
        }
        echo json_encode($response);
    }
    public function sendEmailPatch($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $data = Appointment::getUserEmail($user_id, Appointment::getConnection());
        if (count($data) > 0) {
            $mail = new Mail();
            $mail->setFullName($data['name']);
            $mail->setReceiverEmail($data['email']);
            $mail->setMessageContent("<h2>Hi, " . $data['name'] . "</h2> $message.");

            if ($mail->sendEmail()) {
                $response = array("error" => "", "message" => "Email has been sent");
            } else
                $response = array("error" => "Failed to send email", "message" => "Email has been sent");
        } else
            $response = array("error" => "This user does not exist, please try again letter", "message" => "Email has been sent");

        echo json_encode($response);
    }
    public function sendEmail($conn)
    {
        extract($_POST);
        $response = array();
     
       
            $mail = new Mail();
            $mail->setFullName($drName);
            $mail->setReceiverEmail($email);
            $mail->setMessageContent("<h2>Hi, Dr. $drName </h2> $message.");

            if ($mail->sendEmail()) {
                $response = array("error" => "", "message" => "Email has been sent");
            } else
                $response = array("error" => "Failed to send email", "message" => "Email has been sent");
      

        echo json_encode($response);
    }
    private static function getUserEmail($id, $conn): array
    {
        $userData = [];

        extract($_POST);
        $sql = "SELECT email,name From patients
where pat_id='$id'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                $row = $result->fetch_assoc();
                $userData = ["email" => $row['email'], "name" => $row['name']];
            }
        }
        return $userData;
    }
    public function readSelections($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        if ($from == "appointment")
            $sql = "SELECT appo_id,appo_date From appointment where status='Pending'";
        else
            $sql = "SELECT pat_id,name From patients";

        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc())
                    $data[] = $rows;
                if (count($data) > 0)

                    $response = array("status" => true, "hasData" => true, "data" => $data);
                else
                    $response = array("status" => true, "hasData" => false);
            }
        }
        echo json_encode($response);
    }
    public function updateReminderData($conn)
    {
        session_start();
        $cur=$_SESSION['user_id'];
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "UPDATE reminder SET isRead='true' where user='$cur'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {


                $response = array("status" => true, "message" => "success");
            }
        }
        echo json_encode($response);
    }
    public function readPrintableData($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "CALL readPrintableData('$id')";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc())
                    $data[] = $rows;
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }
    public function makeAppointment($conn)
    {
        extract($_POST);
        $response = array();

        $sql = "INSERT INTO `appointment`(`appo_date`, `diagnose_id`, `symptom_description`, `dr_id`, `pat_id`,`status`,`reminder`) VALUES('$appointment_date','$diagnose','$description','$dr_id','$pat_id','Pending','$reminder')";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("message" => "Doctor successfully created...", "status" => true);
            } else {
                $response = array("error" => " error connection", "Status" => false);
            }
        }

        echo json_encode($response);
    }
    public function makeAppointmentForPatient($conn)
    {
        session_start();
        $pat_id=$_SESSION['user_id'];
        extract($_POST);
        $response = array();

        $sql = "INSERT INTO `appointment`(`appo_date`, `diagnose_id`, `symptom_description`, `dr_id`, `pat_id`,`status`,`reminder`) VALUES('$appointment_date','$diagnose','$description','$dr_id','$pat_id','Pending','$reminder')";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("message" => "Doctor successfully created...", "status" => true);
            } else {
                $response = array("error" => " error connection", "Status" => false);
            }
        }

        echo json_encode($response);
    }
    public function updateAppointment($conn)
    {
        extract($_POST);
        $response = array();

        $sql = "UPDATE `appointment` SET `reminder`='$reminder', `appo_date`='$date',`diagnose_id`='$diagnose',`symptom_description`='$description',`dr_id`='$dr', `pat_id`='$pat_id' WHERE appo_id='$id'";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("message" => "Doctor successfully updated...", "status" => true);
            } else {
                $response = array("error" => " error connection", "Status" => false);
            }
        }

        echo json_encode($response);
    }
    public function updateAppointmentStatus($conn)
    {
        extract($_POST);
        $response = array();

        $sql = "UPDATE `appointment` SET `status`='$status' WHERE appo_id='$id'";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("message" => "Status successfully updated...", "status" => true);
            } else {
                $response = array("error" => " error connection", "Status" => false);
            }
        }

        echo json_encode($response);
    }
    public function deleteAppointment($conn)
    {
        extract($_POST);
        $response = array();

        $sql = "DELETE FROM appointment WHERE appo_id='$id'";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("message" => "appointment has been removed...", "status" => true);
            } else {
                $response = array("error" => " error connection", "Status" => false);
            }
        }

        echo json_encode($response);
    }
    public function deleteReminder($conn)
    {
        extract($_POST);
        $response = array();

        $sql = "DELETE FROM reminder WHERE id='$id'";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("message" => "appointment has been removed...", "status" => true);
            } else {
                $response = array("error" => " error connection", "Status" => false);
            }
        }

        echo json_encode($response);
    }

    public function fetchOne($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "SELECT *from admins where 
        admin_id='$id'";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc()) {
                    $data[] = $rows;
                }
                $res = array("message" => "success", "data" => $data);
            } else {
                $res = array("error" => "there is an error");
            }
        }
        echo json_encode($res);
    }
}

$doctors = new Appointment;

if ($action) {
    $doctors->$action(Appointment::getConnection());
} else
    echo "action is required";
