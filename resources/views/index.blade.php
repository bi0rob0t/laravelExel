@extends('layouts.app')

@section('content')

<div class="container">
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="row ">
    <div class="col-md-6">
		<h1>Laravel</h1>
	</div>
	<div class="col-md-4">
		<form action="/search" method="get">
			<div class="input-group">
				<input type="search" name="search" class="form-control">
				<span class="input-group-prepend">
					<button type="submit" class="btn btn-primary">Search</button>
				</span>
			</div>
		</form>
	</div>
	<div class="col-md-2 text-right">
		<a href="{{ action('PostController@create') }}" class="btn btn-primary">Add Data</a>
	</div>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Дата</th>
            <th>Курс</th>
            <th>Группа</th>
            <th>Название дисциплины</th>
            <th>Лекции</th>
            <th width="230px">Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->daterow }}</td>
            <td>{{ $post->courserow }}</td>
            <td>{{ $post->grouprow }}</td>
            <td>{{ $post->namerow }}</td>
            <td>{{ $post->lectures }}</td>
            <td>
                <form  method="post">
                    <a href="{{ action('PostController@edit', $post->id) }}" class="btn btn-warning">Редактирование</a>
                    @csrf
	                @method('DELETE')
                    <button formaction="{{ action('PostController@destroy', $post->id) }}" type="submit" class="btn btn-danger">Удалить
                </form>
            </td>
        </tr>
        
        @endforeach
    </tbody>
</table>
{{ $posts->links() }}
</div>
@endsection