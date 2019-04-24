@extends('layouts.app')

@section('content')
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
	  <h4 class="modal-title">Edit Product</h4>
      <!--  <button type="button" class="close" data-dismiss="modal">&times;</button>-->
        
      </div>
      <div class="modal-body">
        <form class="createProduct" method="POST" action="">
<div class="form-group row">
 <div class="col-md-3">
 <input type="hidden" id="id" name="id" value="" />
 <input id="name" type="text" name="name" placeholder="Product Name" value="" required="required" autocomplete="name" autofocus="autofocus" class="form-control">
 </div>
 <div class="col-md-3">
 <input id="category" type="text" placeholder="Product Category" name="category" value="" required="required" autocomplete="name" autofocus="autofocus" class="form-control">
 </div><div class="col-md-3">
 <input id="price" type="text" placeholder="Product Price" name="price" value="" required="required" autocomplete="name" autofocus="autofocus" class="form-control">
 </div>
 <div class="col-md-3">
 <button id="update-product" pid="" type="submit" class="btn btn-primary ">Update Product</button>
</div>
</div>
</form>
<div class="col-md-12 hidden createmsg"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Product</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<form class="createProduct" method="POST" action="">
<div class="form-group row">
 <div class="col-md-3">
 <input id="name" type="text" name="name" placeholder="Product Name" value="" required="required" autocomplete="name" autofocus="autofocus" class="form-control">
 </div>
 <div class="col-md-3">
 <input id="category" type="text" placeholder="Product Category" name="category" value="" required="required" autocomplete="name" autofocus="autofocus" class="form-control">
 </div><div class="col-md-3">
 <input id="price" type="text" placeholder="Product Price" name="price" value="" required="required" autocomplete="name" autofocus="autofocus" class="form-control">
 </div>
 <div class="col-md-3">
 <button id="create-product" type="submit" class="btn btn-primary ">Create Product</button>
</div>
</div>
</form>
                </div>
				<div class="col-md-12 hidden createmsg"></div>
            </div>
			<div class="card" id="products-list-card">
                <div class="card-header">Products List</div>

                <div class="card-body">
				<ul id="products-list">
				</ul>
				</div>
				</div>
        </div>
    </div>
</div>
@endsection
