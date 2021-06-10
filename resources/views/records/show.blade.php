@extends('adminlte::page')


@section('title', 'Show record')

@section('content_header')
    <h1>Show Record</h1>
@endsection

@section('content')
    <p>
        Welcome to the 'View record page', here you can view Record.
    </p>
    <div class="text-right my-2">
        <a href="{{ route('records.edit', $record) }}" class="btn btn-primary btn-sm">Update Record</a>
    </div>
    <div class="bg-white" id="record">
        <div>
            <strong>Name: </strong> {{ $record->last_name }} {{ $record->first_name }}, {{ $record->middle_name[0] }}.
        </div>
        <div>
            <strong>Date Of Registration: </strong> {{ $record->date_of_registration ?? 'N/A' }}
        </div>
        <div>
            <strong>Family Serial #: </strong> {{ $record->family_serial_number ?? 'N/A' }}
        </div>
        <div>
            <strong>Birthdate: </strong>{{ $record->birthdate ?? 'N/A' }}
        </div>
        <div>
            <strong>Gender: </strong> {{ $record->gender }}
        </div>
        <div>
            <strong>Civil Status: </strong> {{ $record->civil_status }}
        </div>
        <div>
            <strong>Name Of School: </strong> {{ $record->name_of_school ?? 'N/A'}}
        </div>
        <div>
            <strong>Purok/Block: </strong> {{ $record->purok }}
        </div>
        <div>
            <strong>Address: </strong> {{ $record->address }}
        </div>
        <div>
            <strong>Name Of Spouse: </strong> {{ $record->name_of_spouse ?? 'N/A' }}
        </div>
        <div>
            <strong>Contact Number: </strong> {{ $record->contact_number ?? 'N/A' }}
        </div>
        <div>
            <strong>4'ps Benificiary: </strong> {{ $record->fourp_benificiary }}
        </div>
        <div>
            <strong>PhilHealth Member: </strong> {{ $record->philhealth_member }}
        </div>
    </div>
    <button type="button" class="btn btn-primary btn-block my-2" onclick="printJS({printable:'record', type:'html', header: 'San Nicolas Official Information System'})">
        Print Record
    </button>
@endsection
@section('css')
    
    <link rel="stylesheet" href="/printjs/print.css">
    <style>
        #record{
            padding: 0.5em !important;
        }
        #record>div{
            margin-bottom: 10px;
        }
    </style>
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