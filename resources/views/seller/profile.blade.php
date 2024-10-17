@extends('layouts.seller')
@section('seller')
    <div class="row">
        <div class="col-md-10 col-sm-12 col-xl-10 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-bold">Profile</h4>
                    <form id="example-vertical-wizard" action="#">
                        <div>
                            <h3>Account</h3>
                            <section>
                                <div class="form-group">
                                    <label for="userName">Email </label>
                                    <input id="email" name="email" type="email"
                                        class="required form-control form-control-sm">
                                </div>

                                <div class="form-group">
                                    <label for="userName">Username </label>
                                    <input id="userName" name="userName" type="text"
                                        class="required form-control form-control-sm">
                                </div>

                            </section>
                            <h3>Profile</h3>
                            <section>


                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropify-wrapper">
                                            <div class="dropify-message"><span class="file-icon"></span>
                                                <p>Drag and drop a file here or click</p>
                                                <p class="dropify-error">Ooops, something wrong appended.</p>
                                            </div>
                                            <div class="dropify-loader" style="display: none;"></div>
                                            <div class="dropify-errors-container">
                                                <ul></ul>
                                            </div>
                                            <input type="file" name="image" class="dropify"><button type="button"
                                                class="dropify-clear">Remove</button>
                                            <div class="dropify-preview" style="display: none;"><span
                                                    class="dropify-render"></span>
                                                <div class="dropify-infos">
                                                    <div class="dropify-infos-inner">
                                                        <p class="dropify-filename"><span class="file-icon"></span>
                                                            <span
                                                                class="dropify-filename-inner">186862528_833839370908382_4250661916783801653_n.jpg</span>
                                                        </p>
                                                        <p class="dropify-infos-message">Drag and drop or click to
                                                            replace
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
