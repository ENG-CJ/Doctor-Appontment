<?php
include_once("../config/conn.db.php");


class Admin extends DatabaseConnection
{
    public function fetchingOne($conn)
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

    public  function readAdmins($_conn)
    {
        extract($_POST);
        $response = array();
        $data = array();
        session_start();
        $id = $_SESSION['user_id'];

        $sql = "SELECT *FROM admins where admin_id!='$id'";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result) {
                    while ($rows = $result->fetch_assoc()) {
                        $data[] = $rows;
                    }

                    $response = array("error" => "", "status" => true, "data" => $data);
                } else
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
    public  function createAdmin($_conn)
    {
        extract($_POST);
        $response = array();

        $sql = "INSERT into admins(`username`,`email`,`password`,`type`,`status`) VALUES ('$username','$email','$password','admin','$status')";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result)
                    $response = array("message" => "Admin was created..", "status" => true);
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

    public  function deleteAdmin($_conn)
    {
        extract($_POST);
        $response = array();

        $sql = "DELETE FROM admins where admin_id='$id';";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result)
                    $response = array("message" => "Admin was deleted..", "status" => true);
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

    public  function updateAdmin($_conn)
    {
        extract($_POST);
        
        $response = array();

        $sql = "UPDATE admins set username='$username', email='$email', `status`='$status'  where admin_id='$id';";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result)
                    $response = array("message" => "Admin was updated..", "status" => true);
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
    public  function updatePassAdmin($_conn)
    {
        extract($_POST);
        $response = array();
        session_start();
        $id =$_SESSION['user_id'];

        $sql = "UPDATE admins set  `password`='$password'  where admin_id='$id';";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result)
                    $response = array("message" => "Your password has been updated","error"=>"", "status" => true);
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
    public  function updateAdminData($_conn)
    {
        extract($_POST);
        $response = array();
        session_start();
        $id =$_SESSION['user_id'];

        $sql = "UPDATE admins set  `username`='$username',`email`='$email'  where admin_id='$id';";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result)
                    $response = array("message" => "Your Profile Data has been updated","error"=>"", "status" => true);
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
    public  function disableAccount($_conn)
    {
        extract($_POST);
        $response = array();
        session_start();
        $id =$_SESSION['user_id'];

        $sql = "UPDATE admins set  `status`='block'  where admin_id='$id';";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result)
                    $response = array("message" => "Your Profile Data has been updated","error"=>"", "status" => true);
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
        $id =$_SESSION['user_id'];

        $sql = "DELETE FROM admins where admin_id='$id';";
        if (!$_conn)
            $response = array("error" => "There is an error connection ", "status" => false);
        else {
            try {
                $result = $_conn->query($sql);
                if ($result)
                    $response = array("message" => "Your Profile Data has been updated","error"=>"", "status" => true);
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
$admin = new Admin;
// checking
switch ($_POST['action']) {
    case "createAdmin":
        $admin->createAdmin(Admin::getConnection());
        break;
    case "disableAccount":
        $admin->disableAccount(Admin::getConnection());
        break;
    case "deleteOne":
        $admin->deleteOne(Admin::getConnection());
        break;
    case "updateAdminData":
        $admin->updateAdminData(Admin::getConnection());
        break;
    case "updatePassAdmin":
        $admin->updatePassAdmin(Admin::getConnection());
        break;
    case "readAdmins":
        $admin->readAdmins(Admin::getConnection());
        break;

        case "fetchingOne":
            $admin->fetchingOne(Admin::getConnection());
            break;


    case "updateAdmin":
        $admin->updateAdmin(Admin::getConnection());
        break;
    // case "fetchingOne":
    //     $admin->fetchingOne(Admin::getConnection());
    //     break;
    case "deleteAdmin":
        $admin->deleteAdmin(Admin::getConnection());
        break;
    default:
        return;
}
