@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
	<div class="col-md-6 offset-md-3">
		@if($errors->any())
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
				</ul>
			</div>
		@endif
		@foreach($posts as $post)
			<form action="{{ action('PostController@update', $post->id) }}" method="post">
				@csrf
				@method('PUT')
				<div class="form-group">
                    <label>Date</label>
                    <input class="form-control" type="text" name="date" placeholder="Дата" value="{{ $post->daterow }}"/>
                </div>
                <div class="form-group">
                    <label>Course</label>
                    <input class="form-control" type="text" name="course" placeholder="Группа" value="{{ $post->courserow }}"/>
                </div>
                <div class="form-group">
                    <label>Group</label>
                    <input class="form-control" type="text" name="group" placeholder="Группа" value="{{ $post->grouprow }}"/>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" placeholder="Название предмета" value="{{ $post->namerow }}"/>
                </div>
                <div class="form-group">
                    <label>Lectures</label>
                    <input class="form-control" type="text" name="lectures" placeholder="Лекции" value="{{ $post->lectures }}"/>
                </div>
				<button type="submit" class="btn btn-warning">Update</button>
				<a href="{{ action('PostController@index') }}" class="btn btn-default">Back</a>
			</form>
		@endforeach
	</div>
</div>
</div>
@endsection