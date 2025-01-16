@extends('main') 
@section('title','Pengguna')
@section('breadcrumbs') 
<main id="main" class="main">  
    <div class="pagetitle"> 
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./pengguna">Master Data</a></li>
            <li class="breadcrumb-item active">pengguna</li>
          </ol>
        </nav>
      </div>  

      <section  class="section dashboard">
        <div class="col-12">
          <div class="row">  
              <div class="card top-selling overflow-auto">  
                  <div class="content mt-3">
                      <div class="animated fadeIn">
                          
                        @if (session('status'))   
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <strong>Proses...! </strong> {{ session('status') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div> 
                        @endif 


                        <div class="card-header"> 
                          <table width="100%" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                <td><h5 class="card-title">Data Pengguna</span></h5></td>
                                <td> 
                                  <div align="right">    
                                       <a href="{{ url('pengguna/create')}}" class="btn btn-success btn-sm">
                                      <span class="bi bi-plus-circle" style="font-size:16px"> New</span></a> 
                                    </div> 
   
                              </tr>
                           </table> 
                      </div>

                              <div class="card-body table-responsive"> 
                                  <table class="table table-borderless datatable">
                                              <thead>
                                                  <tr>
                                                  <th>No.</th>
                                                  <th>UserID</th> 
                                                  <th>Nama Pengguna</th> 
                                                  <th>email</th> 
                                                  <th>Password</th> 
                                                  <th>Role</th> 
                                                  <th>Ubah</th>
                                                  <th>Hapus</th>
                                                 </tr>
                                              </thead>
                                              <tbody>
                                                @foreach ($pengguna as $item)
                                                <tr>
                                                  <td>{{$loop -> iteration}}</td>
                                                  <td>{{$item -> user_id}}</td> 
                                                  <td>{{$item -> name}}</td> 
                                                  <td>{{$item -> email}}</td>
                                                  <td>{{$item -> password}}</td>
                                                   <td>{{$item -> role}}</td>

                                                  <td><a href="{{ url('pengguna/' .$item->user_id.'/edit')}}" class="btn btn-success btn-sm" >
                                                    <span class="bi bi-pencil-square" style="font-size:12px"></span></a> </td>
                                                  <td><form action="{{ url('pengguna/' .$item->user_id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin Hapus Data')">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-success btn-sm"><span class="bi bi-trash"></span></button> 
                                                     </td>
                                                </form></td>
                                                 </tr>
                                                @endforeach
                                              </tbody>   
                                                  
                                   </table>
                                </div>
                         
                      </div> 
                  </div> 
              </div>
          </div>
      </div>
    </section> 
      
</main> 
@endsection  

