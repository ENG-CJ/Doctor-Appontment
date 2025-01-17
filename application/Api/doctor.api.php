<?php
include_once '../config/conn.db.php';
include './delivery_email.php';
// header ("Content-type: application/json");
$action = $_POST['action'];

class Doctors extends DatabaseConnection
{


    public function readDoctorsHospital($conn)
    {
        $response = array();
        $data = array();
        $sql = "SELECT hospitals.hospital_id as hos_id, doctors.dr_id as drID,
            hospitals.hos_name as hosName, doctors.name as drName, doctors.mobile, doctors.profile_image, 
            proffision.pro_name as pro_name, proffision.pro_id FROM doctors
                        INNER JOIN hospitals
                        ON doctors.hospital_id=hospitals.hospital_id
                        JOIN proffision
                        on doctors.profision_id=proffision.pro_id
                        WHERE doctors.verified='YES'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc()) {
                    $data[] = $rows;
                }
                $response = array("status" => true, "data" => $data);
            }
        }

        echo json_encode($response);
    }
    public function getReviewNumber($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT COUNT(reviews.review) as reviewNumber FROM reviews
WHERE reviews.dr_id='$id'
";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                $rows = $result->fetch_assoc();
                $number = $rows['reviewNumber'];

                $response = array("status" => true, "review" => $number);
            }
        }

        echo json_encode($response);
    }
    public function readSelectedDoctor($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT hospitals.hospital_id as hos_id, doctors.dr_id as drID, doctors.description as drDescription,
            hospitals.hos_name as hosName, doctors.name as drName, doctors.mobile, doctors.profile_image, 
            proffision.pro_name as pro_name, proffision.pro_id FROM doctors
                        INNER JOIN hospitals
                        ON doctors.hospital_id=hospitals.hospital_id
                        JOIN proffision
                        on doctors.profision_id=proffision.pro_id
                        WHERE doctors.verified='YES' AND doctors.dr_id='$dr_id'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc()) {
                    $data[] = $rows;
                }
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }
    public function readScheduleSelectedDoctor($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "SELECT schedules.sch_id,schedules.date,schedules.from_time,
schedules.to_time, schedules.available,schedules.duration,schedules.card_price, doctors.name as drName from schedules
JOIN doctors
ON schedules.dr_id=doctors.dr_id
WHERE doctors.verified='YES' AND schedules.available='yes' AND doctors.dr_id='$dr_id'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc()) {
                    $data[] = $rows;
                }
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }

    public function readDoctors($conn)
    {
        $response = array();
        $data = array();
        $sql = "select * from doctors JOIN hospitals on doctors.hospital_id=hospitals.hospital_id";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc()) {
                    $data[] = $rows;
                }
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }
    public function readSpecificHospitalDoctors($conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        $sql = "select * from doctors JOIN hospitals on doctors.hospital_id=hospitals.hospital_id where doctors.hospital_id='$id'";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {
                while ($rows = $result->fetch_assoc()) {
                    $data[] = $rows;
                }
                $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }
    public function deleteDoctor($conn)
    {
        extract($_POST);
        $response = array();
        $sql = "DELETE FROM doctors WHERE dr_id=$id";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("message" => "Doctor successfully deleted", "status" => true);
            } else {
                $response = array("error" => "there is an error connection", "status" => false);
            }
        }
        echo json_encode($response);
    }

    public function createDoctor($conn)
    {
        extract($_POST);
        $response = array();
        $fileName = $_FILES['profile_image']['name'];
        $ext = explode(".", $fileName)[1];
        $temp = $_FILES['profile_image']['tmp_name'];
        $newName = rand() . "." . $ext;
        $uploadedPath = "../uploads/" . $newName;
        if (move_uploaded_file($temp, $uploadedPath)) {
            $sql = "INSERT INTO `doctors` (`name`, `gender`, `mobile`, `address`, `email`, `password`, `profision_id`, `hospital_id`, `description`, `profile_image`) VALUES ('$name', '$gender', '$mobile', '$address', '$email', '$password', '$proffision_id', '$hospital_id', '$description', '$newName')";
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
        }




        echo json_encode($response);
    }
    public function registerDoctor($conn)
    {
        extract($_POST);
        $response = array();
        $fileName = $_FILES['profile_image']['name'];
        $ext = explode(".", $fileName)[1];
        $temp = $_FILES['profile_image']['tmp_name'];
        $newName = rand() . "." . $ext;
        $uploadedPath = "../uploads/" . $newName;
        if (move_uploaded_file($temp, $uploadedPath)) {
            $sql = "INSERT INTO `doctors` (`name`, `gender`, `mobile`, `address`, `email`, `password`, `profision_id`, `hospital_id`, `description`, `profile_image`) VALUES ('$name', '$gender', '$mobile', '$address', '$email', '$password', '$proffision_id', '$hospital_id', '$description', '$newName')";
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
        } else
            $response = array("error" => "there is an error during uploading", "status" => false);


        echo json_encode($response);
    }



    public function updateDoctor($conn)
    {
        extract($_POST);
        $response = array();
        // UPDATE `doctors` SET `dr_id`='[value-1]',`name`='[value-2]',`gender`='[value-3]',`mobile`='[value-4]',`address`='[value-5]',`email`='[value-6]',`password`='[value-7]',`profision_id`='[value-8]',`hospital_id`='[value-9]',`verified`='[value-10]',`description`='[value-11]',`profile_image`='[value-12]' WHERE 1
        if ($hasProfile == "true") {
            $fileName = $_FILES['profile_image']['name'];
            $ext = explode(".", $fileName)[1];
            $temp = $_FILES['profile_image']['tmp_name'];
            $newName = rand() . "." . $ext;
            $uploadedPath = "../uploads/" . $newName;
            if (move_uploaded_file($temp, $uploadedPath)) {
                $sql = "UPDATE `doctors` SET `name`='$name',`gender`='$gender',`mobile`='$mobile',`address`='$address',`email`='$email',`password`='$password',`profision_id`='$proffision_id',`hospital_id`='$hospital_id',`description`='$description',`profile_image`='$newName' WHERE dr_id='$id'";
                if (!$conn) {
                    $response = array("error" => "there is an error connection", "status" => false);
                } else {
                    $result = $conn->query($sql);
                    if ($result) {
                        $response = array("message" => "Doctor was updated", "status" => true);
                    } else {
                        $response = array("error" => "there is an error connection", "status" => false);
                    }
                }
            }
        } else {
            $sql = "UPDATE `doctors` SET `name`='$name',`gender`='$gender',`mobile`='$mobile',`address`='$address',`email`='$email',`password`='$password',`profision_id`='$profision_id',`hospital_id`='$hospital_id',`description`='$description' WHERE dr_id='$id'";
            if (!$conn) {
                $response = array("error" => "there is an error connection", "status" => false);
            } else {
                $result = $conn->query($sql);
                if ($result) {
                    $response = array("message" => "Doctor was updated", "status" => true);
                } else {
                    $response = array("error" => "there is an error connection", "status" => false);
                }
            }
        }


        echo json_encode($response);
    }
    public function unverifyDoctor($conn)
    {
        extract($_POST);
        $response = array();
        $sql = "UPDATE `doctors` SET `verified`='$unverify' WHERE dr_id='$id'";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("message" => "Doctor is unverified know", "status" => true);
            } else {
                $response = array("error" => "there is an error connection", "status" => false);
            }
        }
        echo json_encode($response);
    }
    public function verifyDoctor($conn)
    {
        extract($_POST);
        $response = array();
        $sql = "UPDATE `doctors` SET `verified`='$verify' WHERE dr_id='$id'";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("message" => "Doctor is verified know ✔", "status" => true);
                $sendEmailMessage = "SELECT name,email from doctors where dr_id='$id';";
                $resultRow = $conn->query($sendEmailMessage);
                if ($resultRow) {

                    $row = $resultRow->fetch_assoc();
                    // echo $row['name'].$row['email'];
                    $mail = new Mail();
                    $mail->setFullName($row['name']);
                    $mail->setReceiverEmail($row['email']);
                    $mail->setMessageContent("<h2>Hello, " .  $row['name'] . "!</h2>
<p style='line-height: 1.7'>Your account has been successfully verified within the Sahal Doctor Appointment system. You are now registered as one of the doctors utilizing the <strong>Sahal Doctor Appointment</strong> system.</p>
");
                    $mail->sendEmail();
                    $response = array("message" => "email is sent bye $row[email] ", "status" => true);
                }
            } else {
                $response = array("error" => "there is an error connection", "status" => false);
            }
        }
        echo json_encode($response);
    }

    public  function updatePass($_conn)
    {
        extract($_POST);
        $response = array();
        session_start();
        $id = $_SESSION['user_id'];

        $sql = "UPDATE doctors set  `password`='$password'  where dr_id='$id';";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result)
                    $response = array("message" => "Your password has been updated", "error" => "", "status" => true);
                else
                    $response = array("error" => "There is an error connection ", "status" => false);
            } catch (Exception $e) {
                $response = array(
                    "error" => "There is an error occured while executing..",
                    "message" => $e->getMessage(),
                    "status" => false
                );
            }
        }

        echo  json_encode($response);
    }
    public  function deleteOne($_conn)
    {
        extract($_POST);
        $response = array();
        session_start();
        $id = $_SESSION['user_id'];

        $sql = "DELETE FROM doctors where dr_id='$id';";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result)
                    $response = array("message" => "Your Profile Data has been updated", "error" => "", "status" => true);
                else
                    $response = array("error" => "There is an error connection ", "status" => false);
            } catch (Exception $e) {
                $response = array(
                    "error" => "There is an error occured while executing..",
                    "message" => $e->getMessage(),
                    "status" => false
                );
            }
        }

        echo  json_encode($response);
    }

    private static function uploadImage(): string
    {
        $file_name = "";
        $fileName = $_FILES['profile']['name'];
        $extension = explode(".", $fileName)[1];
        $tempFolder = $_FILES['profile']['tmp_name'];
        $newName = rand() . "." . $extension;
        $uploadPath = "../uploads/" . $newName;
        if (move_uploaded_file($tempFolder, $uploadPath)) {
            $file_name = $newName;
        }
        return $file_name;
    }
    public  function updateDoctorWithProfile($_conn)
    {
        extract($_POST);
        $response = array();
        session_start();
        $uploadedFile = Doctors::uploadImage();
        $id = $_SESSION['user_id'];
        if ($uploadedFile != "") {
            $sql = "UPDATE doctors set  `name`='$name',`email`='$email', mobile='$mobile', address='$address', profile_image='$uploadedFile'  where dr_id='$id';";
            if (!$_conn)
                $response = array("error" => "There is an error connection ", "status" => false);
            else {
                try {
                    $result = $_conn->query($sql);
                    if ($result)
                        $response = array("message" => "Your Profile Data has been updated", "error" => "", "status" => true);
                    else
                        $response = array("error" => "There is an error connection ", "status" => false);
                } catch (Exception $e) {
                    $response = array(
                        "error" => "There is an error occured while executing..",
                        "message" => $e->getMessage(),
                        "status" => false
                    );
                }
            }
        } else {
            $sql = "UPDATE patients set  `name`='$name',`email`='$email', mobile='$mobile', address='$address', profile_image='$default_profile'  where dr_id='$id';";
            if (!$_conn)
                $response = array("error" => "There is an error connection ", "status" => false);
            else {
                try {
                    $result = $_conn->query($sql);
                    if ($result)
                        $response = array("message" => "Your Profile Data has been updated", "error" => "", "status" => true);
                    else
                        $response = array("error" => "There is an error connection ", "status" => false);
                } catch (Exception $e) {
                    $response = array(
                        "error" => "There is an error occured while executing..",
                        "message" => $e->getMessage(),
                        "status" => false
                    );
                }
            }
        }




        echo  json_encode($response);
    }
    public function fetchingOne($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "select * from doctors JOIN proffision on doctors.profision_id=proffision.pro_id JOIN hospitals on doctors.hospital_id=hospitals.hospital_id where doctors.dr_id='$id'";
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
    public  function updateDoctorData($_conn)
    {
        extract($_POST);
        $response = array();
        session_start();
        $id = $_SESSION['user_id'];

        $sql = "UPDATE doctors set  `name`='$name',`email`='$email', mobile='$mobile', address='$address'  where dr_id='$id';";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result)
                    $response = array("message" => "Your Profile Data has been updated", "error" => "", "status" => true);
                else
                    $response = array("error" => "There is an error connection ", "status" => false);
            } catch (Exception $e) {
                $response = array(
                    "error" => "There is an error occured while executing..",
                    "message" => $e->getMessage(),
                    "status" => false
                );
            }
        }

        echo  json_encode($response);
    }
}
$doctors = new Doctors;

if ($action) {
    $doctors->$action(Doctors::getConnection());
} else
    echo "action is required";
