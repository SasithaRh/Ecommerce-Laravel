<div>
    <div class="container" style="padding:30px">
         <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6"> All Categories</div>
                            <div class="col-md-6"> 
                                <a href="{{ route('user.addcoupons') }}" class="btn btn-success pull-right">Add New Category</a>
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
                                    <th>Coupons Code</th>
                                    <th>Coupons Type</th>
                                    <th>Coupons Value</th>
                                    
                                    <th>Cart Value</th>
                                    <th>Expiry Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Coupons as $coupon)
                                <tr>
                                <td>{{ $coupon->id }}</td>
                                <td>{{ $coupon->code }}</td>
                                <td>{{ $coupon->type}}</td>
                                @if($coupon->type == 'fixed')
                                <td>$ {{ $coupon->value}}</td>
                                @else
                                <td> {{ $coupon->value}} %</td>
                                @endif
                                
                                <td>$ {{ $coupon->cart_value}}</td>
                                <td>{{ $coupon->expiry_date}}</td>
                                <td>
                                    <a href="{{ route('user.editcoupons',['coupon_id'=>$coupon->id]) }}"  class="ml-5" ><i class="fa fa-edit fa-2x "></i></a>  
                                    <a href="#" onclick="confirm('Are You Sure to Want Delete Coupon') || event.stopImmediatePropagation()" wire:click.prevent="deleteCoupons({{ $coupon->id }})"  ><i class="fa fa-trash fa-2x text-danger"></i></a>  
 
                                </td>   
                            </tr> 
                                @endforeach
                            </tbody>
                        </table>
                        {{ $Coupons->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
 