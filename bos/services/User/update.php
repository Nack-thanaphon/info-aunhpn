<?php
include "../../database/connect.php";


function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET["salt"])) {
        $stmt =  $conn->prepare("SELECT * FROM tbl_user INNER JOIN  tbl_user_role ON  tbl_user_role.user_role_id = tbl_user.user_role_id WHERE salt = '" . $_GET["salt"] . "'");
        $stmt->execute();

        $response = array();
        $response['result'] = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $status = '';
            if ($row["user_status"] == '1') {
                $status = '<span class="badge badge-pill badge-success">กำลังใช้งาน</span>';
            } else {
                $status = '<span class="badge badge-pill badge-danger">ไม่ได้ใช้งาน</span>';
            }

            $data_items = array(
                "id" => $user_id,
                "image" => $user_image,
                "name" => $full_name,
                "username" => $user_name,
                "salt" => $salt,
                "email" => $user_email,
                "date" => $user_create,
                "position" => $user_role_id,
                "position_name" => $user_role,
                "status" => $status,
            );
            array_push($response['result'], $data_items);
        }
        echo json_encode($response);
        http_response_code(200);
    }
} else if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $saltid = $_POST['salt'];
    $fullname = $_POST['fullname'];

    $username = $_POST['username'];
    $email = $_POST['email'];
    $position = $_POST['position'];


    $salt = generateRandomString(10);
    $newpassword = md5($password . $salt);

    $query = " UPDATE tbl_user SET `full_name` = '" . $fullname . "', 
    `user_role_id` = '" . $position . "', 
    `user_name` = '" . $username . "', 
    `user_email` = '" . $email . "'
    WHERE `salt` = '" . $saltid . "' ";

    $stmt = $conn->prepare($query);
    $stmt->execute();

    $items_arr = array();
    $items_arr['result'] = array();

    $items = array(
        "msg" => "success",
        "code" => 200
    );
    array_push($items_arr['result'], $items);
    echo json_encode($items_arr);

    http_response_code(200);
} else {
    http_response_code(405);
}
