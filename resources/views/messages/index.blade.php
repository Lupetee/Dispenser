@extends('layouts.admin')

@section('title', 'Message')
@section('content-header', 'Message')

@section('content')
<div class="card"><!-- -->
    <div class="card-body">
        <form action="{{ route('messages.store') }}" method="post">
            @csrf
           
            <div class="form-group">
                <label for="message">Message</label>
                <textarea  name="message" class="form-control @error('message') is-invalid @enderror" id="message" 
                value="Message / Comment"></textarea>
                @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            @if(Auth::user()->roles=='admin')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">From</label>
                    <select name="name" class="form-control @error('name') is-invalid @enderror" aria-label="select example">
                    <option selected disabled>Select</option>
                    <option value="Nurse Station 1">Nurse Station 1</option>
                    <option value="Nurse Station 2">Nurse Station 2</option>
                    <option value="Nurse Station 3">Nurse Station 3</option>
                    <option value="Nurse Station 4">Nurse Station 4</option>
                    <option value="Nurse Station 5">Nurse Station 5</option>
                    <option value="Nurse Station 6">Nurse Station 6</option>
                    <option value="Pharmacy">Pharmacy</option>
                    </select>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                @endif

                @if(Auth::user()->roles=='nurse')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">From</label>
                    <select name="name" class="form-control @error('name') is-invalid @enderror" aria-label="select example">
                    <option selected disabled>Select</option>
                    <option value="Nurse Station 1">Nurse Station 1</option>
                    <option value="Nurse Station 2">Nurse Station 2</option>
                    <option value="Nurse Station 3">Nurse Station 3</option>
                    <option value="Nurse Station 4">Nurse Station 4</option>
                    <option value="Nurse Station 5">Nurse Station 5</option>
                    <option value="Nurse Station 6">Nurse Station 6</option>
                    </select>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                @endif

                @if(Auth::user()->roles=='pharmacy')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">From</label>
                    <select name="name" class="form-control @error('name') is-invalid @enderror" aria-label="select example">
                    <option selected disabled>Select</option>
                    <option value="Pharmacy">Pharmacy</option>
                    </select>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                @endif


                <button type="submit" class="btn btn-success btn-block btn-lg"><i class="fas fa-check"></i> Submit</button>
            </form>
        </div>
    </div>
         @if(Auth::user()->roles=='admin')
            <div class="card product-list">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <!-- -->
                                <th>From</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($message as $message)
                                <tr>
                                    <td>{{ $message->name}}</td>
                                    <td>{{ $message->message }}</td>
                                    <td>
                                     <form action="{{ route('messages.destroy', $message->id) }}" method="POST" style="display: inline-block">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" class="btn btn-danger" >Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

            @if(Auth::user()->roles=='nurse')
            <div class="card product-list">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <!-- -->
                                <th>From</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($message as $message)
                                <tr>
                                    <td>{{ $message->name}}</td>
                                    <td>{{ $message->message }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

            @if(Auth::user()->roles=='pharmacy')
            <div class="card product-list">
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <!-- -->
                                <th>From</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($message as $message)
                                <tr>
                                    <td>{{ $message->name}}</td>
                                    <td>{{ $message->message }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

<!-- -->
@endsection
