<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeradmin.php';
?>




<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Mail Inbox</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="javaScript:void();">Dashtreme</a>
            </li>
        </ol>
    </div>
</div>
<!-- End Breadcrumb-->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <!-- Left sidebar -->
                    <div class="col-lg-3 col-md-4">
                        <a href="mail-compose.html" class="btn btn-danger btn-block">New Mail</a>
                        <div class="card mt-3 shadow-none">
                            <div class="list-group shadow-none">
                                <a href="../admin/managecustomersupport.php" class="list-group-item active"><i class="fa fa-inbox mr-2"></i>Inbox
                                    <b>(12)</b></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Left sidebar -->

                    <!-- Right Sidebar -->
                    <div class="col-lg-9 col-md-8">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="btn-toolbar" role="toolbar">
                                    <div class="btn-group mr-1">
                                        <button type="button" class="btn btn-outline-primary waves-effect waves-light">
                                            <i class="fa fa-inbox"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-primary waves-effect waves-light">
                                            <i class="fa fa-refresh"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-primary waves-effect waves-light">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="position-relative has-icon-right">
                                    <input type="text" class="form-control" placeholder="search mail" />
                                    <div class="form-control-position">
                                        <i class="fa fa-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End row -->

                        <div class="card mt-3 shadow-none">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="icheck-material-primary my-0">
                                                        <input id="checkbox1" type="checkbox" checked="checked" />
                                                        <label for="checkbox1"> </label>
                                                    </div>
                                                </td>
                                                <td class="mail-rateing">
                                                    <i class="fa fa-star"></i>
                                                </td>
                                                <td>
                                                    <a href="mailread.php">Google Inc</a>
                                                </td>
                                                <td>
                                                    <a href="mailread.php"><i class="fa fa-circle text-info mr-2"></i>Lorem ipsum dolor sit amet, consectetuer
                                                        adipiscing</a>
                                                </td>
                                                <td>
                                                    <i class="fa fa-paperclip"></i>
                                                </td>
                                                <td class="text-right">08:23 AM</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <hr />

                                <div class="row">
                                    <div class="col-7">Showing 1 - 25 of 300</div>
                                    <div class="col-5">
                                        <div class="btn-group float-right">
                                            <button type="button" class="btn btn-light waves-effect">
                                                <i class="fa fa-chevron-left"></i>
                                            </button>
                                            <button type="button" class="btn btn-light waves-effect">
                                                <i class="fa fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- card body -->
                        </div>
                        <!-- card -->
                    </div>
                    <!-- end Col-9 -->
                </div>
                <!-- End row -->
            </div>
        </div>
    </div>
</div>
<!-- End row -->