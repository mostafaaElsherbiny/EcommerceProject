@extends('admin.app')
@section('title') {{ $title }}  @endsection

@section('content')
<div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $title }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
        <a href="{{ route('admin.attributes.create') }}" class="btn btn-primary pull-right">Add Attribute</a>
    </div>
    @include('admin.partials.flash')
<div class="tile">

            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Attribute Code</th>
                  <th>Attribute Name</th>
                  <th>frontend_type</th>
                  <th>is_filterable</th>
                  <th>is_required</th>
                  <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                </tr>
              </thead>
              <tbody>
              @foreach($attributes as $attribute)
                <tr>
                  <td>{{ $attribute->id }}</td>
                  <td>{{ $attribute->code }}</td>
                  <td>{{ $attribute->name }}</td>
                  <td>{{ $attribute->frontend_type }}</td>
                  <td class="text-center">
                    @if($attribute->is_filterable==1)
        <span class="badge badge-success">Yes</span>
        @else
        <span class="badge badge-danger">No</span>
@endif
                  </td>
                  <td class="text-center">
                    @if($attribute->is_required==1)
        <span class="badge badge-success">Yes</span>
        @else
        <span class="badge badge-danger">No</span>
@endif
                  </td>
                  <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.attributes.edit', $attribute->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.attributes.delete', $attribute->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                </tr>
@endforeach
              </tbody>
            </table>
          </div>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
