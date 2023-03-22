@extends('layouts.admin')

@section('title', 'Patient Info')

@section('content')
    <form action="{{ route('customers.update', $customer) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">

                <li class="breadcrumb-item "><a href="#info">Patient Info</a></li>
                <li class="breadcrumb-item "><a href="#history">Medical History</a></li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <h4 id="info" class="mb-2">Patient Info</h4>

                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                        id="first_name" placeholder="First Name" value="{{ old('first_name', $customer->first_name) }}">
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                        id="last_name" placeholder="Last Name" value="{{ old('last_name', $customer->last_name) }}">
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="nickname">Nickname</label>
                    <input type="text" name="nickname" class="form-control @error('nickname') is-invalid @enderror"
                        id="nickname" placeholder="Nick Name" value="{{ old('nickname', $customer->nickname) }}">
                    @error('nickname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="Email Address" value="{{ old('email', $customer->email) }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="room_number">Room Number</label>
                    <input type="text" name="room_number" class="form-control @error('room_number') is-invalid @enderror"
                        id="room_number" placeholder="Room Number" value="{{ old('room_number', $customer->room_number) }}">
                    @error('room_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="date_of_birth">Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror"
                        id="date_of_birth" placeholder="Date of Birth" value="{{ old('date_of_birth', $customer->date_of_birth) }}">
                    @error('date_of_birth')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="philhealth">Philhealth</label>
                    <input type="text" name="philhealth" class="form-control @error('philhealth') is-invalid @enderror"
                        id="philhealth" placeholder="Philhealth" value="{{ old('philhealth', $customer->philhealth) }}">
                    @error('philhealth')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="sex">Sex</label>
                    <input type="text" name="sex" class="form-control @error('sex') is-invalid @enderror"
                        id="sex" placeholder="Sex" value="{{ old('sex', $customer->sex) }}">
                    @error('sex')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="marital_status">Marital Status</label>
                    <input type="text" name="marital_status" class="form-control @error('marital_status') is-invalid @enderror"
                        id="marital_status" placeholder="Marital Status" value="{{ old('marital_status', $customer->marital_status) }}">
                    @error('marital_status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                        id="phone" placeholder="Phone" value="{{ old('phone', $customer->phone) }}">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="address">Address (Street, Brgy., Municipality, Province, District, Region, Zip
                        Code)</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                        id="address" placeholder="Address" value="{{ old('address', $customer->address) }}">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="emergency">In case of emergency, who should be notified?</label>
                    <input type="text" name="emergency" class="form-control @error('emergency') is-invalid @enderror"
                        id="emergency" placeholder="Marital Status" value="{{ old('emergency', $customer->emergency) }}">
                    @error('emergency')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="avatar">Is this patient discharged?</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="1" name="is_discharged"
                                {{ $customer->is_discharged ? 'checked' : '' }}>Yes
                        </label>
                    </div>
        
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="0" name="is_discharged"
                                {{ !$customer->is_discharged ? 'checked' : '' }}>No
                        </label>
                    </div>
                </div>
                @error('avatar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>
        
        <div class="card">
            <div class="card-body">
                <h4 id="history" class="mb-2">Medical History</h4>

                <div class="form-group">
                    <label for="medical_history">Medical History</label>
                    <textarea name="medical_history" class="form-control @error('medical_history') is-invalid @enderror"
                        id="medical_history"> {{ old('medical_history', $customer->medical_history) }} </textarea>
                    @error('medical_history')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="medications">Medications</label>
                    <textarea name="medications" class="form-control @error('medications') is-invalid @enderror" id="medications">{{ old('medications', $customer->medications) }}</textarea>
                    @error('medications')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="restricted_drugs">Restricted Drugs</label>
                    <textarea name="restricted_drugs" class="form-control @error('restricted_drugs') is-invalid @enderror"
                        id="restricted_drugs"> {{ old('restricted_drugs', $customer->restricted_drugs) }} </textarea>
                    @error('restricted_drugs')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <button class="btn btn-success btn-block btn-lg" type="submit">Save Changes</button>
    </form>
@endsection

@section('js')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
