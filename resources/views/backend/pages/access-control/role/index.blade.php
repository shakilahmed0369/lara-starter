@extends('backend.layouts.master')

@section('content')

<!-- The current blade is a live wire component-->
@livewire('backend.access-control.role-table')

<!-- Js for this page -->
 @section('extraJs')
 <script type="text/javascript">
    $(document).ready(function() {
      $('[rel="popover"]').popover();
    });
</script>
 @endsection
@endsection

