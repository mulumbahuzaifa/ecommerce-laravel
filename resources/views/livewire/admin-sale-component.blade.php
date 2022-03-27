<div>

    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Sale Settings
                        {{-- <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.categories') }}" class="btn btb-success pull-right"> All Categories</a>
                            </div>
                        </div> --}}
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <div class="panel-body">
                        <form action="" class="form-horizontal" wire:submit.prevent="updateSale">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable">Status</label>
                                <div class="col-md-4" >
                                    <select class="form-control"  wire:model="status">
                                            <option value="0">Inactive</option>
                                            <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable">Sale Date</label>
                                <div class="col-md-4 date_picker">
                                    <input type="text" id="sale-date" placeholder="YYYY/MM/DD H:M:S" class="form-control input-md" wire:model="sale_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable"></label>
                                <div class="col-md-4">
                                    <Button type="submit" class="btn btn-primary">Save</Button>
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
    <script type="text/javascript">
     $(document).ready(function(){
         $('#sale-date').datetimepicker({
             format : 'Y-MM-DD h:m:s',

         })
         .on('dp.change', function(ev){
            var data = $('#sale-date').val();
            @this.set('sale_date', data);
         });

     });
    </script>
@endpush
