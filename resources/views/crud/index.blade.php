@extends('layouts.console')

@section('title')
    Crud
@endsection

@section('nav')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Halaman</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Dashboard</h6>
@endsection

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col">
            @include('partials.alert')
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-body">

            </div>
        </div>
    </div>
</div>



@endsection


