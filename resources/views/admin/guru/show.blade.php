<x-app>


    <div class="card mt-5">
        <div class="card-header">
            <div class="card-title">
                Data Kepala
            </div>
            <a class = "btn btn-warning  " style="margin-left:78%;" href="{{url('/guru')}}"> <i class="fas fa-arrow-left"> </i> Kembali </a>

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
                @if (!empty($guru->foto))
                  <?php
                    $photoPaths = json_decode($guru->foto, true); // Decode JSON to array
                  ?>
                  <div class="d-flex flex-wrap justify-content-between">
                    @foreach ($photoPaths as $photoPath)
                      <img src="{{ asset('storage/app/public/' . $photoPath) }}" alt="Guru Photo" width="25%" class="mb-2">
                    @endforeach
                  </div>
                @else
                  <p>Tidak ada foto yang tersedia</p>
                @endif
              </div>
           </div>
        </div>
    </div>
    </x-app>
