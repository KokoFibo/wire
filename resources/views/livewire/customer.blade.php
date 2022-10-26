<div>
    @include('livewire.create')
    @include('livewire.update')
    @include('livewire.delete')
   <div class="container">
    
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h3>All Customers
                    <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addCustomerModal">Add</button>
                </h3>
            </div>

            @if(session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Search" wire:model="searchTerm">
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($customer as $c)
                       <tr>
                        <td>{{ $c->firstname }}</td>
                        <td>{{ $c->lastname }}</td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->phone }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button wire:click.prevent="edit({{ $c->id }})" type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#updateCustomerModal">Update</button>
                                <button wire:click.prevent="delete({{ $c->id }})" type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteCustomerModal">Delete</button>
                                
                              </div>
                        </td>
                       </tr>
                           
                       @endforeach
                    </tbody>

                </table>
                
                {{ $customer->onEachSide(1)->links()  }}

            </div>
        </div>
    </div>
   </div>
</div>
