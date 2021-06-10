@extends('adminlte::page')


@section('title', 'Issue')

@section('content_header')
    <h1>Issue</h1>
@endsection
@section('content')
    <p>
        Welcome to the Issue page, here you can issue paper or certificate based on uploaded template.
    </p>
    <div>
        <h5>
              Choose a template ( {{ count($templates) }} )
        </h5>
        @if (!count($templates))
            <div class="alert alert-warning">
                No Template Found! please add template first.
            </div>
        @endif
        @foreach ($templates as $template)
            <div class="card">
                <div class="card-header">
                    {{ $template->name }} 
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{ $template->public_path($template->cover) }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-9">
                            <div>
                                <strong>Name: </strong>
                                {{ $template->name }}
                            </div>
                            <div>
                                <strong>Description: </strong>
                                {{ Str::limit($template->description, 100) ?? '---' }}
                            </div>
                            <div>
                                <strong>Template File: </strong>
                                <a href="{{ $template->public_path($template->file) }}">{{ Str::limit($template->file, 10) }}</a>
                            </div>
                            <div>
                                <a href="{{ route('issues.show', $template) }}" class="btn btn-primary mt-2">Use this template</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

