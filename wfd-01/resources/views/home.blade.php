@extends('base')

@section("content")
    <div class="row">
        <div class="col m-1 p-1 bg-primary ">
            Column 1 of 2
        </div>
        <div class="col m-1 p-1 bg-secondary">
            Column 2 of 2
        </div>
    </div>

    <div id="notifModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Notification</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p id="usernameModal">Username: </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ok</button>
            </div>
          </div>
        </div>
    </div>

    <form id="formLogin">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection



@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#formLogin").on('submit', function() {
                console.log("forn syvntu")
                var username = $("input[name=username]").val()
                $("#usernameModal").html("Username: " + username)
                $("#notifModal").modal('show')
                return false

            })
        })
    </script>
@endsection