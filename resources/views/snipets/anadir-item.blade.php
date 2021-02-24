@push('css_files')
  <link rel="stylesheet" href="{{ asset('widgets/toastr/toastr.min.css') }}">  
@endpush

@push('scripts_files') 
  <script src="{{asset('widgets/toastr/toastr.min.js')}}"></script>
@endpush

@push('scripts') 
  <script>
    $(document).ready(function() {
      
      $('#anadirItem').on('click', function(e){
        toastr.options = {
          closeButton: true, // true/false                    
          newestOnTop: true, // true/false
          progressBar: true, // true/false                    
          preventDuplicates: true, //true/false
          onclick: null,
          showMethod : "slideDown",
          showDuration: 300, // in milliseconds
          hideMethod: "slideUp",
          hideDuration: 1000, // in milliseconds
          timeOut: 5000, // in milliseconds
          extendedTimeOut: 1000, // in milliseconds
          positionClass: "toast-top-right",
        };

        $.ajax({
            url : "{{ route('anadirItem',4)}}",
            type: "GET",            
            success: function(data, textStatus, jqXHR)
            {
              $('#cesta1').text(data.cesta);
              $('#cesta2').text(data.cesta);
              toastr.success('Artículo ha sido añadido exitosamente', 'Exito!');
              fbq('track', 'AddToCart');

            
            },
            error: function (jqXHR, textStatus, errorThrown)
            {              
              toastr.error('No se pudo añadir el item', 'Problemas de conexión');
            }
        });
      });
    })
  </script>
@endpush