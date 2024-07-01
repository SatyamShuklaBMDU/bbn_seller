@extends('partner.include.master')
@section('style-area')
    <style>
        a {
            text-decoration: none;
            color: white;
        }

        /*=============================
                     Business Card containers
                    ===============================*/
        .center-container {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-right: -50%;
            transform: translate(-50%, -50%)
        }

        .inner-card-container {
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
        }

        .bizzy-card-container {
            min-width: 200px;
            max-width: 450px;
            flex-basis: auto;
            flex-grow: 1;
            flex-wrap: wrap;
        }

        /*=============================
                     Left Content
                    ===============================*/
        .biz-card-a {
            width: 160px;
            height: 220px;
            background-color: #f2f2f2;
            float: left;
            padding: 10px;
            transition: 0.2s ease;
            border-top-left-radius: 18px;
            border-bottom-left-radius: 18px;
        }

        .biz-headshot {
            width: 120px;
            height: 120px;
            border-radius: 120px;
            background-size: 132px;
            background-repeat: no-repeat;
            background-position: 50% 6%;
            border: 1px solid #d8d8d8;
            margin-top: 25px;
            margin-left: auto;
            margin-right: auto;
        }

        .biz-pic-drew {
            background-image: url('https://drewgoff.com/images/business-card/drew-biz.jpg');
        }

        .biz-words-container {
            margin-top: 130px;
        }

        .biz-name {
            text-align: center;
            font-family: 'Anton', sans-serif;
            color: #252526;
            font-size: 1.3rem;
            margin-bottom: 2px;
        }

        .biz-title {
            text-align: center;
            font-family: 'Nunito', sans-serif;
            color: #252526;
            font-size: 0.7rem;
            line-height: 1.3;
            max-width: 90px;
            margin-left: 20px;
        }


        /*=============================
                     Right Content
                    ===============================*/
        .biz-card-b {
            width: 230px;
            height: 220px;
            background-color: #f2f2f2;
            padding: 10px;
            transition: 0.2s ease;
            top: 0;
            bottom: 0;
            overflow: hidden;
            border-top-right-radius: 18px;
            border-bottom-right-radius: 18px;
        }

        .biz-shape {
            float: right;
            background: #ff4d79;
            background: -webkit-linear-gradient(-45deg, #3bc4e2c7 0%, #00baf2 100%);
            background: -ms-linear-gradient(-45deg, #3bc4e2c7 0%, #00baf2 100%);
            background: linear-gradient(135deg, #3bc4e2c7 0%, #00baf2 100%);
            transform: scaleX(1) rotate(50deg);
            top: 0;
            bottom: 0;
            height: 308px;
            margin: -25px -55px 0 0;
            border-radius: 50px;
            width: 100%;
            color: #fff;
            border: 2px solid #fff;
        }

        .biz-contact-box {
            position: absolute;
            margin-top: 140px;
            margin-left: 1px;
            width: 210px;
            transform: scaleX(1) rotate(-50deg);
        }

        .biz-email:before,
        .biz-cell:before,
        .biz-portfolio:before {
            content: "";
            display: block;
            width: 24px;
            height: 24px;
            float: left;
            margin: -7px 9px 0 0;
        }

        .biz-email:before {
            background: url("https://drewgoff.com/images/business-card/email.svg") no-repeat;
        }

        .biz-cell:before {
            background: url("https://drewgoff.com/images/business-card/cellphone.svg") no-repeat;
        }

        .biz-portfolio:before {
            background: url("https://drewgoff.com/images/business-card/suitcase.svg") no-repeat;
        }

        .biz-email,
        .biz-cell,
        .biz-portfolio {
            color: #252526;
            font-size: 11px;
            letter-spacing: 0.15rem;
            margin-bottom: 20px;
            margin-left: 20px;
            cursor: pointer;
            padding-top: 5px;
            font-family: 'Nunito', sans-serif;
            font-weight: 300;
        }

        /*=============================
                     Business Card Mobile
                    ===============================*/
        @media screen and (max-width: 470px) {

            .biz-card-a,
            .biz-card-b {
                margin-left: 20%;
            }

            .biz-card-a {
                width: 240px;
                height: 185px;
                border-top-right-radius: 18px;
                border-bottom-left-radius: 0;
            }

            .biz-headshot {
                margin-top: 6px;
            }

            .biz-card-b {
                width: 240px;
                height: 180px;
                border-bottom-left-radius: 18px;
                border-top-right-radius: 0;
            }

            .biz-shape {
                transform: scaleX(1) rotate(77deg);
                margin: -13px -60px 0 0;
            }

            .biz-contact-box {
                transform: scaleX(1) rotate(-77deg);
            }

            .biz-contact-box {
                position: absolute;
                margin-top: 150px;
                margin-left: -20px;
                width: 210px;
            }
        }

        @media screen and (max-width: 375px) {

            .biz-card-a,
            .biz-card-b {
                margin-left: 11%;
            }
        }

        @media screen and (max-width: 320px) {

            .biz-card-a,
            .biz-card-b {
                margin-left: 5%;
            }
        }

        .id-card {
            width: 300px;
            background: white;
            border: 1px solid #00baf2;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .header {
            background: #00baf2;
            padding: 10px;
            border-radius: 10px 10px 0 0;
            color: white;
            font-weight: bold;
        }

        .photo img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
        }

        .details h2 {
            color: #00baf2;
            margin: 10px 0;
        }

        .details p {
            margin: 5px 0;
        }

        .barcode img {
            width: 100%;
        }
    </style>
    <style>
        .tab-container {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #00baf2;
            padding: 10px;
            border-radius: 10px;
            position: relative;
        }

        .tabs {
            list-style: none;
            display: flex;
            overflow: hidden;
            width: 90%;
            padding: 0;
            margin: 0;
            white-space: nowrap;
            scroll-behavior: smooth;
        }

        .tab {
            padding: 10px 25px;
            cursor: pointer;
            color: #fff;
            border-bottom: 2px solid transparent;
            transition: border-bottom 0.3s;
        }

        .tab.active {
            border-bottom: 2px solid #fff;
        }

        .arrow {
            /* background-color: #6c63ff; */
            border: none;
            color: rgb(0, 0, 0);
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 50%;
            position: absolute;
        }

        .left-arrow {
            left: 1rem;
        }

        .right-arrow {
            right: 1rem;
        }


        .content-item {
            display: none;
        }

        .content-item.active {
            display: block;
        }

        .file-uploader {
            flex: 0 1 400px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            background-color: #fff;
            border-radius: 5px;

            #file-input {
                display: none;
            }

            label[for="file-input"] {
                padding: .6em 1.5em;
                flex: 1 1 auto;
                text-align: center;
                color: #FFF;
                background-color: #00baf2;
                box-shadow: 1px 0 10px rgba(0, 0, 0, .15);
                border-radius: 5px;
                cursor: pointer;
            }

            .image-preview {
                margin: 0 0 1rem;
                min-height: 250px;
                flex: 1 0 75%;
                background-color: #c1c1c1;
            }
        }
    </style>
@endsection

@section('content-area')
    <div class="pagetitle">
        <h1>Marketing Assets</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('partner-dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Marketing Assets</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="row">
        <div class="tab-container">
            <button class="arrow left-arrow" onclick="moveTabs(-1)">&#x276E;</button>
            <ul class="tabs">
                <li class="tab active" onclick="showContent('home')">Marketing Material</li>
                <li class="tab" onclick="showContent('logo')">Logo</li>
                <li class="tab" onclick="showContent('recruitment')">Recruitment</li>
                <li class="tab" onclick="showContent('certificate')">Certificate</li>
                <li class="tab" onclick="showContent('id-card')">ID Card</li>
                <li class="tab" onclick="showContent('visiting')">Visiting Card</li>
                <li class="tab" onclick="showContent('standee')">Standee</li>
                <li class="tab" onclick="showContent('banner')">Banner</li>
                <li class="tab" onclick="showContent('social-media')">Social Media</li>
                <li class="tab" onclick="showContent('qr-code')">QR Code</li>
                <li class="tab" onclick="showContent('invite')">Invite</li>
                <li class="tab" onclick="showContent('agreement')">Agreement</li>
                <li class="tab" onclick="showContent('mmm')">Monday Money Motivation</li>
            </ul>
            <button class="arrow right-arrow" onclick="moveTabs(1)">&#x276F;</button>
        </div>
    </div>
    {{-- Marketing Material  --}}
    <div class="content" style="margin-top: 20px">
        <div id="home" class="content-item shadow">
            <div class="row pt-3 ps-3 d-flex justify-content-between">
                <div class="col-2">
                    <h5 style="color: #00baf2">Marketing Material</h5>
                </div>
            </div>
            <div class="row p-3">
                <div class="col-md-6 mb-3">
                    <label class="mr-sm-2 mb-1" for="selectProduct">Select Product</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected disabled>Choose....</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3 ps-3">
                    <label class="mr-sm-2 mb-1" for="selectBank">Select Bank</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected disabled>Choose....</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card p-1" style="width: 20rem;">
                        <img class="card-img-top"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ_FWF2judaujT30K9sMf-tZFhMWpgP6xCemw&s"
                            alt="Card image cap">
                        <div class="card-body p-2 text-center">
                            <a href="" class="btn btn-danger">Delete</a>
                            <a href=""class="btn forcolor ms-3">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Marketing Material end  --}}
    {{-- Logo  --}}

    <div class="content">
        <div id="logo" class="content-item shadow">
            <div class="row pt-3 ps-3 d-flex justify-content-between" style="padding-right: 20px;">
                <div class="col-2">
                    <h5 style="color: #00baf2">Logo</h5>
                </div>
            </div>
            {{-- @dd($logos); --}}
            <div class="row p-3">
                <div class="col-md-6 mb-3">
                    <div class="card p-1" style="width: 20rem;">
                        <img class="card-img-top" src="{{ asset($logo->media ?? $logo) }}" alt="Logo not found">
                        <div class="card-body p-2 text-center" style="margin-top: 16px;">
                            {{-- <a href="" class="btn btn-danger" id="" >Delete</a> --}}
                            <a href=""class="btn forcolor ms-3">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Logo end --}}

    {{-- Recruitment Start --}}
    <div class="content">
        <div id="recruitment" class="content-item shadow">
            <div class="row pt-3 ps-3 d-flex justify-content-between">
                <div class="col-2">
                    <h5 style="color: #00baf2">Recruitment</h5>
                </div>
            </div>
            <div class="row p-3">
                <div class="col-md-6 mb-3">
                    <div class="card p-1" style="width: 100%;">
                        <img class="card-img-top" height="100%" width="100%"
                            src="{{ asset($recruitment->media ?? '') }}" alt="Recruitment not found">
                        <div class="card-body p-2 text-center">
                            <a href=""class="btn forcolor ms-3">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Recruitment end --}}

    {{-- Certificate start --}}
    <div class="content">
        <div id="certificate" class="content-item shadow">
            <div class="row pt-3 ps-3 d-flex justify-content-between">
                <div class="col-2">
                    <h5 style="color: #00baf2">Certificate</h5>
                </div>
                <div class="row p-3">
                    <div class="col-md-6 mb-3">
                        <div class="card p-1" style="width: 100%;">
                            <img class="card-img-top" style="" height="100%" width="100%"
                                src="{{ asset($certificate->media ?? '') }}" alt="Certificate not found.">
                            <div class="card-body p-2 text-center">
                                {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                                <a href=""class="btn forcolor ms-3">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Certificate end --}}
        {{-- Id Card Start --}}
        <div class="content">
            <div id="id-card" class="content-item shadow">
                <div class="row pt-3 ps-3 d-flex justify-content-between">
                    <div class="col-2">
                        <h5 style="color: #00baf2">ID Card</h5>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-md-6 mb-3 m-auto">
                        <div class="card p-1" style="width: 100%;">
                            <img class="card-img-top" height="100%" width="100%"
                                src="{{ asset($idcard->media ?? '') }}" alt="ID Card not found">
                            <div class="card-body p-2 text-center">
                                <a href=""class="btn forcolor ms-3">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Id Card end --}}
        {{-- Visiting Card start --}}
        <div class="content">
            <div id="visiting" class="content-item shadow">
                <div class="row pt-3 ps-3 d-flex justify-content-between">
                    <div class="col-2">
                        <h5 style="color: #00baf2">Visiting Card</h5>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-md-6 mb-3 m-auto">
                        <div class="card p-1" style="width: 30rem;">
                            <img class="card-img-top" height="100%" width="100%"
                                src="{{ asset($visiting->media ?? '') }}" alt="ID Card not found">
                            <div class="card-body p-2 text-center">
                                <a href=""class="btn forcolor ms-3">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Standee Start --}}
        <div class="content">
            <div id="standee" class="content-item shadow">
                <div class="row pt-3 ps-3 d-flex justify-content-between">
                    <div class="col-2">
                        <h5 style="color: #00baf2">Standee</h5>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-md-6 mb-3">
                        <div class="card p-1">
                            <img class="card-img-top" height="100%"width="100%" src="{{ asset($standee->media ?? '') }}"
                                alt="Standee not found.">
                            <div class="card-body p-2 text-center">
                                {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                                <a href=""class="btn forcolor ms-3">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Banner start --}}
        <div class="content">
            <div id="banner" class="content-item shadow">
                <div class="row pt-3 ps-3 d-flex justify-content-between">
                    <div class="col-2">
                        <h5 style="color: #00baf2">Banner</h5>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-md-6 mb-3">
                        <div class="card p-1" style="width: 100%;">
                            <img class="card-img-top" height="100%" width="100%"
                                src="{{ asset($banner->media ?? '') }}" alt="Banner not found.">
                            <div class="card-body p-2 text-center">
                                {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                                <a href=""class="btn forcolor ms-3">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Banner end --}}

        {{-- Socai Media --}}
        <div class="content" style="margin-top: 20px">
            <div id="social-media" class="content-item shadow">
                <div class="row pt-3 ps-3 d-flex justify-content-between">
                    <div class="col-2">
                        <h5 style="color: #00baf2">Social Media</h5>
                    </div>
                </div>
                <div class="row p-3">
                    @foreach ($socialmedia as $item)
                        <div class="col-md-4 mb-3">
                            <div class="card p-1" style="width: 20rem;">
                                <img class="card-img-top" height="250px" src="{{ asset($item->media ?? '') }}"
                                    alt="No social Media Post">
                                <div class="card-body p-2 text-center">
                                    <a href="{{ route('delete-socialmedia', encrypt($item->id)) }}"
                                        class="btn btn-danger">Delete</a>
                                    <a href=""class="btn forcolor ms-3">Download</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- Socai end --}}

        {{-- QR Code --}}
        <div class="content" style="margin-top: 20px">
            <div id="qr-code" class="content-item shadow">
                <div class="row pt-3 ps-3 d-flex justify-content-between">
                    <div class="col-2">
                        <h5 style="color: #00baf2">QR Code</h5>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-md-4 mb-3">
                        <div class="card p-1" style="width: 20rem;">
                            <img class="card-img-top" src="{{ asset($qrcode->media ?? '') }}"
                                alt="QR code asset not found.">
                            <div class="card-body p-2 text-center">
                                {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                                <a href=""class="btn forcolor ms-3">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- QR Code end --}}

        {{-- Invite Start --}}
        <div class="content" style="margin-top: 20px">
            <div id="invite" class="content-item shadow">
                <div class="row pt-3 ps-3 d-flex justify-content-between">
                    <div class="col-2">
                        <h5 style="color: #00baf2">Invites</h5>
                    </div>
                </div>
                <div class="row p-3">
                    @foreach ($invite as $item)
                        <div class="col-md-4 mb-3">
                            <div class="card p-1" style="width: 20rem;">
                                <img class="card-img-top" height="250px" src="{{ asset($item->media ?? '') }}"
                                    alt="No social Media Post">
                                <div class="card-body p-2 text-center">
                                    <a href="{{ route('delete-invite', encrypt($item->id)) }}"
                                        class="btn btn-danger">Delete</a>
                                    <a href=""class="btn forcolor ms-3">Download</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- Invite end --}}

        {{-- Agreement Start --}}
        <div class="content">
            <div id="agreement" class="content-item shadow">
                <div class="row pt-3 ps-3 d-flex justify-content-between">
                    <div class="col-2">
                        <h5 style="color: #00baf2">Agreement</h5>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-md-6 mb-3">
                        <div class="card p-1" style="width: 100%;">
                            <img class="card-img-top" height="100%" width="100%"
                                src="{{ asset($agreement->media ?? '') }}" alt="Card image cap">
                            <div class="card-body p-2 text-center">

                                <a href=""class="btn forcolor ms-3">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Agreement end --}}

        {{-- Monday Money Motivation Start --}}
        <div class="content" style="margin-top: 20px">
            <div id="mmm" class="content-item shadow">
                <div class="row pt-3 ps-3 d-flex justify-content-between">
                    <div class="col-4">
                        <h5 style="color: #00baf2">Monday Money Motivation</h5>
                    </div>
                </div>
                <div class="row p-3">
                    @foreach ($mmm as $item)
                        <div class="col-md-4 mb-3">
                            <div class="card p-1" style="width: 20rem;">
                                <img class="card-img-top" height="250px" src="{{ asset($item->media ?? '') }}"
                                    alt="No social Media Post">
                                <div class="card-body p-2 text-center">
                                    <a href="{{ route('delete-mmm', encrypt($item->id)) }}"
                                        class="btn btn-danger">Delete</a>
                                    <a href=""class="btn forcolor ms-3">Download</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- Monday Money Motivation end --}}
    @endsection


    @section('script-area')
        <script>
            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif

            @if (session('error'))
                toastr.error("{{ session('error') }}");
            @endif
        </script>
        <script>
            let currentIndex = 0;
            const tabWidth = 120; // Approximate width of a tab
            const visibleTabs = 5;

            function showContent(id) {
                document.querySelectorAll('.tab').forEach(tab => {
                    tab.classList.remove('active');
                });
                document.querySelectorAll('.content-item').forEach(content => {
                    content.classList.remove('active');
                });

                document.querySelector(`.tab[onclick="showContent('${id}')"]`).classList.add('active');
                document.getElementById(id).classList.add('active');
            }

            function moveTabs(direction) {
                const tabsContainer = document.querySelector('.tabs');
                const maxScroll = (tabsContainer.children.length - visibleTabs) * tabWidth;

                currentIndex += direction;
                if (currentIndex < 0) {
                    currentIndex = 0;
                } else if (currentIndex > maxScroll / tabWidth) {
                    currentIndex = maxScroll / tabWidth;
                }

                tabsContainer.scrollLeft = currentIndex * tabWidth;
            }
            document.addEventListener('DOMContentLoaded', () => {
                showContent('home');
            });
        </script>
    @endsection
