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
		<form action="{{ action('PostController@store') }}" method="post">
			@csrf
			<div class="form-group">
				<label>Date</label>
				<input class="form-control" type="text" name="date" placeholder="Дата"/>
			</div>
			<div class="form-group">
				<label>Course</label>
				<input class="form-control" type="text" name="course" placeholder="Группа"/>
			</div>
			<div class="form-group">
				<label>Group</label>
				<input class="form-control" type="text" name="group" placeholder="Группа"/>
			</div>
            <div class="form-group">
				<label>Name</label>
				<input class="form-control" type="text" name="name" placeholder="Название предмета"/>
			</div>
            <div class="form-group">
				<label>Lectures</label>
				<input class="form-control" type="text" name="lectures" placeholder="Лекции"/>
			</div>
			<button class="btn btn-primary" type="submit">Submit</button>
		</form>
	</div>
</div>
</div>
@endsection