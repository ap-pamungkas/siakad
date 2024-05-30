<x-app>


    <div class="card mt-5">
        <div class="card-header">
            <div class="card-title">
                Data Kepala
            </div>
            <a class = "btn btn-warning  " style="margin-left:78%;" href="{{url('/admin/guru')}}"> <i class="fas fa-arrow-left"> </i> Kembali </a>

            <a class="float-right btn btn-primary" href="{{ url('/admin/guru') }}/{{ $guru->id }}/edit">Edit <i class="fa fa-edit"></i></a>
        </div>

        <div class="card-body">
           <div class="row">
            <div class="col-md-6">
                <b>Nama :</b>
                <dd>{{ $guru->nama }}</dd>

                <b>NIP :</b>
                <dd>{{ $guru->nip }}</dd>

                <b>Jenis Kelamin :</b>
                <dd>{{ $guru->jk }}</dd>

                <b>Alamat :</b>
                <dd>{{ $guru->alamat }}</dd>

                <b>Telepon :</b>
                <dd>{{ $guru->tlp }}</dd>

                <b>Pengampuh mata pelajaran :</b>
                {{-- <dd>{{ $guru->mapel_id->nama_mapel }}</dd> --}}
                <dd>
                    @if($guru->mapel) <!-- Periksa apakah siswa memiliki kelas -->
                        {{ $guru->mapel->nama_mapel }} <!-- Jika ya, tampilkan nama kelas -->
                    @else
                        Tidak ada kelas <!-- Jika tidak, tampilkan pesan bahwa tidak ada kelas -->
                    @endif
                </dd>

            </div>
            <div class="col-md-6">
                <b>Foto :</b>
                <dd></dd>
                @if (!empty($guru->foto))
                <img src="{{ asset('storage/app/public/'. $guru->foto) }}" alt="Guru Photo" width="25%" class="mb-2">
              @else
                <p>Tidak ada foto yang tersedia</p>
              @endif
           </div>
        </div>
    </div>
    </x-app>
