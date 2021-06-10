@extends('adminlte::page')


@section('title', 'Issue')

@section('content_header')
    <h1>Please Fill up the form</h1>
@endsection
@section('content')
    <form action="{{ route('issues.store') }}" method="POST">
        @csrf
        <input type="hidden" name="template_id" value="{{ $id }}">
        @foreach ($fields as $field)
            <div class="form-group">
                <label for="" class="text-capitalize">{{ $field }}</label>
                @if ($field == 'content' || $field == 'body')
                    <textarea name="{{ $field }}" id="" cols="30" rows="5" class="form-control" required></textarea>
                @else 
                    <input type="text" class="form-control" name="{{ $field }}" required>
                @endif
            </div>
        @endforeach
        <button class="btn btn-success">Issue Now!</button>
    </form>
@endsection

