<x-app> 
    <div class="card mt-5 shadow">
        <div class="card-header">
            <div class="card-title">
                Data guru
            </div>
            <a href="{{ url('/admin/kepala-sekolah/create') }}" class="btn btn-primary float-right"> Tambah
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="y_dataTables">
            <thead>
<tr>
  <th>No</th>
  <th>No</th>
  <th>Aksi</th>
  <th>Nip</th>
  <th>Nama</th>
 
 

</tr>
            </thead>

            </table>





    </div>

    </div>
<x-page.notif />
@push('script')
<script>
 $(document).ready( function () {
  $('#y_dataTables').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{ url('admin/listKps') }}",
         columns: [
                  { data: 'id', name: 'id',  visible: false },
                  {

       render: function(data, type, row, meta) {
         return meta.row + 1;
       }
     },
     {

       data: null,
       render: function(data, type, row) {
         // Buat tombol aksi secara dinamis di dalam fungsi render
         return `
          <center>  <x-button.button-action url="{{ url('/admin/kepala-sekolah/detail/') }}/${row.id}" label="Detail" icon="fas fa-eye" class="btn btn-info" />
            <x-button.button-action url="{{ url('/admin/kepala-sekolah') }}/${row.id}/edit" label="Edit" icon="fas fa-edit" class="btn btn-warning" />
            <x-button.delete id="${row.id}" />
            </center>`;
        }
    },
                  { data: 'nip', name: 'nip' },
                  { data: 'nama', name: 'nama' },




               ]
      });
   });
</script>
@endpush
</x-app>

