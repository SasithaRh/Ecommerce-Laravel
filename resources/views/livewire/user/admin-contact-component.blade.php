<div>
    <div class="container" style="padding:30px">
         <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6"> Contact Message</div>
                           
                        </div>
                       
                    </div>
                    <div class="panel-body">
                      
                        <table class="table table-striped">
                              <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Comment</th>
                                    <th>Created At</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($contacts as $contact)
                                <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }} </td>
                                <td>{{ $contact->phone}}</td>
                                <td>{{ $contact->comment}}</td>
                                <td>{{ $contact->created_at}}</td>
                                <td>
                                    {{--  <a href="{{ route('user.orderdetails',['order_id'=>$order->id]) }}"  class="btn btn-info btn-sm" >Details</a>    --}}
                                    {{--  <a href="#" onclick="confirm('Are You Sure to Want Delete Category') || event.stopImmediatePropagation()"  wire:click.prevent="deleteProduct({{ $product->id }})"  ><i class="fa fa-trash fa-2x text-danger"></i></a>    --}}

                                </td> 
                                
                            
                            </tr> 
                                @endforeach
                            </tbody>
                        </table>
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
