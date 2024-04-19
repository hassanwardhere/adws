<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeradmin.php';
?>



<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">Mail Read</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="javaScript:void();">Dashtreme</a>
            </li>
            <li class="breadcrumb-item">
                <a href="javaScript:void();">Mail</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Mail Read
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
                            <div class="list-groups shadow-none">
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
                                        <i class="fa fa-search text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End row -->
                        <div class="card mt-3 shadow-none">
                            <div class="card-body">
                                <div class="media mb-3">
                                    <img src="https://via.placeholder.com/110x110" class="rounded-circle mr-3 mail-img shadow" alt="media image" />
                                    <div class="media-body">
                                        <span class="media-meta float-right">08:22 AM</span>
                                        <h4 class="m-0">Jhon Deo</h4>
                                        <small>From : info@example.com</small>
                                    </div>
                                </div>
                                <!-- media -->

                                <p><b>Hi Sir...</b></p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing
                                    elit. Aenean commodo ligula eget dolor. Aenean
                                    massa. Cum sociis natoque penatibus et magnis dis
                                    parturient montes, nascetur ridiculus mus. Donec
                                    quam felis, ultricies nec, pellentesque eu, pretium
                                    quis, sem.
                                </p>
                                <p>
                                    Aenean vulputate eleifend tellus. Aenean leo ligula,
                                    porttitor eu, consequat vitae, eleifend ac, enim.
                                    Aliquam lorem ante, dapibus in, viverra quis,
                                    feugiat a, tellus. Phasellus viverra nulla ut metus
                                    varius laoreet. Quisque rutrum. Aenean imperdiet.
                                    Etiam ultricies nisi vel augue. Curabitur
                                    ullamcorper ultricies nisi. Nam eget dui. Etiam
                                    rhoncus. Maecenas tempus, tellus eget condimentum
                                    rhoncus, sem quam semper libero, sit amet adipiscing
                                    sem neque sed ipsum. Nam quam nunc, blandit vel,
                                    luctus pulvinar,
                                </p>
                                <p>
                                    Nulla consequat massa quis enim. Donec pede justo,
                                    fringilla vel, aliquet nec, vulputate eget, arcu. In
                                    enim justo, rhoncus ut, imperdiet a, venenatis
                                    vitae, justo. Nullam dictum felis eu pede mollis
                                    pretium. Integer tincidunt. Cras dapibus. Vivamus
                                    elementum semper nisi.
                                </p>

                                <hr />
                                <h4>
                                    <i class="fa fa-paperclip mr-2"></i> Attachments
                                    <span>(3)</span>
                                </h4>
                                <div class="row">
                                    <div class="col-sm-4 col-md-3">
                                        <a href="javascript:void();">
                                            <img src="https://via.placeholder.com/800x500" alt="attachment" class="img-thumbnail" />
                                        </a>
                                    </div>
                                    <div class="col-sm-4 col-md-3">
                                        <a href="javascript:void();">
                                            <img src="https://via.placeholder.com/800x500" alt="attachment" class="img-thumbnail" />
                                        </a>
                                    </div>
                                    <div class="col-sm-4 col-md-3">
                                        <a href="javascript:void();">
                                            <img src="https://via.placeholder.com/800x500" alt="attachment" class="img-thumbnail" />
                                        </a>
                                    </div>
                                </div>

                                <form class="mt-3">
                                    <div class="form-group">
                                        <textarea class="form-control" rows="9" placeholder="Reply here..."></textarea>
                                    </div>
                                </form>

                                <div class="text-right">
                                    <button type="button" class="btn btn-primary waves-effect waves-light mt-3">
                                        <i class="fa fa-send mr-1"></i> Send
                                    </button>
                                </div>
                            </div>
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