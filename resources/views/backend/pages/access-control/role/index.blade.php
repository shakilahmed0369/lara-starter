@extends('backend.layouts.master')

@section('content')
@section('extraCss')
<style>
  
</style>
@endsection
<!-- The current blade is a live wire component-->
@livewire('backend.access-control.role-table')
 @section('extraJs')
 <script type="text/javascript">
$(document).ready(function() {
  $('[rel="popover"]').popover();
});
</script>
 @endsection
@endsection

