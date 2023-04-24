@extends('layouts.admin',['tbl'=>true])

@section('content')
    <div class="row mt-5">
        <div class="col-xl-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header  border-0">
                    <h4 class="w-100">
                        {{$title}}
                    </h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-vcenter text-nowrap table-bordered border-bottom" id="tbl_1">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">ردیف</th>
                                <th class="border-bottom-0">مکان</th>
                                <th class="border-bottom-0">عنوان</th>
                                @can('about_edit')
                                <th class="border-bottom-0">عملیات</th>
                                    @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $key=>$item)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$item->type_about($item->type)}}</td>
                                    <td>{{$item->title}}</td>
                                    @can('about_edit')
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('admin.about.edit',$item->id)}}"
                                               class="action-btns1">
                                                <i class="feather feather-edit-2  text-success"
                                                   data-toggle="tooltip" data-placement="top"
                                                   title="ویرایش"></i>
                                            </a>
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
