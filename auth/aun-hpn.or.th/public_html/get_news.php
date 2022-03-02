<?php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400');

include "../database/connect.php";


function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}


if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $select_stmt = $conn->prepare("SELECT * FROM tbl_news INNER JOIN  tbl_news_type ON  tbl_news_type.n_type_id = tbl_news.n_type WHERE n_status = '1'");
    $select_stmt->execute();

    $response = array();
    $response['result'] = array();

    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);


        $bg = ($row["create_at"]);
        $date = DateThai($bg);

        $data_items = array(
            "id" => $n_id,
            "name" => $n_name,
            "type" => $n_type,
            "detail" => $n_detail,
            "url" => $url,
            "slug" => $slug,
            "image" => $n_image,
            "date" => $date,
        );
        array_push($response['result'], $data_items);
    }
    echo json_encode($response);
    http_response_code(200);
} else {
    http_response_code(405);
}