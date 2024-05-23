<x-app>


    <div class="card mt-5">
        <div class="card-header">
            <div class="card-title">
                Data Kepala
            </div>

            <a class="float-right btn btn-primary" href="{{ url('/guru') }}/{{ $guru->id }}/edit">Edit <i class="fa fa-edit"></i></a>
        </div>

        <div class="card-body">
           <div class="row">
            <div class="col-md-6">
                <dd>nama </dd>
                <span>{{ $guru->nama }}</span>
                <dd>NIP </dd>
                <span>{{ $guru->nip }}</span>
                <dd>Jenis Kelamin </dd>
                <span>{{ $guru->jk }}</span>
                <dd>Alamat </dd>
                <span>{{ $guru->alamat }}</span>
                <dd>Telepon </dd>
                <span>{{ $guru->tlp }}</span>
                <dd>Pengampuh mata pelajaran </dd>
                <span>{{ $guru->mapel_id }}</span>

            </div>
            <div class="col-md-6">
                <dd>Foto </dd>
                  <img width="50%" src="{{ asset('public') }}/{{ $guru->foto }}" alt="">

            </div>
           </div>
        </div>
    </div>
    </x-app>
