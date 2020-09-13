<div class="container" xmlns:wire="http://www.w3.org/1999/xhtml" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-2">
                    Users List
                    @include('livewire.user.create')
                    @include('livewire.user.update')
                    @include('livewire.user.show')
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joined At</th>
                            <th>Last Updated</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="td">{{ $loop->iteration }}</td>
                                <td class="td">{{ ucfirst($user->name) }}</td>
                                <td class="td">{{ $user->email }}</td>
                                <td class="td">{{ $user->created_at }}</td>
                                <td class="td">{{ $user->updated_at }}</td>
                                <td class="td">
                                    <button class="btn btn-info px-1 py-0" data-toggle="modal"
                                            data-target="#showModal" wire:click="show({{ $user->id }})"><i
                                            class="fa fa-eye"></i></button>
                                    <button class="btn btn-success px-1 py-0" data-toggle="modal"
                                            data-target="#updateModal" wire:click="edit({{ $user->id }})"><i
                                            class="fa fa-edit"></i></button>
                                    <button class="btn btn-danger px-1 py-0" wire:click="delete({{ $user->id }})"><i
                                            class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    Laravel Livewire Single Page Crud Example.
                </div>
            </div>
        </div>
    </div>
</div>

