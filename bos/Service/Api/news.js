$(function() { // เรียกใช้งาน datatable
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "../../Service/News/",
        data: {},
    }).done(function(data) {
        let tableData = []
        data = data.result;
        for (var i = 0; i < data.length; i++) {
            tableData.push([
                `<a href="https://www.mugh.or.th/single_news.php?id=${data[i].id}" target="_blank" class="btn btn-outline-primary p-1"> ${data[i].id} </a>`,
                `<img src="../../${data[i].image}" class="img-fluid" width="100px">`,
                `${data[i].name}`,
                `${data[i].type}`,
                `<input class="toggle-event"  id="toggle_news${data[i].id}" data-id="${data[i].id}" type="checkbox" name="status" 
                ${data[i].n_status ? 'checked' : ''} data-toggle="toggle" data-on="เปิด" 
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
            location.assign('./')
        })
    })

    function initDataTables(tableData) { // สร้าง datatable
        $('#logs').DataTable({
            data: tableData,
            columns: [{
                    title: "ลำดับที่",
                    className: "align-middle"
                },
                {
                    title: "รูปภาพ",
                    className: "align-middle"
                },
                {
                    title: "หัวข้อข่าว",
                    className: "align-middle",
                    width: "30%"
                },

                {
                    title: "ชนิดข่าว",
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
                                url: "../../Service/News/delete.php",

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
        })
    }
})


$('#formData').on('submit', function(e) { // เรียกใช้งาน เพิ่มข้อมูล (สำคัญ)
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: "../../Service/News/create.php",
        data: $('#formData').serialize()
    }).done(function(resp) {
        Swal.fire({
            text: 'เพิ่มข้อมูลเรียบร้อย',
            icon: 'success',
            confirmButtonText: 'ตกลง',
        }).then((result) => {
            location.assign('./news.php');
        });
    })



});




$(document).on('click', '.edit_data', function() { // เรียกใช้งาน แก้ไขข้อมูล (MOdal previews)
    let id = $(this).data('id');

    $.ajax({
        url: "../../Service/News/update.php",
        method: "GET",
        data: {
            id: id
        },
        dataType: "json",
        success: function(data) {
            $('#eid').val(data[0].n_id);
            $('#ename').val(data[0].n_name);
            $('#eimage').html(data[0].n_image);
            $('#e_imgname').val(data[0].n_image);
            $('#eshowimg').html('<img src="../../' + data[0].n_image +
                '" class="p-4 w-100" width="100px">');
            $('#etype').val(data[0].n_type);
            $('#eurl').val(data[0].url);
            $('#eslug').val(data[0].slug);
            $('#edetail').summernote('pasteHTML', data[0].n_detail);
            $('#enews').modal('show');
        }
    });
});



$('#eformData').on('submit', function(e) { // เรียกใช้งาน [บันทึกข้อมูลแก้ไข] (สำคัญ)
    e.preventDefault();
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "../../Service/News/update.php",
        data: {
            id: $('#eid').val(),
            name: $("#ename").val(),
            detail: $("#edetail").val(),
            image: $("#e_imgname").val(),
            type: $("#etype").val(),
            slug: $("#eslug").val(),
            url: $("#eurl").val(),
        },
        success: function(response) {
            Swal.fire({
                text: 'อัพเดตข้อมูลเรียบร้อย',
                icon: 'success',
                confirmButtonText: 'ตกลง',
            }).then((result) => {
                location.assign('./news.php');
            });
            // console.log("good", response);

        },
        error: function(err) {
            // console.log("bad", err);
        }
    })

})




$(function() { // เรียกใช้งาน Summernote
    $('#detail').summernote({
        height: 300,
    });
    $('#edetail').summernote({
        height: 300,
    });
})




$("#n_image").change((e) => { // เรียกใช้งาน UPLOADFILE (สำคัญ)
    // console.log(1)
    var form_data = new FormData();
    var ins = document.getElementById(e.target.id).files.length;
    for (var x = 0; x < ins; x++) {
        form_data.append("files[]", document.getElementById(e.target.id).files[x]);
    }
    form_data.append("files[]", document.getElementById(e.target.id).files[0]);
    // console.log('fromdata', form_data)
    $.ajax({
        // url: './api/uploadfile.php', // point to server-side PHP script 
        url: '../../Service/News/uploadfile.php', // point to server-side PHP script
        dataType: 'text', // what to expect back from the PHP script
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response) {
            // console.log('response', response)
            $("#n_imgname").val(response)
        },
        error: function(err) {
            // console.log('bad', err)
        }
    });
})


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
            // console.log('good', response)
            $("#e_imgname").val(response)
        },
        error: function(err) {
            // console.log('bad', err)
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

function preview_eimage(event) { // เรียกใช้งาน preview เก่า (สำคัญ)
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('update_showimg');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}