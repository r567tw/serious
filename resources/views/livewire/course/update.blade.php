<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Update Course</h3>
    </div>

    <div class="panel-body">
        <div class="row">
            <input type="hidden" wire:model="selected_id">
            <div class="col-sm-3">
                <label for="title">Title</label>
                <input id="title" wire:model="title" type="text" class="form-control input-sm">
            </div>
            <div class="col-sm-3">
                <label for="description">Description</label>
                <input id="description" wire:model="description" type="text" class="form-control input-sm">
            </div>
            <div class="col-sm-3">
                <br>
                <button wire:click="update()" class="btn btn-secondary">Update</button>
            </div>
        </div>
    </div>

</div>
