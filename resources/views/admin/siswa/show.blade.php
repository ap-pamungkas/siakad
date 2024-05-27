<x-app>


    <div class="card mt-5">
        <div class="card-header">
            <div class="card-title">
                Data Siswa
            </div>
            <a class = "btn btn-warning  " style="margin-left:78%;" href="{{url('admin/siswa')}}"> <i class="fas fa-arrow-left"> </i> Kembali </a>

            <a class="float-right btn btn-primary" href="{{ url('admin/siswa') }}/{{ $siswa->id }}/edit">Edit <i class="fa fa-edit"></i></a>
        </div>

        <div class="card-body">
           <div class="row">
            <div class="col-md-6">
                <b>nama :</b>

                <dd>{{ $siswa->nama }}</dd>
                <b>NIP :</b>
                <dd>{{ $siswa->nip }}</dd>
                <b>Jenis Kelamin :</b>
                <dd>{{ $siswa->jk }}</dd>
                <b>Alamat :</b>
                <dd>{{ $siswa->alamat }}</dd>
                <b>Telepon Orang Tua/Wali:</b>
                <dd>{{ $siswa->tlp }}</dd>
                <b>orang Tua/Wali :</b>
                <dd>{{ $siswa->orang_tua_Wali }}</dd>
                <b>Telepon :</b>
                <dd>{{ $siswa->tlp }}</dd>
                <b>Telepon :</b>
                <dd>{{ $siswa->tlp }}</dd>
                <b>Kelas :</b><dd>
                    @if($siswa->kelas) <!-- Periksa apakah siswa memiliki kelas -->
                        {{ $siswa->kelas->nama_kelas }} <!-- Jika ya, tampilkan nama kelas -->
                    @else
                        Tidak ada kelas <!-- Jika tidak, tampilkan pesan bahwa tidak ada kelas -->
                    @endif
                </dd>
                <b>Semester :</b><dd>
                    @if($siswa->semester) <!-- Periksa apakah siswa memiliki kelas -->
                        {{ $siswa->semester->periode }} <!-- Jika ya, tampilkan nama kelas -->
                    @else
                        Tidak ada periode <!-- Jika tidak, tampilkan pesan bahwa tidak ada kelas -->
                    @endif
                </dd>
                <b>Alamat :</b>
                <dd>{{ $siswa->alamat }}</dd>
                <b>Agama :</b>
                <dd>{{ $siswa->agama }}</dd>

            </div>
            <div class="col-md-6">
                <b>Foto :</b>
                @if (!empty($siswa->foto))
                  <?php
                    $photoPaths = json_decode($siswa->foto, true); // Decode JSON to array
                  ?>
                  <div class="d-flex flex-wrap justify-content-between">
                    @foreach ($photoPaths as $photoPath)
                      <img src="{{ asset('storage/app/public/' . $photoPath) }}" alt="siswa Photo" width="25%" class="mb-2">
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
