@extends('layouts.master')
@section('title','الحسابات المشهوره')
@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                  <span>الحسابات المشهورة</span>
                  <div class="d-flex align-items-center my-2">
                    <h3 class="mb-0 me-2">{{ $users->count() }}</h3>
                  </div>
                </div>
                <span class="badge bg-label-primary rounded p-2">
                  <i class="ti ti-user ti-sm"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                  <span>البوستات</span>
                  <div class="d-flex align-items-center my-2">
                    <h3 class="mb-0 me-2">{{ $posts }}</h3>
                  </div>
                </div>
                <span class="badge bg-label-danger rounded p-2">
                  <i class="ti ti-user-plus ti-sm"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-start justify-content-between">
                <div class="content-left">
                  <span>المسابقات</span>
                  <div class="d-flex align-items-center my-2">
                    <h3 class="mb-0 me-2">{{ $competitions }}</h3>
                  </div>
                </div>
                <span class="badge bg-label-success rounded p-2">
                  <i class="ti ti-user-check ti-sm"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
<!-- start search -->
<div class="col-md-12">
    <div class="dashboard-box">
        <form action="{{ route('search') }}" method="GET">
            @csrf
            <div class="row">
                <!-- col-md-9 -->
                <div class=" d-flex justify-content-center">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control input-text" name="search" placeholder="Search ...." aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <button type="submit" class="btn btn-primary btn-lg">Search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end search -->
    </div>

      <!-- Users List Table -->
      <div class="card">
        <div class="card-header border-bottom">
          <h5 class="card-title mb-3">الحسابات المشهورة</h5>
          <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">

            <div class="col-md-4 user_plan"></div>
            <div class="col-md-4 user_status"></div>
          </div>
        </div>
        <div class="card-datatable table-responsive">
          <table class="datatables-users table">
            <thead class="border-top">
                <tr>
                   <th colspan="3" class="text-center">الحسابات المشهورة</th>
                   <th colspan="2" class="text-center">الاحصائيات</th>
                </tr>
              <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>رقم التليفون</th>
                <th class="text-center"> بوستات</th>
                <th class="text-center"> المسابقات</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($users as $key=>$user )
                <tr>
                    {{-- 'id','name','phone','type' --}}
                    <td>{{ ++$i  }}</td>
                    <td> {{ $user->name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td class="text-center">
                        @if ($user->posts->count() > 0)
                            <a href="{{ route('user.posts',[ 'id' => $user->id]) }}">
                             <button class="btn btn-primary "> عرض-{{ $user->posts->count() }}</button>
                            </a>
                        @else
                            لايوجد
                        @endif
                    </td>
                    <td class="text-center">
                        @if ( $user->competitions->count() >0)
                        <a href="{{ route('user.comp',['id'=> $user->id ]) }}">
                        <button class="btn btn-primary "> عرض-{{ $user->posts->count() }}</button>
                        </a>
                        @else
                                لايوجد
                        @endif
                    </td>


               </tr>
                @endforeach

            </tbody>
          </table>
          <div class="pt-5 d-flex justify-content-center">
            {{ $users->onEachSide(5)->links() }}
        </div>
        </div>
      </div>
    </div>
    <!-- / Content -->



    <div class="content-backdrop fade"></div>
  </div>

@endsection
@section('script')
<script>
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this item?")) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
@endsection
