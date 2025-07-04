<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview ">

                    <div class="nk-block nk-block-lg ">

                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="preview-block">

                                    <div class="row gy-4">
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="form-label" for="default-01">Поставшик</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="default-01"  wire:model.live="partner">
                                                    @if (count($partners) > 0 && strlen($partner)>0)
                                                    <div class="dropdown-menu show w-100" style="max-height: 200px; overflow-y: auto;">
                                                        @foreach ($partners as $part)
                                                        <button type="button" class="dropdown-item"
                                                            wire:click="selectPartner('{{$part->name}}','{{ $part->id }}')">
                                                            {{ $part->name }}
                                                        </button>
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="form-label" for="default-05">Категория</label>
                                                <div class="form-control-wrap">
                                                    
                                                    <input type="text" class="form-control" id="default-05" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="form-label" for="default-06">Магазин</label>
                                                <div class="form-control-wrap ">
                                                    <div class="form-control-select">
                                                        <select class="form-control" id="default-06">
                                                            <option value="default_option">Default Option</option>
                                                            <option value="option_select_name">Option select name</option>
                                                            <option value="option_select_name">Option select name</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="form-label" for="default-03">Дата с:</label>
                                                <div class="form-control-wrap">

                                                    <input type="date" class="form-control" id="default-03" placeholder="Input placeholder" wire:model.live="date1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label class="form-label" for="default-04">Дата по:</label>
                                                <div class="form-control-wrap">

                                                    <input type="date" class="form-control" id="default-04" placeholder="Input placeholder" wire:model.live="date2">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2  d-flex align-items-end justify-content-center">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <a href="#" class="btn btn-success {{$buttonStatus}}">Отчет</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div><!-- .card-preview -->




                    </div><!-- .nk-block -->
                </div><!-- .components-preview -->
            </div>
            <!-- Table -->
            <div class="nk-content-body mt-1">
                <div class="components-preview ">
                    <div class="nk-block nk-block-lg ">

                        <div class="card card-preview">
                            <div class="card-inner">

                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th scope="col">Поставшик</th>
                                            <th scope="col">Категория</th>
                                            <th scope="col">Код</th>
                                            <th scope="col">Артикул</th>
                                            <th scope="col">Наименование</th>
                                            <th scope="col">Краткое Наименование</th>
                                            <th scope="col">Статус</th>
                                            <th scope="col">Наценка</th>
                                            <th scope="col">Остаток К-во</th>
                                            <th scope="col">Остатка Сумма</th>
                                            <th scope="col">Продажа К-во</th>
                                            <th scope="col">Продажа Сумма</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $item)
                                        <tr>
                                            <th scope="row">{{$item->partner?$item->partner->name:''}}</th>
                                            <td>{{$item->category?$item->category->name:''}}</td>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->mark}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->shortName}}</td>
                                            <td>
                                                @if($item->status==0)
                                                <span class="badge badge-dot badge-dot-xs badge-danger">block</span>
                                                @else
                                                <span class="badge badge-dot badge-dot-xs badge-success">active</span>

                                                @endif
                                            </td>
                                            <td>{{$item->markup}}</td>
                                            <td>{{$item->markup}}</td>
                                            <td>{{$item->markup}}</td>
                                            <td>{{$item->markup}}</td>

                                            @endforeach

                                    </tbody>
                                </table>

                            </div><!-- .components-preview -->
                           
                        </div>
                        <div class="card card-preview">
                        <div class="card-inner">
    
                        {{$items->links()}}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>