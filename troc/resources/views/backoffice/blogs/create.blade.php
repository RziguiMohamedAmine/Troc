@extends('backoffice.index')

@section('content')
<link rel="stylesheet">

<!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">Add Blogs</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Blogs</a></li>
                        <li class="breadcrumb-item active">Add Blog</li>
                    </ol>
                </div>
            </div> <!-- end row -->
        </div>
        <!-- end page-title -->

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <form action="{{ route('blogs.storeBack') }}" method="post" enctype="multipart/form-data">
                            <h4 class="mt-0 header-title">Blogs</h4>
                            <p class="sub-title">
                                <code class="highlighter-rouge"></code>
                                <code class="highlighter-rouge"></code>
                                <code class="highlighter-rouge"></code>
                            </p>

                            @csrf
                            <div class="form-group">
                                <div class="select-container">
                                    <select name="blog-subcategory_id" required="required">
                                        <option disabled selected>Catégorie</option>
                                        @foreach ($categories as $category)
                                        <option disabled class="bold bg-light large">{{ $category->name }}</option>
                                        @if ($category->subcategories->isNotEmpty())
                                        @foreach ($category->subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}" @if(old('blog-subcategory_id') == $subcategory->id) selected @endif>{{ $subcategory->name }}</option>
                                        @endforeach
                                        @else
                                        <div>
                                            <span>No subcategories available</span>
                                        </div>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('blog-subcategory_id')
                                    <div class="form-error">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <label>Title</label>
                                <input type="text" name="blog-title" value="{{ old('blog-title') }}" class="form-control" required placeholder="Title" />
                                @error('blog-title')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Content</label>
                                <input type="text" name="blog-content" value="{{ old('blog-content') }}" class="form-control" required placeholder="Content" />
                                @error('blog-content')
                                <div class="form-error">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="text-center">
                                    <i class="lni-download block xxlarge text-center marg-b-XS"></i>
                                    <input type="file" name="image" id="image" accept="image/*" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
    <!-- container-fluid -->

</div>
<!-- content -->
@endsection
