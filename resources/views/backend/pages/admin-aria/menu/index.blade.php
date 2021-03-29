@extends('backend.layouts.master')
@section('content')
@section('extraCss')
<style>
        /**
 * Nestable
 */

.dd { position: relative; display: block; margin: 0; padding: 0; max-width: 600px; list-style: none; font-size: 13px; line-height: 20px; }

.dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
.dd-list .dd-list { padding-left: 30px; }
.dd-collapsed .dd-list { display: none; }

.dd-item,
.dd-empty,
.dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 20px; }

.dd-handle { display: block; height: 30px; margin: 5px 0; padding: 5px 10px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
    background: #fafafa;
    background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:         linear-gradient(top, #fafafa 0%, #eee 100%);
    -webkit-border-radius: 3px;
            border-radius: 3px;
    box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd-handle:hover { color: #2ea8e5; background: #fff; }

.dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 25px; height: 20px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
.dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
.dd-item > button[data-action="collapse"]:before { content: '-'; }

.dd-placeholder,
.dd-empty { margin: 5px 0; padding: 0; min-height: 30px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
.dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;
    background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                      -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                         -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                              linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-size: 60px 60px;
    background-position: 0 0, 30px 30px;
}

.dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
.dd-dragel > .dd-item .dd-handle { margin-top: 0; }
.dd-dragel .dd-handle {
    -webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
            box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
}
</style>
@endsection
<div class="header bg-primary pb-6"></div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-1">
                    <div class="row">
                    <div class="col-6"><h3 class="mb-0">Roles</h3></div>
                        <div class="col-6 text-right">
                            <a href="" class="btn-sm btn-success"><b><i class="fas fa-plus"></i> Add Role</b></a>
                        </div>
                    </div>
                </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-6">
                        <div class="dd">
                            <ol class="dd-list">
                                @foreach ($parentItems as $parentItem)
                                <li class="dd-item" data-id="{{ $parentItem->id }}">
                                    <div class="dd-handle">{{ $parentItem->name }}</div>
                                    <ol class="dd-list">
                                        @foreach ($menu as $menuChild)
                                        @if ($parentItem->id == $menuChild->parent_id)
                                            <li class="dd-item" data-id="{{ $menuChild->id }}">
                                                <div class="dd-handle">{{ $menuChild->name }}</div>
                                            </li>
                                        @endif  
                                        @endforeach
                                    </ol>
                                </li>
                                @endforeach
                            </ol>
                        </div> 
                        <button class="submit btn-sm btn-primary">submit</button>
                        </div>

                        <div class="col-md-6">
                            <h1>hello</h1>
                        </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>


    @section('extraJs')
    <script>
        
    </script>
        <script src="{{ asset('backend/assets/vendor/nestable/jquery.nestable.js') }}"></script>
        <script>
            $('.dd').nestable();
            

            $('.submit').on('click', function() {
                $.ajaxSetup({
                 headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
                 });


                /* on change event */
                let data = $('.dd').nestable('serialize');
                // console.log(data);
                let url = "{{ url('/admin/menu/updaterow') }}";
                $.ajax({
                type: "POST",
                url: url,
                data: {'menu': data},
                dataType: 'json',
                success: function(responce){
                    console.log(responce);
                }
            });

            });

            
        </script>
    @endsection
@endsection