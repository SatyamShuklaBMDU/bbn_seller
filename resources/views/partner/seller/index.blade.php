@extends('partner.include.master')
@section('style-area')
    <style>
        .dt-button {
            background-color: #009ec3 !important;
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

        .statusSwitch {
            --s: 20px;
            height: calc(var(--s) + var(--s)/5);
            width: auto;
            aspect-ratio: 2.25;
            border-radius: var(--s);
            margin: calc(var(--s)/2);
            display: grid;
            cursor: pointer;
            background-color: #ff7a7a;
            box-sizing: content-box;
            overflow: hidden;
            transition: .3s .1s;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .statusSwitch:before {
            content: "";
            padding: calc(var(--s)/10);
            --_g: radial-gradient(circle closest-side at calc(100% - var(--s)/2) 50%, #000 96%, #0000);
            background:
                var(--_g) 0 /var(--_p, var(--s)) 100% no-repeat content-box,
                var(--_g) var(--_p, 0)/var(--s) 100% no-repeat content-box,
                #fff;
            mix-blend-mode: darken;
            filter: blur(calc(var(--s)/12)) contrast(11);
            transition: .4s, background-position .4s .1s,
                padding cubic-bezier(0, calc(var(--_i, -1)*200), 1, calc(var(--_i, -1)*200)) .25s .1s;
        }

        .statusSwitch:checked {
            background-color: #85ff7a;
        }

        .statusSwitch:checked:before {
            padding: calc(var(--s)/10 + .05px) calc(var(--s)/10);
            --_p: 100%;
            --_i: 1;
        }
    </style>
@endsection
@section('content-area')
    <div class="pagetitle">
        <h1>All Sellers</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('partner-dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">All Sellers</li>
            </ol>
        </nav>
    </div>
    <section class="section dashboard">
        <div class="row">
            <div class="col-md-6">
                <a href="{{ url()->previous() }}" class="btn forcolor">Back</a>
            </div>
            <div class="col-md-6 text-end">
                <button class="btn forcolor" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                        class="fas fa-question-circle"></i> Add Seller</button>
            </div>
        </div>
        <div class="row">
            <section class="main_content dashboard_part">
                <div class="main_content_iner">
                    <div class="container-fluid plr_30 body_white_bg pt_30">
                        <div class="row justify-content-center"style="margin-top: 20px !important;">
                            <div class="col-lg-12"> <!-- Table -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="card">
                                    <div class="card-body table-responsive">
                                        <table id="customerTable" class="display nowrap" style="width:100%">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>S no.</th>
                                                    <th>Created Date</th>
                                                    <th>UniqueId</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sellers as $seller)
                                                    <tr class="text-center">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $seller->created_at->format('d/m/y') }}</td>
                                                        <td>{{ $seller->seller_id }}</td>
                                                        <td>{{ $seller->name }}</td>
                                                        <td>{{ $seller->email }}</td>
                                                        <td>
                                                            <a href="{{ route('get-specific-seller-lead', encrypt($seller->id)) }}"
                                                                class="btn forcolor"><i class="fa-solid fa-file"></i></a>
                                                            <button class="btn forcolor edit-btn"
                                                                data-id="{{ $seller->id }}"
                                                                data-name="{{ $seller->name }}"
                                                                data-email="{{ $seller->email }}"><i
                                                                    class="fas fa-edit"></i></button>
                                                            <button class="btn forcolor delete-btn"
                                                                data-id="{{ $seller->id }}"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </td>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Seller</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('partner-store-seller') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn forcolor">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Manager Modal -->
    <div class="modal fade" id="editManagerModal" tabindex="-1" aria-labelledby="editManagerLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editManagerLabel">Edit Seller</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editManagerForm" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" name="name" id="edit_name">
                        </div>
                        <div class="mb-3">
                            <label for="edit_email" class="col-form-label">Email:</label>
                            <input type="email" name="email" id="edit_email" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn forcolor">Update Seller</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script-area')
    <script>
        $(document).ready(function() {
            $('#customerTable').DataTable({
                dom: '<"top"Bf>rt<"bottom"lp><"clear">',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                lengthMenu: [10, 25, 50, 75, 100],
                pageLength: 10,
                drawCallback: function(settings) {}
            });
        });
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        $('.edit-btn').click(function() {
            let seller = $(this).data();
            $('#edit_name').val(seller.name);
            $('#edit_email').val(seller.email);
            $('#editManagerForm').attr('action', `{{ url('partner/partner-seller-update') }}/${seller.id}`);
            $('#editManagerModal').modal('show');
        });
        $(document).ready(function() {
            $('.delete-btn').click(function() {
                let id = $(this).data('id');
                let deleteUrl = `{{ url('partner/seller-delete') }}/${id}`;
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: deleteUrl,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    'Seller has been deleted.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
