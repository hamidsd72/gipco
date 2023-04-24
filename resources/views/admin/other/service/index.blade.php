@extends('layouts.admin',['tbl'=>true])

@section('content')
    <div class="row mt-5">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header  border-0">
                    <h4 class="w-100">
                        {{$title}}
                        @can('service_create')
                        <a href="{{route('admin.service.create')}}" class="btn btn-primary float-left">افزودن</a>
                        @endcan
                    </h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="tbl_1">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">ردیف</th>
                                <th class="border-bottom-0">عنوان</th>
                                <th class="border-bottom-0">تصویر</th>
                                @canany(['service_edit','service_delete'])
                                <th class="border-bottom-0">عملیات</th>
                                @endcan    
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $key=>$item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                       {{$item->title}}
                                    </td>
                                    <td>
                                        @if($item->photo && is_file($item->photo->path))
                                            <img src="{{url($item->photo->path)}}" height="100px">
                                        @else
                                            ثبت نشده
                                        @endif
                                    </td>
                                    @canany(['service_edit','service_delete'])
                                        <td>
                                            <div class="d-flex">
                                                @can('service_edit')
                                                    <a href="{{route('admin.service.edit',$item->id)}}"
                                                       class="action-btns1">
                                                        <i class="feather feather-edit-2  text-success"
                                                           data-toggle="tooltip" data-placement="top"
                                                           title="ویرایش"></i>
                                                    </a>
                                                @endcan
                                                    @can('service_delete')
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.service.destroy', $item->id] ]) !!}
                                                    <button class="action-btns1" data-toggle="tooltip"
                                                            data-placement="top" title="حذف"
                                                            onclick="return confirm('برای حذف مطمئن هستید؟')">
                                                        <i class="feather feather-trash-2 text-danger"></i>
                                                    </button>
                                                    {!! Form::close() !!}
                                                    @endcan
                                            </div>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
