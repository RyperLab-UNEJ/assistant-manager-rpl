@extends('layouts.cms_layout')

@section('title','Admin')

@section('heading-content')
<h3 class="mb-6 text-3xl">Daftar Jabatan</h3>
@include('components.cms.alert')
@endsection

@section('main-content')
    <a type="button" href="{{ route('cms.roles.create') }}" class="btn btn-md btn-info btn-icon-text mb-3"><i class="fa-solid fa-plus mr-2"></i>Tambah Data</a>

    <livewire:cms.role.role-index />
@endsection

@section('after-script')
@endsection
