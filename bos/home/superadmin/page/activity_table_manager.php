<?php
include "../../../bos/Function/function.php"

?>

<body class="hold-transition sidebar-mini">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12  ">
                <div class="row mx-auto">
                    <div class="col-12 col-sm-8">
                        <div class="card-header border-left-primary ">
                            <h1>
                                <i class="fas fa-rss-square p-0"></i>
                                จำนวนกิจกรรมทั้งหมด
                            </h1>
                        </div>
                        <div class="card-body">
                            <table id="file_g" class="table table-hover" width="100%">
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-sm-3">
                        <div class="card">
                            <div class="card-header border-left-primary ">
                                <b>
                                    <i class="fas fa-rss-square p-0"></i>
                                    จำนวนกิจกรรมทั้งหมด
                                </b>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-8">
                                        <h1 class="p-0 text-right" style="font-size: 3.5rem;">
                                            <?php echo  count_total_file($conn) ?>
                                        </h1>
                                    </div>
                                    <div class="col-4">
                                        <p class="p-0 m-0 text-right">/ ไฟล์</p>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>









    <?php include "./include/footer.php"; ?>
</body>