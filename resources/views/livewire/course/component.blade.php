<div>

    @if (session()->has('error'))
        <div class="alert alert-danger">
            <strong>Sorry!</strong> invalid input.<br><br>
            <ul style="list-style-type:none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-sm-12">
            @if ($updateMode)
                @include('livewire.course.update')
            @else
                @include('livewire.course.create')
            @endif
        </div>
    </div>

    <br>

    <div class="jumbotron">
        <table class="table table-bordered table-condensed">
            <tr>
                <td>ID</td>
                <td>TITLE</td>
                <td>COUNT</td>
                <td>ACTION</td>
            </tr>

            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->votes->count() }}</td>
                    <td>
                        <button wire:click="edit({{ $row->id }})" class="btn btn-xs btn-warning">Edit</button>
                        <button wire:click="destroy({{ $row->id }})" class="btn btn-xs btn-danger">Del</button>
                        @auth
                            <button wire:click="vote({{ $row->id }})" class="btn btn-xs btn-info">Vote</button>
                        @endauth
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

</div>
