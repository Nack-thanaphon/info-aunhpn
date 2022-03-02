<?php include './template/include/header.php'; ?>
<?php include './template/include/navbar.php'; ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 p-0 m-0">
                <?php include './template/pages/hero_banner.php'; ?>
            </div>

            <div class="col-12 p-0 m-0 ">
                <div data-aos="fade-in" class="col-12 m-0 p-0  d-none d-md-block">
                    <?php include "./template/pages/news-hero.php" ?>
                </div>
            </div>
            <div class="col-12 p-0 m-0">
                <div class="date">
                    <p><?php echo date("l j  F Y "); ?></p>
                </div>
            </div>
            <!-- <div class="col-12 p-0 m-0">
                <div data-aos="fade-in" class="col-12 m-0 p-0 my-3 ">
                    <?php include "./template/pages/covid.php" ?>
                </div>
            </div> -->

            <div data-aos="fade-up" class="col-12 py-3 p-0 m-0 my-1  ">
                <?php include "./template/pages/news.php" ?>
            </div>
            <div class="col-12 p-0 m-0 w-100">
                <div id="activity_bar_header">
                    <h2 class="p-0 m-0">Activities</h2>
                </div>
                <div class="col-12 col-sm-12 py-2 my-3 p-0 ">
                    <?php include "./template/pages/activity_bar.php"; ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    include './template/include/script.php';
    include "./template/include/footer.php"; ?>
</body>