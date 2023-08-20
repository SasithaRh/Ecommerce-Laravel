<div>
    <div class="container" style="padding:30px">
         <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-4"> All Attributes</div>
                            <div class="col-md-4"> 
                                <input type="text" class="form-control" placeholder="Search...." wire:model="searchTerm">
                            </div>
                            <div class="col-md-4"> 
                                <a href="{{ route('user.addattribute') }}" class="btn btn-success pull-right">Add New Product</a>
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
                                
                                    <th>Name</th>
                                    
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attributes as $attribute)
                                <tr>
                                    <td>{{ $attribute->id}}</td>
                                <td>{{ $attribute->name}}</td>
                                <td>{{ $attribute->created_at}}</td>
                                <td>
                                    <a href="{{ route('user.editattribute',['attribute_id'=>$attribute->id]) }}"  class="ml-5" ><i class="fa fa-edit fa-2x "></i></a>  
                                    <a href="#" onclick="confirm('Are You Sure to Want Delete Category') || event.stopImmediatePropagation()"  wire:click.prevent="deleteAttribute({{ $attribute->id }})"  ><i class="fa fa-trash fa-2x text-danger"></i></a>   

                                </td>   
                            </tr> 
                                @endforeach
                            </tbody>
                        </table>
                        {{ $attributes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
