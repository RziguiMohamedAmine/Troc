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
                      @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


                      <table id="mainTable" class="table table-striped mb-0 table-editable">
                          <thead>                         
                          <tr>
                              <th>Message</th>
                              <th>Sender</th>
                              <th>Product name</th>
                              <th>Actions</th>
                          </tr>

                          </thead>
                          <tbody>
                           
                          @foreach ($listClaims as $claim)
    <tr>
        <td>
            {{ $claim->claim_text }}
        </td>
        <td>
            {{ $claim->user->name }} {{-- Display the sender's name --}}
        </td>
        <td>
            {{ $claim->product->name }} {{-- Display the product's name --}}
        </td>
        <td class="flex items-center gap-2">
            <form method="POST"  style="display: inline-block; margin-right: 10px;">
                @csrf 
                <input type="hidden" id="claim_id" name="claim_id" value="{{ $claim->id }}">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#approveModal">
    Approve
</button>

            </form>
            <form method="POST"  style="display: inline-block;">
                @csrf 
                <input type="hidden" id="claim_id" name="claim_id" value="{{ $claim->id }}">
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
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approveModalLabel">Approve Claim</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea id="approvalComment" class="form-control" placeholder="Enter your approval comment"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="sendApproval">Send</button>
            </div>
        </div>
    </div>
</div>


<script>
    // Listen for the "Send" button click event
    document.getElementById('sendApproval').addEventListener('click', function () {
        // Get the approval comment from the textarea
        const approvalComment = document.getElementById('approvalComment').value;

        // Send an email using your preferred method (e.g., Laravel Mail)
        // You may need to make an AJAX request to your server to send the email
        // Pass the approval comment and relevant data (e.g., recipient email) to the server

        // Close the modal after sending the email
        $('#approveModal').modal('hide');
    });
</script>


@endsection