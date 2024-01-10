@extends('/layouts/layout')

@section('content')

<main class="py-5">
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-title">
                <strong>Car Details</strong>
              </div>           
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="model" class="col-md-3 col-form-label">Model</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $car->model }}</p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="year" class="col-md-3 col-form-label">Year</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $car->year }}</p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="salesperson_email" class="col-md-3 col-form-label">Salesperson Email</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $car->salesperson_email }}</p>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="Manufacturer" class="col-md-3 col-form-label">Manufacturer</label>
                      <div class="col-md-9">
                        <p class="form-control-plaintext text-muted">{{ $car->manufacturer->name }}</p>
                      </div>
                    </div>

                    <hr>
                    <form id="deleteForm" method="POST" action="{{ route('cars.delete', $car->id) }}">
                      <div class="form-group row mb-0">
                        <div class="col-md-9 offset-md-3">
                          <a href="/cars/{{ $car->id }}/edit" class="btn btn-info">Edit</a>
                                  @csrf
                                  @method('DELETE')
                          <button class="btn btn-outline-danger" type="submit" title="Delete" onclick="return confirmDelete()">Delete</button>
                          <a href="/cars" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <script>
      function confirmDelete() {
          var confirmation = confirm('Are you sure you want to delete this car?');
          return confirmation;
      }
    </script>
@endsection