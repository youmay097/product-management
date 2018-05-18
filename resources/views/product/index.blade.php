@extends('layout.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of Product</h2>
            </div>
            <div class="pull-right">
				<a class="btn btn-primary" href="{{ route('client.index') }}"> Client</a>
				<a class="btn btn-info" href="{{ route('category.index') }}"> Category</a>
                <a class="btn btn-danger" href="{{ route('product.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">

        <tr>
            <th>No</th>
			<th>Code</th>
            <th>Name</th>
			<th>category</th>
			<th>client</th>
			<th>Price</th>
			
            <th width="280px">Action</th>

        </tr>
        @foreach ($products as $product)

        <tr>
            <td>{{ $product->id }}</td>
			<td>{{ $product->code }}</td>
            <td>{{ $product->product_name }}</td>
			<td>{{ $product->category_name }}</td>
			<td>{{ $product->client_name }}</td>
			<td>{{ $product->price }}</td>
            <td>

               <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('product.show',$product->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('product.edit',$product->id) }}">Edit</a>
                    @csrf

                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>
            </td>
        </tr>

        @endforeach

    </table>

@endsection