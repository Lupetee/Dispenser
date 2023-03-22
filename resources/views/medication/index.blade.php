@extends('layouts.admin')

@section('title', '24Hr Medication')
@section('content-header', '24Hr Medication')
@section('content-actions')
    @if (Auth::user()->roles == 'nurse')
        <a href="{{ route('medication.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> 24Hr Medication</a>
    @endif
    @if (Auth::user()->roles == 'admin')
        <a href="{{ route('medication.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> 24Hr Medication</a>
    @endif
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')

    <div class="container-fluid m-0 p-0">
        <form action="{{ route('medication.index') }}" method="GET">
            <div class="d-flex w-100">
                <input value="{{ $query }}" class="form-control w-100" name="query" type="search" placeholder="Search" aria-label="Search">

                <input class="btn btn-outline-success" type="submit"Search/>
            </div>
        </form>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Date</th>
                        <th>Name of Patient</th>
                        <th>Medicines & IV Fluids</th>
                            <th>Requested(Quantity)</th>
                            <th>Dispensed(Quantity)</th>
                        <th>Prepared by (Nurse on Duty)</th>
                        <th>Checked / Revied by (Pharmacist on Duty)</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medication as $items)
                        <tr>
                            <td>{{ $items->updated_at }}</td>
                            <td>{{ $items->name }}</td>
                            <td>{{ $items->medicine }}</td>
                            <td>{{ $items->requested }}</td>
                            <td>{{ $items->dispensed }}</td>
                            <td>{{ $items->nurse}}</td>
                            <td>{{ $items->pharmacist }}</td>
                            <td>{{ $items->remarks }}</td>
                            <td>
                                <a href="{{ route('medication.editreplicate', $items->id)}}" class="btn btn-primary"><i
                                        class="fas fa-edit"></i></a>

                                {{-- <button class="btn btn-danger btn-delete"
                                    data-url="{{ route('medication.destroy', $items)}}"><i
                                        class="fas fa-trash"></i></button> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
           
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-delete', function() {
                $this = $(this);
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Are you sure?',
                    text: "Do you really want to delete this?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.post($this.data('url'), {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}'
                        }, function(res) {
                            $this.closest('tr').fadeOut(500, function() {
                                $(this).remove();
                            })
                        })
                    }
                })
            })
        })
    </script>
@endsection
