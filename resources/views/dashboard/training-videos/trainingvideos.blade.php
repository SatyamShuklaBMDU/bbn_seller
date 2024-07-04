@extends('include.master')
@section('style-area')
    <style>
        .container {
            margin: 0 auto;
            margin-top: 10px;
            padding-left: 0% !important;
            padding-right: 0% !important;
        }

        .accordion .accordion-item {
            border-bottom: 1px solid #e5e5e5;
            padding-left: 10px;
            padding-right: 10px;
        }

        .accordion .accordion-item button[aria-expanded='true'] {
            border-bottom: 1px solid #03b5d2;
        }

        .accordion button {
            position: relative;
            display: block;
            text-align: left;
            width: 100%;
            padding: 1em 0;
            color: #00baf2;
            font-size: 1.15rem;
            font-weight: 400;
            border: none;
            background: none;
            outline: none;
        }

        .accordion button:hover,
        .accordion button:focus {
            cursor: pointer;
            color: #00baf2;
        }

        .accordion button:hover::after,
        .accordion button:focus::after {
            cursor: pointer;
            color: #00baf2;
            border: 1px solid #00baf2;
        }

        .accordion button .accordion-title {
            padding: 1em 1.5em 1em 0;
        }

        .accordion button .icon {
            display: inline-block;
            position: absolute;
            top: 18px;
            right: 0;
            width: 22px;
            height: 22px;
            border: 1px solid;
            border-radius: 22px;
        }

        .accordion button .icon::before {
            display: block;
            position: absolute;
            content: '';
            top: 9px;
            left: 5px;
            width: 10px;
            height: 2px;
            background: currentColor;
        }

        .accordion button .icon::after {
            display: block;
            position: absolute;
            content: '';
            top: 5px;
            left: 9px;
            width: 2px;
            height: 10px;
            background: currentColor;
        }

        .accordion button[aria-expanded='true'] {
            color: #00baf2;
        }

        .accordion button[aria-expanded='true'] .icon::after {
            width: 0;
        }

        .accordion button[aria-expanded='true']+.accordion-content {
            opacity: 1;
            max-height: 20em;
            transition: all 200ms linear;
            will-change: opacity, max-height;
        }

        .accordion .accordion-content {
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transition: opacity 200ms linear, max-height 200ms linear;
            will-change: opacity, max-height;
        }

        .accordion .accordion-content p {
            font-size: 1rem;
            font-weight: 300;
            margin: 2em 0;
            white-space: pre-wrap;
            word-wrap: break-word;
            overflow-wrap: break-word;
            overflow: hidden;
        }
    </style>
@endsection
@section('content-area')
    <div class="pagetitle">
        <h1>All Training Video</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Training Video</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ url()->previous() }}" class="btn forcolor">Back</a>
        </div>
        {{-- <div class="col-md-6 text-end">
            <button class="btn forcolor" type="button" data-bs-toggle="modal" data-bs-target="#addnewsectionModal"> Add
                New Section</button>
            <button class="btn forcolor" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"> Add New
                Video</button>
        </div> --}}
    </div>

  

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="accordion">
            @foreach ($sections as $section)
                <div class="accordion-item">
                    <button id="accordion-button-{{ $section->id }}" aria-expanded="false">
                        <span class="accordion-title">{{ $section->training_name }}</span>
                        <span class="icon" aria-hidden="true"></span>
                    </button>
                    <div class="accordion-content d-flex">
                        @foreach ($videos->where('for', $section->id) as $video)
                            <div class="col-md-4 mb-4 ms-2">
                                <div class="mt-1 text-center"style="background-color:#00baf2">
                                    <h5 class="py-2"style="color: #ffffff;margin:0% !important">{{ $video->title }}</h5>
                                </div>
                                <video class="col-12"controls>
                                    <source src="{{ 'https://bmdublog.com/bbn-finance/public/'.($video->media_url) }}" type="video/mp4">
                                </video>
                            </div>
                        @endforeach
                        @if ($videos->where('for', $section->id)->isEmpty())
                            <p>No videos found for this section.</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    



@endsection
@section('script-area')
    <script>
        const items = document.querySelectorAll('.accordion button');

        function toggleAccordion() {
            const itemToggle = this.getAttribute('aria-expanded');
            for (i = 0; i < items.length; i++) {
                items[i].setAttribute('aria-expanded', 'false');
            }
            if (itemToggle == 'false') {
                this.setAttribute('aria-expanded', 'true');
            }
        }
        items.forEach((item) => item.addEventListener('click', toggleAccordion));
    </script>
@endsection
