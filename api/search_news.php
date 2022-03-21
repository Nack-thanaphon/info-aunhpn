<?php


include "../database/connect.php";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $query = " SELECT * FROM tbl_news WHERE n_status = '1'";

    if (isset($_POST["month"])) {
        $brand_filter = implode("','", $_POST["month"]);
        $query .= " AND n_name IN('" . $brand_filter . "')";
    }



    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $total_row = $statement->rowCount();
    $output = '';
    if ($total_row > 0) {
        foreach ($result as $row) {
            $output .= '
       <div class="col-sm-4 col-lg-3 col-md-3">
        <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
     
         <p align="center"><strong><a href="#">' . $row['n_name'] . '</a></strong></p>
         <h4 style="text-align:center;" class="text-danger" >' . $row['n_detail'] . '</h4>
        
        </div>
    
       </div>
       ';
        }
    } else {
        $output = '<h3>No Data Found</h3>';
    }
    echo $output;
}