@extends('adminlte::page')


@section('title', 'Crearte New Record')

@section('content_header')
    <h1>Add Record</h1>
@endsection

@section('content')
    <p>
        Welcome to the 'Add Record page', here you can add new record.
    </p>
    <div class="card">
        <div class="card-header">
            Record Form
        </div>
        <div class="card-body">
            <form action="{{ route('records.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Date of Registration *</label>
                    <input type="date" class="form-control" name="date_of_registration">
                </div>
                <div class="form-group">
                    <label for="">Family Serial Number *</label>
                    <input type="text" class="form-control" name="family_serial_number">
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" name="last_name">
                    </div>
                    <div class="col-md-4">
                        <label for="">First Name</label>
                        <input type="text" class="form-control" name="first_name">
                    </div>
                    <div class="col-md-4">
                        <label for="">Middle Name</label>
                        <input type="text" class="form-control" name="middle_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Gender</label>
                    <select name="gender" id="" class="form-control">
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Name of School</label>
                    <input type="text" class="form-control" name="name_of_school">
                    <small class="text-info">Leave it blank if out of school</small>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="">Purok/Block</label>
                        <input type="number" class="form-control" name="purok">
                    </div>
                    <div class="col-md-8">
                        <label for="">Inline Address</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Name of Spouse</label>
                    <input type="text" class="form-control" name="name_of_spouse">
                </div>
                <div class="form-group">
                    <label for="">Contact Number</label>
                    <input type="text" class="form-control" name="contact_number">
                </div>
                <div class="form-group">
                    <label for="">Birthdate</label>
                    <input type="date" name="birthdate" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Civil Status</label>
                    <select name="civil_status" id="" class="custom-select">
                        <option value="single">Single</option>
                        <option value="Engaged">Engaged</option>
                        <option value="Married">Married</option>
                        <option value="Widowed">Widowed</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">PhilHealth Member</label>
                    <select name="philhealth_member" id="" class="form-control">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">4p's Benificiary</label>
                    <select name="fourp_benificiary" id="" class="form-control">
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="form-group">

                    <button class="btn btn-primary">
                        Store Record
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
<script>
    $(function(){
        @if(session('success'))
            Swal.fire(
            'Done!',
            'Record stored',
            'success'
            )
        @endif
    })
</script>
@endsection