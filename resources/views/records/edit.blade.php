@extends('adminlte::page')


@section('title', 'Crearte New Record')

@section('content_header')
    <h1>Edit Record</h1>
@endsection

@section('content')
    <p>
        Welcome to the 'Edit record page', here you can Edit or Update Record.
    </p>
    <div class="my-2">
        <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">Back</a>
    </div>
<div class="card">
    <div class="card-header">
        Record of {{ $record->full_name }}
    </div>
    <div class="card-body">
        <form action="{{ route('records.update', $record) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Date of Registration</label>
                <input type="date" class="form-control" name="date_of_registration" value="{{ $record->date_of_registration }}">
            </div>
            <div class="form-group">
                <label for="">Family Serial Number</label>
                <input type="text" class="form-control" name="family_serial_number" value="{{ $record->family_serial_number }}">
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="{{ $record->last_name }}">
                </div>
                <div class="col-md-4">
                    <label for="">First Name</label>
                    <input type="text" class="form-control" name="first_name" value="{{ $record->first_name }}">
                </div>
                <div class="col-md-4">
                    <label for="">Middle Name</label>
                    <input type="text" class="form-control" name="middle_name" value="{{ $record->middle_name }}">
                </div>
            </div>
            <div class="form-group">
                <label for="">Gender</label>
                <select name="gender" id="" class="form-control">
                    <option value="M" {{ $record->gender =='M' ? 'selected':'' }}>Male</option>
                    <option value="F" {{ $record->gender =='F' ? 'selected':'' }}>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Name of School</label>
                <input type="text" class="form-control" name="name_of_school" value="{{ $record->name_of_school }}">
                <small class="text-info">Leave it blank if out of school</small>
            </div>
            <div class="form-group row">
                <div class="col-md-4">
                    <label for="">Purok/Block</label>
                    <input type="number" class="form-control" name="purok" value="{{ $record->purok }}">
                </div>
                <div class="col-md-8">
                    <label for="">Inline Address</label>
                    <input type="text" class="form-control" name="address" value="{{ $record->address }}">
                </div>
            </div>
            <div class="form-group">
                <label for="">Name of Spouse</label>
                <input type="text" class="form-control" name="name_of_spouse" value="{{ $record->name_of_spouse }}">
            </div>
            <div class="form-group">
                <label for="">Contact Number</label>
                <input type="text" class="form-control" name="contact_number" value="{{ $record->contact_number }}">
            </div>
            <div class="form-group">
                <label for="">Birthdate</label>
                <input type="date" name="birthdate" class="form-control" value="{{ $record->birthdate }}">
            </div>
            <div class="form-group">
                <label for="">Civil Status</label>
                <select name="civil_status" id="" class="custom-select">
                    <option value="single" {{ $record->civil_status == 'single' ? 'selected':''}}>Single</option>
                    <option value="engaged" {{ $record->civil_status == 'engaged' ? 'selected':''}}>Engaged</option>
                    <option value="married" {{ $record->civil_status == 'married' ? 'selected':''}}>Married</option>
                    <option value="widowed" {{ $record->civil_status == 'widowed' ? 'selected':''}}>Widowed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">PhilHealth Member</label>
                <select name="philhealth_member" id="" class="form-control">
                    <option value="Yes" {{ $record->philhealth_member == 'Yes' ? 'selected':''}}>Yes</option>
                    <option value="No" {{ $record->philhealth_member == 'No' ? 'selected':''}}>No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">4p's Benificiary</label>
                <select name="fourp_benificiary" id="" class="form-control">
                    <option value="Yes" {{ $record->fourp_benificiary == 'Yes' ? 'selected':''}}>Yes</option>
                    <option value="No" {{ $record->fourp_benificiary == 'No' ? 'selected':''}}>No</option>
                </select>
            </div>
            <div class="form-group">

                <button class="btn btn-primary">
                    Update Record
                </button>
            </div>
        </form>
    </div>
</div>
    
@endsection
@section('css')
    
    <link rel="stylesheet" href="/printjs/print.css">

@endsection
@section('js')
<script>
    $(function(){
        @if(session('success'))
            Swal.fire(
            'Done!',
            'Record Updated',
            'success'
            )
        @endif
    })
</script>
<script src="{{ asset('/printjs/print.js') }}"></script>
@endsection
