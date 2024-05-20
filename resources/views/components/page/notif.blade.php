@foreach(['create', 'update', 'delete'] as $status)

  @if(session()->has($status))
    @push('script')
      <script>
        $(document).ready(function() {
          var message;

          switch ( '{{ $status }}' ) {
            case 'create':
              message = 'Data Berhasil DiSimpan!';
              break;
            case 'update':
              message = 'Data Berhasil Diupdate!';
              break;
            case 'delete':
              message = 'Data Berhasil Dihapus!';
              break;
          }

          Swal.fire({
            title: '{{ ucfirst($status) }}',  // Capitalize the status for better readability
            text: message,
            icon: 'success',
            confirmButtonText: 'OK'
          });
        });
      </script>
    @endpush
  @endif

@endforeach
