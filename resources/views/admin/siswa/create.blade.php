<x-app>
    <div class="card mt-5">
        <div class="card-header">
            <div class="card-title">
                Tambah Data Siswa
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/siswa/store') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">Nama</label></label>
                        <input type="text" name="nama" class="form-control">

                        {{-- @error('nama')
                        <span class="text-danger float-end" id="nama">{{$message}}</span>
                        @enderror --}}
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">NISN</label>
                        <input type="number" name="nisn" class="form-control">
                        @error('nip')
                            <span class="text-danger float-end" id="nip">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">Jenis Kelamin</label></label>

                        <select class="form-control select2" style="width: 100%;" name="jk">
                            <option >Jenis Kelamin</option>
                            <option value="laki-laki">laki-laki</option>
                            <option value="perempuan">perempuan</option>

                          </select>

                        {{-- @error('nama')
                        <span class="text-danger float-end" id="nama">{{$message}}</span>
                        @enderror --}}
                    </div>


                <div class="col-md-6">
                    <label for="" class="form-label">No hp orang Tua/wali</label>
                    <input type="number" name="tlp" class="form-control">
                    @error('images')
                        <span class="text-danger float-end" id="nip">{{ $message }}</span>
                    @enderror
                </div>

                </div>


<div class="row">

                <div class="col-md-12">
                    <label for="" class="form-label">Semester</label>
                    <select class="form-control select2" style="width: 100%;" name="semester_id">
                        <option >Semester</option>
                        @foreach ($semester as $smtr)
                        <option value="{{ $smtr->id }}">{{ $smtr->periode }}</option>
                      @endforeach

                      </select>
                    @error('tlp')
                        <span class="text-danger float-end" id="nip">{{ $message }}</span>
                    @enderror
                </div>
</div>
<div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control">
                    @error('tlp')
                        <span class="text-danger float-end" id="nip">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control">
                    @error('tlp')
                        <span class="text-danger float-end" id="nip">{{ $message }}</span>
                    @enderror
                </div>
</div>
<div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">foto</label>
                    <input type="file" name="foto[]" class="form-control">
                    @error('tlp')
                        <span class="text-danger float-end" id="nip">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">orang Tua/wali</label>
                    <input type="text" name="orang_tua_wali" class="form-control">
                    @error('tlp')
                        <span class="text-danger float-end" id="nip">{{ $message }}</span>
                    @enderror
                </div>
</div>


    <div class="row">
        <div class="col-md-6">
            <label for="" class="form-label">Agama</label></label>

            <select class="form-control select2" style="width: 100%;" name="agama">
                <option >Pilih Agama</option>
                <option value="islam">Islam</option>
                <option value="katolik">Katolik</option>
                <option value="kristen">Kristen</option>
                <option value="buddha">Buddha</option>
                <option value="konghucu">Konghucu</option>
                <option value="hindu">Hindu</option>

              </select>

            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
                @error('tlp')
                    <span class="text-danger float-end" id="nip">{{ $message }}</span>
                @enderror
            {{-- @error('nama')
            <span class="text-danger float-end" id="nama">{{$message}}</span>
            @enderror --}}
        </div>
    </div>



<div class="row">
    <div class="col-md-12">
        <label for="" class="form-label">Alamat</label>
        <textarea name="alamat" id="" class="form-control"></textarea>
        {{-- @error('tlp')
            <span class="text-danger float-end" id="nip">{{ $message }}</span>
        @enderror --}}
    </div>

</div>







        <div class="row">
                <div class="col-md-12 mt-4">
                    <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Save</button>
                </div>
            </div>


            </form>
        </div>

    </div>
</x-app>
