<?php
// include_once '../include/session.php';
include_once "../config/conn.db.php";
include_once './delivery_email.php';

class Auth extends DatabaseConnection
{

    public function validateAuth(mysqli $conn)
    {

        extract($_POST);
        $res = array();
        $data = array();
        $sql = "SELECT *from admins where 
        email='$email' AND password='$pass'";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $result = $conn->query($sql);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    session_start();
                    $row = $result->fetch_assoc();

                    $_SESSION['type'] = $row['type'];
                    $_SESSION['user_id'] = $row['admin_id'];
                    $res = array("message" => "success", "data" => $row, "isFound" => true);
                } else
                    $res = array("message" => "success", "isFound" => false);
            } else {
                $res = array("error" => "there is an error");
            }
        }
        echo json_encode($res);
    }
    public function validateUser(mysqli $conn)
    {

        extract($_POST);
        $res = array();
        $data = array();
        if (strtolower($table) == "admins")
            $sql = "SELECT *FROM $table WHERE email='$email' OR username='$username'";
        else if (strtolower($table) == "hospitals")
            $sql = "SELECT *FROM $table WHERE hos_email='$email' OR main_number='$mobile' OR hos_name='$username'";
        else if (strtolower($table) == "proffision")
            $sql = "SELECT *FROM $table WHERE pro_name='$username'";
        else if (strtolower($table) == "diagnose")
            $sql = "SELECT *FROM $table WHERE name='$username'";
        else
            $sql = "SELECT *FROM $table WHERE email='$email' OR mobile='$mobile'";

        if (!$conn)
            $res = array("error" => "there is an error in the connection");
        else {
            $result = $conn->query($sql);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    // $_SESSION['type']=$sess_rows['type'];
                    while ($rows = $result->fetch_assoc()) {
                        $data[] = $rows;
                    }
                    $res = array("message" => "success", "data" => $data, "isFound" => true);
                } else
                    $res = array("message" => "success", "isFound" => false);
            } else {
                $res = array("error" => "there is an error");
            }
        }
        echo json_encode($res);
    }


    // when making login from different users with different tables
    public function loginType(mysqli $conn)
    {

        extract($_POST);
        $res = array();
        $data = array();
        $sql = "SELECT *from  $table where 
        email='$email' AND password='$pass'";
        if (!$conn)
            $res = array("error" => "there is an error in the connction");
        else {
            $result = $conn->query($sql);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    session_start();
                    $row = $result->fetch_assoc();
                    $_SESSION['type'] = $row['type'];
                    $_SESSION['name'] = $row["name"];
                    if ($table == "patients")
                        $_SESSION['user_id'] = $row['pat_id'];
                    else
                        $_SESSION['user_id'] = $row['dr_id'];

                    $res = array("message" => "success", "data" => $row, "isFound" => true);
                } else
                    $res = array("message" => "success", "isFound" => false);
            } else {
                $res = array("error" => "there is an error in the execution");
            }
        }
        echo json_encode($res);
    }

    public function login(mysqli $conn)
    {
        extract($_POST);
        $res = array();
        $data = array();
        $tables = ['doctors', 'patients'];
        // $sql = "SELECT *from doctors where 
        // name='$name' AND password='$pass'";
        if (!$conn)
            $res = array("error" => "there is an error");
        else {
            $hasFound = false;
            foreach ($tables as $table) {
                $sql = "SELECT name,password,type from $table where 
        name='$name' AND password='$pass'";
                $result = $conn->query($sql);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($rows = $result->fetch_assoc()) {
                            $_SESSION['name'] = $rows['name'];
                            $_SESSION['type'] = $rows['type'];
                            $data[] = $rows;
                            $hasFound = true;
                        }
                        if ($hasFound) {
                            $res = array("message" => "success", "data" => $data, "isFound" => true);
                            return;
                        }
                    } else
                        $res = array("message" => "success", "isFound" => false);
                } else {
                    $res = array("error" => "this is an error");
                }
            };

            echo json_encode($res);
        }
    }

    // when making reset password
    public function emailVer(mysqli $conn)
    {
        extract($_POST);
        $response = array();
        $code = rand(1000, 9999);

        $response = array();
        $sql = "SELECT *FROM $table WHERE email='$email'";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $rows = mysqli_num_rows($result);
                if ($rows > 0) {
                    $row = $result->fetch_assoc();
                    $name = '';
                    if (strtolower($table) == "doctors" || strtolower($table) == "doctor")
                        $name = $row['name'];
                    else if (strtolower($table) == "patients" || strtolower($table) == "patient")
                        $name = $row['name'];
                    else
                        $name = $row['username'];

                    $mail = new Mail();
                    $mail->setFullName($name);
                    $mail->setReceiverEmail($email);
                    $mail->setMessageContent("<h1>Hello " . $name . "</h1> <hr/><h2>Verification Code</h2>The verification code you received is a one-time-use code. Once it has been utilized, it cannot be used again. Your unique verification code is: <h1>$code</h1>");
                    $sent = $mail->sendEmail();
                    if ($sent) {
                        $response = array("code" => $code, "message" => "Check your email, the verification code was sent $email", "error" => "", "isExist" => true, "data" => $row);
                    } else {
                        $response = array("message" => "doesnot sent email");
                    }
                } else
                    $response = array("error" => "invalid Email", "isExist" => false, "data" => "");
            } else {
                $response = array("error" => "there is an error connection", "status" => false);
            }
        }


        echo json_encode($response);
    }

    public function updateUser($conn)
    {
        extract($_POST);
        $response = array();
        $sql = "UPDATE `$table` SET `password`='$password' WHERE email='$email'";
        if (!$conn) {
            $response = array("error" => "there is an error connection", "status" => false);
        } else {
            $result = $conn->query($sql);
            if ($result) {
                $response = array("message" => "User was updated Successfully", "status" => true);
            } else {
                $response = array("error" => "there is an error connection", "status" => false);
            }
        }
        echo json_encode($response);
    }
}




$action = $_POST['action'];
if (isset($action)) {
    $auth = new Auth();
    $auth->$action(Auth::getConnection());
}
