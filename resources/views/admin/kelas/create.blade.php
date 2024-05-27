<x-app>
    <div class="card shadow mt-5">
        <div class="card-header bg-light">
            <div class="card-title">
                <h3 >Form Input Data</h3>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ url('/admin/kelas/store') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">Tingkat Kelas</label>
                        <input type="text" name="tingkat_kelas" class="form-control">

                        {{-- @error('nama')
                        <span class="text-danger float-end" id="nama">{{$message}}</span>
                        @enderror --}}
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Nama Kelas</label></label>
                        <input type="text" name="nama_kelas" class="form-control">

                        @error('nama')
                        <span class="text-danger float-end" id="nama">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Wali Kelas</label></label>
                        <select class="form-control select2" style="width: 100%;" name="guru_id">
                            <option >Pilih Wali Kelas</option>
                           @foreach ($guru as $guru)
                            <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                          @endforeach

                          </select>

                        {{-- @error('nama')
                        <span class="text-danger float-end" id="nama">{{$message}}</span>
                        @enderror --}}
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Semester</label></label>
                        <select class="form-control select2" style="width: 100%;" name="semester_id">
                            <option >Pilih Semester</option>
                           @foreach ($semester as $smtr)
                            <option value="{{ $smtr->id }}">{{ $smtr->periode }}</option>
                          @endforeach

                          </select>

                        {{-- @error('nama')
                        <span class="text-danger float-end" id="nama">{{$message}}</span>
                        @enderror --}}
                    </div>


                </div>



<div class="row">
                    <div class="col-md-12 mt-2">
                       <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i>  Save</button>
                    </div>
                </div>

                </div>
            </form>
        </div>
    </div>







    </x-app>
