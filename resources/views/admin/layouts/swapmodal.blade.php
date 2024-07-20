@if(session('success'))
  <div><input type="hidden" id="successTrigger" onclick="swalmodalsucces('{{ session('success') }}')"></div>
  <script>
    window.onload = function() {
      document.getElementById("successTrigger").click(); 
    };
  </script>
@elseif(session('fail'))
  <div><input type="hidden" id="failTrigger" onclick="swalmodalfail('{{ session('fail') }}')"></div>
  <script>
    window.onload = function() {
      document.getElementById("failTrigger").click(); 
    };
  </script>
@endif
@php
   session()->forget('fail'); 
   session()->forget('success'); 
@endphp

<script>
  function swalmodalsucces(content){
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    
      Toast.fire({
        icon: 'success',
        title: content
      })
  }

  function swalmodalfail(content){
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    
    Toast.fire({
      icon: 'error',
      title: content
    })
  }
</script>