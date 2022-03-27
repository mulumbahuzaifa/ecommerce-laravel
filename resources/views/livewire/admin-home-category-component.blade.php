<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Manage Home Categories
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('admin.categories') }}" class="btn btb-success pull-right"> All Categories</a>
                            </div>
                        </div>
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                    @endif
                    <div class="panel-body">
                        <form action="" class="form-horizontal" wire:submit.prevent="updateHomeCategory">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable">Choose Categories</label>
                                <div class="col-md-4" wire:ignore>
                                    <select class="sel_category form-control" name="categories[]" multiple="multiple"  wire:model="selected_categories">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-lable">No Of Products</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model="numberOfProducts">
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
    <script>
        $(document).ready(function(){
            $('.sel_category').select2();
            $('.sel_category').on('change', function(e){
                var data = $('.sel_category').select2("val");
                @this.set('selected_categories', data);
            })
        });
    </script>
@endpush
