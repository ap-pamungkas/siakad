<x-app>
    <div class="card shadow mt-5">
        <div class="card-header bg-light">
            <div class="card-title">
                <h3 >Form Input Data</h3>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ url('admin/mapel/store') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">Kode Mata Pelajaran</label>
                        <input type="text" name="kode_mapel" class="form-control">

                        {{-- @error('nama')
                        <span class="text-danger float-end" id="nama">{{$message}}</span>
                        @enderror --}}
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Mata Pelajaran</label>
                        <input type="text" name="nama_mapel" class="form-control">

                        @error('nama')
                        <span class="text-danger float-end" id="nama">{{$message}}</span>
                        @enderror
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
