
<div>
    <div class="caontainer" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                        <div class="col-md-6">
                            Edit Attribute
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{ route('user.attributes') }}" class="btn btn-success pull-right">All Attributes</a>
                        </div>
                    </div>
                    </div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">{{ Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="editAttribute">
                            <div class="form-group">
                                <label class="col-md-4 control-label">Attribute Name</label>
                                <div class="col-md-4">
                                    <input type="text" placeholder="Attribute Name" class="form-control input-md" wire:model="name">
                                    
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary pull-right">Update</button>

                                </div>     
                        
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
