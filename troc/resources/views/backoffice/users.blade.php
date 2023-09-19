<!-- resources/views/dashboard.blade.php -->

@extends('backoffice.index')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Table Editable</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Stexo</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Table Editable</li>
                            </ol>
                        </div>
                    </div> <!-- end row -->
                </div>
                <!-- end page-title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Examples</h4>
                                <p class="sub-title">just start typing to edit, or move around with arrow keys or mouse clicks!</p>

                                <table id="mainTable" class="table table-striped mb-0 table-editable">
                                    <thead>                         
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Verified</th>
                                    </tr>
 
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                    <tr>
                                        <td><img src="{{ $user->profile_photo_url }}" alt="{{ Auth::user()->name }}" style="width: 40px; height: 40px;" class="rounded-circle"></td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->formattedRoles() }}</td>
                                        <td>  @if ($user->email_verified_at)
                                            <i class="fas fa-check-circle text-success " style="font-size: 1.2em; margin-left: 16px;"></i>
                                        @else
                                        <i class="fas fa-times-circle text-danger" style="font-size: 1.2em; margin-left: 16px;"></i>
                                        @endif</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th><strong>TOTAL</strong></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->      

                
            </div>
            <!-- container-fluid -->

        </div>
        <!-- content -->


@endsection
