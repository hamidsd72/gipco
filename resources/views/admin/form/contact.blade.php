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
                <th class="border-bottom-0">نام</th>
                <th class="border-bottom-0">ایمیل</th>
                <th class="border-bottom-0">شماره تماس</th>
                <th class="border-bottom-0">موضوع</th>
                <th class="border-bottom-0">متن</th>
                <th class="border-bottom-0">زمان ثبت</th>
              </tr>
              </thead>
              <tbody>
              @foreach($items as $key=>$item)
                <tr class="{{$item->seen=='no'?'tr_seen':''}}">
                  <td>{{$key+1}}</td>
                  <td>
                    {{$item->name}}
                  </td>
                  <td>
                    {{$item->email}}
                  </td>
                  <td>
                    {{$item->phone??'__'}}
                  </td>
                  <td>
                    {{$item->subject}}
                  </td>
                  <td>
                    <a tabindex="0" data-toggle="popover" data-trigger="focus" role="button" data-content="{{$item->message}}" data-original-title="شرح پیام" class="popover_125 btn btn-sm btn-primary">کلیک کنید
                    </a>
                  </td>
                  <td>
                    {{$item->created_at}}
                  </td>
                </tr>
                {{$item->show_seen($item)}}
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection

@section('scripts')
  <script>
      $(document).ready(function () {
          $('[data-toggle="popover"]').popover();
      });
      $('.popover-dismiss').popover({
          trigger: 'focus'
      })
  </script>
@endsection
