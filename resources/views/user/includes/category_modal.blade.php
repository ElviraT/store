<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('Add Category') }}</h5>
        <label class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </label>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <div class="mb-3">
                <label class="form-label required">{{ __('Name') }}</label>
                <input type="text" class="form-control" name="name" id="name" required>
            </div>
        </div>
        <p id="status_category"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="return add_category();">{{ __('Save') }}</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
      </div>
    </div>
  </div>
</div>