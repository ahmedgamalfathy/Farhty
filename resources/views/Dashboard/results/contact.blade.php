@extends('layouts.master')
@section('title','نتائج البحث')
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
                  <span>Session</span>
                  <div class="d-flex align-items-center my-2">
                    <h3 class="mb-0 me-2">21,459</h3>
                    <p class="text-success mb-0">(+29%)</p>
                  </div>
                  <p class="mb-0">Total Users</p>
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
                  <span>Paid Users</span>
                  <div class="d-flex align-items-center my-2">
                    <h3 class="mb-0 me-2">4,567</h3>
                    <p class="text-success mb-0">(+18%)</p>
                  </div>
                  <p class="mb-0">Last week analytics</p>
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
                  <span>Active Users</span>
                  <div class="d-flex align-items-center my-2">
                    <h3 class="mb-0 me-2">19,860</h3>
                    <p class="text-danger mb-0">(-14%)</p>
                  </div>
                  <p class="mb-0">Last week analytics</p>
                </div>
                <span class="badge bg-label-success rounded p-2">
                  <i class="ti ti-user-check ti-sm"></i>
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
                  <span>Pending Users</span>
                  <div class="d-flex align-items-center my-2">
                    <h3 class="mb-0 me-2">237</h3>
                    <p class="text-success mb-0">(+42%)</p>
                  </div>
                  <p class="mb-0">Last week analytics</p>
                </div>
                <span class="badge bg-label-warning rounded p-2">
                  <i class="ti ti-user-exclamation ti-sm"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
    </div>
      <!-- Users List Table -->
      <div class="card">
        <div class="card-header border-bottom">
          <h5 class="card-title mb-3">نتائج البحث</h5>
          <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
             <!-- col-md-4 user_role -->
            <div class="d-flex justify-content-center" width="100%">
                <a href="{{ route('contacts.index') }}">
                <button class="btn btn-success">تراجع</button>
               </a>
            </div>
            <div class="col-md-4 user_plan"></div>
            <div class="col-md-4 user_status"></div>
          </div>
        </div>
        <div class="card-datatable table-responsive">
          <table class="datatables-users table">
            <thead class="border-top">
              <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>رقم التيلفون</th>
                <th>البريد </th>
                <th>الملاحظات</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($results as $result )
                <tr>
                    <td>{{ ++$i }}</td>
                   <td>{{ $result->name }}</td>
                    <td>{{ $result->phone }} </td>
                    <td >{{ $result->email }}</td>
                    <td >{{ $result->message }}</td>
               </tr>
               @empty
               <td class="text-center" colspan="5">
                             لاتـوجد  نتائـج لهذا الـبحـث😊 => {{ $search }}
               </td>
               @endforelse
            </tbody>
          </table>
          <div class="pt-3 d-flex justify-content-center">
            {{ $results->links() }}
        </div>
        </div>
      </div>
    </div>
    <!-- / Content -->



    <div class="content-backdrop fade"></div>
  </div>

@endsection


