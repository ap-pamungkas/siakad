<x-app>
    <div class="card shadow">
        <div class="card-header bg-light">
            <div class="card-title">
                <h3 >Form Input Data</h3>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ url('/kepala-sekolah/store') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control">

                        @error('nama')
                        <span class="text-danger float-end" id="nama">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="" class="form-label">Nip</label>
                        <input type="number" name="nip" class="form-control">
                        @error('nip')
                        <span class="text-danger float-end" id="nip">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control">
                        @error('images')
                        <span class="text-danger float-end" id="nip">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label">password</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                        <span class="text-danger float-end" id="password">{{$message}}</span>
                        @enderror
                    </div>



                    <div class="col-md-12 mt-2">
                       <button type="submit" class="btn btn-primary float-end"><i class="fas fa-save"></i>  Save</button>
                    </div>

                </div>
            </form>
        </div>
    </div>



    @push('script')
    <script>
        const nipInput = document.getElementById('nip');

        nipInput.addEventListener('keyup', (event) => {
          const formattedNIP = event.target.value.replace(/\D/g, '').slice(0, 18);
          nipInput.value = formattedNIP;
        });
      </script>

    @endpush


    </x-app>
