<div class="modal-dialog modal-dialog-centered">
    <div class="pop modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="addLabel">Add Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Menu :</label>
                <input type="text" class="form-control w-100" style="border-style: groove;" name="nama_menu" id="name" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga :</label>
                <input type="number" class="form-control w-100" style="border-style: groove;" name="harga" id="harga" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi :</label>
                <textarea class="form-control w-100" id="deskripsi" style="border-style: groove;" name="deskripsi" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="ketersediaan" class="form-label">ketersediaan :</label>
                <input type="number" class="form-control w-100" style="border-style: groove;" name="ketersediaan" min="1" id="ketersediaan" required>
            </div>
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
    </div>
</div>
