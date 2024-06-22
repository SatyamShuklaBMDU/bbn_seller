@extends('include.master')
@section('style-area')
    <style>
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .profile-card {
            text-align: center;
        }

        .profile-photo {
            position: relative;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .row {
            margin: 10px 0;
        }

        .row i {
            margin-right: 10px;
        }

        .social-links a {
            margin: 0 10px;
            color: #007bff;
        }

        .social-links a:hover {
            color: #0056b3;
        }
    </style>
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #009ec3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #009ec3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endsection
@section('content-area')
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4" style="padding-right: 10px;">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <div class="profile-photo">
                            <img id="profileImage" src="assets/img/profile-img.jpg" class="rounded-circle border">
                        </div>
                        <input type="file" id="fileUpload" accept="image/*" style="display: none;"
                            onchange="uploadPhoto()">
                        <button class="btn forcolor" onclick="document.getElementById('fileUpload').click()">Upload
                            Photo</button>
                        <h2>Kevin Anderson</h2>
                        <h3>Web Designer</h3>
                        <h5 class="card-title">Profile Details</h5>
                        <div class="row">
                            <div class="col-lg-12"><i class="bi bi-person-circle"></i> Kevin Anderson</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12"><i class="bi bi-phone"></i> (436) 486-3538 x29071</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12"><i class="bi bi-mail"></i> k.anderson@example.com</div>
                        </div>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Basic</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Bank
                                    Details</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-settings">KYC</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">KYC
                                    Details</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#consent">Consent</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                {{-- <h5 class="card-title">Basic Information</h5> --}}
                                <nav data-mdb-navbar-init class="navbar navbar-expand-lg bg-body-tertiary">
                                    <div class="container-fluid">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item active" aria-current="page"
                                                    style="font-size: 22px;padding-left: 20px;transform: translateY(10px);">
                                                    Basic Information</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </nav>
                                <div class="row">
                                    <div class="col-md-4" style="padding-right: 10px;">
                                        <div class="form-group">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="fname" name="fname"
                                                    placeholder="">
                                                <label for="fname">First Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="padding-right: 10px;">
                                        <div class="form-group">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="mname" name="mname"
                                                    placeholder="">
                                                <label for="mname">Middle Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="lname" name="lname"
                                                    placeholder="">
                                                <label for="lname">Last Name</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4" style="padding-right: 10px;">
                                        <div class="form-group">
                                            <div class="form-floating">
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="">
                                                <label for="email">Email</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="padding-right: 10px;">
                                        <div class="form-group">
                                            <div class="form-floating">
                                                <input type="number" class="form-control" id="phone" name="phone"
                                                    placeholder="">
                                                <label for="phone">Phone Number</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-floating">
                                                <select class="form-select" id="gender"
                                                    aria-label="Default select example">
                                                    <option selected>Gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                    <option value="other">Other</option>
                                                </select>
                                                <label for="gender"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4" style="padding-right: 10px;">
                                        <div class="form-group">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="pincode" name="pincode"
                                                    placeholder="">
                                                <label for="pincode">Pincode</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="padding-right: 10px;">
                                        <div class="form-group">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="city" name="city"
                                                    placeholder="">
                                                <label for="city">City</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="state" name="state"
                                                    placeholder="">
                                                <label for="state">State</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <nav data-mdb-navbar-init class="navbar navbar-expand-lg bg-body-tertiary">
                                    <div class="container-fluid">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item active" aria-current="page"
                                                    style="font-size: 22px;padding-left: 20px;transform: translateY(10px);">
                                                    Bank Details</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </nav>
                                <!-- Profile Edit Form -->
                                <form>
                                    <div class="row">
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="ifsc_code"
                                                        name="ifsc_code" placeholder="">
                                                    <label for="ifsc_code">Bank IFSC Code</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="bank_name"
                                                        name="bank_name" placeholder="">
                                                    <label for="bank_name">Bank Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="branch_name"
                                                        name="branch_name" placeholder="">
                                                    <label for="branch_name">Branch Name</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="holder_name"
                                                        name="holder_name" placeholder="">
                                                    <label for="holder_name">Account Holder Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control" id="account_number"
                                                        name="account_number" placeholder="">
                                                    <label for="account_number">Bank Account Number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group text-center">
                                                <button type="submit"
                                                    class="btn forcolor btn-lg w-100 pb-3">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form><!-- End Profile Edit Form -->
                            </div>
                            <div class="tab-pane fade pt-3" id="profile-settings">
                                <nav data-mdb-navbar-init class="navbar navbar-expand-lg bg-body-tertiary">
                                    <div class="container-fluid">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item active" aria-current="page"
                                                    style="font-size: 22px;padding-left: 20px;transform: translateY(10px);">
                                                    KYC Section</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </nav>
                                <!-- Settings Form -->
                                <form>
                                    <div class="row">
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="pan_number"
                                                        name="pan_number" placeholder="">
                                                    <label for="pan_number">Pan Number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="gst_number"
                                                        name="gst_number" placeholder="">
                                                    <label for="gst_number">GST Number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group text-center">
                                                <button type="submit"
                                                    class="btn forcolor btn-lg w-100 pb-3">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form><!-- End settings Form -->

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <nav data-mdb-navbar-init class="navbar navbar-expand-lg bg-body-tertiary">
                                    <div class="container-fluid">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item active" aria-current="page"
                                                    style="font-size: 22px;padding-left: 20px;transform: translateY(10px);">
                                                    KYC Status</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </nav>
                                <!-- Change Password Form -->
                                <div class="row mb-3 alert alert-success">
                                    <div class="col-md-12 d-flex"><i
                                            class="fas fa-check-circle text-success fs-3"></i><span
                                            class="text-success">Mobile Number Verified</span></div>
                                    <div class="col-md-12 d-flex mt-1 ms-1"><i
                                            class="fas fa-phone-square fs-5"></i><span>+91 6393805011</span></div>
                                </div>
                                <div class="row mb-3 alert alert-success">
                                    <div class="col-md-12 d-flex"><i
                                            class="fas fa-circle-xmark text-danger fs-3"></i><span
                                            class="text-danger">Email Address Verification Pending</span></div>
                                    <div class="col-md-12 d-flex mt-1 ms-1"><i
                                            class="fas fa-envelope fs-5"></i><span>satyam@gmail.com</span></div>
                                </div>
                                <div class="row mb-3 alert alert-success">
                                    <div class="col-md-12 d-flex"><i
                                            class="fas fa-check-circle text-success fs-3"></i><span
                                            class="text-success">KYC Verified</span></div>
                                    <div class="col-md-12 d-flex mt-1 ms-1"><i class="fas fa-user fs-5"></i><span>Upload -
                                            PAN Card, Cancelled Cheque</span></div>
                                </div>
                            </div>

                            <div class="tab-pane fade pt-3" id="consent">
                                <nav data-mdb-navbar-init class="navbar navbar-expand-lg bg-body-tertiary">
                                    <div class="container-fluid">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item active" aria-current="page"
                                                    style="font-size: 18px;padding-left: 20px;transform: translateY(10px);">
                                                    Please allow us to communicate with you on:</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </nav>
                                <!-- Change Password Form -->
                                <div class="col-md-12 d-flex mt-3">
                                    <div>On SMS</div>
                                    <div class="form-check">
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex mt-3">
                                    <div>On Email</div>
                                    <div class="form-check">
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex mt-3">
                                    <div>On Whatsapp</div>
                                    <div class="form-check">
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12 d-flex mt-3">
                                    <div>Through Notification</div>
                                    <div class="form-check">
                                        <label class="switch">
                                            <input type="checkbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('script-area')
    <script>
        function uploadPhoto() {
            var fileInput = document.getElementById('fileUpload');
            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = document.getElementById('profileImage');
                img.src = e.target.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
