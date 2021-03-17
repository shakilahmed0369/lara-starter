<!-- 
Sweet alert pop up error notification
that will show your all validation errors
in sweet alert toast-->
@if (config('sweetalert.errorToast') === true)
 @if ($errors->any()) 
    @foreach ($errors->all() as $error)
      @php
          toast($error,'error')->width('25rem');
      @endphp
    @endforeach
  @endif   
@endif
