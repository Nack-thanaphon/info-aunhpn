<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');

include "../../database/connect.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $statement = $conn->prepare("INSERT INTO tbl_events (title,e_detail,e_address,e_file,start,end,time_start,time_end) 
    VALUES (:title,:e_detail,:e_address,:e_file,:start,:end,:time_start,:time_end)");
    $result = $statement->execute(
        array(

            ':title' => $_POST["e_name"],
            ':e_detail' => $_POST["e_detail"],
            ':e_address' => $_POST["e_address"],
            ':e_file' => $_POST["e_name"],
            ':start' => $_POST["start"],
            ':end'  => $_POST['end'],
            ':time_start'  => $_POST['s_time'],
            ':time_end' => $_POST['e_time'],

        )
    );
    $response = [
        'status' => true,
        'message' => 'Create Success'
    ];
}
http_response_code(201);
echo json_encode($response);