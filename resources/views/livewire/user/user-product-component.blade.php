<div>
    <div class="container" style="padding:30px">
         <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-4"> All Products</div>
                            <div class="col-md-4"> 
                                <input type="text" class="form-control" placeholder="Search...." wire:model="searchTerm">
                            </div>
                            <div class="col-md-4"> 
                                <a href="{{ route('user.addproduct') }}" class="btn btn-success pull-right">Add New Product</a>
                            </div>
                        </div>
                       
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message')}}</div>
                    @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Sale Price</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                <td>{{ $product->id }}</td>
                                <td><img  src="{{asset('assets/images/products')}}/{{ $product->image }}" width="60px"></td>
                                <td>{{ $product->name}}</td>
                                <td>{{ $product->stock_status}}</td>
                                <td>{{ $product->regular_price}}</td>
                                <td>{{ $product->sale_price}}</td>
                                <td>{{ $product->category->name}}</td>
                                <td>{{ $product->created_at}}</td>
                            
                                <td>
                                    <a href="{{ route('user.editproduct',['product_slug'=>$product->slug]) }}"  class="ml-5" ><i class="fa fa-edit fa-2x "></i></a>  
                                    <a href="#" onclick="confirm('Are You Sure to Want Delete Category') || event.stopImmediatePropagation()"  wire:click.prevent="deleteProduct({{ $product->id }})"  ><i class="fa fa-trash fa-2x text-danger"></i></a>  

                                </td>   
                            </tr> 
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
