@extends('layouts.user_app')
@section('styles')
 <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
   
<style>
label{
    font-size:16px;
    font-weight:700;
}
</style>
@endsection
@section('main-content')
<div class="row">
    
     <div class="col-12 ">
       <div class="card">
           <div class="card-body">
               <h5 class="card-title"> {{$group->group_name}} Contacts Address</h5>
               <div class="table-responsive">
                                    <table id="zero_config" class="table table-sm-responsive table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S/No</th>
                                                <th>Contact Name</th>
                                                <th>Phone Number</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($group->contacts as $contact)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$contact->name}}</td>
                                                <td>{{$contact->phone_number}}</td>
                                                <td><a href="{{route('contact.edit',$contact->id)}}" class="btn btn-sm btn-info">Edit</a></td>
                                                <td>
                                                <form id="delete-form-{{$contact->id}}" action="{{route('contact.delete',$contact->id)}}" 
                                                style="display:none;" method="post">
                                                @csrf
                                                {{method_field("DELETE")}}
                                                </form>
                                                <a href="javascript:void(0)" 
                                                 onclick="event.preventDefault();
                                                if(confirm('Are you sure want to delete this?'))
                                                {document.getElementById('delete-form-{{$contact->id}}').submit()}"
                                                class="btn btn-sm btn-danger">Trash</a></td>
                                            
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        
                                    </table>
                                </div>
           </div>
       </div>
    </div>
</div>
@endsection
@section('scripts')
 <script src="{{asset('assets/extra-libs/DataTables/datatables.min.js')}}"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
@endsection