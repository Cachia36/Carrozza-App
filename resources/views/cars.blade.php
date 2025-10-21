@extends('/layouts/layout')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <main class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header card-title">
                  <div class="d-flex align-items-center">
                    <h2 class="mb-0">All Cars Models</h2>
                    <div class="ml-auto">
                      <a href="/cars/create" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add New</a>
                    </div>
                  </div>
                </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6"></div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col">
                      <form id="filterForm" action="{{ url('/cars') }}" method="GET">
                        <select id="filter" class="custom-select" style="margin-bottom: 20px;"
                              name="manufacturer_id">
                          <option value="" selected>All Manufacturers</option>
                          @foreach ($manufacturers as $manufacturer)
                            <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}
                            </option>
                          @endforeach
                        </select>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Model</th>
                      <th scope="col">Year</th>
                      <th scope="col">Salesperson Email</th>
                      <th scope="col">Manufacturer</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cars as $car)
                      <tr>
                        <th>{{ $car->id }}</th>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->year }}</td>
                        <td>{{ $car->salesperson_email }}</td>
                        <td>{{ $car->manufacturer->name }}</td>
                        <td width="150">
                        <form id="deleteForm" method="POST" action="{{ route('cars.delete', $car->id) }}">
                          <a href="/cars/show/{{ $car->id }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
                          <a href="/cars/{{ $car->id }}/edit" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                            @csrf
                            @method('DELETE')
                          <button class="btn btn-sm btn-circle btn-outline-danger" type="submit" title="Delete" onclick="return confirmDelete()"><i class="fa fa-times"></i></button>
                        </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table> 

                
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(function () {
        const $filter = $('#filter');      // the dropdown
        const $form   = $('#filterForm');  // the GET filter form

        // Restore previously selected manufacturer from localStorage
        const saved = localStorage.getItem('selectedManufacturer');
        if (saved !== null) {
          $filter.val(saved);
        }

        // When user changes manufacturer, save and submit only the filter form
        $filter.on('change', function () {
          const val = $(this).val();
          localStorage.setItem('selectedManufacturer', val);
          $form.trigger('submit'); // submit only this form
        });
      });

      function confirmDelete() {
        return confirm('Are you sure?');
      }
    </script>

@endsection

