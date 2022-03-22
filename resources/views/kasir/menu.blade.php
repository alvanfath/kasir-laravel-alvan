<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="menuLabel">Daftar Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <table id="table" class="table table-striped table-hover">
                  <tr>
                      <th>No</th>
                      <th>Menu</th>
                      <th>Harga</th>
                      <th>Stok</th>
                  </tr>
              @foreach($menu as $item)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->nama_menu }}</td>
                  <td>RP.{{ number_format($item->harga) }}</td>
                  <td>{{ number_format($item->ketersediaan) }}</td>
              </tr>
              @endforeach
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
