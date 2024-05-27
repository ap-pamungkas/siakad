<x-app>
    <div class="card mt-5">
        <div class="card-header">
            <div class="card-title">
                Tambah Data Siswa
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/siswa/update') }}/{{ $siswa->id }}" enctype="multipart/form-data" method="POST">
                @csrf
        @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">Nama</label></label>
                        <input type="text" name="nama" value="{{ $siswa->nama }}" class="form-control">

                        {{-- @error('nama')
                        <span class="text-danger float-end" id="nama">{{$message}}</span>
                        @enderror --}}
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">NISN</label>
                        <input type="number" name="nisn" value="{{ $siswa->nisn }}" class="form-control">
                        @error('nip')
                            <span class="text-danger float-end" id="nip">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">Jenis Kelamin</label></label>

                        <select class="form-control select2" style="width: 100%;" name="jk">
                            <option value="{{ $siswa->jk }}" >{{ $siswa->jk }}</option>
                            <option value="laki-laki">laki-laki</option>
                            <option value="perempuan">perempuan</option>

                          </select>

                        {{-- @error('nama')
                        <span class="text-danger float-end" id="nama">{{$message}}</span>
                        @enderror --}}
                    </div>


                <div class="col-md-6">
                    <label for="" class="form-label">No hp orang Tua/wali</label>
                    <input type="number" value="{{ $siswa->tlp }}" name="tlp" class="form-control">
                    @error('images')
                        <span class="text-danger float-end" id="nip">{{ $message }}</span>
                    @enderror
                </div>

                </div>


<div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">Kelas</label>
                    <select class="form-control select2" style="width: 100%;" name="kelas_id">
                        @if (@isset($siswa) )
                               <option value="{{ $siswa->kelas_id }}" selected> {{ $siswa->kelas->nama_kelas }} </option>
                           @endif
                        @foreach ($kelas as $kls)
                        <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                      @endforeach

                      </select>
                    @error('tlp')
                        <span class="text-danger float-end" id="nip">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Semester</label>
                    <select class="form-control select2" style="width: 100%;" name="semester_id">
                        @if (@isset($siswa) )
                        <option value="{{ $siswa->semester_id }}" selected> {{ $siswa->semester->periode }} </option>
                    @endif
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
                    <input type="text" name="tempat_lahir" value="{{ $siswa->tempat_lahir }}" class="form-control">
                    @error('tlp')
                        <span class="text-danger float-end" id="nip">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">Tanggal Lahir</label>
                    <input type="date"  value="{{ $siswa->tgl_lahir }}" name="tgl_lahir" class="form-control">
                    @error('tlp')
                        <span class="text-danger float-end" id="nip">{{ $message }}</span>
                    @enderror
                </div>
</div>
<div class="row">
                <div class="col-md-6">
                    <label for="" class="form-label">foto</label>
                    <input type="file"  name="foto[]"  class="form-control">
                    @error('tlp')
                        <span class="text-danger float-end" id="nip">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="" class="form-label">orang Tua/wali</label>
                    <input type="text" name="orang_tua_wali" value="{{ $siswa->orang_tua_Wali }}"  class="form-control">
                    @error('tlp')
                        <span class="text-danger float-end" id="nip">{{ $message }}</span>
                    @enderror
                </div>
</div>


    <div class="row">
        <div class="col-md-12">
            <label for="" class="form-label">Agama</label></label>

            <select class="form-control select2" style="width: 100%;" name="agama">
                <option value="{{ $siswa->agama }}">{{ $siswa->agama }}</option>
                <option value="islam">Islam</option>
                <option value="katolik">Katolik</option>
                <option value="kristen">Kristen</option>
                <option value="buddha">Buddha</option>
                <option value="konghucu">Konghucu</option>
                <option value="hindu">Hindu</option>

              </select>

            {{-- @error('nama')
            <span class="text-danger float-end" id="nama">{{$message}}</span>
            @enderror --}}
        </div>
    </div>



<div class="row">
    <div class="col-md-12">
        <label for="" class="form-label">Alamat</label>
        <textarea name="alamat" id="" class="form-control">{{ $siswa->alamat }}</textarea>
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
