<div class="container-md">
    <div class="col-12">
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body ">
                        <div class="row">
                            <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                                class="img-responsive p-2 w-100" />

                        </div>


                    </div>

                </div>

            </div>
        </div>

    </div>
</div>

<script>
// A $( document ).ready() block.
$(document).ready(function() {
    if (document.cookie.indexOf('visited=true')) {

        $('#myModal').modal({
            show: true
        });
        var year = 1000;
        var expires = new Date((new Date()).valueOf() + year);
        document.cookie = "visited=true;expires=" + expires.toUTCString();
    }
});
</script>