@extends('layouts.master')
@section('content1')
   <h3>All Employees</h3>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addemployee">
  Add New Employee
</button>

<table class="table table-responsive">
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Company ID</th>
      <th>Modify</th>
    </tr>
  </thead>
  <tbody>
    @foreach($employee as $em)
    <tr>
      <td>{{$em->first_name}}</td>
      <td>{{$em->last_name}}</td>
      <td>{{$em->email}}</td>
      <td>{{$em->phone}}</td>
      <td>{{$em->companies_id}}</td>

      <td>
        <button class="btn btn-info" data-toggle="modal" data-myname="{{$em->first_name}}" data-myname2="{{$em->last_name}}" data-emaill="{{$em->email}}" data-myid="{{$em->id}}" data-target="#edit1"
          data-myphone="{{$em->phone}}" data-ids="{{$em->companies_id}}">Edit</button>
        / <button class="btn btn-danger" data-toggle="modal" data-target="#delete2" data-myid="{{$em->id}}">Delete</button>
        / <button class="btn btn-danger" data-toggle="modal" data-myname="{{$em->name}}" data-myemail="{{$em->email}}" data-mysite="{{$em->site}}" data-myid="{{$em->id}}" data-myimgid="{{$em->images_id}}" data-mydeac="{{$em->deactivate}}" data-target="#deactivate">Deactivate</button>
      </td>
    </tr>
    @endforeach
  </tbody>
  </table>
  <div class="modal fade" id="addemployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">New Employee</h4>
        </div>
      <form action="{{route('Employee.store')}}" method="post">
                {{csrf_field()}}
        <div class="modal-body">
          <div class="form-group">
            <label for="first_name">Frirst Name</label>
            <input type="text" name="first_name" class="form-control" id="first_name">

            <label for="last_name">Second Name</label>
            <input type="text" name="last_name" class="form-control" id="last_name">

            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" id="email">

            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" id="phone">
            <label for="companies_id">Company ID</label>
            <input type="text" name="companies_id" class="form-control" id="companies_id">

            <ul>
                @foreach($company as $com)
              <li>{{$com->name}} ---> ID = {{$com->id}}</li>
              @endforeach
            </ul>
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


  <div class="modal fade" id="edit1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Edite Company</h4>
        </div>
        <form action="{{route('Employee.update','test')}}" method="post">
          {{csrf_field()}}
          {{method_field('patch')}}
          <div class="modal-body">
            <input type="hidden" name="employee_id" value="" id="emp_id">
            <div class="form-group">
              <label for="first_name">Frirst Name</label>
              <input type="text" name="first_name" class="form-control" id="first_name">

              <label for="last_name">Second Name</label>
              <input type="text" name="last_name" class="form-control" id="last_name">

              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" id="email">

              <label for="phone">Phone</label>
              <input type="text" name="phone" class="form-control" id="phone">
              <label for="companies_id">Company ID</label>
              <input type="text" name="companies_id" class="form-control" id="companies_id">
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

  <div class="modal fade modal-danger" id="delete2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
        </div>
        <form action="{{route('Employee.destroy', 'test')}}" method="post">
          {{csrf_field()}}
          {{method_field('delete')}}
          <div class="modal-body">
            <input type="hidden" name="employee_id" value="" id="emp_id">
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
        <form action="{{route('Employee.update' , 'test')}}" method="post">
          {{csrf_field()}}
          {{method_field('patch')}}
          <div class="modal-body">
            <label for="deactivate">Please write 1 and confirm to deactivate</label>
            <input type="text" name="deactivate" class="form-control" id="deactivate">
            <input type="hidden" name="employee_id" value="" id="emp_id">
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
