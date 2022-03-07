$(function() { // เรียกใช้งาน datatable
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "../../Service/Banner/",
        data: {},
    }).done(function(data) {
        let tableData = []
        data = data.result;
        for (var i = 0; i < data.length; i++) {
            tableData.push([
                `<a href="https://www.mugh.or.th/single_news.php?id=${data[i].id}" target="_blank" class="btn btn-outline-primary p-1"> ${data[i].id} </a>`,
                `<img src="../../uploads/banner/${data[i].image}" class="img-fluid" width="100px">`,
                `${data[i].name}`,
                `${data[i].date}`,
                `<input class="toggle-event"  id="toggle_banner${data[i].id}" data-id="${data[i].id}" type="checkbox" name="status" 
                ${data[i].b_status ? 'checked' : ''} data-toggle="toggle" data-on="เปิด" 
                        data-off="ปิด" data-onstyle="success" data-style="ios">`,
                `<div class="btn-group" role="group">
                        <button " type="button" class="btn btn-warning edit_data" data-toggle="modal" data-id="${data[i].id}"  >
                            <i class="far fa-edit"></i> แก้ไข
                        </button>
                        <button type="button" class="btn btn-danger" id="delete" data-id="${data[i].id}">
                            <i class="far fa-trash-alt"></i> ลบ
                        </button>
                    </div>`
            ]);
        };

        initDataTables(tableData);
    }).fail(function() {
        Swal.fire({
            text: 'ไม่สามารถเรียกดูข้อมูลได้',
            icon: 'error',
            confirmButtonText: 'ตกลง',
        }).then(function() {

        })
    })

    function initDataTables(tableData) { // สร้าง datatable
        $('#banner_a').DataTable({
            data: tableData,
            columns: [{
                    title: "ลำดับ",
                    className: "align-middle"
                },
                {
                    title: "รูปภาพ",
                    className: "align-middle"
                },
                {
                    title: "หัวข้อแบนเนอร์",
                    className: "align-middle",
                    width: "30%"
                },

                {
                    title: "วัน /เดือน/ปี",
                    className: "align-middle",

                },

                {
                    title: "สถานะ",
                    className: "align-middle"
                },
                {
                    title: "จัดการ",
                    className: "align-middle"
                }
            ],
            initComplete: function() { // เรียกใช้งาน ลบข้อมูล datatable
                $(document).on('click', '#delete', function() {
                    let id = $(this).data('id')
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
                                url: "../../Service/Banner/delete.php",

                                data: {
                                    id: id
                                }
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
                    })
                }).on('change', '.toggle-event', function() {
                    toastr.success('อัพเดทข้อมูลเสร็จเรียบร้อย')
                })
            },
            fnDrawCallback: function() {
                $('.toggle-event').bootstrapToggle();
            },
            responsive: {
                details: {

                    renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },
            language: {
                "lengthMenu": "แสดงข้อมูล _MENU_ แถว",
                "zeroRecords": "ไม่พบข้อมูลที่ต้องการ",
                "info": "แสดงหน้า _PAGE_ จาก _PAGES_",
                "infoEmpty": "ไม่พบข้อมูลที่ต้องการ",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": 'ค้นหา',
                "paginate": {
                    "previous": "ก่อนหน้านี้",
                    "next": "หน้าต่อไป"
                }
            }
        });
    }

})


$('#adbanner').on('submit', function(e) { // เรียกใช้งาน เพิ่มข้อมูล (สำคัญ)
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: "../../Service/Banner/create.php",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
    }).done(function(resp) {
        Swal.fire({
            text: 'เพิ่มข้อมูลเรียบร้อย',
            icon: 'success',
            confirmButtonText: 'ตกลง',
        }).then((result) => {
            location.reload();

        });
    })

});

$(document).ready(function() {

    var _URL = window.URL || window.webkitURL;

    $('#b_file').change(function() {
        var file = $(this)[0].files[0];

        img = new Image();
        var imgwidth = 0;
        var imgheight = 0;
        var maxwidth = 1140;
        var maxheight = 400;

        img.src = _URL.createObjectURL(file);
        img.onload = function() {
            imgwidth = this.width;
            imgheight = this.height;

            $("#width").text(imgwidth);
            $("#height").text(imgheight);
            if (imgwidth <= maxwidth && imgheight <= maxheight) {

            } else {
                alert("Image size must be " + maxwidth + "X" + maxheight);
            }
        };
        img.onerror = function() {

            $("#response").text("not a valid file: " + file.type);
        }

    });
});


$(document).on('click', '.edit_data', function() { // เรียกใช้งาน แก้ไขข้อมูล (MOdal previews)
    let id = $(this).data('id');

    $.ajax({
        url: "../../Service/Banner/update.php",
        method: "GET",
        data: {
            id: id
        },
        dataType: "json",
        success: function(data) {
            $('#eb_id').val(data[0].b_id);
            $('#eb_title').val(data[0].b_title);
            $('#eb_detail').val(data[0].b_detail);
            $('#eb_link').val(data[0].b_link);
            $('#eb_by').val(data[0].b_by);
            $('#eb_date').val(data[0].b_date);
            $('#eb_name').val(data[0].b_image);
            $('#ebshowimg').html('<img src="../../uploads/banner/' + data[0].b_image + '" class=" py-2 w-100" width="100px">');
            $('#eresponse').html(data[0].b_image);
            $('#ebanner_uploads').modal('show');
        }
    });
});

$('#eadbanner').on('submit', function(e) { // เรียกใช้งาน เพิ่มข้อมูล (สำคัญ)


    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: "../../Service/Banner/update.php",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
    }).done(function(resp) {
        Swal.fire({
            text: 'อัพเดตข้อมูลเรียบร้อย',
            icon: 'success',
            confirmButtonText: 'ตกลง',
        }).then((result) => {
            location.reload();
        });
    })

});







$("#e_image").change((e) => { // เรียกใช้งาน UPLOADFILE แก้ไข (สำคัญ)

    var form_data = new FormData();
    var ins = document.getElementById(e.target.id).files.length;
    for (var x = 0; x < ins; x++) {
        form_data.append("files[]", document.getElementById(e.target.id).files[x]);
    }
    $.ajax({
        // url: './api/uploadfile.php', // point to server-side PHP script 
        url: "../../Service/News/uploadfile.php", // point to server-side PHP script
        dataType: 'text', // what to expect back from the PHP script
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response) {
            console.log('good', response)
            $("#e_imgname").val(response)
        },
        error: function(err) {
            console.log('bad', err)
        }
    });
})




function preview_image(event) { // เรียกใช้งาน preview imagebefore (สำคัญ)
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('showimg');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

function preview_image(event) { // เรียกใช้งาน preview imagebefore (สำคัญ)
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('showimg');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

function preview_image(event) { // เรียกใช้งาน preview imagebefore (สำคัญ)
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('ebshowimg');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}


$("#b_file").change(function() {
    $("#file_name").text(this.files[0].name);
});

$("#eb_file").change(function() {
    $("#eresponse").text(this.files[0].name);

});