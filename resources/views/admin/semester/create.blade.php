<x-app>
    <div class="card shadow mt-5">
        <div class="card-header bg-light">
            <div class="card-title">
                <h3 >Form Input Data</h3>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ url('admin/semester/store') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="row">


                    <div class="col-md-6">
                        <label for="" class="form-label">Periode</label></label>
                        <select class="form-control select2" style="width: 100%;" name="periode">
                            <option >Pilih Semester</option>
                            <option value="genap">genap</option>
                            <option value="ganjil">Ganjil</option>


                          </select>


                        {{-- @error('nama')
                        <span class="text-danger float-end" id="nama">{{$message}}</span>
                        @enderror --}}
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Tahun Ajaran</label>
                        <input type="text" name="tahun_ajaran" class="form-control">
                        @error('images')
                            <span class="text-danger float-end" id="nip">{{ $message }}</span>
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
