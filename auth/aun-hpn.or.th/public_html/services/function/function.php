<?php

function get_visiter($conn)
{
    if (!isset($_COOKIE['visits'])) $_COOKIE['visits'] = 0;
    $visits = $_COOKIE['visits'] + 1;
    if ($visits > 1) {

        $sql = "update tbl_visitor_counter set visitor_counter=visitor_counter+1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
}




function useData()
{ // Change the line below to your timezone!
    date_default_timezone_set('Asia/Manila');
    $date = date('m/d/Y h:i:s a', time());
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    //print json_encode(array('ip' => $ip));

    //echo $date;

    echo json_encode(array(
        'date' => $date,
        'ip' => $ip
    ));
}