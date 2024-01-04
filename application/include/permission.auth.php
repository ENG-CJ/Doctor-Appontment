
<?php

class Permission
{

    public static function checkAuthPermissionSource($authType)
    {

        if (empty($authType)) {
            header("Location: ../500.php");
            exit();
        } else if ($authType != $_SESSION['type']) {

            header("Location: ../500.php");
            exit();
        }
    }
}




?>