@extends('include.master')
@section('style-area')
    <style>
        .dt-button {
            background-color: #00baf2 !important;
            color: white !important;
            border: none !important;
            border-radius: 8px !important;
            box-shadow: 2px 10px 9px 0px #00000063 !important
        }

        .dataTables_length {
            margin-top: 10px;
        }

        .dataTables_wrapper .dataTables_filter input {
            border-radius: 12px !important;
        }
    </style>
@endsection
@section('content-area')
    <section class="section dashboard">
        <div class="row pb-2" style="border-bottom: 1px solid black;">
            <div class="col-sm-6 fs-5"><span style="color: #00baf2;font-weight: bold;">All Lead</span></div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <a href="{{ url()->previous() }}" class="btn forcolor">Back</a>
            </div>
            <div class="col-md-6 text-end">
                <a class="btn forcolor" href="{{ route('lead-index') }}"><i class="fas fa-question-circle"></i> Add Leads</a>
            </div>
        </div>
        <div class="row">
            <section class="main_content dashboard_part">
                <div class="main_content_iner">
                    <div class="container-fluid plr_30 body_white_bg pt_30">
                        <div class="row justify-content-center"style="margin-top: 20px !important;">
                            <div class="col-lg-12"> <!-- Table -->
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table id="customerTable" class="display nowrap" style="width:100%">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>S no.</th>
                                                    <th>Created Date</th>
                                                    <th>Lead Id</th>
                                                    <th>Loan Amount</th>
                                                    <th>Name</th>
                                                    <th>Phone Number</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Pincode</th>
                                                    <th>PanCard</th>
                                                    <th>AdharCard</th>
                                                    <th>Employment Type</th>
                                                    <th>Product</th>
                                                    <th>Type</th>
                                                    <th>Refrences</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sellers as $seller)
                                                    <tr class="text-center">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $seller->created_at->format('d/m/y') }}</td>
                                                        <td>{{ $seller->lead_id }}</td>
                                                        <td>{{ $seller->loan_amount }}</td>
                                                        <td>{{ $seller->name }}</td>
                                                        <td>{{ $seller->mobile_no }}</td>
                                                        <td>{{ $seller->email }}</td>
                                                        <td>{{ $seller->address }}</td>
                                                        <td>{{ $seller->pincode }}</td>
                                                        <td>{{ $seller->pan_card }}</td>
                                                        <td>{{ $seller->aadhar_card }}</td>
                                                        <td>{{ ucfirst($seller->employment_type) }}</td>
                                                        <td>{{ $seller->product?->name }}</td>
                                                        <td>{{ $seller->type?->type }}</td>
                                                        <td>{{ $seller->refrences }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </section>
@endsection

@section('script-area')
    <script>
        $(document).ready(function() {
            $('#customerTable').DataTable({
                dom: '<"top"Bf>rt<"bottom"lp><"clear">',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                scrollY: 342,
                 scrollX: true,
                lengthMenu: [10, 25, 50, 75, 100],
                pageLength: 10,
                drawCallback: function(settings) {}
            });
        });
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
    </script>
@endsection
