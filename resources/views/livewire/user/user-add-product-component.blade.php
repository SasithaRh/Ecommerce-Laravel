
<div>
    <div class="caontainer" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                        <div class="col-md-6">
                            Add New Product
                        </div>
                        <div class="col-md-6 pull-right">
                            <a href="{{ route('user.product') }}" class="btn btn-success pull-right">All Product</a>
                        </div>
                    </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addProduct">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Name" class="form-control input-md" wire:model="name" wire:keyup="generateslug">
                                    
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="col-md-4 control-label">Product Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Product Slug" class="form-control input-md" wire:model="slug">
                                      
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Short Description</label>
                                    <div class="col-md-4" wire:ignore>
                                        <textarea  placeholder="Short Description" id="short_description" class="form-control input-md" wire:model="short_description"></textarea>
                                          
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label"> Description</label>
                                    <div class="col-md-4" wire:ignore>
                                        <textarea  placeholder=" Description" id="description" class="form-control input-md" wire:model="description"></textarea>
                                          
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Regular Price</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Regular Price" class="form-control input-md" wire:model="regular_price">
                                          
                                    </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Sale Price</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Sale Price" class="form-control input-md" wire:model="sale_price">
                                    </div>     
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">SKU</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU">
                                    </div>     
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Stock</label>
                                    <div class="col-md-4">
                                        <select class="form-contrtol" name="" id="" wire:model="stock_status">
                                            <option value="instock">Instock</option>
                                            <option value="outofstock">Out of Stock</option>
                                        </select>
                                    </div>      
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Featured</label>
                                    <div class="col-md-4">
                                        <select class="form-contrtol" name="" id="" wire:model="featured">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>      
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Quantity</label>
                                    <div class="col-md-4">
                                        <input type="text" placeholder="Quantity" class="form-control input-md" wire:model="quantity">
                                    </div>     
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Image</label>
                                    <div class="col-md-4">
                                        <input type="file"  class="input-file" wire:model="image">
                                        @if($image)
                                        <img src="{{$image->temporaryUrl()}}" width="120" />
                                        @endif
                                    </div>     
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Gallery</label>
                                    <div class="col-md-4">
                                        <input type="file"  class="input-file" wire:model="images" multiple>
                                        @if($images)
                                        @foreach ($images as $imagess)
                                        <img src="{{$imagess->temporaryUrl()}}" width="120" />  
                                        @endforeach
                                      
                                        @endif
                                    </div>     
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category</label>
                                    <div class="col-md-4">
                                        <select class="form-contrtol" name="" id="" wire:model="category_id">
                                            <option value="0">Select Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>      
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Attributes</label>
                                    <div class="col-md-3">
                                        <select class="form-contrtol" name="" id="" wire:model="attr">
                                            <option value="0">Select Attributes</option>
                                            @foreach ($pattributes as $pattribute)
                                            <option value="{{$pattribute->id}}">{{ $pattribute->name }}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div> 
                                    <div class="col-md-1">
                                        <buton type="button" class="btn btn-info" wire:click.prevent="add">Add
                                        </buton>
                                    </div>     
                            </div>
                            @foreach ($inputs as $key => $value)
                            <div class="form-group">
                                <label class="col-md-4 control-label">{{ $pattributes->where('id',$attr)->first()->name }}</label>
                                    <div class="col-md-3">
                                        <input type="text" placeholder="{{ $pattributes->where('id',2)->first()->name }}" class="form-control input-md" wire:model="attribues_value.{{ $value }}">
                                    </div> 
                                    <div class="col-md-1">
                                        <buton type="button" class="btn btn-danger" wire:click.prevent="remove({{ $key }})">Remove
                                        </buton>
                                    </div>      
                            </div>
                            @endforeach
                            </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>

                                </div>     
                        
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')

$(function(){
    tinymce.init({
        selector:'#short_description',
        setup:function(editor){
            editor.on('Change',function(e){
        tinyMCE.triggerSave();
         var sd_data= $('#short_description').val();
         $this.set('short_description',sd_data);
        
            });
        }    
    });


});

$(function(){
    tinymce.init({
        selector:'#description',
        setup:function(editor){
            editor.on('Change',function(e){
        tinyMCE.triggerSave();
         var sd_data= $('#description').val();
         $this.set('description',sd_data);
        
            });
        }    
    });


});
    
@endpush