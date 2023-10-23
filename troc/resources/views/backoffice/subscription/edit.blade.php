@extends('backoffice.index')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Update Plan</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Plans</a></li>                         
                            <li class="breadcrumb-item active">Update Plan</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Plans</h4>
                            <p class="sub-title">   
                                        <code class="highlighter-rouge">  </code>  
                                        <code class="highlighter-rouge"> </code> 
                                        <code class="highlighter-rouge"> </code>  
                            </p>

                            <form class="" action="{{ route('plan.update', ['plan' => $plan->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Name</label>
                                    <input id="plan-name" type="text" value="{{ $plan->name }}" class="form-control" required name="name"/>
                                    @error('name')
                                        <div class="form-error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input id="plan-description" value="{{ $plan->description }}" type="text" class="form-control" required name="description"/>
                                    @error('description')
                                        <div class="form-error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input id="plan-price" type="number" value="{{ $plan->price }}" class="form-control" required name="price"/>
                                    @error('price')
                                        <div class="form-error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                            Cancel
                                        </button>
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
