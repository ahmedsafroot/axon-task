@extends('layouts.app')

@section('content')

    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <form method="GET" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label">Country</label>
                    <select name="country" class="form-select">
                        <option value="">All Countries</option>
                        @foreach($countries as $country)
                            <option value="{{ $country }}" @selected(request('country') === $country)>
                            {{ $country }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">State</label>
                    <select name="state" class="form-select">
                        <option value="">All</option>
                        <option value="valid" @selected(request('state') === 'valid')>
                        Valid
                        </option>
                        <option value="invalid" @selected(request('state') === 'invalid')>
                        Not Valid
                        </option>
                    </select>
                </div>

                <div class="col-md-4">
                    <button class="btn btn-primary w-100">
                        Filter
                    </button>
                </div>
            </form>

        </div>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Code</th>
                    <th>Phone</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @if($items->count() === 0)
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            No data found for the selected filters.
                        </td>
                    </tr>
                @else
                    @foreach($items as $row)
                        <tr>
                            <td>{{ $row['name'] }}</td>
                            <td>{{ $row['country'] }}</td>
                            <td>{{ $row['code'] }}</td>
                            <td>{{ $row['phone'] }}</td>
                            <td>
                                @if($row['valid'])
                                    <span class="badge bg-success">Valid</span>
                                @else
                                    <span class="badge bg-danger">Not Valid</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $customers->withQueryString()->links() }}
    </div>

@endsection
