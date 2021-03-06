<!-- Insert Modal -->
<div wire:ignore.self class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentModalLabel">Add a Consumer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    wire:click="closeModal"></button>
            </div>

            <form wire:submit.prevent="saveStudent">
                <div class="modal-body">
                    
                <div class="mb-3">
                        <label>Consumer Name</label>
                        <input type="text" wire:model="ConsumerName" class="form-control">
                    </div>
                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                
            </form>

        </div>
    </div>
</div>

<!-- Update Student Modal -->
<div wire:ignore.self class="modal fade" id="updateStudentModal" tabindex="-1" aria-labelledby="updateStudentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateStudentModalLabel">Edit Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>

            <form wire:submit.prevent="update">
                <div class="modal-body">

                    <div class="mb-3">
                        <label>Date</label>
                        <input type="text" wire:model="Date" class="form-control">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Building Name</label>
                        <input type="text" wire:model="BuildingName" class="form-control">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <!--DROP DOWN-->
                    <div class="mb-3">
                        <label>Consumer</label>
                        <select wire:model="ConsumerName" class="form-control">
                            <option>---Choose a consumer from the drop down---</option>
                            @foreach($consumerPointer as $item)
                            <option>{{$consumerPointer->ConsumerName}}</option>
                            @endforeach
                        </select>
                        <!--<input type="text" wire:model="ConsumerName" class="form-control">-->
                        @error('course') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Meter Number</label>
                        <input type="text" wire:model="MeterNumber" class="form-control">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Total Volume</label>
                        <input type="text" wire:model="TotalVolume" class="form-control">
                        @error('course') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Total Units</label>
                        <input type="text" wire:model="TotalUnits" class="form-control">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Principle Amount</label>
                        <input type="text" wire:model="PrincipleAmount" class="form-control">
                        @error('course') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>PrincipleAmountExclVat</label>
                        <input type="text" wire:model="PrincipleAmountExclVat" class="form-control">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>VAT</label>
                        <input type="text" wire:model="VAT" class="form-control">
                        @error('course') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Arrears Amount</label>
                        <input type="text" wire:model="ArrearsAmount" class="form-control">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Tarrif Index</label>
                        <input type="text" wire:model="TarrifIndex" class="form-control">
                        @error('course') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Delete Student Modal -->
<div wire:ignore.self class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteStudentModalLabel">Delete Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyStudent">
                <div class="modal-body">
                    <h4>Are you sure you want to delete this data ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes! Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>