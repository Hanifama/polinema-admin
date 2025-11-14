    </div>
    <!-- Common Delete Popup  -->
    <div class="modal fade" id="commonDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
        <form action="<?php echo base_url() ?>welcome/delete_notification/" method="post">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="frm_title">Delete</h4>
                    </div>
                    <div class="modal-body" id="frm_body">
                        Do you really want to delete?
                        <input type="hidden" id="set_commondel_id">
                        <input type="hidden" id="table_name">
                    </div>
                    <div class="modal-footer">
                        <button style='margin-left:10px;' type="button"
                            class="btn btn-primary col-sm-2 pull-right" id="frm_submit"
                            onclick="delete_return();">Yes</button>
                        <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal"
                            id="frm_cancel">No</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- ./ Common Delete Popup /. -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 footer-copyright text-center">
                    <p class="mb-0">Copyright 2025 © IKA Polinema</p>
                </div>
            </div>
        </div>
    </footer>
    </div>
    </div>

    <!-- scrollbar js-->
    <script src="<?= base_url() ?>assets/js/scrollbar/simplebar.js"></script>
    <script src="<?= base_url() ?>assets/js/scrollbar/custom.js"></script>
    <!-- feather icon js-->
    <script src="<?= base_url() ?>assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?= base_url() ?>assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Plugins JS start-->
    <script src="<?= base_url() ?>assets/js/sidebar-menu.js"></script>

    <script src="<?= base_url() ?>assets/js/tooltip-init.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?= base_url() ?>assets/js/script.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
    <script src="<?= base_url() ?>assets/js/datepicker/date-picker/datepicker.js"></script>
    <script src="<?= base_url() ?>assets/js/datepicker/date-time-picker/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/js/datepicker/date-time-picker/tempusdominus-bootstrap-4.min.js"></script>
    <script src="<?= base_url() ?>assets/js/datepicker/date-time-picker/datetimepicker.custom.js"></script>
    </body>
    <script>
        function set_common_delete(id, table_name) {
            
			var result = confirm("Want to delete?");
			if (result) {
				del_id = id;
				//table_name = $("#table_name").val();
				$.ajax({
					url: "<?php echo base_url(); ?>admin/" + table_name +
						"/delete/" + del_id,
					data: "id=" + del_id + "&table_name=" + table_name +
						"&<?php echo $this->security->get_csrf_token_name(); ?>=" +
						'<?php echo $this->security->get_csrf_hash(); ?>',
					type: "post",
					success: function(result) {
						if (result.trim() == "success") {
							//$('#commonDelete').modal('toggle');
							$("#hide" + del_id).hide();
						}
					},
					error: function(output) {}
				});
			}
        }

        function set_common_apv(id, status) {
            $("#set_commonapv_id").val(id);
            $("#status").val(status);
        }

        function delete_return() {
            del_id = $("#set_commondel_id").val();
            table_name = $("#table_name").val();
            $.ajax({
                url: "<?php echo base_url(); ?>admin/" + table_name +
                    "/delete/" + del_id,
                data: "id=" + del_id + "&table_name=" + table_name +
                    "&<?php echo $this->security->get_csrf_token_name(); ?>=" +
                    '<?php echo $this->security->get_csrf_hash(); ?>',
                type: "post",
                success: function(result) {
                    if (result.trim() == "success") {
                        $('#commonDelete').modal('toggle');
                        $("#hide" + del_id).hide();
                    }
                },
                error: function(output) {}
            });
        }

        function approve_return() {
            vtask_id = $("#set_commonapv_id").val();
            status = $("#status").val();
            $.ajax({
                url: "<?php echo base_url(); ?>admin/task/approved",
                data: {
                    vtask_id: vtask_id,
                    status: status
                },
                type: "post",
                success: function(result) {
                    if (status == "finish_resell") {
                        $('#commonApprove').modal('toggle');
                        $("#hide" + vtask_id).hide();
                    } else {
                        $('#commonReject').modal('toggle');
                        $("#hide" + vtask_id).hide();
                    }
                    // if (result.trim() == "success") {}
                },
                error: function(output) {}
            });
        }
    </script>
    <script>
        $('.datepicker').datepicker({
            //minDate: new Date() // Now can select only dates, which goes after today
            dateFormat: 'yyyy-mm-dd'
        });
        $('.datetimepicker').datetimepicker({
            //minDate: new Date() // Now can select only dates, which goes after today
            //format:'YYYY-MM-DD HH:mm:ss'
        });
    </script>

    </html>