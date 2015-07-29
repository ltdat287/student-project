<div class="form-group">
  <label for="name" class="col-md-3 control-label">
    Name 
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="name"
           id="name" value="{{ $name }}">
  </div>
</div>

<div class="form-group">
  <label for="age" class="col-md-3 control-label">
    Age
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="age"
           id="age" value="{{ $age }}">
  </div>
</div>

<div class="form-group">
  <label for="address" class="col-md-3 control-label">
    Address
  </label>
  <div class="col-md-8">
    <input type="text" class="form-control" name="address"
           id="address" value="{{ $address }}">
  </div>
</div>


<div class="form-group">
  <label for="gender" class="col-md-3 control-label">
    Gender
  </label>
  <div class="col-md-7">
    <label class="radio-inline">
      <input type="radio" name="gender"
             id="gender"
      @if ($gender == 0)
        checked="checked"
      @endif
      value="0"> Female
    </label>
    <label class="radio-inline">
      <input type="radio" name="gender"
      @if ($gender == 1)
        checked="checked"
      @endif
      value="1"> Male
    </label>
  </div>
</div>