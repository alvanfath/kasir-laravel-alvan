<div class="modal-dialog modal-dialog-centered">
    <div class="pop modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="PrintLabel">Print</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="PrintCustom" target="blank" method="get">
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="from" class="form-label">Date From</label>
                        <input type="date" name="from" class="form-control" id="from" >
                    </div>
                    <div class="mb-3">
                        <label for="to" class="form-label">Date To</label>
                        <input type="date" class="form-control" name="to" id="to">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Print</button>
            </div>
        </form>
    </div>
</div>
