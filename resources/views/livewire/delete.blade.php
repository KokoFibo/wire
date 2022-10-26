
  
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="deleteCustomerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="destroy">
            <div class="modal-body">
                <div class="form-group">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Firstname</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname" wire:model="firstname">
                        
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Lastname</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname" wire:model="lastname">
                       
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" wire:model="email">
                        
                    </div>
                </div>
                <div class="form-group">
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" wire:model="phone">
                        
                    </div>
                </div>
                <h4>Are you sure to delete this data?</h4>
                
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Yes! Delete</button>
            </div>
        </form>
      </div>
    </div>
  </div>