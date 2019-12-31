@php
$errors=Session::get('error');
$messages=Session::get('success');
$info=Session::get('info');
$warnings=Session::get('warning');
@endphp
@if ($errors) @foreach($errors as $key=>$value)
<div class="alert alert-danger alert-dismissible"
<button class="close" type="button" data-dismiss="alert">
x
</button>
<strong>Error!</strong>{{ $value }}

</div>

@endforeach @endif

@if ($messages) @foreach($messages as $key=>$value)
<div class="alert alert-success alert-dismissible"
<button class="close" type="button" data-dismiss="alert">
x
</button>
<strong>Success!</strong>{{ $value }}

</div>

@endforeach @endif
@if ($info) @foreach($info as $key=>$value)
<div class="alert alert-info alert-dismissible"
<button class="close" type="button" data-dismiss="alert">
x
</button>
<strong>INFO!</strong>{{ $value }}

</div>

@endforeach @endif

@php
$errors=Session::get('error');
$messages=Session::get('success');
$info=Session::get('info');
$warnings=Session::get('warning');
@endphp
@if ($errors) @foreach($errors as $key=>$value)
<div class="alert alert-danger alert-dismissible"
<button class="close" type="button" data-dismiss="alert">
x
</button>
<strong>Error!</strong>{{ $value }}

</div>

@endforeach @endif

@if ($messages) @foreach($messages as $key=>$value)
<div class="alert alert-success alert-dismissible"
<button class="close" type="button" data-dismiss="alert">
x
</button>
<strong>Success!</strong>{{ $value }}

</div>

@endforeach @endif
@if ($info) @foreach($info as $key=>$value)
<div class="alert alert-info alert-dismissible"
<button class="close" type="button" data-dismiss="alert">
x
</button>
<strong>INFO!</strong>{{ $value }}

</div>

@endforeach @endif
@if ($warnings) @foreach($warnings as $key=>$value)
<div class="alert alert-warning alert-dismissible"
<button class="close" type="button" data-dismiss="alert">
x
</button>
<strong>WARNINGS!</strong>{{ $value }}

</div>

@endforeach @endif

