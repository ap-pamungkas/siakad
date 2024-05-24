<x-app>

    <div class="card mt-5 shadow">
        <div class="card-header">
            <div class="card-title">
                Data guru
            </div>
            <a href="{{ url('mapel/create') }}" class="btn btn-primary float-right"> Tambah
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
  <th>Kode Mata Pelajaran</th>
  <th>Nama Mata pelajaran</th>


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
         ajax: "{{ url('listMapel') }}",
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
          <center>
            <x-button.button-action url="{{ url('/mapel') }}/${row.id}/edit" label="Edit" icon="fas fa-edit" class="btn btn-warning" />
            <x-button.delete id="${row.id}" />
            </center>`;
        }
    },
                  { data: 'kode_mapel', name: 'kode_mapel' },
                  { data: 'nama_mapel', name: 'nama_mapel' },




               ]
      });
   });
</script>
@endpush
{{-- <x-button.button-action url="{{ url('/guru/detail/') }}/${row.id}" label="Detail" icon="fas fa-eye" class="btn btn-info" /> --}}


</x-app>
