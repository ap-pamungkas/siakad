<x-app>


<div class="card mt-5">
    <div class="card-header">
        <div class="card-title">
            Data Kepala
        </div>

        <a class="float-right btn btn-primary" href="{{ url('/admin/kepala-sekolah') }}/{{ $kps->id }}/edit">Edit <i class="fa fa-edit"></i></a>
    </div>

    <div class="card-body">
       <div class="row">
        <div class="col-md-6">
            <dd>nama </dd>
            <span>{{ $kps->nama }}</span>
            <dd>NIP </dd>
            <span>{{ $kps->nip }}</span>
        </div>
        <div class="col-md-6">
            <dd>Foto </dd>
            @if (!empty($kps->foto))
            <?php
              $photoPaths = json_decode($kps->foto, true); // Decode JSON to array
            ?>
            <div class="d-flex flex-wrap justify-content-between">
              @foreach ($photoPaths as $photoPath)
                <img src="{{ asset('storage/app/public/' . $photoPath) }}" alt="Guru Photo" width="25%" class="mb-2">
              @endforeach
            </div>
          @else
          @endif
        </div>
       </div>
    </div>
</div>
</x-app>
