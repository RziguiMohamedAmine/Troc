@extends('backoffice.index')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Add any additional CSS or scripts you need for this view -->

    <!-- Start content -->
    <div class="content">
        <div class "container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">List of Plans</h4>
                    </div>
                    <!-- Add any other elements, such as a search bar or buttons, as needed -->
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Modify</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plans as $plan)
                                        <tr>
                                            <td>{{ $plan->id }}</td>
                                            <td>{{ $plan->name }}</td>
                                            <td>{{ $plan->description }}</td>
                                            <td>{{ $plan->price }}</td>
                                            <td>
                                                <a href="{{ route('plan.edit', $plan->id) }}"
                                                    class="btn btn-primary">Modify</a>
                                            </td>
                                            <td>
                                                <a href="{{ route('plan.destroy', $plan->id) }}"
                                                    onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this plan?')) document.getElementById('delete-plan-form-{{ $plan->id }}').submit();">
                                                    <i class="fa fa-trash" style="font-size: 20px; color: red;"></i>
                                                </a>
                                                <form id="delete-plan-form-{{ $plan->id }}"
                                                    action="{{ route('plan.destroy', $plan->id) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
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
