 @extends('admin.app')
 @section('title') {{ $title }} @endsection
@section('content')
<div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $title }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
<div class="tile">
            <h3 class="tile-title"> {{ $subTitle }}</h3>
            <form action="{{ route('admin.categories.update') }}" method="post" role="form" enctype="multipart/form-data">
                <div class="tile-body">





                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input class="form-control" type="text" value="{{$targetCategory->name}}">
                        <input type="hidden" name="id" value="{{ $targetCategory->id }}">
                </div>
                <div class="form-group">
                  <label class="control-label">Description</label>
                  <input class="form-control" type="text" value="{{ $targetCategory->description }}">
                </div>
                <div class="form-group">
                  <label class="control-label" for="parent">Parent Category</label>
                  <select id="parent" class="form-control">
                      <option value="">Select a Parent Category</option>
                    @foreach($categories as $category)
                        @if($category->id==$targetCategory->id)
                            <option value="{{$category->id}}" selected>
                                {{ $category->name }}
                            </option>
                        @else
                            <option value="{{ $category->id }}" >
                                {{ $category->name }}
                            </option>
                            @endif
                    @endforeach
                    </select>
                </div>
                <div class="form-group">

                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="gender">Male
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="gender">Female
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label">Identity Proof</label>
                  <input class="form-control" type="file">
                </div>

                </div>

                <div class="tile-footer">
              <button class="btn btn-primary" type="button">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
        </form>


</div>
</div>
</div>

          @endsection
