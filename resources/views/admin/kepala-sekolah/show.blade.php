<x-app>


<div class="card mt-5">
    <div class="card-header">
        <div class="card-title">
            Data Kepala
        </div>

        <a class="float-right btn btn-primary" href="{{ url('/kepala-sekolah') }}/{{ $kps->id }}/edit">Edit <i class="fa fa-edit"></i></a>
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
              <img width="50%" src="{{ asset('public') }}/{{ $kps->foto }}" alt="">

        </div>
       </div>
    </div>
</div>
</x-app>
