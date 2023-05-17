@extends('layout')
  
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Member Details</div>
                  <div class="card-body">
                      <form action="post-login" method="POST">
                        @csrf
                        <table align="center" border = 1> 
                            <tr >
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                            </tr>

                            @foreach($members as $member)
                                <tr >
                                <td>{{$member['name']}}</td>
                                <td>{{$member['email']}}</td>
                                <td>{{$member['address']}}</td>
                                </tr>
                            @endforeach    

                        </table>
                      </form>
                      <span >{{$members->links()}}</span>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
 
@endsection
<style type="text/css">
    .w-5{
            display:none;
        }
</style>