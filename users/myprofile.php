<?php
// Include the database connection file
include '../include/config.php';
include '../include/headeruser.php';
?>

<!-- Breadcrumb-->
<div class="row pt-2 pb-2">
    <div class="col-sm-9">
        <h4 class="page-title">User Profile</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                User Profile
            </li>
        </ol>
    </div>
</div>
<!-- End Breadcrumb-->

<div class="row">
    <div class="col-lg-4">
        <div class="card profile-card-2">
            <div class="card-img-block">
                <img class="img-fluid" src="../assets/images/placeholder800by500.jpg" alt="Card image cap" />
            </div>
            <div class="card-body pt-5">
                <img src="../assets/images/placeholder110by110.jpg" alt="profile-image" class="profile" />
                <h5 class="card-title">Mark Stern<a href="#" class="btn btn-info btn-sm float-right">Edit Profile</a></h5>
                <p class="card-text">
                    Welcome.
                </p>
                
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                    <li class="nav-item">
                        <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><i class="icon-user"></i>
                            <span class="hidden-xs">Profile Details</span></a>
                    </li>
                </ul>
                <div class="tab-content p-3">
                    <div class="tab-pane active" id="profile">
                        <h5 class="mb-3">Your Details</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>About</h6>
                                <p><b>First Name:</b> Hassan
                                    <br>
                                    <b>Middle Name: </b> Hassan
                                    <br>
                                    <b>Last Name: </b> Hassan
                                    <br>
                                    <b>Address: </b> kjkasjkasjdaskjdsajd sjdksjdksjdkas sjdksjdksjdkas
                                    <br>
                                    <b>
                                </p>
                            </div>
                        </div>
                        <!--/row-->
                        <h6 class="text-uppercase">Payment Methods</h6>
                        <hr />
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="card-title">
                                            Credit Card
                                            <div class="card-action">
                                                <div class="dropdown">
                                                    <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                                                        <i class="icon-options"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void();">Edit</a>
                                                        <a class="dropdown-item" href="javascript:void();">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h6>
                                            Card Number: <small>**** **** **** 4789</small>
                                            <br>
                                            Expiry Date: <small>08/28</small>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Row-->
                        <h6 class="text-uppercase">Your Subscriptions</h6>
                        <hr />
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="card-title">
                                            Package One
                                            <div class="card-action">
                                                <div class="dropdown">
                                                    <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                                                        <i class="icon-options"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void();">Renew</a>
                                                        <a class="dropdown-item" href="javascript:void();">End Subscription</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h6>
                                            Type: <small>Mobile Only</small>
                                            <br>
                                            Price: <small>Ksh /= 2,800</small>
                                            <br>
                                            Expiry Date: <small>30-04-2024</small>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="card-title">
                                            Package Two
                                            <div class="card-action">
                                                <div class="dropdown">
                                                    <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                                                        <i class="icon-options"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void();">Renew</a>
                                                        <a class="dropdown-item" href="javascript:void();">End Subscription</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h6>
                                            Type: <small>Mobile Only</small>
                                            <br>
                                            Price: <small>Ksh /= 2,800</small>
                                            <br>
                                            Expiry Date: <small>30-04-2024</small>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="card-title">
                                            Package three
                                            <div class="card-action">
                                                <div class="dropdown">
                                                    <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                                                        <i class="icon-options"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void();">Renew</a>
                                                        <a class="dropdown-item" href="javascript:void();">End Subscription</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h6>
                                            Type: <small>Mobile Only</small>
                                            <br>
                                            Price: <small>Ksh /= 2,800</small>
                                            <br>
                                            Expiry Date: <small>30-04-2024</small>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="card-title">
                                            Package four
                                            <div class="card-action">
                                                <div class="dropdown">
                                                    <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                                                        <i class="icon-options"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="javascript:void();">Renew</a>
                                                        <a class="dropdown-item" href="javascript:void();">End Subscription</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h6>
                                            Type: <small>Mobile Only</small>
                                            <br>
                                            Price: <small>Ksh /= 2,800</small>
                                            <br>
                                            Expiry Date: <small>30-04-2024</small>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--start overlay-->

<?php include '../include/footeruser.php'; ?>