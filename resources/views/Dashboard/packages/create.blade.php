@extends('layouts.master')
@section('title',"انشاء باقة جديد")
@section('content')
<div class="container pt-5">
    <div class="card shadow-sm border-0">
        <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
            <h5 id="AddUserLabel" class="mb-0">اضف باقة</h5>
        </div>
        <div class="card-body">
            <form class="add-new-user" id="addNewUserForm" action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data"   >
                @csrf
                    {{-- name, description, original_price, offer_price, duration --}}
                <div class="row g-3">
                    <!-- Name Field -->
                    <div class="col-md-6">
                        <label class="form-label" for="add-user-fullname">الاسم</label>
                        <input type="text" class="form-control" id="add-user-fullname" placeholder="اسم الباقة" name="name" required>
                        @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="add-user-fullname">المدة</label>
                        <input type="number" class="form-control" id="add-user-fullname" placeholder="المدة بالشهور" name="duration" required>
                        @error('duration')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Email Field -->
                    <div class="col-md-6">
                        <label class="form-label" for="add-user-email">سعر الباقة </label>
                        <input type="number" id="add-user-email" class="form-control" placeholder="سعر الباقة" name="original_price" required>
                        @error('original_price')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="add-user-email">سعر العرض </label>
                        <input type="number" id="add-user-email" class="form-control" placeholder="سعر العرض" name="offer_price" >
                        @error('offer_price')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Password Field -->
                    <div class="col-md-12">
                        <label class="form-label" for="password">وصف الباقة</label>
                        <input  type="text"  name="description[]"  class="form-control" >
                        @error('description')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="password">وصف الباقة</label>
                    <input type="text" id="description" name="description[]"  class="form-control" >
                    @error('description')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>
                <!-- Action Buttons -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-success me-2">Save</button>
                    <a href="{{ route('packages.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


