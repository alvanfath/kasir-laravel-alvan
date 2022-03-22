<div class="modal-dialog modal-dialog-centered">
    <div class="pop modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="addLabel">Pesan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ route('storek')}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Pelanggan :</label>
                <input type="text" class="form-control w-100" style="border-style: groove;" name="nama_pelanggan" id="name" >
            </div>
            <div class="mb-3">
                <label for="nama_menu" class="form-label">Nama Menu :</label>
                <select class="form-select w-100" style="border-style: groove;" name="nama_menu" id="nama_menu" aria-label="Default select example">
                @foreach($menu as $item)
                    <option>
                        <tr>{{ $item->nama_menu }}<tr>
                    </option>
                @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah :</label>
                <input type="number" class="form-control w-100" style="border-style: groove;" min="1" name="jumlah" id="jumlah" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
    </div>
</div>
