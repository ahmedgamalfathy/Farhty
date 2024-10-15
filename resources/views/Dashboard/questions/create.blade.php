@extends('layouts.master')
@section('title',"انشاء باقة جديد")
@section('content')
<div class="container pt-5">
    <div class="card shadow-sm border-0">
        <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
            <h5 id="AddUserLabel" class="mb-0">اضف باقة</h5>
        </div>
        <div class="card-body">
            <form class="add-new-user" id="addNewUserForm" action="{{ route('questions.store') }}" method="POST" >
                @csrf
                    {{-- name, description, original_price, offer_price, duration --}}
                <div class="row g-3">
                    <!-- Name Field -->
                    <div class="col-md-12">
                        <label class="form-label" for="password">السؤال</label>
                        <textarea id="description" name="question"  class="form-control" ></textarea>
                        @error('description')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Password Field -->
                    <div class="col-md-12">
                        <label class="form-label" for="password">والاجابة</label>
                        <textarea id="description" name="answer"  class="form-control" ></textarea>
                        @error('description')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- Action Buttons -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-success me-2">Save</button>
                    <a href="{{ route('questions.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


