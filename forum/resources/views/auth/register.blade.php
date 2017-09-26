@extents('layouts.masters.main')
@section('page-content')
<div class="container">
@include('layouts.partials.nav')
      {!! Form::open(['route' => 'post_register', 'id' => 'regitration-form']) !!}

      	{!! Form::label('name', 'Full Name') !!}
      	{!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'placeholder'=>'Full Name','required']) !!}

      	{!! Form::label('email', 'Email address') !!}
      	{!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder'=>'Email Address','required']) !!}

      	{!! Form::label('password', 'Password') !!}
      	{!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder'=>'Password','required']) !!}

      	{!! Form::button('Register', ['class' => 'btn btn-lg btn-primary btn-block', 'type' =>'submit']) !!}

      	{!! Form::close() !!}
    </div> <!-- /container -->
@stop