<x-app>

    <div class="card mt-5 shadow">
        <div class="card-header">
            <div class="card-title">
                Data Kelas
            </div>
            <a href="{{ url('admin/semester/create') }}" class="btn btn-primary float-right"> Tambah
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
  <th>Periode</th>
  <th>Tahun Ajaran</th>



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
         ajax: "{{ url('admin/listSemester') }}",
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
            <x-button.button-action url="{{ url('admin/semester') }}/${row.id}/edit" label="Edit" icon="fas fa-edit" class="btn btn-warning" />
            <x-button.delete id="${row.id}" />
            </center>`;
        }
    },
    { data: 'periode', name: 'periode' },
    { data: 'tahun_ajaran', name: 'tahun_ajaran' },




               ]
      });
   });
</script>
@endpush
{{-- <x-button.button-action url="{{ url('/guru/detail/') }}/${row.id}" label="Detail" icon="fas fa-eye" class="btn btn-info" /> --}}


</x-app>
