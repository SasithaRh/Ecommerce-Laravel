<div>
    <div class="caontainer" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                        <div class="col-md-6">
                            Add New Category
                        </div>
                        <div class="col-md-6 pull-right">
                            <a href="{{ route('user.categories') }}" class="btn btn-success">All Category</a>
                        </div>
                    </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="storeCategory">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Category Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Category Name" class="form-control input-md" wire:model="name" wire:keyup="generateslug">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="col-md-4 control-label">Category Slug</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Category Slug" class="form-control input-md" wire:model="slug">
                                    @error('slug')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Parent Category</label>
                                    <div class="col-md-4">
                                        <select name="" id="" class="form-control input-md" wire:model="category_id">
                                            <option value="">None</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                            <div class="form-group">
                                <div class="col-md-4">
                                    <button class="btn btn-primary pull-right">Submit</button>

                                </div>     
                        
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
