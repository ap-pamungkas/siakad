<x-app>

    <div class="card mt-5 shadow">
        <div class="card-header">
            <div class="card-title">
                Data Kelas {{ $nama_kelas}}
            </div>
            <a href="{{ url('admin/nilai/create') }}" class="btn btn-primary float-right">  Tambah
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
  <th>NISN</th>
  <th>Nama</th>





</tr>
            </thead>

            </table>





    </div>

    </div>
<x-page.notif />
@push('script')
<script>
 $(document).ready(function() {
    $('#y_dataTables').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('admin/listAnggotaKelas') }}",
        columns: [
            { data: 'id', name: 'id', visible: false },
            {
                data: 'id',
                render: function(data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `
                        <center>
                            <x-button.button-action url="{{ url('admin/kelas-detail/') }}/${row.id}" label="Detail" icon="fas fa-eye" class="btn btn-primary" />
                        </center>`;
                }
            },
            { data: 'nisn', name: 'nisn' },
            { data: 'nama', name: 'nama' },
            // Add more columns if needed
        ]
    });
});

</script>
@endpush
{{-- <x-button.button-action url="{{ url('/guru/detail/') }}/${row.id}" label="Detail" icon="fas fa-eye" class="btn btn-info" /> --}}


</x-app>
