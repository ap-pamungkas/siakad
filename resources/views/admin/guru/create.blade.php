<x-app>
    <div class="card mt-5">
        <div class="card-header">
            <div class="card-title">
                Tambah Data Guru
            </div>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/guru/store') }}" enctype="multipart/form-data" method="POST">
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
                        <label for="" class="form-label">Nip</label>
                        <input type="number" name="nip" class="form-control">
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
                    <label for="" class="form-label">Foto</label>
                    <input type="file" name="foto[]"  multiple class="form-control">
                    @error('images')
                        <span class="text-danger float-end" id="nip">{{ $message }}</span>
                    @enderror
                </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">Mapel</label></label>

                        <select class="form-control select2" style="width: 100%;" name="mapel_id">
                            <option >Pilih Mata Pelajaran Yang Di ampuh</option>
                           @foreach ($mapel as $mapel)
                            <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                          @endforeach

                          </select>

                        {{-- @error('nama')
                        <span class="text-danger float-end" id="nama">{{$message}}</span>
                        @enderror --}}
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">No Hp</label></label>

                        <input type="number" name="tlp"  multiple class="form-control">
                        {{-- @error('nama')
                        <span class="text-danger float-end" id="nama">{{$message}}</span>
                        @enderror --}}
                    </div>




                </div>
              <div class="row"></div>
                <div class="row">
                <div class="col-md-12">
                    <label for="" class="form-label">Alamat</label>
                   <textarea name="alamat" id="" class="form-control"></textarea>
                    {{-- @error('nip')
                        <span class="text-danger float-end" id="nip">{{ $message }}</span>
                    @enderror --}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="" class="form-label">password</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                        <span class="text-danger float-end" id="password">{{ $message }}</span>
                    @enderror
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
