@extends('layouts.master')
@section('title','تواصل معنا')
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
        <!-- start search -->
<div class="col-md-12">
    <div class="dashboard-box">
        <form action="{{ route('contacts.search') }}" method="GET">
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
          <h5 class="card-title mb-3">تواصل معنا</h5>
          <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
            {{-- <div class="col-md-4 user_role">
                <a href="/contacts/create">
                <button class="btn btn-success">Add</button>
               </a>
            </div> --}}
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
                <th>رقم الجوال</th>
                <th>البريد</th>
                <th>ملاحظات</th>
                {{-- <th>edit</th> --}}
                <th>حذف</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $key =>$contact )
                <tr>
                    <td>{{ $key +1 }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>
                        <form   action="{{ route('contacts.destroy',$contact->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button  type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')" >حذف </button>
                        </form>
                    </td>
               </tr>
                @endforeach
            </tbody>
          </table>
          <div class="pt-5 d-flex justify-content-center">
            {{ $contacts->links() }}
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
