@extends('/layouts/layout')

@section('content')
    <main class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-header card-title">
                  <div class="d-flex align-items-center">
                    <h2 class="mb-0">All Manufacturers</h2>
                    
                  </div>
                </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6"></div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col">
                        
                      </div>
                    </div>
                  </div>
                </div>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Address</th>
                      <th scope="col">Phone</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($manufacturers as $manufacturer)
                      <tr>
                        <th>{{ $manufacturer->id }}</th>
                        <td>{{ $manufacturer->name }}</td>
                        <td>{{ $manufacturer->address }}</td>
                        <td>{{ $manufacturer->phone }}</td>
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
@endsection

