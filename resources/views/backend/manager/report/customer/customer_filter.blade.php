 @extends('backend.manager.layout.master') 
@section('content')
 <div class="form-group col-md-6">
            <div class="table-responsive">
              <table class="table table-bordered" id="example2" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Icon</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody> @foreach($data as $value)
                  <tr>
                    <td></td>
                    <td>{{$value->fname}}</td>
                    <td>{{$value->nic}</td>
                    <td>{{$value->created_at}</td>
                  </tr> 
                @endforeach 
              </tbody>
              </table>
               @stop