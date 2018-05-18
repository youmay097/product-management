@extends('layout.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())

        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif


    <form action="{{ route('product.store') }}" method="POST">

        @csrf


         <div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Code:</strong>
                    <input type="text" name="code" class="form-control" placeholder="Code">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
			<!-- client  -->
			<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Client:</strong>
                    <select class="form-control m-bot15" name="client">
						@foreach($clients as $client)
							<option value="{{ $client->id }}">{{ $client->name }}</option> 
							<option value="{{ $client->id }}"​​ name="client" value="{{ $client->id }}" hidden>{{ $client->name }}</option> 
						 @endForeach
					</select>
                </div>
            </div>
			<!-- category  -->
			<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category:</strong>
                    <select class="form-control m-bot15" name="category">
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option> 
							<option value="{{ $category->id }}" name="category" value="{{ $category->id }}" hidden>{{ $category->name }}</option> 
		
						 @endForeach
					</select>
                </div>
            </div>
			<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="price" class="form-control" placeholder="Price">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>


    </form>


@endsection