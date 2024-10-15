{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
   @extends('layouts.master')
   @section('title',"اهلا بك في رموز")
   @section('content')
   @php
      $admins= \App\Models\Admin::all()->count();
      $packages=\App\Models\Package::all()->count();
      $famous= \App\Models\User::where('type',1)->count();
      $follower= \App\Models\User::where('type',3)->count();
      $shopOwner= \App\Models\User::where('type',2)->count();
      $contacts=\App\Models\Contacts::all()->count();
      $posts=\App\Models\Post::all()->count();
      $questions=\App\Models\Question::all()->count();
   @endphp
       <div class="container-xxl flex-grow-1 container-p-y">
       <!-- section 1 -->
        <div class="row g-4 mb-4">
          <div class="col-sm-6 col-xl-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                  <div class="content-left">
                    <span>الباقات</span>
                    <div class="d-flex align-items-center my-2">
                    <h3 class="mb-0 me-2">{{ $packages }}</h3>
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
                    <span>العملاء</span>
                    <div class="d-flex align-items-center my-2">
                      <h3 class="mb-0 me-2">{{ $contacts }}</h3>
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
                    <span>الحسابات المشهورة</span>
                    <div class="d-flex align-items-center my-2">
                      <h3 class="mb-0 me-2">{{ $famous }}</h3>
                    </div>
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
                    <span>البوستات</span>
                    <div class="d-flex align-items-center my-2">
                      <h3 class="mb-0 me-2">{{ $posts }}</h3>
                    </div>
                  </div>
                  <span class="badge bg-label-warning rounded p-2">
                    <i class="ti ti-user-exclamation ti-sm"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- section 1 -->
     <!-- section 2 -->
        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span>الاسئلة</span>
                        <div class="d-flex align-items-center my-2">
                          <h3 class="mb-0 me-2">{{ $questions }}</h3>
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
                        <span>المديرين</span>
                        <div class="d-flex align-items-center my-2">
                        <h3 class="mb-0 me-2">{{ $admins }}</h3>
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
                        <span>صاحب متجر</span>
                        <div class="d-flex align-items-center my-2">
                        <h3 class="mb-0 me-2">{{ $shopOwner }}</h3>
                        </div>
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
                        <span>متابع</span>
                        <div class="d-flex align-items-center my-2">
                        <h3 class="mb-0 me-2">{{ $follower }}</h3>
                        </div>
                    </div>
                    <span class="badge bg-label-warning rounded p-2">
                        <i class="ti ti-user-exclamation ti-sm"></i>
                    </span>
                    </div>
                </div>
            </div>
            </div>
        </div>
      <!-- end section 2 -->
   <div class="container-xxl flex-grow-1 container-p-y">
  </div>
   @endsection
