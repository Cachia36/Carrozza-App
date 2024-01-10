@extends('/layouts/layout')

@section('content')

<main class="py-5">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-title">
                        <strong>Add New Car</strong>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cars.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="model" class="col-md-3 col-form-label">Model</label>
                                <div class="col-md-9">
                                    <input type="text" name="model" id="model" class="form-control @error('model') is-invalid @enderror" value="{{ old('model') }}">
                                    @error('model')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="year" class="col-md-3 col-form-label">Year</label>
                                <div class="col-md-9">
                                    <input type="text" name="year" id="year" class="form-control @error('year') is-invalid @enderror" value="{{ old('year') }}">
                                    @error('year')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="salesperson_email" class="col-md-3 col-form-label">Salesperson Email</label>
                                <div class="col-md-9">
                                    <input type="text" name="salesperson_email" id="salesperson_email" class="form-control @error('salesperson_email') is-invalid @enderror" value="{{ old('salesperson_email') }}">
                                    @error('salesperson_email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="manufacturer_id" class="col-md-3 col-form-label">Manufacturer</label>
                                <div class="col-md-9">
                                    <select name="manufacturer_id" id="manufacturer_id" class="form-control @error('manufacturer_id') is-invalid @enderror">
                                        <option value=0>Select Manufacturer</option>
                                        @foreach($manufacturers as $manufacturer)
                                            <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('manufacturer_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row mb-0">
                                <div class="col-md-9 offset-md-3">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="../cars" class="btn btn-outline-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection