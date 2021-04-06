@extends('backend.layouts.master')
@section('extraCss')
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <!-- Styles -->
        <link href="{{ asset('vendor/laravel_backup_panel/app.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="header bg-primary pb-6"></div>
<div class="container-fluid mt--6">
    <div class="card">
        <div class="card-header border-1">
            <div class="row">
            <div class="col-6"><h3 class="mb-0">Backup Manager</h3></div>
                <div class="col-6 text-right">
                                            <button class="submit btn-sm btn-success"><b><i class="fas fa-save"></i>  Save Menu</b></button>
                </div>
            </div>
        </div>
        <div class="card-body">

            <livewire:laravel_backup_panel::app />
        </div>
    </div>
</div>
@endsection

@section('extraJs')
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@endsection
