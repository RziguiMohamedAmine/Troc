@extends('backoffice.index')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">

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
                              <th>Message</th>
                              <th>Sender</th>
                              <th>Created At</th>
                              <th>Actions</th>
                          </tr>

                          </thead>
                          <tbody>
                           
                              @foreach ($listReports as $report)
                              <tr>
                              <td>
                                  {{$report->message->body}}
                              </td>
                              <td>
                                  {{$report->message->user->name}}
                              </td>
                    
                              <td>
                                  {{$report->created_at}}
                              </td>

                              <td class="flex items-center gap-2">
                                <form method="POST" action="{{ route('backoffice.reports.approve') }}" style="display: inline-block; margin-right: 10px;">
                                    @csrf 
                                    <input type="hidden" id="report_id" name="report_id" value="{{ $report->id }}">
                                    <button type="submit" class="btn btn-danger">Approve</button>
                                </form>
                                
                                <form method="POST" action="{{ route('backoffice.reports.deny') }}" style="display: inline-block;">
                                    @csrf 
                                    <input type="hidden" id="report_id" name="report_id" value="{{ $report->id }}">
                                    <button type="submit" class="btn btn-indigo">Deny</button>
                                </form>
                            </td>                            
                                 
                              </tr>
                              @endforeach
                       
                        
                          </tbody>
                          <tfoot>
                          <tr>
                              {{-- <th><strong>TOTAL</strong></th> --}}
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