@extends('adminlte::page')


@section('title', 'Template')

@section('content_header')
    <h1>Template</h1>
@endsection
@section('content')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <p>
        Welcome to the template page, here you can <i>Add</i> and <i>Remove</i> template.
    </p>
    <div class="text-right" x-data="{viewCreateForm:false}">
        <button class="btn btn-primary btn-sm" x-on:click="viewCreateForm = !viewCreateForm"><i class="fa " :class="{'fa-plus':!viewCreateForm, 'fa-times':viewCreateForm}"></i>
            <span x-show="!viewCreateForm">Add New Template</span>
            <span x-show="viewCreateForm">Cancel</span>
        </button>
        <div class="card text-left" x-show.transition="viewCreateForm">
            <div class="card-header">
                Template Details
            </div>
            <div class="card-body">
                <form action="{{ route('templates.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" required name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="des">Description (Optional) </label>
                        <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="d-block">Cover *</label>
                        <input type="file" name="cover" accept=".jpg, .png" rqeuired>
                    </div>
                    <div class="form-group">
                        <label for="" class="d-block">Template File *</label>
                        <input type="file" name="file" accept=".docx">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block"><i class="fa fa-upload"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div>
        <h5>
             <i class="fa fa-list"></i> List of Templates ( {{ count($templates) }} )
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
                                <form action="{{ route('templates.destroy', $template) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

