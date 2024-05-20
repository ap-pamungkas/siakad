<button class="btn btn-danger bs-tooltip"  title="Delete" data-placement="right" type="button" onclick="deleteData('{{ $id }}','{{ $path }}')">
    <i class="fa fa-trash"></i> Delete
</button>

@push('script')
    @once
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            const deleteData = (id, path) => {
                const base_url = '{{ url('/') }}'
                const current_url = '{{ url()->current() }}'
                const url = path ? `${base_url}/${path}/${id}` : `${current_url}/${id}`

                Swal.fire({
                    title: 'Anda Yakin akan Menghapus Data Ini?',
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Lanjutkan!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const csrf_token = `{{csrf_token()}}`
                        const template = `
                        <form method="post" action="${url}">
                            <input type="hidden" name="_token" value="${csrf_token}"/>
                            <input type="hidden" name="_method" value="delete"/>
                        `

                        $(template).appendTo('body').submit();
                    }
                })
            }
        </script>
    @endonce
@endpush
