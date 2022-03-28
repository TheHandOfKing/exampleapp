<x-select-component label="Car" name="car_manufacturer" popovertitle="Select a manufacturer">
  <x-slot name='options'>
    <option value="-1" selected disabled>All</option>
    @foreach ($manufacturers as $manufacturer)
        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
    @endforeach
  </x-slot>
</x-select-component>

<div id="car-select" class="form-group row mt-2">

</div>

<input type="submit" class="btn btn-primary mt-5" value="Save a car">