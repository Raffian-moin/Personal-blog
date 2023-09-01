<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label>Name</label>
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
          <div class="form-group">
            <label>Status</label>
            {{ Form::select('status', [1 => 'Active', 0 => 'Inactive'], null, ['class' => 'form-control']) }}
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
