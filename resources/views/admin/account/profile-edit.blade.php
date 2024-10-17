@extends('layouts.admin')
@section('admin')
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
                                            <img src={{ asset(Auth::user()->profile_photo_path) }} id="output_image"
                                                height="150px" width="150px" required><br>
                                            <label align="center">Profile Photo:</label>
                                        </center>
                                    </div>
                                @endauth


                                <div class="card">
                                    <div class="card-body">
                                        <form class="forms-sample" method="post"
                                            action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                                            @csrf

                                            <div id="input-grp-single" class="form-row mt-4">
                                                <div class="col-12"><input class="form-control" type="file"
                                                        name="image" accept="image/*" required
                                                        style="border-radius: 20px;text-shadow: 0px 0px;box-shadow: 0px 0px 7px 0px rgb(147,195,244);height: 39px;width: 405px;" />
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
                                        <label for="userName">Name </label>
                                        <input id="userName" name="userName" type="text" value={{ Auth::user()->name }}
                                            disabled class="required form-control form-control-sm">
                                    </div>
                                    <div class="form-group">
                                        <label for="userEmail">Email </label>
                                        <input id="email" name="email" type="email" value={{ Auth::user()->email }}
                                            disabled class="required form-control form-control-sm">
                                    </div>
                                @endauth


                            </section>
                            <h3>Detailt</h3>
                            <section>
                                <div class="form-group">
                                    <label for="userName">First name </label>
                                    <input id="fname" name="fname" type="text"
                                        class="required form-control form-control-sm">
                                </div>

                                <div class="form-group">
                                    <label for="userName">last name </label>
                                    <input id="lname" name="lname" type="text"
                                        class="required form-control form-control-sm">
                                </div>

                            </section>
                            <h3>Finish</h3>
                            <section>

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        I agree with the Terms and Conditions.
                                    </label>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
