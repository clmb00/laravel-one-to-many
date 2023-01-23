@extends('layouts.admin.admin')

@section('content')
    <div class="container-fluid px-5">

        <h3 class="mb-4">Manage Types</h3>

        @if(session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <table class="table table-bordered w-50" style="border-color:rgba(71, 37, 95, 0.4);">
            <thead class="text-white" style="background-color: rgba(71, 37, 95, 0.6);">
              <tr>
                <th scope="col">Type</th>
                <th scope="col">Projects count</th>
              </tr>
            </thead>
            <tbody>

                @forelse ($types as $type)
                    <tr class="rows">

                        <td>
                            <form action="{{ route('admin.types.update', $type) }}" method="POST" class="d-flex">
                                @csrf
                                @method('PATCH')
                                <input value="{{ $type->name }}" class="form-control border-0 me-2" type="text" name="name" id="name">
                                <button class="btn btn-warning btn" style="width: 120px" type="submit">EDIT - <i class="fa-solid fa-file-pen"></i></button>
                            </form>
                        </td>

                        <td><span class="badge text-bg-dark">{{ count($type->projects) }}</span></td>

                    </tr>
                @empty
                    <h5>No Types Found</h5>
                @endforelse

            </tbody>
          </table>

    </div>

@endsection
