@extends('adminlte::page')


@section('title', 'Profile')

@section('content_header')
    <h1>Profile</h1>
@endsection
@section('content')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <p>
        Welcome to the profile page, here you can  <i>Update</i> and <i>Read</i> your profile information.
    </p>
    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group" x-data="{
            
            viewImage(){
                URL.revokeObjectURL(this.$refs.logo_viewer.src);
                let file = this.$refs.file.files[0];
                console.log(file);
                let url = URL.createObjectURL(file);
                this.$refs.logo_viewer.src = url;
            }

        }">
            <label for="" class="d-block">Logo</label>
            <img x-ref="logo_viewer" style="width:100px;height:100px;object-fit:cover;" src="{{  asset('vendor/adminlte/dist/img/AdminLTELogo.png') }}" alt="" class="brand-image img-circle elevation-3">
            <div class="mt-4">
                <span>Upload new Logo here. </span>
                <input type="file" x-on:change="viewImage()" x-ref="file" name="logo" class="d-block" accept=".png, .jpg">
            </div>
        </div>
        <div class="form-group">
            <label for="">Email/Username</label>
            <input type="email" value="{{ auth()->user()->email }}"  name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" value="{{ auth()->user()->name }}" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Change Password</label>
            <input type="password" value="" class="form-control" name="password" placeholder="********">
        </div>
        <button class="btn btn-primary">Update now</button>
    </form>
@endsection

