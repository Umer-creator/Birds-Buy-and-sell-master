@extends('layouts.seller')
@section('seller')
    <div class="row">
        <div class="col-md-10 col-sm-12 col-xl-10 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-bold">Profile</h4>
                    <div id="example-vertical-wizard">
                        <div>
                            <h3>Profile</h3>
                            <section>
                                @auth
                                    <div class="form-group">
                                        <center>
                                            <img src={{ asset(Auth::user()->store->image) }} id="output_image" height="170px"
                                                width="300px" required><br>
                                            <label class="mt-3" align="center">Store Profile Photo:</label>
                                        </center>
                                    </div>
                                @endauth


                                <div class="card">
                                    <div class="card-body">
                                        <form class="forms-sample" method="post"
                                            action="{{ route('seller.store.profile.update') }}"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div id="input-grp-single" class="form-row mt-4">
                                                <div class="col-12"><input class="form-control" type="file"
                                                        name="image" accept="image/*" required
                                                        style="padding:5px;  margin-left:5px;  border-radius: 15px;text-shadow: 0px 0px;box-shadow: 0px 0px 7px 0px rgb(147,195,244);height: 39px;width: 405px;" />
                                                </div>
                                            </div>
                                            <center>
                                                <div class="mt-2"> <button type="submit"
                                                        class="btn btn-primary mr-2">Submit</button>
                                                </div>
                                            </center>

                                        </form>

                                    </div>

                                </div>

                            </section>
                            <h3>Account</h3>
                            <section>
                                @auth
                                    <div class="form-group">
                                        <label for="userName">Seller Name </label>
                                        <input id="userName" name="userName" type="text" value={{ Auth::user()->name }}
                                            disabled class="required form-control form-control-sm">
                                    </div>
                                    <div class="form-group">
                                        <label for="userEmail">Seller Email </label>
                                        <input id="email" name="email" type="email" value={{ Auth::user()->email }}
                                            disabled class="required form-control form-control-sm">
                                    </div>




                                    <div class="form-group">
                                        <label for="userEmail">Store Name</label>
                                        <input value={{ Auth::user()->store->name }} disabled
                                            class="required form-control form-control-sm">
                                    </div>

                                    <div class="form-group">
                                        <label for="userEmail">Store Address </label>
                                        <input value={{ Auth::user()->store->address }} disabled
                                            class="required form-control form-control-sm">
                                    </div>
                                @endauth


                            </section>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
