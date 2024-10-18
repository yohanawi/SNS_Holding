@extends('layouts.admin')

@section('content')
    <div class="bg-white shadow-sm">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <h2 class="mb-0 h4">{{ __('Category') }}</h2>
            <small class="text-danger">{{ __('Dashboard / Category') }}</small>
        </div>
    </div>

    <div class="container py-5">
        <div class="row g-5">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- First Form: Category -->
            <div class="col-md-6">
                <div class="shadow-sm card">
                    <h5 class="mt-3 text-center text-uppercase">Add Main Category</h5>
                    <div class="card-body">
                        <form action="{{ route('admin.category.create') }}" method="POST" enctype="multipart/form-data"
                            class="space-y-3">
                            @csrf
                            <div class="mb-3">
                                <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                                <input type="text" id="category" name="category" class="shadow-sm form-control"
                                    placeholder="Enter category" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
                                <input type="file" id="image" name="image" class="shadow-sm form-control" required>
                            </div>
                            <div class="mt-4 d-flex justify-content-between">
                                <button type="submit" class="px-4 btn btn-primary">Add Category</button>
                                <button type="reset" class="px-4 btn btn-outline-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Second Form: Subcategory -->
            <div class="col-md-6">
                <div class="shadow-sm card">
                    <div class="card-body">
                        <h5 class="mt-3 text-center text-uppercase">Add Sub Category</h5>
                        <form action="{{ route('admin.subcategory.store') }}" method="POST" enctype="multipart/form-data"
                            class="space-y-3">
                            @csrf
                            <div class="mb-3">
                                <label for="subcategory" class="form-label">Main Category <span
                                        class="text-danger">*</span></label>
                                <select id="category_id" name="category_id" class="shadow-sm form-control" required>
                                    <option value="" disabled selected>Select a main category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="subcategory" class="form-label">Subcategory <span
                                        class="text-danger">*</span></label>
                                <input type="text" id="subcategory" name="subcategory" class="shadow-sm form-control"
                                    placeholder="Enter subcategory" required>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
                                <input type="file" id="image" name="image" class="shadow-sm form-control" required>
                            </div>

                            <div class="mt-4 d-flex justify-content-between">
                                <button type="submit" class="px-4 btn btn-primary">Add Subcategory</button>
                                <button type="reset" class="px-4 btn btn-outline-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <div class="shadow-sm card">
                <div class="card-body">
                    <h3 class="mb-4 text-center fw-bold">Category Data</h3>
                    <div class="row">
                        <div class="col-6">
                            <table class="table table-striped table-bordered">
                                <thead class="text-center table-light">
                                    <th>Category Name</th>
                                    <th>Category Image</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @if ($categories->count() > 0)
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td style="text-align: center;">{{ $category->category }}
                                                </td>
                                                <td style="text-align: center;">
                                                    <img src="{{ Storage::url($category->image) }}" alt="Category Image"
                                                        style="width: 50px; height: 50px; border-radius: 200px; object-fit: cover;">
                                                </td>
                                                <td style="text-align: center;">
                                                    <form action="{{ route('admin.category.delete', $category->id) }}"
                                                        method="POST" style="display:inline-block;"
                                                        onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="delete-btn_table btn btn-danger btn-sm"
                                                            title="Delete Category">
                                                            <i class="fas fa-trash"></i> Delete Category
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" style="text-align: center;">No category available.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6">
                            <table class="table table-striped table-bordered">
                                <thead class="text-center table-light">
                                    <th>Sub Category Name</th>
                                    <th>Sub Category Image</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @if ($subcategories->count() > 0)
                                        @foreach ($category->subcategories as $subcategory)
                                            <tr>
                                                <td style="text-align: center;">{{ $subcategory->subcategory }}</td>
                                                <td style="text-align: center;">
                                                    <img src="{{ Storage::url($subcategory->image) }}"
                                                        alt="Category Image"
                                                        style="width: 50px; height: 50px; border-radius: 200px; object-fit: cover;">
                                                </td>
                                                <td style="text-align: center;">
                                                    <form
                                                        action="{{ route('admin.subcategory.destroy', $subcategory->id) }}"
                                                        method="POST" style="display:inline-block;"
                                                        onsubmit="return confirm('Are you sure you want to delete this subcategory?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="delete-btn_table btn btn-danger btn-sm"
                                                            title="Delete Subcategory">
                                                            <i class="fas fa-trash"></i> Delete Subcategory
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" style="text-align: center;">No Sub Category available.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
