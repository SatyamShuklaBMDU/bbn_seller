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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-xl-4" style="padding-right: 10px;">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <form action="{{ route('store-profile-image') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="profile-photo" style="
                            margin: 10px auto;
                        "   >
                                <img id="profileImage" src="{{ asset(auth()->user()->profile_pic ?? '') }}"
                                    class="rounded-circle border pr-3">
                            </div>
                            <input type="file" id="fileUpload" accept="image/*" name="image" style="display: none;"
                                onchange="uploadPhoto()">
                            <button class="btn forcolor" type="button"
                                onclick="document.getElementById('fileUpload').click()">Upload
                                Photo</button>
                            <button type="submit" class="btn forcolor">Save</button>
                        </form>
                        <h2>{{ auth()->user()->name ?? '' }}</h2>
                        <h3>{{ auth()->user()->seller_id ?? '' }}</h3>
                        <h5 class="card-title">Profile Details</h5>
                        <div class="row">
                            <div class="col-lg-12"><i class="bi bi-person-circle"></i> {{ auth()->user()->name ?? '' }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12"><i
                                    class="bi bi-phone"></i>{{ auth()->user()->phone_number ?? '+91 12345 12345' }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12"><i class="bi bi-envelope"></i>{{ auth()->user()->email ?? '' }}</div>
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
                                <form action="{{ route('store-profile') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control"
                                                        value="{{ auth()->user()->name ?? '' }}" id="fname"
                                                        name="name" placeholder="">
                                                    <label for="fname">First Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="" value="{{ auth()->user()->email ?? '' }}">
                                                    <label for="email">Email</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control"
                                                        value="{{ auth()->user()->phone_number ?? '' }}" id="phone"
                                                        name="phone_number" placeholder="">
                                                    <label for="phone">Phone Number</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <select class="form-select" id="gender" name="gender"
                                                        aria-label="Default select example">
                                                        <option selected disabled>Gender</option>
                                                        <option {{ auth()->user()->gender == 'male' ? 'selected' : '' }}
                                                            value="male">Male</option>
                                                        <option {{ auth()->user()->gender == 'female' ? 'selected' : '' }}
                                                            value="female">Female</option>
                                                        <option {{ auth()->user()->gender == 'other' ? 'selected' : '' }}
                                                            value="other">Other</option>
                                                    </select>
                                                    <label for="gender"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="pincode"
                                                        name="pincode" placeholder=""
                                                        value="{{ auth()->user()->pincode ?? '' }}">
                                                    <label for="pincode">Pincode</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="city"
                                                        name="city" placeholder=""
                                                        value="{{ auth()->user()->city ?? '' }}">
                                                    <label for="city">City</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="state"
                                                        name="state" placeholder=""
                                                        value="{{ auth()->user()->state ?? '' }}">
                                                    <label for="state">State</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="padding-right: 5px;">
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn form-control forcolor btn-lg w-100 pb-3">
                                                    <i class="fas fa-save"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
                                <form action="{{ route('store-bank-details') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="ifsc_code"
                                                        name="ifsc_code" placeholder="" {{ auth()->user()->bank?->status == '1' ? 'readonly' : '' }}
                                                        value="{{ auth()->user()->bank->ifsc_code ?? '' }}">
                                                    <label for="ifsc_code">Bank IFSC Code</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="bank_name"
                                                        name="bank_name" {{ auth()->user()->bank?->status == '1' ? 'readonly' : '' }}
                                                        value="{{ auth()->user()->bank->bank_name ?? '' }}"
                                                        placeholder="">
                                                    <label for="bank_name">Bank Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="branch_name"
                                                        name="branch_name" placeholder="" {{ auth()->user()->bank?->status == '1' ? 'readonly' : '' }}
                                                        value="{{ auth()->user()->bank->branch_name ?? '' }}">
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
                                                        name="holder_name" placeholder="" {{ auth()->user()->bank?->status == '1' ? 'readonly' : '' }}
                                                        value="{{ auth()->user()->bank->account_holder_name ?? '' }}">
                                                    <label for="holder_name">Account Holder Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control" id="account_number"
                                                        name="account_number" placeholder="" {{ auth()->user()->bank?->status == '1' ? 'readonly' : '' }}
                                                        value="{{ auth()->user()->bank->account_number ?? '' }}">
                                                    <label for="account_number">Bank Account Number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group text-center {{ auth()->user()->bank?->status == '1' ? 'd-none' : '' }}">
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
                                <form action="{{ route('store-kyc-data') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="pan_number"
                                                        name="pan_number" placeholder="" {{ auth()->user()->bank?->status == '1' ? 'readonly' : '' }}
                                                        value="{{ auth()->user()->bank->pan_name ?? '' }}">
                                                    <label for="pan_number">Pan Number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="gst_number"
                                                        name="gst_number" placeholder="" {{ auth()->user()->bank?->status == '1' ? 'readonly' : '' }}
                                                        value="{{ auth()->user()->bank->gst_number ?? '' }}">
                                                    <label for="gst_number">GST Number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group text-center {{ auth()->user()->bank?->status == '1' ? 'd-none' : '' }}">
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
                                {{-- <div class="row mb-3 alert alert-success">
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
                                </div> --}}
                                <div class="row mb-3 alert {{ auth()->user()->bank?->status == '1' ? 'alert-success' : 'alert-danger' }}">
                                    <div class="col-md-12 d-flex">
                                        <i class="fas {{ auth()->user()->bank?->status == '1' ? 'fa-check-circle text-success' : 'fa-circle-xmark text-danger' }} fs-3"></i>
                                        <span class="{{ auth()->user()->bank?->status == '1' ? 'text-success' : 'text-danger' }}">
                                            {{ auth()->user()->bank?->status == '1' ? 'KYC Verified' : 'KYC Pending' }}
                                        </span>
                                    </div>
                                    <div class="col-md-12 d-flex mt-1 ms-1">
                                        <i class="fas fa-user fs-5"></i>
                                        <span>Upload - PAN Card, Bank Details</span>
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
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
    </script>
@endsection
