@extends('layouts.cms_layout')

@section('title','Competition')

@section('heading-content')
    <h3 class="mb-3">Daftar Kompetisi</h3>
@endsection

@section('main-content')
    <a type="button" href="{{ route('cms.competition.create') }}" class="btn btn-outline-info btn-icon-text mb-3"><i class="fa-solid fa-plus mr-2"></i>Tambah Kompetisi Baru</a>
    {{-- <livewire:competition-table /> --}}
    <livewire:cms.competition.competition-index />
@endsection

@section('after-script')
@endsection

{{-- ini adalah konten --}}
