@extends('backend.layouts.master')

@section('content')

<!-- The current blade is a live wire component-->
@livewire('backend.access-control.role-table')
 @section('extraJs')
 <script>
   $(function() {
    $('[data-toggle="tooltip"]').tooltip({
    html: true
    });
   });
 </script>
 @endsection
@endsection

