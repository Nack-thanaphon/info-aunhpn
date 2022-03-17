<?php
include "./include/header.php";
include "../../database/connect.php";

// checking user logged or not
if (empty($_SESSION['user'])) {
    header('location: index.php');
}
?>

<body id="page-top">
    <div id="wrapper">
        <?php include "./include/navbar.php"; ?>
        <div id="content-wrapper" class="d-flex flex-column">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <?php include "./include/topbar.php"; ?>
                </ul>
            </nav>
            <div class="container-fluid">
                <?php include "./activity/activity_manager.php" ?>
                <?php include "./include/footer.php"; ?>
                <?php include "./include/script.php"; ?>
            </div>
        </div>
    </div>



    <script>
    $(document).ready(function() {
        var calendar = $('#calendar').fullCalendar({
            editable: true,
            events: "../../Service/Activity/",
            displayEventTime: false,
            eventRender: function(event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {
                $("#e_header").html(
                    '<label for="n_name" id="e_header"><h4>เพิ่มกิจกรรม</h4></label>');
                $('#event_ad').submit(function(event) {
                    event.preventDefault();
                    var data = $(this).serialize();
                    $.ajax({
                        url: '../../Service/Activity/create.php',
                        type: 'POST',
                        dataType: 'json',
                        data: data

                    }).done(function(resp) {
                        Swal.fire({
                            text: 'เพิ่มข้อมูลเรียบร้อย',
                            icon: 'success',
                            confirmButtonText: 'ตกลง',
                        }).then((result) => {
                            $('#calendar').fullCalendar('refetchEvents');
                        });
                    })
                })

            },
            editable: true,
            eventDrop: function(event, delta) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                $.ajax({
                    url: 'edit-event.php',
                    data: 'title=' + event.title + '&start=' + start + '&end=' + end +
                        '&id=' + event.id,
                    type: "POST",
                    success: function(response) {
                        displayMessage("Updated Successfully");
                    }
                });
            },

            eventClick: function(event) {
                $.ajax({
                    type: "GET",
                    url: "../../Service/Activity/update.php",
                    data: "&id=" + event.id,
                    success: function(data) {
                        data = JSON.parse(data)
                        if (data.length > 0) {
                            $("#e_name").val(data[0].title)
                            $("#e_detail").val(data[0].e_detail)
                            $("#e_address").val(data[0].e_address)
                        }
                    }
                });

                let e_id = event.id;

                $('#event_delete').click(function(event) {
                    Swal.fire({
                        text: "คุณแน่ใจหรือไม่...ที่จะลบรายการนี้?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ใช่! ลบเลย',
                        cancelButtonText: 'ยกเลิก'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "../../Service/Activity/delete.php",
                                data: "&id=" + e_id,
                            }).done(function() {
                                Swal.fire({
                                    text: 'รายการของคุณถูกลบเรียบร้อย',
                                    icon: 'success',
                                    confirmButtonText: 'ตกลง',
                                }).then((result) => {
                                    location.reload();
                                });
                            })
                        }

                    });
                });
            }
        });
    });



    function displayMessage(message) {
        $(".response").html("<div class='success'>" + message + "</div>");
        setInterval(function() {
            $(".success").fadeOut();
        }, 1000);
    }

    $('#event_ad').click(function() {
        $("#e_header").html('<label for="n_name" id="e_header"><h4>เพิ่มกิจกรรม</h4></label>');

    });
    </script>



</body>