<x-app>
    <div class="card mt-5 shadow">
        <div class="card-header">
            <div class="card-title">
                Data Semester
            </div>
            <a href="{{ url('/admin/kelas/create') }}" class="btn btn-primary float-right"> Tambah
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
                        <th>Tingkat Kelas</th>
                        <th>Nama Kelas</th>
                        <th>Wali Kelas</th>
                        <th>Semester</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($guru as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                    </tr>

                    @endforeach
                </body>
            </table>

            {{ $guru->links() }}
        </div>
    </div>

    <x-page.notif />
    {{-- @push('script')
    <script>
     $(document).ready(function () {
    $('#y_dataTables').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('admin/listKelas') }}",
        columns: [
            { data: 'id', name: 'id', visible: false },
            {
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    return `
                        <center>
                            <x-button.button-action url="{{ url('/admin/guru/detail/') }}/${row.id}" label="Detail" icon="fas fa-eye" class="btn btn-info" />
                            <x-button.button-action url="{{ url('/admin/guru') }}/${row.id}/edit" label="Edit" icon="fas fa-edit" class="btn btn-warning" />
                            <x-button.delete id="${row.id}" />
                        </center>`;
                }
            },
            { data: 'tingkat_kelas', name: 'tingkat_kelas' },
            { data: 'nama_kelas', name: 'nama_kelas' },

          {  data: 'guru.nama',
             name:'guru.nama'
            },

            { data: 'semester.periode', name: 'semester.periode' },
        ],
    });
});
    </script>
    @endpush --}}
</x-app>
