<div>
    <div class="caontainer" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                        <div class="col-md-6">
                           Manage Home Category
                        
                        {{--  <div class="col-md-6 pull-right">
                            <a href="{{ route('user.categories') }}" class="btn btn-success">All Category</a>
                        </div>  --}}
                    </div>
                    </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="updateHomeCategory">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Choose Category</label>
                                <div class="col-md-4">
                                   <select class="sel_categories form-control" name="categories[]" multiple="multiple" wire:model="selected_categories">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                   </select>
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="col-md-4 control-label">No Of Products</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="No Of Products" class="form-control input-md" wire:model="numberofproduct">
                                      
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
@push('scripts')
   <script>
     $(document).ready(function(){
        $('.sel_categories').select2();
     });
   </script>
@endpush