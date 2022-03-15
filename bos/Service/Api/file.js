$(function() { // เรียกใช้งาน datatable
    $.ajax({
        type: "GET",
        dataType: "JSON",
        url: "../../Service/File/",
        data: {},
    }).done(function(data) {
        let tableData = []
        data = data.result;
        for (var i = 0; i < data.length; i++) {
            tableData.push([
                `${data[i].id}`,
                `${data[i].name}`,
                `${data[i].group}`,
                `${data[i].type}`,
                `<input class="toggle-event"  id="toggle_file${data[i].id}" data-id="${data[i].id}" type="checkbox" name="status" 
                ${data[i].s_status ? 'checked' : ''} data-toggle="toggle" data-on="เปิด" 
                        data-off="ปิด" data-onstyle="success" data-style="ios">`,
                `<div class="btn-group" role="group">
                        <button " type="button" class="btn btn-warning edit_file_upload" data-toggle="modal" data-id="${data[i].id}"  >
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
            // location.assign('./')
        })
    })

    function initDataTables(tableData) { // สร้าง datatable
        $('#file_table').DataTable({
            data: tableData,
            columns: [{
                    title: "ลำดับ",
                    className: "align-middle",
                    width: "10%"
                },

                {
                    title: "หัวข้อเอกสาร",
                    className: "align-middle",
                    width: "60%"
                },
                {
                    title: "ประเภท",
                    className: "align-middle",
                    width: "20%"
                },
                {
                    title: "ชนิด",
                    className: "align-middle",
                    width: "10%"
                },
                {
                    title: "สถานะ",
                    className: "align-middle",
                    width: "10%"
                },

                {
                    title: "จัดการ",
                    className: "align-middle",
                    width: "20%"
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
                                url: "../../Service/File/delete.php",
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

$(document).ready(function(e) {
    $("#fileupload").on('submit', (function(e) {
        e.preventDefault();
        $.ajax({
            url: "../../Service/File/create.php",
            type: "POST",
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

    }));
});


$(document).on('click', '.edit_file_upload', function() { // เรียกใช้งาน แก้ไขข้อมูล (MOdal previews)
    let id = $(this).data('id');
    $.ajax({
        url: "../../Service/File/update.php",
        method: "GET",
        data: {
            id: id
        },
        dataType: "json",
        success: function(data) {

            $('#ef_id').val(data[0].f_id);
            $('#ef_name').val(data[0].f_name);
            $('#ef_group').val(data[0].f_group);
            $('#t_id').val(data[0].t_id);
            $('#efile_name').html(data[0].f_file);
            $('#ef_fname').val(data[0].f_file);
            $('#ef_detail').val(data[0].f_detail);
            $('#ef_date').val(data[0].f_date);
            $('#ef_by').val(data[0].f_by);
            $('#eadfile_uploads').modal('show');

            if (data[0].t_id == '1') $(".edit-ftype1").trigger('click')
            else if (data[0].t_id == '2') $(".edit-ftype2").trigger('click')
            else if (data[0].t_id == '3') $(".edit-ftype3").trigger('click')
        }
    });
});



$('#efileupload').on('submit', function(e) { // เรียกใช้งาน [บันทึกข้อมูลแก้ไข] (สำคัญ)
    e.preventDefault();
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "../../Service/File/update.php",
        data: {
            id: $('#ef_id').val(),
            name: $('#ef_name').val(),
            group: $('#ef_group').val(),
            type: $('#t_id').val(),
            detail: $('#ef_detail').val(),
            date: $('#ef_date').val(),
            by: $('#ef_by').val(),
        },
        success: function(response) {
            Swal.fire({
                text: 'อัพเดตข้อมูลเรียบร้อย',
                icon: 'success',
                confirmButtonText: 'ตกลง',
            }).then((result) => {
                location.reload();

            });


        },
        error: function(err) {

        }
    })

})





$("#f_file").change(function() {
    $("#file_name").text(this.files[0].name);
});