<x-app>

    <div class="card mt-5 shadow">
        <div class="card-header">
            <div class="card-title">
                Data Kepala Sekolah
            </div>
            <a href="{{ url('admin/kepala-sekolah/create') }}" class="btn btn-primary float-right"> Tambah
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="y_dataTables">
                <thead>

                <tr>
             <td width="5%"><center>No</center></td>
             <td width="5%"><center>No</center></td>
            <td width="30%">
                <center> Action </center></td>
            <td><center>Nip</center></td>
            <td><center>Nama</center></td>

                </tr>
                </thead>


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
          <center>  <x-button.button-action url="{{ url('/admin/guru/detail/') }}/${row.id}" label="Detail" icon="fas fa-eye" class="btn btn-info" />
            <x-button.button-action url="{{ url('/admin/guru') }}/${row.id}/edit" label="Edit" icon="fas fa-edit" class="btn btn-warning" />
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
