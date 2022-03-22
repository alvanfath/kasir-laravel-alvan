<div class="modal-dialog modal-dialog-centered">
    <div class="pop modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="EditModalLabel">Edit Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ route('updatek') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        <div class="modal-body">
            <input type="hidden" id="id" name="id">
            <h6>Customer = <span id="nama_pelanggan"></span></h6>
            <h6>Menu = <span id="menu"></span></h6>
            <h6>Kuantitas = <span id="kuantitas"></span></h6>
            <h6>Total = <span id="total_harga"></span></h6>
            <div class="mb-3">
                <label for="bayar" class="form-label">Tunai :</label>
                <input type="number" class="form-control w-100" style="border-style: groove;" name="bayar" id="bayar"  required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Bayar</button>
        </div>
    </form>
    </div>
</div>