<div class="modal-dialog modal-dialog-centered">
    <div class="pop modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="addLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="postuser" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="name" class="form-label">Nama :</label>
                <input type="text" class="form-control w-100" style="border-style: groove;" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username :</label>
                <input type="text" class="form-control w-100" name="username" style="border-style: groove;"  required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password :</label>
                <input type="password" class="form-control w-100" name="password" style="border-style: groove;" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role :</label>
                <select class="form-select w-100" name="role" style="border-style: groove;" aria-label="Default select example">
                    <option disabled selected >Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                    <option value="kasir">Kasir</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input class="form-control w-100" style="border-style: groove;" name="foto" type="file" id="foto" multiple>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
    </div>
</div>
