@extends('adminlte::page')


@section('title', 'Records')

@section('content_header')
    <h1>EARLY CHILDHOOD CARE AND DEVELOPMENT</h1>
    <h1>IN THE FIRST 1000 DAYS (ECCD F1K) PROGRAM</h1>
@endsection
@section('content')
    <p>
        Welcome to the ECCD F1K record page, here you can <i>Create</i>, <i>Update</i> and <i>Read</i> ECCD F1K records.
    </p>
    <div class="card">
        <div class="card-header">
            Add ECCD F1K Record
        </div>
        <div class="card-body">
            <form action="{{ route('eccdf1k.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Select from the Master Record</label>
                    <select name="record_id" id="" class="custom-select">
                        @foreach ($records as $record)
                            <option value="{{ $record->id }}">{{ $record->full_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Expected Date Of Delivery</label>
                    <input type="date" required class="form-control" name="expected_date_of_delivery">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">
                        ADD
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            List of ECCD F1K records
        </div>
        <div class="card-body">
            <table id="recordTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            
                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Expected Date Of Delivery
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eccdf1k as $e)
                        <tr>
                            <td>
                                <form action="{{ route('eccdf1k.destroy', $e) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">remove</button>
                                </form>
                            </td>
                            <td>
                                {{ $e->id }}
                            </td>
                            <td>
                                {{ $e->record->full_name }}
                            </td>
                            <td>
                                {{ $e->expected_date_of_delivery }}
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
