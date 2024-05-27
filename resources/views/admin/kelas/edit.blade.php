<x-app>
    <div class="card shadow mt-5">
        <div class="card-header bg-light">
            <div class="card-title">
                <h3 >Form Input Data</h3>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ url('/admin/kelas/update') }}/{{ $kelas->id }}" enctype="multipart/form-data" method="POST">
                @csrf
@method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">Tingkat Kelas</label>
                        <input type="text" name="tingkat_kelas" value="{{ $kelas->tingkat_kelas }}" class="form-control">

                        {{-- @error('nama')
                        <span class="text-danger float-end" id="nama">{{$message}}</span>
                        @enderror --}}
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Nama Kelas</label></label>
                        <input type="text" name="nama_kelas" value="{{ $kelas->nama_kelas  }}" class="form-control">

                        @error('nama')
                        <span class="text-danger float-end" id="nama">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label">Wali Kelas</label></label>
                        <select class="form-control select2" style="width: 100%;" name="guru_id">
                            @if (isset($kelas))  <option value="{{ $kelas->guru_id }}" selected> {{ $kelas->guru->nama }} </option>
                            @endif
                           @foreach ($guru as $guru)
                            <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
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
