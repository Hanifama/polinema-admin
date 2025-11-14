<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> PIO ADMIN</title>
    <link href="<?php echo $this->config->item('accet_url') ?>css/plugins/select2/select2.min.css" rel="stylesheet">
    <script src="<?php echo $this->config->item('accet_url') ?>js/jquery-2.1.1.min.js"></script>
    <script src="<?php echo $this->config->item('accet_url') ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo $this->config->item('accet_url') ?>js/app.js"></script>
    <script src="<?php echo $this->config->item('accet_url') ?>js/plugins/pace/pace.min.js"></script>
    <link href="<?php echo $this->config->item('accet_url') ?>css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('accet_url') ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('accet_url') ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="<?php echo $this->config->item('accet_url') ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <!-- Gritter -->
    <link href="<?php echo $this->config->item('accet_url') ?>js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('accet_url') ?>css/animate.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('accet_url') ?>css/style.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('accet_url') ?>css/plugins/dataTables/datatables.min.css"
        rel="stylesheet">
    <!-- Date Picker-->
    <link href="<?php echo base_url() ?>accets/datepicker/datepicker.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>accets/datepicker/bootstrap-datepicker.js"></script>
    <link href="<?php echo $this->config->item('accet_url') ?>css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <script src="<?php echo $this->config->item('accet_url') ?>js/recordDel.js"></script>
    <link href="<?php echo $this->config->item('accet_url') ?>css/bootstrap-datetimepicker.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span>
                                <center>
                                    <h2>
                                        <b style="color: white">

                                            <script>
                                            function set_common_delete(id, table_name) {
                                                $("#set_commondel_id").val(id);
                                                $("#table_name").val(table_name);
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
                                            XFESS
                                        </b>
                                    </h2>
                                </center>
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs">
                                        <strong class="font-bold">
                                            <!-- TRADE TEAMS -->
                                        </strong>
                                    </span>
                            </a>
                        </div>
                        <div class="logo-element">
                            XFESS
                        </div>
                    </li>
                    <!-- BO : left nav  -->
                                    </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome <?php
                                    if (isset($username) and ! empty($username)) {
                                        echo $username;
                                    }
                                    ?> </span>
                        </li>
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="text-muted text-xs block">
                                        <img src="<?php echo $this->config->item('accet_url') ?>img/user.png"
                                            class="img-circle" alt="User Image" width="20px">
                                    </span>
                                </span>
                            </a>
                            <span>
                            </span>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <!-- <li><a href="<?php echo $this->config->item('left_url') ?>admin/profile/edit">Profile</a></li> -->
                                <li><a href="<?php echo base_url() ?>password">Change Password </a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo base_url() ?>auth/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
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
            <!-- Common Approve Popup  -->
            <div class="modal fade" id="commonApprove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <form action="<?php echo base_url() ?>welcome/delete_notification/" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                        value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span
                                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="frm_title">Approval</h4>
                            </div>
                            <div class="modal-body" id="frm_body">
                                Do you really want to Approve Vtask?
                                <input type="hidden" id="set_commonapv_id">
                                <input type="hidden" id="status">
                            </div>
                            <div class="modal-footer">
                                <button style='margin-left:10px;' type="button"
                                    class="btn btn-primary col-sm-2 pull-right" id="frm_submit"
                                    onclick="approve_return();">Yes</button>
                                <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal"
                                    id="frm_cancel">No</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- ./ Common Approve Popup /. -->

            <!-- Common Reject Popup  -->
            <div class="modal fade" id="commonReject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <form action="<?php echo base_url() ?>welcome/delete_notification/" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                        value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span
                                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="frm_title">Rejection</h4>
                            </div>
                            <div class="modal-body" id="frm_body">
                                Do you really want to Reject Vtask?
                                <input type="hidden" id="set_commonapv_id">
                                <input type="hidden" id="status">
                            </div>
                            <div class="modal-footer">
                                <button style='margin-left:10px;' type="button"
                                    class="btn btn-primary col-sm-2 pull-right" id="frm_submit"
                                    onclick="approve_return();">Yes</button>
                                <button type="button" class="btn btn-danger col-sm-2 pull-right" data-dismiss="modal"
                                    id="frm_cancel">No</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- ./ Common Reject Popup /. -->