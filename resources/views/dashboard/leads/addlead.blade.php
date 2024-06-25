@extends('include.master')
@section('content-area')
    <section class="section profile">
        <div class="row pb-2" style="border-bottom: 1px solid black;">
            <div class="col-sm-6 fs-5"><span style="color: #009ec3;font-weight: bold;">New Lead</span></div>
            <div class="col-sm-6 text-end"><span class="text-danger fw-bold fs-5">*</span> Mandatory Field</div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('lead-store') }}" method="POST">
            @csrf
            <div class="row mt-4">
                <div class="col-md-3" style="padding-right: 10px;">
                    <label for="loan_amount" class="form-label">Loan Amount (Only Digit)<span
                            class="text-danger">*</span></label>
                    <input type="number" name="loan_amount" id="loan_amount" class="form-control" />
                </div>
                <div class="col-md-3" style="padding-right: 10px;">
                    <label for="fname" class="form-label">First Name<span class="text-danger">*</span></label>
                    <input type="text" name="fname" id="fname" class="form-control" />
                </div>
                <div class="col-md-3" style="padding-right: 10px;">
                    <label for="lname" class="form-label">Last Name<span class="text-danger">*</span></label>
                    <input type="text" name="lname" id="lname" class="form-control" />
                </div>
                <div class="col-md-3" style="padding-right: 10px;">
                    <label for="mobile_no" class="form-label">Mobile Number (Only Digit)<span
                            class="text-danger">*</span></label>
                    <input type="number" name="mobile_no" id="mobile_no" class="form-control" />
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3" style="padding-right: 10px;">
                    <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                    <input type="text" name="address" id="address" class="form-control" />
                </div>
                <div class="col-md-3" style="padding-right: 10px;">
                    <label for="pincode" class="form-label">Pincode<span class="text-danger">*</span></label>
                    <input type="text" name="pincode" id="pincode" class="form-control" />
                </div>
                <div class="col-md-3" style="padding-right: 10px;">
                    <label for="pan_card" class="form-label">PAN Card<span class="text-danger">*</span></label>
                    <input type="text" name="pan_card" id="pan_card" class="form-control" />
                </div>
                <div class="col-md-3" style="padding-right: 10px;">
                    <label for="aadhar_card" class="form-label">Aadhaar Card<span class="text-danger">*</span></label>
                    <input type="text" name="aadhar_card" id="aadhar_card" class="form-control" />
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3" style="padding-right: 10px;">
                    <label for="employment_type" class="form-label">Employment Type<span
                            class="text-danger">*</span></label>
                    <select class="form-select" name="employment_type" id="employment_type">
                        <option selected>Select</option>
                        <option value="salaried">Salaried</option>
                        <option value="self_employed">Self Employment</option>
                    </select>
                </div>
                <div class="col-md-3" style="padding-right: 10px;">
                    <label for="email" class="form-label">Email ID<span class="text-danger">*</span></label>
                    <input type="text" name="email" id="email" class="form-control" />
                </div>
                <div class="col-md-3" style="padding-right: 10px;">
                    <label for="product_id" class="form-label">Product<span class="text-danger">*</span></label>
                    <select class="form-select" name="product_id" id="product_id">
                        <!-- Options will be populated via JavaScript -->
                    </select>
                </div>
                <div class="col-md-3" style="padding-right: 10px;">
                    <label for="type_id" class="form-label">Type<span class="text-danger">*</span></label>
                    <select class="form-select" name="type_id" id="type_id">
                        <!-- Options will be populated via JavaScript -->
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3">
                    <label for="refrences" class="form-label">Refrences<span class="text-danger">*</span></label>
                    <input type="text" name="refrences" id="refrences" class="form-control" />
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12 d-flex">
                    <input type="checkbox" name="" id="firstcon"><span class="text-danger">*</span>&nbsp;<label
                        for="firstcon" style="font-size: 12px;">I Authorize BBN Fincon Pvt. Ltd. & its representatives to
                        call, SMS or Communicate Via what's App or mobile with refrences to the information given in the
                        above basic information. This consent will override any DNC / NDNC registration.</label>
                </div>
                <div class="col-md-12 d-flex">
                    <input type="checkbox" name="" id="secondcon"><span class="text-danger">*</span>&nbsp;<label
                        for="secondcon" style="font-size: 12px;">I hereby apoint BBN Fincon Pvt. Ltd. as my authorised
                        representative to recieve my credit information from credit bureau, as if applicable. I hereby
                        irrevocably and unconditionally consent to such credit information being provided by CIBIL/Experian
                        at my registered email ID.</label>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <a href="{{ url()->previous() }}" class="btn forcolor">Back</a>
                </div>
                <div class="col-md-6 text-end">
                    <button type="submit" class="btn forcolor">Submit</button>
                </div>
            </div>
        </form>
    </section>
@endsection
@section('script-area')
    <script>
        $(document).ready(function() {
            $('#employment_type').change(function() {
                var employmentType = $(this).val();
                if (employmentType) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('get-products') }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            employment_type: employmentType
                        },
                        success: function(data) {
                            $('#product_id').empty().append('<option selected>Select</option>');
                            $.each(data, function(key, value) {
                                $('#product_id').append('<option value="' + value.id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                }
            });

            $('#product_id').change(function() {
                var productId = $(this).val();
                if (productId) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('get-types') }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            product_id: productId
                        },
                        success: function(data) {
                            $('#type_id').empty().append('<option selected>Select</option>');
                            $.each(data, function(key, value) {
                                $('#type_id').append('<option value="' + value.id +
                                    '">' + value.type + '</option>');
                            });
                        }
                    });
                }
            });
            $('form').append('<div id="checkbox-error" class="text-danger mt-2"></div>');
            $('form').submit(function(e) {
                $('#checkbox-error').text('');
                if (!$('#firstcon').is(':checked') || !$('#secondcon').is(':checked')) {
                    $('#checkbox-error').text(
                        'Please agree to both terms and conditions before submitting the form.');
                    e.preventDefault();
                }
            });
        });
    </script>
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
    </script>
@endsection
