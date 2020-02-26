@extends('welcome')

@section('content')

	<div class="container">
		<h1>Заголовок</h1>

		<form action="{{ route('xls.upload') }}" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<input type="file" name="excel">
			</div>
			<button class="btn btn-default" type="submit">Завантаження</button>
		</form>
	</div>

@endsection