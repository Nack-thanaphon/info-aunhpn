<?php
include "../../database/connect.php";
// checking user logged or not
if (empty($_SESSION['user'])) {
    header('location: ../../index.php');
}
?>

<?php include "./include/header.php"; ?>

<body id="page-top">
    <div id="wrapper">
        <?php include "./include/navbar.php"; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">
                        <?php include "./include/topbar.php"; ?>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <?php include "./page/web_static_manager.php"; ?>


                    <!-- Content Row -->



                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->



    <div id="web_static" name="c_ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>"></div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->


    <?php include "./include/footer.php"; ?>
    <script>
    $(document).ready(function() {
        let ip = $('#web_static').val();
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "../../Service/Web_static/create.php",
            data: {
                ip: ip,
            },
        }).done(function(data) {
            console.log(data)



        })
    })
    </script>


</body>