@extends('layouts.master')

@section('content')

   <h3>All Comapanies</h3>

   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Add New Company
</button>

<table class="table table-responsive">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Website</th>
      <th>Modify</th>
    </tr>
  </thead>
  <tbody>
    @foreach($company as $com)
    <tr>
      <td>{{$com->name}}</td>
      <td>{{$com->email}}</td>
      <td>{{$com->site}}</td>
      <td>

        <button class="btn btn-info" data-toggle="modal" data-myname="{{$com->name}}" data-myemail="{{$com->email}}" data-mysite="{{$com->site}}" data-myid="{{$com->id}}" data-myimgid="{{$com->images_id}}" data-target="#edit">Edit</button>
        / <button class="btn btn-danger" data-toggle="modal" data-target="#delete" data-myid="{{$com->id}}">Delete</button>
        / <button class="btn btn-danger" data-toggle="modal" data-myname="{{$com->name}}" data-myemail="{{$com->email}}" data-mysite="{{$com->site}}" data-myid="{{$com->id}}" data-myimgid="{{$com->images_id}}" data-mydeac="{{$com->deactivate}}" data-target="#deactivate">Deactivate</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">New Company</h4>
      </div>
      <form action="{{route('Company.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name">

            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" id="email">

            <label for="site">Website</label>
            <input type="text" name="site" class="form-control" id="site">

            <label for="deactivate">Please write 0</label>
            <input type="text" name="deactivate" class="form-control" id="de">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edite Company</h4>
      </div>
      <form action="{{route('Company.update','test')}}" method="post">
        {{csrf_field()}}
        {{method_field('patch')}}
        <div class="modal-body">
          <input type="hidden" name="company_id" value="" id="comp_id">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name">

            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" id="email">

            <label for="site">Website</label>
            <input type="text" name="site" class="form-control" id="site">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade modal-danger" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{route('Company.destroy', 'test')}}" method="post">
        {{csrf_field()}}
        {{method_field('delete')}}
        <div class="modal-body">
          <input type="hidden" name="company_id" value="" id="comp_id">
          <p class="text-center">ARE YOU SURE YOU WANT TO DELETE THIS??</p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
          <button type="submit" class="btn btn-warning">Yes, Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade modal-danger" id="deactivate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">DEACTIVATE Confirmation</h4>
      </div>
      <form action="{{route('Company.update', 'test')}}" method="post">
        {{csrf_field()}}
        {{method_field('patch')}}
        <div class="modal-body">
          <label for="deactivate">Please write 1 and confirm to deactivate</label>
          <input type="text" name="deactivate" class="form-control" id="deactivate">
          <input type="hidden" name="company_id" value="" id="comp_id">
          <p class="text-center">ARE YOU SURE YOU WANT TO DEACTIVATE THIS??</p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
          <button type="submit" class="btn btn-warning">Yes, Deactivate</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
