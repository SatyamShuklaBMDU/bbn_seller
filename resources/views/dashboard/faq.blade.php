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
            color: #7288a2;
            font-size: 1.15rem;
            font-weight: 400;
            border: none;
            background: none;
            outline: none;
        }

        .accordion button:hover,
        .accordion button:focus {
            cursor: pointer;
            color: #03b5d2;
        }

        .accordion button:hover::after,
        .accordion button:focus::after {
            cursor: pointer;
            color: #03b5d2;
            border: 1px solid #03b5d2;
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
            color: #03b5d2;
        }

        .accordion button[aria-expanded='true'] .icon::after {
            width: 0;
        }

        .accordion button[aria-expanded='true']+.accordion-content {
            opacity: 1;
            max-height: 9em;
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
    <div class="row">
        <div class="col-md-6">
            <a href="{{ url()->previous() }}" class="btn forcolor">Back</a>
        </div>
    </div>
    <div class="container">
        <h2>Frequently Asked Questions</h2>
        <div class="accordion">
            @foreach ($faqs as $faq)
                <div class="accordion-item">
                    <button id="accordion-button-1" aria-expanded="false">
                        <span class="accordion-title">{{ $faq->title }}</span>
                        <span class="icon" aria-hidden="true"></span>
                    </button>
                    <div class="accordion-content d-flex">
                        <div class="col-md-12">
                            <p>{{ $faq->description }}</p>
                        </div>
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
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
    </script>  
@endsection
