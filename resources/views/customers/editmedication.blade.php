@extends('layouts.admin')

@section('title', 'Patient Info')

@section('content')
    <form action="{{ route('customers.update', $customer) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="#daily">Daily Summary</a></li>
                <li class="breadcrumb-item "><a href="#info">Patient Info</a></li>
                <li class="breadcrumb-item "><a href="#doctor">Doctor Order Sheet</a></li>
                <li class="breadcrumb-item "><a href="#history">Medical History</a></li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-body">
                <h4 id="daily" class="mb-2">Daily Summary</h4>

                <div class="form-group">
                    <label for="requested">Requested</label>
                    <input type="number" name="requested" class="form-control @error('requested') is-invalid @enderror"
                        id="requested" value="{{ old('requested', $customer->requested) }} "> 
                    @error('requested')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="dispensed">Dispensed</label>
                        <input type="number" name="dispensed" class="form-control @error('dispensed') is-invalid @enderror"
                            id="dispensed" value="{{ old('dispensed', $customer->dispensed) }} "> 
                        @error('dispensed')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                  
                </div>
        
                <div class="form-group">
                    <label for="nurse_duty">Prepared by (Nurse on Duty)</label>
                    <input name="nurse_duty" class="form-control @error('nurse_duty') is-invalid @enderror"
                        id="nurse_duty" value="{{ old('nurse_duty', $customer->nurse_duty) }} "> 
                    @error('nurse_duty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label for="pharmacist_duty">Checked / Reviewed by (Pharmacist on duty)</label>
                    <input name="pharmacist_duty" class="form-control @error('pharmacist_duty') is-invalid @enderror"
                        id="pharmacist_duty" value="{{ old('pharmacist_duty', $customer->pharmacist_duty) }} "> 
                    @error('pharmacist_duty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="daily_remarks">Remarks</label>
                    <textarea name="daily_remarks" class="form-control @error('daily_remarks') is-invalid @enderror"
                        id="daily_remarks"> {{ old('daily_remarks', $customer->daily_remarks) }} </textarea>
                    @error('daily_remarks')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-body">
                <h4 id="info" class="mb-2">Patient Info</h4>

                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                        id="first_name" placeholder="First Name" value="{{ old('first_name', $customer->first_name) }}"readonly>
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                        id="last_name" placeholder="Last Name" value="{{ old('last_name', $customer->last_name) }}"readonly>
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
               

                <div class="form-group">
                    <label for="room_number">Room Number</label>
                    <input type="text" name="room_number" class="form-control @error('room_number') is-invalid @enderror"
                        id="room_number" placeholder="Room Number" value="{{ old('room_number', $customer->room_number) }}"readonly>
                    @error('room_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                        id="phone" placeholder="Phone" value="{{ old('phone', $customer->phone) }}"readonly>
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
                        id="address" placeholder="Address" value="{{ old('address', $customer->address) }}"readonly>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="avatar">Picture</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="avatar" id="avatar" readonly>
                        <label class="custom-file-label" for="avatar">Choose file</label>
                    </div>
                    @error('avatar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="avatar">is this patient discharged?</label>
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
                <h4 id="doctor" class="mb-2">Doctor Order Sheet</h4>

                <div class="form-group">
                    <label for="medicines">Medicines and IV Fluids</label>
                    <textarea name="medicines" class="form-control @error('medicines') is-invalid @enderror" id="medicines" readonly>{{ old('medicines', $customer->medicines) }}</textarea>
                    @error('medicines')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="doctor_name">Doctor Name</label>
                    <input type="text" name="doctor_name"
                        class="form-control @error('doctor_name') is-invalid @enderror" id="doctor_name"
                        placeholder="Doctor Name" value="{{ old('doctor_name', $customer->doctor_name) }}"readonly>
                    @error('doctor_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name_of_nurse">Nurse Name</label>
                    <input type="text" name="name_of_nurse"
                        class="form-control @error('name_of_nurse') is-invalid @enderror" id="name_of_nurse"
                        placeholder="Nurse Name" value="{{ old('name_of_nurse', $customer->name_of_nurse) }}"readonly>
                    @error('name_of_nurse')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="medicines">Progress Notes</label>
                    <textarea name="progress_notes" class="form-control @error('progress_notes') is-invalid @enderror"
                        id="progress_notes" readonly> {{ old('progress_notes', $customer->progress_notes) }} </textarea>
                    @error('progress_notes')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="doctors_order">Doctor's Order</label>
                    <textarea name="doctors_order" class="form-control @error('doctors_order') is-invalid @enderror" id="doctors_order"readonly> {{ old('doctors_order', $customer->doctors_order) }} </textarea>
                    @error('doctors_order')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="remarks">Remarks</label>
                    <input type="text" name="remarks" class="form-control @error('remarks') is-invalid @enderror"
                        id="remarks" placeholder="Remarks" value="{{ old('remarks', $customer->remarks) }}"readonly>
                    @error('remarks')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="prepared_by">Prepared by</label>
                    <input type="text" name="prepared_by"
                        class="form-control @error('prepared_by') is-invalid @enderror" id="prepared_by"
                        placeholder="Prepared by" value="{{ old('prepared_by', $customer->prepared_by) }}"readonly>
                    @error('prepared_by')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 id="history" class="mb-2">Medical History</h4>

                <div class="form-group">
                    <label for="medical_history">Medical History</label>
                    <textarea name="medical_history" class="form-control @error('medical_history') is-invalid @enderror"
                        id="medical_history"readonly> {{ old('medical_history', $customer->medical_history) }} </textarea>
                    @error('medical_history')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="medications">Medications</label>
                    <textarea name="medications" class="form-control @error('medications') is-invalid @enderror" id="medications"readonly>{{ old('medications', $customer->medications) }}</textarea>
                    @error('medications')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="restricted_drugs">Restricted Drugs</label>
                    <textarea name="restricted_drugs" class="form-control @error('restricted_drugs') is-invalid @enderror"
                        id="restricted_drugs"readonly> {{ old('restricted_drugs', $customer->restricted_drugs) }} </textarea>
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
