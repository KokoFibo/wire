
  
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="updateCustomerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
            </div>
           
        <div class="modal-body">

            <form wire:submit.prevent="update">
                {{-- <input type="hidden" name="id" wire:model="ids"> --}}
                <div class="mb-3">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" id="firstname" placeholder="Firstname" wire:model="firstname">
                    @error('firstname') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Lastname" wire:model="lastname">
                    @error('lastname') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Email" wire:model="email">
                    @error('email') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
                
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Phone" wire:model="phone">
                    @error('phone') <span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </form>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="closeModal">Close</button>
          <button type="button" class="btn btn-primary" wire:click.prevent="update()">Save</button>
        </div>
   
      </div>
    </div>
  </div>