@if(session()->has('success'))
    <div class="alert alert-sm alert-info text-white" role="alert">
   <i class="fa-solid fa-check"></i>A simple dark alert—check it out!
</div>
@endif

@if(session()->has('error'))
   <div class="alert alert-danger text-white" role="alert">
        <i class="fa-solid fa-xmark"></i> A simple dark alert—check it out!
   </div>
@endif

@if(session()->has('error'))
   <div class="alert alert-warning" role="alert">
        <i class="fa-solid fa-triangle-exclamation"></i> A simple dark alert—check it out!
   </div>
@endif

