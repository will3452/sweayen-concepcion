@extends('adminlte::page')


@section('title', 'Records')

@section('content_header')
    <h1>Records</h1>
@endsection
@section('content')
    <p>
        Welcome to the record page, here you can <i>Create</i>, <i>Update</i> and <i>Read</i> Records.
    </p>
    <div class="d-flex mb-2">
        <a href="{{ route('records.create') }}" class="btn btn-primary btn-sm"> <i class="fa fa-plus-circle"></i> Add New Record</a>
    </div>
    <div class="card">
        <div class="card-header">
            List of records
        </div>
        <div class="card-body">
            <table id="recordTable" class="table-sm table table-striped  table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>
                            
                        </th>
                        <th>
                            
                        </th>
                        <th>
                            No
                        </th>
                        <th>
                            Date Of Reg.
                        </th>
                        <th>
                            Family Serial No.
                        </th>
                        <th>
                            Last Name
                        </th>
                        <th>
                            First Name
                        </th>
                        <th>
                            Middle Name
                        </th>
                        <th>
                            Complete Address
                        </th>
                        <th>
                            Name of Spouse
                        </th>
                        <th>
                            Contact
                        </th>
                        <th>
                            Birthday
                        </th>
                        <th>
                            Age
                        </th>
                        <th>
                            Civil Status
                        </th>
                        <th>
                            Philhealth Member
                        </th>
                        <th>
                            4P benifiary
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($records as $record)
                        <tr>
                            <td>
                                <form action="{{ route('records.destroy', $record) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">delete</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{ route('records.show', $record) }}" class="btn btn-success btn-sm text-truncate">
                                    View 
                                </a>
                            </td>
                            <td>
                                {{ $record->id }}
                            </td>
                            <td>
                                {{ $record->dateFormat($record->date_of_registration) }}
                            </td>
                            <td>
                                {{ $record->family_serial_number }}
                            </td>
                            <td>
                                {{ $record->last_name }}
                            </td>
                            <td>
                                {{ $record->first_name }}
                            </td>
                            <td>
                                {{ $record->middle_name }}
                            </td>
                            <td>
                                {{ $record->address }}
                            </td>
                            <td>
                                {{ $record->name_of_spouse }}
                            </td>
                            <td>
                                {{ $record->contact_number }}
                            </td>
                            <td>
                                {{ $record->dateFormat($record->birthdate) }}
                            </td>
                            <td>
                                {{ $record->age}}
                            </td>
                            <td>
                                {{ $record->civil_status }}
                            </td>
                            <td>
                                {{ $record->philhealth_member }}
                            </td>
                            <td>
                                {{ $record->fourp_benificiary }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">

        </div>
    </div>
@endsection
@section('js')
<script>
   $(function(){
       $('#recordTable').DataTable();
   })
</script>
<script>
    $(function(){
        @if(session('success'))
            Swal.fire(
            'Done!',
            '{{ session('success') }}',
            'success'
            )
        @endif
    })
</script>
@endsection
