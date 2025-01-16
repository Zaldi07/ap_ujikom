@extends('main') 
@section('title','Data Pengguna')
@section('breadcrumbs') 
<main id="main" class="main">  
    <div class="pagetitle"> 
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./location">Master Data</a></li>
            <li class="breadcrumb-item active">Data Pengguna</li>
          </ol>
        </nav>
      </div>  
        <section  class="section dashboard">
          <div class="col-12">
            <div class="row">  
                <div class="card top-selling overflow-auto">  
                    <div class="content mt-3">
                        <div class="animated fadeIn">  
                                <div class="card-header"> 
                                    <table width="100%"  class="fa fa-text-height" aria-hidden="true"   border="0" cellpadding="0" cellspacing="0"   class="fa fa-align-center" > 
                                        <tr>
                                         <td><h5 class="card-title">Tambah Data Pengguna</span></h5></td>
                                         <td> 
                                           <div align="right"><a href="{{ url('./pengguna')}}" class="btn btn-success btn-sm" >
                                             <span class="bi bi-arrow-left-circle-fill" style="font-size:16px"> Back</span></a> 
                                           </div> 
                                         </td> 
                                          </tr>
                                        </table>

                                        <div class="col-12">
                                            <div class="card recent-sales overflow-auto">
                                            <div class="card-body">  
                                              
                                                <form action="{{ url('pengguna')}}" method="post" enctype="multipart/form-data">
                                                  {{ csrf_field() }} 
                                                  <p>
                                                   <!--  <div class="row mb-3"> 
                                                        <label for="name" class="col-sm-2 col-form-label">User Id</label>
                                                        <div class="col-sm-10">
                                                          <input type="text" class="form-control @error('user_id') is-invalid @enderror"   value="{{ old('user_id') }}"  name="user_id"  required autofocus>
                                                           </div>
                                                      </div>  -->
                        
                                                      <div class="row mb-3">
                                                        <label for="name" class="col-sm-2 col-form-label">Nama User </label>
                                                        <div class="col-sm-10">
                                                          <input type="text" class="form-control @error('Nama User') is-invalid @enderror"   value="{{ old('lokasi') }}"  name="name"  required autofocus>
                                                           </div>
                                                      </div> 
                                                       
                                                 

                                                      <div class="row mb-3">
                                                        <label for="name" class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">
                                                          <input type="text" class="form-control @error('email') is-invalid @enderror"   value="{{ old('email') }}"  name="email"  required autofocus>
                                                           </div>
                                                      </div> 


                                                      <div class="row mb-3">
                                                        <label for="name" class="col-sm-2 col-form-label">Password</label>
                                                        <div class="col-sm-10">
                                                          <input type="Password" class="form-control @error('password') is-invalid @enderror"   value="{{ old('password') }}"  name="password"  required autofocus>
                                                           </div>
                                                      </div> 



                                                    <div class="row mb-3">
                                                    <label for="role" class="col-sm-2 col-form-label">Level Akses</label>
                                                    <div class="col-sm-10">
                                                     <select class="form-control" id="role" name="role">  
                                                      <option value='{{ old('role') }}'>{{ old('role') }}</option> 
                                                      <option value='Manager'>Manager</option> 
                                                      <option value='Staff'>Staff</option>  
                                                     </select>    
                                                  </div>
                                                </div>


                                                    <button type="submit" class="btn btn-success" style="font-size:16px"><span class="bi bi-save2 green-color"> Save </span></button>
                                                  </form>
                                                    </div> 
                                                </div> 
                                            </div> 
                                  </div>
                           
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
      </section> 
</main> 
@endsection 