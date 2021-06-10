@extends('adminlte::page')


@section('title', 'Pages')

@section('content_header')
    <h1>Pages</h1>
@endsection
@section('content')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <p>
        Welcome to the page management, here you can  <i>create</i> and <i>update</i> pages.
    </p>
    <div>
        <a href="{{ route('pages.create') }}"><i class="fa fa-pen"></i> Create New Page.</a>
    </div>
    <div class="mt-4">
        <h5>
            <i class="fa fa-list"></i> List of Pages
        </h5>
    </div>
    @if (!count($pages))
        <div class="alert alert-warning">
            No Page.
        </div>
    @endif
   <ul class="list-group mt-2">
        @foreach ($pages as $page)
            <li class="list-group-item d-flex justify-content-between">
                <div>
                    {{ $page->title }}
                </div>
                <div class="d-flex">
                    <a href="{{ route('pages.show', $page) }}" class="btn btn-primary btn-sm mr-2">View</a> 
                    {{-- <a href="#" class="text-secondary">Edit</a> |  --}}
                    <form action="{{ route('pages.destroy', $page) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
   </ul>
@endsection

