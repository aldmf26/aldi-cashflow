<x-theme.app title="{{ $title }}" table="Y" sizeCard="9">
    <x-slot name="cardHeader">
        <div class="row">
            <div class="col-lg-4 col-4">
                <h5 class="float-start">Cashflow</h5>
            </div>
            <div class="col-lg-4 col-8">
                <button class="btn rounded-pill btn-outline-primary btn-block">
                    <span style="font-size: 25px">Rp. {{ number_format($ttlDebit - $ttlKredit, 0) }}</span>
                </button>
            </div>
            <div class="col-lg-4 col-12">
                <a class="me-2 btn btn-primary btn-sm float-end" href="{{ route('cashflow.add') }}"><i
                        class="fas fa-plus"></i> Tambah</a>
                <x-theme.btn_filter />
            </div>
        </div>

    </x-slot>
    <x-slot name="cardBody">
        <section class="row">
            <div id="loadTbl"></div>

        </section>
        <form id="deleteForm" action="{{ route('cashflow.destroy') }}" method="post">
            @csrf
            <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <h5 class="text-danger ms-4 mt-4"><i class="fas fa-trash"></i> Hapus Data</h5>
                                <p class=" ms-4 mt-4">Apa anda yakin ingin menghapus ?</p>
                                <input type="hidden" class="no_nota" name="no_nota">
                                <input type="hidden" class="tglDelete" name="tglDelete">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form id="updateForm" action="{{ route('cashflow.update') }}" method="post">
            @csrf
            <x-theme.modal title="Edit Cashflow" size="modal-lg" idModal="edit">
                <div id="load_edit"></div>
            </x-theme.modal>
        </form>
        @section('scripts')
            <script>
                loadTbl()

                function loadTbl() {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('cashflow.load_tbl') }}",
                        data: {
                            tgl1: "{{ $tgl1 }}",
                            tgl2: "{{ $tgl2 }}",
                        },
                        success: function(r) {
                            $("#loadTbl").html(r);
                            $("#table1").DataTable()
                        }
                    });
                }

                $(document).on('click', '.delete_nota', function(e) {
                    e.preventDefault()

                    var no_nota = $(this).attr('no_nota');
                    $('.no_nota').val(no_nota);
                    var tgl = $(this).attr('tgl');
                    $('.tglDelete').val(tgl);

                })

                $(document).on('submit', '#deleteForm', function(e) {
                    e.preventDefault();
                    const link = $(this).attr('action')
                    const form = $(this).serialize()
                    $.ajax({
                        type: "POST",
                        url: link,
                        data: form,
                        success: function(r) {
                            loadTbl()
                            $("#delete").modal('hide')
                            toast('Berhasil Hapus data')
                        }
                    });
                })

                $(document).on('click', '.edit', function(e) {
                    e.preventDefault()
                    var id = $(this).attr('id_transaksi')
                    $("#edit").modal('show')
                    $.ajax({
                        type: "GET",
                        url: "{{ route('cashflow.edit') }}?id_transaksi=" + id,
                        success: function(r) {
                            $("#load_edit").html(r);
                            // loadTbl()
                        }
                    });
                })

                $(document).on('submit', '#updateForm', function(e) {
                    e.preventDefault();
                    const link = $(this).attr('action')
                    const form = $(this).serialize()
                    $.ajax({
                        type: "POST",
                        url: link,
                        data: form,
                        success: function(r) {
                            loadTbl()
                            $("#edit").modal('hide')
                            toast('Berhasil Update data')
                        }
                    });
                })
            </script>
        @endsection
    </x-slot>

</x-theme.app>
