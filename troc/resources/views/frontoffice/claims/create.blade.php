@extends('frontoffice.index')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="">
                <h1 class="text-center">Claim Form</h1>

                @if(session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('claims.store') }}">
                    @csrf
                    <div class="form-group text-center">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <label for="claim_text" class="d-block" style="text-align: center; display: block; margin: 0 auto;">Claim Text</label>
    <textarea name="claim_text" id="claim_text" class="form-control" rows="4" placeholder="Enter your claim here">{{ old('claim_text') }}</textarea>
    @error('claim_text')
        <div class="text-danger mt-2">{{ $message }}</div>
    @enderror
</div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit Claim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
