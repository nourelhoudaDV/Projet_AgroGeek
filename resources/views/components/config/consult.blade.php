@push("plugin-styles")
    <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"/>
    <style>
        .datatable-consult::after{
            content: none !important;
        }
        .datatable-consult i{
            animation: none !important;
        }
    </style>
@endpush



@push("plugin-scripts")
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>


        <script>
            
          
            @if(session()->has('message'))
            @php
          		if(session()->get('message')[0] === 1){

                      if(isset(session()->get('message')[2])){
                          $return_value = session()->get('message')[2];
                      }else{
                          $return_value = match ( session()->get('message')[1] ?? -1) {
                   0 => 'Ajout Avec Succès',
                    1 => 'Mise à jour terminée avec succès',
                    2 => 'suppression terminée avec succès',
                    -1 => ''
                };
                      }

          		}
            @endphp
            Swal.fire({
            title: "{{ session()->get('message')[0] == 1 ?  $return_value: session()->get('message')[1] ?? "quelque chose est mal passé essaie encore" }}",
            type: "{{ session()->get('message')[0] == 1 ? 'success' :  'error' }}",
            icon: "{{ session()->get('message')[0] == 1 ? 'success' :  'error' }}",
                confirmButtonText: 'Continuer',
            padding: '2em'
        });
        @endif

    </script>



@endpush
