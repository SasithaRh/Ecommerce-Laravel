<div>
    <style>
        .sclist{
            list-style: none;
        }
    </style>
   <div class="container" style="padding:30px">
        <div class="row">
           <div class="col-md-12">
               <div class="panel panel-default">
                   <div class="panel-heading">
                       <div class="row">
                           <div class="col-md-6"> All Categories</div>
                           <div class="col-md-6"> 
                               <a href="{{ route('user.addcategory') }}" class="btn btn-success pull-right">Add New Category</a>
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
                                   <th>Category Name</th>
                                   <th>Slug</th>
                                   <th>Sub Category</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($categories as $category)
                               <tr>
                               <td>{{ $category->id }}</td>
                               <td>{{ $category->name }}</td>
                               <td>{{ $category->slug}}</td>
                               <td>
                                <ul class="sclist">
                                    @foreach ($category->subCategories as $scategoryy)
                                        <li><i class="fa fa-caret-right"></i> {{ $scategoryy->name }} <a href="{{ route('user.editcategory',['category_slug'=>$scategoryy->slug,'scategory_slug'=>$scategoryy->slug]) }}"><i class="fa fa-edit"></i></a></li>
                                    @endforeach
                                </ul>
                               </td>
                               <td>
                                   <a href="{{ route('user.editcategory',['category_slug'=>$category->slug]) }}"  class="ml-5" ><i class="fa fa-edit fa-2x "></i></a>  
                                   <a href="#" onclick="confirm('Are You Sure to Want Delete Category') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{ $category->id }})"  ><i class="fa fa-trash fa-2x text-danger"></i></a>  

                               </td>   
                           </tr> 
                               @endforeach
                           </tbody>
                       </table>
                       {{ $categories->links() }}
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>
