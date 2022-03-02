<!DOCTYPE html>
<html lang="en">

<head>

    <!--  -->
    <?php

    include "./database/connect.php";

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        if (isset($_GET["id"])) {
            $stmt =  $conn->prepare("SELECT * FROM tbl_news WHERE n_id = '" . $_GET["id"] . "'");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    ?>

    <?php foreach ($result as $row) : ?>
    <meta property="og:title" content="<?php echo $row['n_name']; ?>">
    <meta property="og:image" content="https://info-mugh.com/bos/<?php echo $row['n_image']; ?>">

    <?php endforeach; ?>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="icon" href="./img/logo/logo.png" />
    <link href="assets/css/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script type="text/javascript"
        src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>

<?php include './template/include/navbar.php'; ?>

<body onload="singlenews();">
    <div class="container">
        <div class="row py-4">
            <div class="col-12 p-0 m-0">
            </div>
            <div class="col-md-9 mx-auto">
                <nav aria-label="">
                    <div class="row">
                        <div class="col-8">
                            <ol class="breadcrumb bg-transparent p-0 my-2">
                                <li class="breadcrumb-item"><a href="./">หน้าหลัก</a></li>
                                <li class="breadcrumb-item"><a href="#">ข่าวสาร</a></li>
                            </ol>
                        </div>
                        <div class="col-4 text-right d-sm-none d-block ">

                        </div>
                    </div>

                </nav>
                <article id="blog-post" class="blog-post">
                    <h3 id="news_title" class="blog-post-title my-3 mx-auto"></h3>
                    <div class="row d-flex justify-space-between">

                        <div class="col-6 col-sm-8">

                            <p class="badge badge-pill badge-primary text-white">
                                <i class="fas fa-calendar-day" aria-hidden="true"></i>
                                January 1, 2022 </i>
                            </p>

                        </div>

                        <div class="col-6 col-sm-4 text-right">
                            <p style="font-size: 0.8rem;">
                                <i class="fas fa-eye" aria-hidden="true">
                                </i> จำนวนผู้อ่าน |</li><b id="news_views"></b> ครั้ง
                            </p>
                        </div>
                        <div class="col-12 col-sm-6 text-right text-sm-left">

                        </div>


                    </div>
                    <div class="col-12 my-2 pb-5 p-0">
                        <div id="news_image" alt=""></div>
                        <div class="col-12 sm-12 w-100 p-0 m-0 mt-5" id="news_detail"></div>
                    </div>
                </article>

                <div class="row p-0 m-0 d-flex justify-content-end ">
                    <a class="view_more " href="./">
                        <h4>Back</h4>
                    </a>
                </div>

            </div>

        </div>


    </div>

    <script>
    function singlenews() {
        var baseUrl = (window.location).href; // You can also use document.URL
        var id = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "https://www.info-mugh.com/api/news_viewscounter.php",
            data: {
                id: id,
            },
            success: function(data) {
                console.log(data);

            },
            error: function(err) {
                console.log("bad", err)

            }
        })

    }

    $(document).ready(function() {
        var baseUrl = (window.location).href; // You can also use document.URL
        var id = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "https://www.info-aun-hpn.com/api/singlenews.php",
            data: {
                id: id,
            },
            success: function(data) {
                $('meta[name=title]').attr('content', data[0].n_name);
                $('#news_title').html('<h3 class="p-0 m-0">' + data[0].n_name + '</h3>');
                $('#news_image').html(
                    '<img style="object-fit: cover; width:100%;"src="https://info-aun-hpn.com/bos/' +
                    data[0].n_image + '"></img>');
                $('#news_detail').html(data[0].n_detail);
                $('#news_views').html(data[0].n_views);
                console.log("good", err)

            },

            error: function(err) {
                console.log("bad", err)

            }
        })
    })
    </script>

    <?php
    include './template/include/footer.php';
    include './template/include/script.php';

    ?>
</body>