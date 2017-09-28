@extends('layouts.admin.app')

@section('content')
  <main class="col-sm-9 ml-sm-auto col-md-10 col-lg-8 pt-3" role="main">

    <h1>Add Product</h1>
    <div class="form-group required">
      <label class='control-label'></label>Indicates required fields.
    </div>

        {!! Form::open(['action'=>'ProductsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group required">
            {{Form::label('title', 'Product Name', ['class' => 'control-label'])}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder'=>'Product Name'])}}
        </div>
        <div class="form-group required">
            {{Form::label('body', 'Description', ['class' => 'control-label'])}}
            {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder'=>'Product Description', 'id'=>'article-ckeditor'])}}
        </div>
        <div class="form-group required" step="any">
            {{Form::label('price', 'Price', ['class' => 'control-label'])}}

            {!! Form::number('price',null,['class' => 'form-control','step'=>'any', 'placeholder'=>'Price']) !!}
        </div>
        <div class="form-group required">
            {{Form::label('sku', 'SKU', ['class' => 'control-label'])}}
            {{Form::text('sku', '', ['class' => 'form-control', 'placeholder'=>'Stock Keeping Unit'])}}
        </div>
        <div class="form-group required">
            {{Form::label('stock', 'Stock', ['class' => 'control-label'])}}
            {{Form::number('stock', '', ['class' => 'form-control', 'placeholder'=>'Stock'])}}
        </div>
        <div class="form-group">
                {{Form::file('product_image')}}
            </div>

        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
</main>




@endsection
