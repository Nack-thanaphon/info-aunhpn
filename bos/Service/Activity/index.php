<?php

require_once  "../../database/connect.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $json = array();
    $query = "SELECT * FROM tbl_events ORDER BY id";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $eventArray = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($eventArray, $row);
    }
    echo json_encode($eventArray);
}