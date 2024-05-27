

<x-app>
    <div class="card shadow mt-5">
        <div class="card-header bg-light">
            <div class="card-title">
                <h3 >Form Input Data</h3>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ url('admin/nilai/update') }}/{{ $nilai->id }}" enctype="multipart/form-data" method="POST">
                @csrf

@method('PUT')

<div class="row">
    <div class="col-md-6">
        <label for="" class="form-label">Nama Siswa</label>
        <select name="siswa_id" id="siswa_id" class="form-control select2" style="width: 100%;">
            @foreach($siswa as $s)
                <option value="{{ $s->id }}" data-kelas-id="{{ $s->kelas->id }}" data-semester-id="{{ $s->semester->id }}" {{ $s->id == $nilai->siswa_id ? 'selected' : '' }}>{{ $s->nama }}</option>
            @endforeach
        </select>

        <input type="hidden" name="kelas_id" id="kelas_id" value="{{ old('kelas_id', $nilai->kelas_id) }}">
        <input type="hidden" name="semester_id" id="semester_id" value="{{ old('semester_id', $nilai->semester_id) }}">
    </div>

    <div class="col-md-6">
        <label for="" class="form-label">Mata Pelajaran</label>
        <select class="form-control select2" style="width: 100%;" name="mapel_id">
            <option {{ $nilai->mapel_id == null ? 'selected' : '' }}>Pilih Mata Pelajaran</option>
            @foreach ($mapel as $mapel)
                <option value="{{ $mapel->id }}" {{ $mapel->id == $nilai->mapel_id ? 'selected' : '' }}>{{ $mapel->nama_mapel }}</option>
            @endforeach
        </select>
    </div>
</div>
                <div class="row mt-3">

<div class="col-md-4">
    <label for="" class="form-label">Nilai Ulangan Harian</label></label>
    <input type="text" name="nilai_ulangan" value="{{ $nilai->nilai_ulangan }}" class="form-control">
</div>
<div class="col-md-4">
    <label for="" class="form-label">Nilai UTS</label></label>
    <input type="text" name="nilai_uts" value="{{ $nilai->nilai_uts }}" class="form-control">
</div>
<div class="col-md-4">
    <label for="" class="form-label">Nilai UAS</label></label>
    <input type="text" name="nilai_uas" value="{{ $nilai->nilai_uas }}" class="form-control">
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
            // Set the default value for kelas_id
            if (!document.getElementById("kelas_id").value) {
                var kelasId = $("select[name='siswa_id'] option:selected").data("kelas-id");
                document.getElementById("kelas_id").value = kelasId;
            }

            // Set the value for kelas_id when siswa_id changes
            $("#siswa_id").on("change", function() {
                var kelasId = $(this).find(":selected").data("kelas-id");
                var semesterId = $(this).find(":selected").data("semester-id");
                $("#kelas_id").val(kelasId);
                $("#semester_id").val(semesterId);
            });
        });
    </script>
    @endpush



    </x-app>
