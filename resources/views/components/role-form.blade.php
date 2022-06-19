@if(session('message'))
    <x-alert type="success" :message="session('message')"></x-alert>
@endif
<div>
    <label for="exampleFormControlInput1">Role Name</label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
    <button type="submit" class="btn btn-primary my-4">Submit</button>
</div>
