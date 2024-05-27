<x-app>
    <div class="card mt-5 shadow">
        <div class="card-header">
            <div class="card-title">
                Data guru
            </div>
            <a href="{{ url('admin/siswa/create') }}" class="btn btn-primary float-right"> Tambah
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
                        <th>Nisn</th>
                        <th>Nama</th>

                        <th>Semester</th>
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
                ajax: "{{ url('/admin/listSiswa') }}",
                columns: [
                    { data: 'id', name: 'id', visible: false },
                    {
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return `
                                <center>
                                    <x-button.button-action url="{{ url('/admin/siswa/detail') }}/${row.id}" label="Info" icon="fas fa-eye" class="btn btn-primary" />
                                    <x-button.button-action url="{{ url('/admin/siswa') }}/${row.id}/edit" label="Edit" icon="fas fa-edit" class="btn btn-warning" />
                                    <x-button.delete id="${row.id}" />
                                </center>`;
                        }
                    },
                    { data: 'nisn', name: 'nisn' },
                    { data: 'nama', name: 'nama' },

                    {
                       data:'semester.periode', name:'semester.periode'
                    },
                ]
            });
        });
    </script>

    @endpush

    </x-app>
