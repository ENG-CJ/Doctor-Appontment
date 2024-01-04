<?php

include_once("../config/conn.db.php");


class Counters extends DatabaseConnection
{

    public function count($conn)
    {
        extract($_POST);
        $res = array();
        $sql = "SELECT COUNT(*) as counter from $table";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $result = $conn->query($sql);
            if ($result) {
                $row = $result->fetch_assoc();
                $res = array("message" => "success", "rowNumber" => $row['counter']);
            } else {
                $res = array("error" => "there is an error");
            }
        }

        echo json_encode($res);
    }
    public function countDashboardNumbers($conn)
    {
        extract($_POST);
        $res = array();
        session_start();
        $id  = $_SESSION['user_id'];
        if ($getStatus == "yes") {
            $sql = "SELECT COUNT(*) as counter from $table WHERE `status`='$status' AND `dr_id`='$id'";
            if (!$conn)
                $res = array("error" => "there is an error");
            else {
                $result = $conn->query($sql);
                if ($result) {
                    $row = $result->fetch_assoc();
                    $res = array("message" => "success", "rowNumber" => $row['counter']);
                } else {
                    $res = array("error" => "there is an error");
                }
            }
        } else {
            $sql = "SELECT COUNT(*) as counter from $table where dr_id='$id'";
            if (!$conn)
                $res = array("error" => "there is an error");
            else {
                $result = $conn->query($sql);
                if ($result) {
                    $row = $result->fetch_assoc();
                    $res = array("message" => "success", "rowNumber" => $row['counter']);
                } else {
                    $res = array("error" => "there is an error");
                }
            }
        }


        echo json_encode($res);
    }

    public function countReviews($conn)
    {
        extract($_POST);
        $response = array();
        session_start();
        $dr_id = $_SESSION['user_id'];

        $sql = "SELECT reviews.review, COUNT(reviews.review) as number from reviews
WHERE dr_id='$dr_id'
GROUP BY reviews.review
;";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {

                while ($row = $result->fetch_assoc())
                      $data[]=$row;
            $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }
    public function countDiagnoseVisual($conn)
    {
        extract($_POST);
        $response = array();
        session_start();
        $dr_id = $_SESSION['user_id'];

        $sql = "SELECT diagnose.name,COUNT(diagnose.name) as number FROM appointment
JOIN diagnose
ON appointment.diagnose_id=diagnose.diganose_id
WHERE appointment.dr_id='$dr_id'
GROUP BY diagnose.name
;";
        if (!$conn)
            $response = array("error" => "error from database", "status" => false);
        else {
            $result = $conn->query($sql);
            if ($result) {

                while ($row = $result->fetch_assoc())
                      $data[]=$row;
            $response = array("status" => true, "data" => $data);
            }
        }
        echo json_encode($response);
    }

    public function unverifiedDoctors($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "SELECT * FROM `doctors` left JOIN proffision ON doctors.profision_id=proffision.pro_id
                 WHERE  `verified`='No' LIMIT 8";
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
    public function getPendingAppointments($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "CALL readPendingAppointment()";
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
    public function getTodaysSchedule($conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $sql = "CALL readTodaySchedule('$date')";
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


$action = $_POST['action'];
if (isset($action)) {
    $counter = new Counters();
    $counter->$action(Counters::getConnection());
}
