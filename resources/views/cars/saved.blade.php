@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-part">
                        {{ __('Create a car') }}
                    </div>
                    <div class="card-part">
                        <a href="{{route('home')}}">Home</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('cars.save-to-user') }}" enctype="multipart/form-data">
                      @csrf
                      @include('cars._form')
                    </form>

                    
                    @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>

            <div class="card mt-5">
              <div class="card-header d-flex justify-content-between">
                  <div class="card-part">
                      {{ __('List of saved cars') }}
                  </div>
                  <div class="card-part">

                  </div>
              </div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  <div class="saved-cars">
                      @if (count($savedCars) == 0)
                          <p>There are no saved cars</p>
                      @else
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Manufacturer</th>
                                <th scope="col">Additional name</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($savedCars as $car)
                                <tr>
                                    <th scope="row">{{$car->id}}</th>
                                    <td>{{$car->name}}</td>
                                    <td>{{ \App\Models\Manufacturer::where("id", $car->manufac_id)->pluck('name')[0]}}</td>
                                    <td>{{$car->additional_name}}</td>
                                    <td>
                                        <form method="POST" action="{{route('cars.destroy-saved', ['id' => $car->id])}}">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn btn-danger" value="Remove">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                      @endif
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection