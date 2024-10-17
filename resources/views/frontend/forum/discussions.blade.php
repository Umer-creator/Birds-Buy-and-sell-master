@extends('layouts.front')
<link rel="stylesheet" type="text/css" href=" {{ asset('assets/css/vendors.css') }}" />
<link href=" {{ asset('assets/css/style2.css') }}" rel="stylesheet" type="text/css" />

@section('front')
    <!-- begin app -->
    <div class="container " style="margin-top: 50px">
        <div class="row">
            <div class="col-12">
                <div class="card card-statistics mail-contant">
                    <div class="card-body p-0">
                        <div class="row no-gutters">

                            <div class="col-md-12  col-xxl-4 border-md-t">
                                {{-- Start Discussion posts --}}
                                <section>
                                    <div class="mail-content  border-right border-n h-100">
                                        {{-- Start searchbar --}}
                                        <section>
                                            <div class="mail-search border-bottom">
                                                <div class="row align-items-center mx-0">

                                                    <div class="col-6">
                                                        <div class="app-chat-msg-title">
                                                            <h6 class="mb-0"><b>{{ $discussions->title }}</b></h6>
                                                            <p class="text-success">
                                                                {{ $discussions->description }}
                                                            </p>
                                                        </div>

                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group pt-2">
                                                            <input type="text" class="form-control" id="myInput"
                                                                placeholder="Search..">
                                                            <i class="fa fa-search"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                @auth
                                                    @if (Auth::user())
                                                        <div class="app-chat-type">
                                                            <form
                                                                action="{{ route('frontend.forum.discussion.add-reply', $discussions->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="input-group mb-0">
                                                                    <div class="input-group-prepend d-none d-sm-flex">
                                                                        <span class="input-group-text">
                                                                            <i class="fa fa-smile-o"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input class="form-control" name="reply"
                                                                        placeholder="Type here..." type="text">
                                                                    <div class="input-group-prepend">
                                                                        <button type="submit" class="btn btn-primary">
                                                                            <i class="fa fa-paper-plane"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    @endif
                                                @endauth
                                            </div>
                                        </section>
                                        {{-- End searchbar --}}

                                        {{-- start post content --}}
                                        <section>
                                            <div class="scrollbar scroll_dark app-chat-msg-chat p-4">

                                                <table id="myTable">

                                                    @foreach ($discussions->replies as $reply)
                                                        @php
                                                            $user = $reply->user;
                                                        @endphp
                                                        <tr>
                                                            <td
                                                                style=" padding-top: 1rem;
                                                            padding-bottom: 1rem;">
                                                                <div class="chat">
                                                                    <div class="chat-img">
                                                                        <a data-placement="left" data-toggle="tooltip"
                                                                            href="javascript:void(0)">
                                                                            <div class="bg-img">
                                                                                <img class="img-fluid"
                                                                                    src=" {{ asset('assets/img/avtar/01.jpg') }}"
                                                                                    alt="user">
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    <div class="chat-msg">
                                                                        <div class="chat-msg-content">
                                                                            <p>{{ $user->name }}</p>

                                                                            <p>{{ $reply->reply }}
                                                                            </p>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                            </div>



                                            </table>


                                    </div>
                                </section>
                                {{-- end post content --}}

                                </section>
                                {{-- End discussion posts --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end app -->
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection

<script src=" {{ asset('assets/js/vendors.js') }}"></script>
<!-- custom app -->
<script src=" {{ asset('assets/js/app.js') }}"></script>
