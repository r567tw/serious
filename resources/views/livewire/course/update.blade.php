<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Update Course</h3>
    </div>

    <div class="panel-body">
        <div class="form-inline">
            <input type="hidden" wire:model="selected_id">
            <div class="input-group">
                Title
                <input wire:model="title" type="text" class="form-control input-sm">
            </div>
            <div class="input-group">
                Description
                <input wire:model="description" type="text" class="form-control input-sm">
            </div>
            <div class="input-group">
                <br>
                <button wire:click="update()" class="btn btn-default">Update</button>
            </div>
        </div>
    </div>

</div>
