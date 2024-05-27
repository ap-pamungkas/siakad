<x-app>
    <div class="card shadow mt-5">
        <div class="card-header bg-light">
            <div class="card-title">
                <h3 >Form Input Data</h3>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ url('admin/nilai/store') }}" enctype="multipart/form-data" method="POST">
                @csrf



                <div class="row">
                    <div class="col-md-6">
                        <label for="" class="form-label">Nama Siswa</label></label>
                        <select name="siswa_id" id="siswa_id" class=" form-control select2" style="width: 100%;">
                            @foreach($siswa as $s)
                                <option value="{{ $s->id }}" data-kelas-id="{{ $s->kelas->id }}" data-semester-id="{{ $s->semester->id }}">{{ $s->nama }}</option>
                            @endforeach
                        </select>
                        </select>

                        <input type="hidden" name="kelas_id" id="kelas_id">
                        <input type="hidden" name="semester_id" id="semester_id">

                        {{-- @error('nama')
                        <span class="text-danger float-end" id="nama">{{$message}}</span>
                        @enderror --}}
                    </div>


                    <div class="col-md-6">
                        <label for="" class="form-label">Mata Pelajaran</label></label>
                        <select class="form-control select2" style="width: 100%;" name="mapel_id">
                            <option >Pilih Mata Pelajaran</option>
                           @foreach ($mapel as $mapel)
                            <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                          @endforeach

                          </select>



                        {{-- @error('nama')
                        <span class="text-danger float-end" id="nama">{{$message}}</span>
                        @enderror --}}
                    </div>



                </div>
                <div class="row mt-3">

<div class="col-md-4">
    <label for="" class="form-label">Nilai Ulangan Harian</label></label>
    <input type="text" name="nilai_ulangan"  value="nilai_ulangan" class="form-control">
</div>
<div class="col-md-4">
    <label for="" class="form-label">Nilai UTS</label></label>
    <input type="text" name="nilai_uts" value="nilai_uts" class="form-control">
</div>
<div class="col-md-4">
    <label for="" class="form-label">Nilai UAS</label></label>
    <input type="text" name="nilai_uas" value="nilai_uas" class="form-control">
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




    @push('script')
    <script>
        $(document).ready(function() {
            $('#siswa_id').on('change', function() {
                var kelasId = $(this).find(':selected').data('kelas-id');
                var semesterId = $(this).find(':selected').data('semester-id');
                $('#kelas_id').val(kelasId);
                $('#semester_id').val(semesterId);
            });
        });
    </script>
    @endpush



    </x-app>
