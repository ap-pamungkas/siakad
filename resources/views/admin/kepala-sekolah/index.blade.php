<x-app>

    <div class="card mt-5 shadow">
        <div class="card-header">
            <div class="card-title">
                Data Kepala Sekolah
            </div>
            <a href="{{ url('kepala-sekolah/create') }}" class="btn btn-primary float-right"> Tambah
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>

                <tr>
             <td width="5%"><center>No</center></td>
            <td width="30%">
                <center> Action </center></td>
            <td><center>Nip</center></td>
            <td><center>Nama</center></td>

                </tr>
                </thead>
                @foreach ($list as $kps )
                <tbody>

                   <tr>
                    <td> {{ $loop->iteration }}</td>
                    <td>

                        <center>  <x-button.button-action url="{{ url('task/detail') }}/${row.id}" label="Detail" icon="fas fa-eye" class="btn btn-info" />
                            <x-button.button-action url="{{ url('/kepala-sekolah') }}/{{ $kps->id }}/edit" label="Edit" icon="fas fa-edit" class="btn btn-warning" />
                            <x-button.button-action url="{{ url('/user') }}/${row.id}/edit" label="Hapus" icon="fas fa-trash" class="btn btn-danger" />
                            {{-- <x-button.delete id="${row.id}" />  --}}
                          </center>
                    </td>
                    <td id="nip"> {{ $kps->nip }}</td>
                    <td> {{ $kps->nama }}</td>
                </tr>
            </tbody>
            @endforeach
            </table>

        </div>
    </div>


</x-app>
