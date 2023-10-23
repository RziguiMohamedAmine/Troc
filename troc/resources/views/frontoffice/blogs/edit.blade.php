@extends('frontoffice.index')

@section('content')
<section id="main" class="clearfix">  
    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" class="form width-80" enctype="multipart/form-data" data-ajax-callback="adPostCallback">
        @csrf
        @method('PUT')
        <div id="ad-post-result"></div>
        <div class="fields-box clearfix">
            <h3>Modifier votre Blog</h3>
            <div class="padd-b">
                <div class="select-container">
                    <select name="blog-subcategory_id" required="required">
                        <option disabled selected>Catégorie</option>
                            @foreach ($categories as $category)
                                 <option disabled class="bold bg-light large">{{ $category->name }}</option>
                                 @if ($category->subcategories->isNotEmpty())
                                 @foreach ($category->subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}" @if($blog->subcategory_id == $subcategory->id) selected @endif >{{ $subcategory->name }}</option>
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
                                 {{$message}}
                          </div>
                        @enderror
                </div>

            </div>
            <div class="padd-b ">
            <label>Titre</label>
                <input type="text" name="blog-title" value="{{$blog->title}}" 
                       class="inline-block width-100" maxlength="100" required="required"  />
                       @error('blog-title')
                          <div class="form-error">
                                 {{$message}}
                          </div>
                       @enderror
            </div>
            <label>Description</label>
            <div class="padd-b relative">
                <textarea name="blog-content" value="{{$blog->content}}" rows="4" class="width-100" maxlength="255" minlength="10" required="required">{{$blog->content}}</textarea>
                @error('blog-content')
                          <div class="form-error">
                                 {{$message}}
                          </div>
                @enderror
            </div>
            <label>Une image</label>
            <div class="text-center">
                <i class="lni-download block xxlarge text-center marg-b-XS"></i>
                <input type="file" name="image" id="image" accept="image/*" value="{{$blog->image}}" />
               
            </div>
                 
            
        </div>

        <div class="text-center padd-t">
            <button type="submit" class="highlight" ><span>Publier</span></button>
        </div>

    </form>
</section>

@endsection