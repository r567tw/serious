<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">New Course</h3>
    </div>

    <div class="panel-body">
        <div class="form-inline">
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
                <button wire:click="store()" class="btn btn-default">Save</button>
            </div>
        </div>
    </div>
</div>
