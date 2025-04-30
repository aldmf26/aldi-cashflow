<x-theme.app title="{{ $title }}" table="Y" sizeCard="9">
    <x-slot name="cardHeader">
        <div class="d-flex justify-content-between align-items-center">
            <h5>Kategori</h5>
            <a class="btn btn-primary btn-sm" href="{{ route('cashflow.add') }}"><i
                    class="fas fa-plus"></i> Tambah</a>
        </div>

    </x-slot>
    <x-slot name="cardBody">

       
    </x-slot>

</x-theme.app>
