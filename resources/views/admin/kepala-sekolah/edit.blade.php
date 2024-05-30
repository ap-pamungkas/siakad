<x-app>
    <div class="card shadow mt-5">
        <div class="card-header bg-light">
            <div class="card-title">
                <h3 >Form Edit Data</h3>
            </div>
            <a href="{{ url('/kepala-sekolah') }}" class="btn btn-primary float-right">Kembali</a>
        </div>

        <div class="card-body">
            <form action="{{ url('/admin/kepala-sekolah/update') }}/{{ $kps->id }}" enctype="multipart/form-data" method="POST">
                @csrf
            @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" name="nama" value="{{ $kps->nama }}" class="form-control">

                        @error('nama')
                        <span class="text-danger float-end" id="nama">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="" class="form-label">Nip</label>
                        <input type="number" value="{{ $kps->nip }}" name="nip" class="form-control" minlength="18" maxlength="18">
                        @error('nip')
                        <span class="text-danger float-end" id="nip">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="" class="form-label">Foto</label>
                        <input type="file"  name="foto" class="form-control" >
                        @error('images')
                            <span class="text-danger float-end" id="nip">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="" class="form-label">no Hp</label>
                        <input type="number" value="{{ $kps->tlp }}" name="tlp" class="form-control">
                        {{-- @error('password')
                        <span class="text-danger float-end" id="password">{{$message}}</span>
                        @enderror --}}
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label">password</label>
                        <input type="password" name="password" class="form-control" minlength="8" >
                         {{-- @error('password')
                        <span class="text-danger float-end" id="password">{{$message}}</span>
                        @enderror --}}
                    </div>



                    <div class="col-md-12 mt-2">
                       <button type="submit" class="btn btn-primary float-end"><i class="fas fa-save"></i>  Save</button>
                    </div>

                </div>
            </form>
        </div>
    </div>





    </x-app>
