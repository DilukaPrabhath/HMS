@extends('backend.receptionist.master_receptionist') @section('content')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css
" crossorigin="anonymous"></script>
<style type="text/css">
::-webkit-scrollbar {
  width: 5px;
}

::-webkit-scrollbar-track {
  width: 5px;
  background: #f5f5f5;
}

::-webkit-scrollbar-thumb {
  width: 1em;
  background-color: #ddd;
  outline: 1px solid slategrey;
  border-radius: 1rem;
}

.text-small {
  font-size: 0.9rem;
}

.messages-box,
.chat-box {
  height: 510px;
  overflow-y: scroll;
}

.rounded-lg {
  border-radius: 0.30rem;
}

input::placeholder {
  font-size: 0.9rem;
  color: #999;
}

.btn-compose {
  background: #9b59b6;
  padding: 8px 0;
  text-align: center;
  margin-left: 200px;
  margin-top: -40px;
  width: 100%;
  color: #fff;
}

.btn-compose:hover {
  background: #8e44ad;
  color: #fff;
}

.btn-send,
.btn-send:hover {
  background: #00A8B3;
  color: #fff;
}

.btn-send:hover {
  background: #009da7;
}
</style>
<!-- Chat Body -->
<div class="row rounded-lg overflow-hidden shadow" style="width:1200px; height: 1000x; border-radius: 30px; margin-left: 50px;">
  <!-- Users box-->
  <div class="col-5 px-4">
    <div class="bg-white">
      <div class="bg-gray px-4 py-2 bg-light">
        <div class="row">
          <div class="col-md-6">
            <p class="h5 mb-1 py-1"><b>Recent</b></p> <a class="btn btn-compose" data-toggle="modal" href="#myModal" data-original-title="" title="">
           New Message
           </a> </div>
        </div>
      </div>
      <div class="messages-box">
        <div class="list-group rounded-0"> @foreach($message as $value) @if(Auth::user()->id != $value->sender_id) <a href="{{url('receptionist/message/view')}}/{{$value->sender_id}}" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                @elseif (Auth::user()->id != $value->user_id)
                <a href="{{url('receptionist/message/view')}}/{{$value->user_id}}" class="list-group-item list-group-item-action list-group-item-light rounded-0">
                @else
                         
                @endif
           
              <div class="media">
                @if(Auth::user()->id != $value->sender_id)
                <img src="{{asset('Upload/UserImages/'.$value->bimg)}}" alt="user" width="50" class="rounded-circle">
                @elseif (Auth::user()->id != $value->user_id)
                <img src="{{asset('Upload/UserImages/'.$value->aimg)}}" alt="user" width="50" class="rounded-circle">
                @else
                         
                @endif

                <div class="media-body ml-4">
                  <div class="d-flex align-items-center justify-content-between mb-1">
                     @if(Auth::user()->id != $value->sender_id)
                              <h6 class="mb-0"><b>{{$value->bfname}} {{$value->blname}}</b></h6><small class="small font-weight-bold">
                              @elseif (Auth::user()->id != $value->user_id)
                              <h6 class="mb-0"><b>{{$value->afname}} {{$value->alname}}</b></h6><small class="small font-weight-bold">
                              @else
                         
                              @endif
                    {{$value->created_at}}</small>
                  </div>
                  <p class="font-italic text-muted mb-0 text-small">{{$value->subject}}</p>
                </div>
              </div>
            </a> @endforeach </div>
      </div>
    </div>
  </div>
  <!-- Chat Box-->
  <div class="col-7 px-0">
    <div class="px-4 py-5 chat-box bg-white">
      <!-- Sender Message-->
      @foreach($chat->sortBy('created_at') as $value) 
      @if(Auth::user()->id != $value->user_id)
      <div class="media-body ml-3">
        <div class="bg-light rounded py-2 px-3 mb-2">
          <p class="text-small mb-0 text-muted">{{$value->message}}</p>
        </div>
        <p class="small text-muted">{{$value->created_at}}</p>
      </div> @else
      <!-- Reciever Message-->
      <div class="media w-50 ml-auto mb-3">
        <div class="media-body">
          <div class="bg-primary rounded py-2 px-3 mb-2">
            <p class="text-small mb-0 text-white">{{$value->message}}</p>
          </div>
          <p class="small text-muted">{{$value->created_at}}</p>
        </div>
      </div> @endif @endforeach </div>
    <!-- Typing area -->
    <form action="#" class="bg-light">
      <div class="input-group">
        <input type="text" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
        <div class="input-group-append">
          <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title"><b>New Message</b></h6>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h6 class="modal-title"></h6> </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{url('receptionist/message/save')}}" enctype="multipart/form-data"> {{ csrf_field() }}
          <div class="form-group">
            <select class="form-control dynamic" name="user_type_id" id="user_type_id" type="select" data-dependent="emp_no" required>
              <option>Job Role</option> @foreach(App\user_type::all() as $data)
              <option value="{{$data->id}}">{{$data->user_type}}</option> @endforeach </select>
          </div>
          <div class="form-group">
            <select class="form-control" name="emp_no" id="emp_no" type="select">
              <option value="" selected="">Select User ID</option>
            </select>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Subject</label>
            <div class="col-lg-14">
              <input type="text" name="subject" class="form-control" id="inputPassword1" placeholder=""> </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Message</label>
            <div class="col-lg-14">
              <textarea name="message" id="" class="form-control" cols="30" rows="10"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
              <button type="submit" class="btn btn-send" data-original-title="" title="">Send</button>
              <button type="reset" class="btn btn-danger" data-original-title="" title="">Clear</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<script>
$(document).ready(function() {
  $('.dynamic').change(function() {
    if($(this).val() != '') {
      var select = $(this).attr("id");
      var value = $(this).val();
      var dependent = $(this).data('dependent');
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: "/dynamic_dependent/fetchuser2",
        method: "POST",
        data: {
          select: select,
          value: value,
          _token: _token,
          dependent: dependent
        },
        success: function(result) {
          $('#' + dependent).html(result);
        }
      })
    }
  });
});
$(document).ready(function() {
  $('#emp_no').change(function() {
    if($(this).val() != '') {
      var select = $(this).val();
      console.log(select);
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url: "/dynamic_dependent/fetchname2",
        method: "POST",
        data: {
          select: select,
          _token: _token
        },
        success: function(result) {
          console.log(result);
          document.getElementById('empname').innerHTML = result;
        }
      })
    }
  });
});
</script> 
@stop