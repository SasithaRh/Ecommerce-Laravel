<div>
    <div class="container" style="padding:30px">
         <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6"> All Orders</div>
                            <div class="col-md-6"> 
                                <a href="{{ route('user.addproduct') }}" class="btn btn-success pull-right">Add New Product</a>
                            </div>
                        </div>
                       
                    </div>
                    <div class="panel-body">
                        @if(Session::has('order_message'))
                            <div class="alert alert-success">{{ Session::get('order_message')}}</div>
                        @endif
                        <table class="table table-striped">
                              <thead>
                                <tr>
                                    <th>OrderId</th>
                                    <th>Subtoatl</th>
                                    <th>Discount</th>
                                    <th>Tax</th>
                                    <th>Total</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>ZipCode</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                    <th colspan="2" class="text-center">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                <td>{{ $order->id }}</td>
                                <td>${{ $order->subtotal }} </td>
                                <td>${{ $order->discount}}</td>
                                <td>${{ $order->tax}}</td>
                                <td>${{ $order->total}}</td>
                                <td>{{ $order->firstname}}</td>
                                <td>{{ $order->lastname}}</td>
                                <td>{{ $order->mobile}}</td>
                                <td>{{ $order->email}}</td>
                                <td>{{ $order->zipcode}}</td>
                                <td>{{ $order->status}}</td>
                                <td>{{ $order->created_at}}</td>    
                            
                                <td>
                                    <a href="{{ route('user.orderdetails',['order_id'=>$order->id]) }}"  class="btn btn-info btn-sm" >Details</a>  
                                    {{--  <a href="#" onclick="confirm('Are You Sure to Want Delete Category') || event.stopImmediatePropagation()"  wire:click.prevent="deleteProduct({{ $product->id }})"  ><i class="fa fa-trash fa-2x text-danger"></i></a>    --}}

                                </td> 
                                <td>
                                  <div class="dropdown">
                                    <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Status
                                      <span class="caret"></span>
                                    </button>
                                  <ul class="dropdown-menu">
                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->id }},'delivered')">Delivered</a></li>
                                    <li><a href="#" wire:click.prevent="updateOrderStatus({{ $order->id }},'canceled')">Canceled</a></li>
                                  </ul>
                                </div>  
                                </td>  
                            
                            </tr> 
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
