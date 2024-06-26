@extends('partner.include.master')
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
                        <form action="{{ route('partner-store-image') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="profile-photo" style="margin: 10px auto;">
                                <img id="profileImage" src="{{ asset($user->profile_pic ?? '') }}"
                                    class="rounded-circle border pr-3">
                            </div>
                            <input type="file" id="fileUpload" accept="image/*" name="image" style="display: none;"
                                onchange="uploadPhoto()">
                            <button class="btn forcolor" type="button"
                                onclick="document.getElementById('fileUpload').click()">Upload
                                Photo</button>
                            <button type="submit" class="btn forcolor">Save</button>
                        </form>
                        <h2>{{ $user->name ?? '' }}</h2>
                        <h3>{{ $user->partner_id ?? '' }}</h3>
                        <h5 class="card-title">Profile Details</h5>
                        <div class="row">
                            <div class="col-lg-12"><i class="bi bi-person-circle"></i> {{ $user->name ?? '' }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12"><i
                                    class="bi bi-phone"></i>{{ $user->phone_number ?? '+91 12345 12345' }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12"><i class="bi bi-envelope"></i>{{ $user->email ?? '' }}</div>
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
                                <form action="{{ route('partner-profile-data') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control"
                                                        value="{{ $user->name ?? '' }}" id="fname"
                                                        name="name" placeholder="">
                                                    <label for="fname">First Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="" value="{{ $user->email ?? '' }}">
                                                    <label for="email">Email</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="number" class="form-control"
                                                        value="{{ $user->phone_number ?? '' }}" id="phone"
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
                                                        <option {{ $user->gender == 'male' ? 'selected' : '' }}
                                                            value="male">Male</option>
                                                        <option {{ $user->gender == 'female' ? 'selected' : '' }}
                                                            value="female">Female</option>
                                                        <option {{ $user->gender == 'other' ? 'selected' : '' }}
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
                                                        value="{{ $user->pincode ?? '' }}">
                                                    <label for="pincode">Pincode</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="padding-right: 10px;">
                                            <div class="form-group">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="city"
                                                        name="city" placeholder=""
                                                        value="{{ $user->city ?? '' }}">
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
                                                        value="{{ $user->state ?? '' }}">
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
