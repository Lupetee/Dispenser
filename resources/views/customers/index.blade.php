@extends('layouts.admin')

@section('title', 'Patient Management')
@section('content-header', 'Patient Management')
@section('content-actions')
    @if (Auth::user()->roles == 'nurse')
        <a href="{{ route('customers.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add New Patient</a>
    @endif
    @if (Auth::user()->roles == 'admin')
        <a href="{{ route('customers.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add New Patient</a>
    @endif
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')

    <div class="container-fluid m-0 p-0">
        <form action="{{ route('customers.index') }}" method="GET">
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
                        <th>ID Number</th>
                        <th>Name</th>
                        <th>Room Number</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                            <td>{{ $customer->room_number }}</td>
                            <td>{{ $customer->created_at }}</td>
                            <td>
                                <a href="{{ route('customers.edit', $customer) }}" class="btn btn-primary"><i
                                        class="fas fa-edit"></i></a>
                                <button class="btn btn-danger btn-delete"
                                    data-url="{{ route('customers.destroy', $customer) }}"><i
                                        class="fa-solid fa-box-archive"></i></button>
                                        
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $customers->render() }}
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
                    text: "Do you really want to delete this customer?",
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
