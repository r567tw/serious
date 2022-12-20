<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Create New Course</h3>
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-sm-3">
                <label for="title">Title:</label>
                <input id="title" wire:model="title" type="text" class="form-control">
            </div>
            <div class="col-sm-3">
                <label for="description">Description</label>
                <input id="description" wire:model="description" type="text" class="form-control">
            </div>
            <div class="col-sm-3">
                <br>
                <button wire:click="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
