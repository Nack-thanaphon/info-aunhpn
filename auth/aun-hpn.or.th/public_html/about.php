<?php include './template/include/header.php'; ?>
<?php include './template/include/navbar.php'; ?>

<div class="container">
    <div class="row py-5">
        <div class="col-12 p-0 m-0">
        </div>


        <div class=" col-md-3 col-12">
            <nav aria-label="">
                <ol class="breadcrumb bg-transparent p-0 my-2">
                    <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                    <li class="breadcrumb-item"><a href="#">Our Mission</a></li>

                </ol>
            </nav>
            <div class="position-sticky  mb-5" style="top: 2rem;">
                <div class=" bg-white text-black rounded">
                    <div class="bg-dark p-3 text-white ">
                        <h4 class="fst-italic text-center">Our Mission</h4>
                        <div class="nav flex-column nav-pills text-start" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link active  text-uppercase" id="v-pills-home-tab" data-toggle="pill"
                                href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Who we
                                are</a>
                            <a class="nav-link text-uppercase" id="v-pills-profile-tab" data-toggle="pill"
                                href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                aria-selected="false">What we do</a>
                            <a class="nav-link text-uppercase" id="v-pills-messages-tab" data-toggle="pill"
                                href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                aria-selected="false">Our Goal</a>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-8 mb-5 mx-auto col-12 tab-content" id="v-pills-tabContent">

            <div class=" tab-pane fade show active" id="v-pills-home" role="tabpanel"
                aria-labelledby="v-pills-home-tab">

                <article class="tab-pane well active in active" id="Whoweare">
                    <img width="100%" src="./img/mugh.png" alt="">
                    <h3 class="blog-post-title mt-5" id="Whoweare">ภาพรวมงานกลุ่มสุขภาพโลกมหิดล</h3>
                    <br>
                    <p>In recognition of contribution in healthcare industry as well as its dedication to improving
                        life and bringing better health to the society, Mahidol University Global Health (MUGH) was
                        initiated in October 2012 with the aim to bridge the gap between interdisciplinary faculties
                        and network with other universities and organizations at the national, regional and global
                        levels in the context of global health in order to achieve health equity for better health
                        of all.
                    </p>
                </article>

            </div>



            <div class="tab-pane fade p-3" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <article>
                    <h2 class="blog-post-title text-uppercase" id="Whoweare">Who we are?</h2>

                    <li><b>สร้างขีดความสามารถ</b></li>
                    Global health related academic degree programs, trainings and workshops are our vehicle to
                    build and drive the collective capacities for local and international experts to play the
                    key role in Global Health.
                    <li><b>วิจัย</b></li>
                    MUGH partners and engages in research collaborative works on Global Health by generating
                    insights, synthesizing Global Health related information and facilitating the development of
                    research works on Global Gealth.
                    <li><b>เครือข่าย</b></li>
                    MUGH aims to build partnership and collaboration among relevant partners and stakeholders on
                    Global Health at the national, regional and global levels to contribute to developing and
                    advocating the global health policy.
                </article>
            </div>
            <div class="tab-pane fade p-3 " id="v-pills-messages" role="tabpanel"
                aria-labelledby="v-pills-messages-tab">
                <article>
                    <h2 class="blog-post-title text-uppercase " id="Whoweare">Our goal</h2>
                    <ul>
                        <li>To create a platform for Global Health in Mahidol University and international
                            partnership
                        </li>
                        <li> To organize the advocacy meetings with partners at national and international </li>
                        <li>To create Global Health Education program including both of local and international
                            short-term
                            training programs</li>
                        <li> To develop the Mahidol University Active Ageing Policy Watch Center (MAPC)</li>
                    </ul>
                    </p>
                </article>
            </div>

        </div>

    </div>


</div>



<?php

include './template/include/script.php';
include "./template/include/footer.php"; ?>