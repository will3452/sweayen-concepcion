@extends('adminlte::page')


@section('title', 'Pages')

@section('content_header')
    <h1>Pages</h1>
@endsection
@section('content')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <p>
        Welcome to the create page, here you can  <i>create</i> page.
    </p>
    <div>
        <a href="{{ route('pages.index') }}"><i class="fa fa-arrow-left"></i> Back to the list of pages.</a>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            Page Details.
        </div>
        <div class="card-body">
            <form action="{{ route('pages.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Title *</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label for="">Body / Content *</label>
                    <textarea name="body" required></textarea>
                    <script>
                            CKEDITOR.replace( 'body' );
                    </script>
                </div>
                <div class="form-group">
                    <label for="">Type</label>
                    <select name="type" class="custom-select" id="">
                        <option value="sub">Sub-Page</option>
                        <option value="main">Main-Page</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Visible to Navigation Bar ?</label>
                    <select name="is_visible_to_nav" class="custom-select" id="">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>
                <div>
                    <label for="">Related / Recommendation Links (Optional)</label>
                    <textarea name="recommendation_links" id="" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <button class="btn btn-primary mt-2"><i class="fa fa-upload"></i> Publish now!</button>
            </form>

        </div>
    </div>
@endsection

