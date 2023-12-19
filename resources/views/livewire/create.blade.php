<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Name:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter name" wire:model="name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Course:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter course" wire:model="course">
        @error('course') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Age:</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter age" wire:model="age">
        @error('age') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <button wire:click.prevent="store()" class="btn btn-success">Save</button>
</form>