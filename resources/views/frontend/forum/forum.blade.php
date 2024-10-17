@extends('layouts.front')
<link rel="stylesheet" type="text/css" href=" {{ asset('assets/css/vendors.css') }}" />
<link href=" {{ asset('assets/css/style2.css') }}" rel="stylesheet" type="text/css" />

@section('front')
    <!-- begin app -->
    {{-- <livewire:forum.add-view-discussions /> --}}
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-12">
                <div class="card card-statistics mail-contant">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-md-2 col-xxl-2 col-md-2">
                                <section>
                                    <div class="mail-sidebar">
                                        <div class="row justify-content-center">
                                            <div class="col-12">
                                                @if (Auth::user())
                                                    <div class="text-center mail-sidebar-title px-4"> @auth
                                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                                data-target="#exampleModal" data-whatever="@mdo">Add
                                                                Discussion</button>
                                                        </div>
                                                    @endif
                                                @endauth
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                @auth
                                                                    @if (Auth::user())
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" id="tab-2-tab" data-toggle="tab"
                                                                                href="#tab-2" role="tab"
                                                                                aria-controls="tab-2" aria-selected="true">My
                                                                                Discussions</a>
                                                                        </li>
                                                                    @endif

                                                                @endauth


                                                                <h5 class="modal-title" id="exampleModalLabel">Post
                                                                    Discussion</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{ route('frontend.add.discussion') }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="modal-body m-4">

                                                                    <div class="form-group">
                                                                        <label for="recipient-name"
                                                                            class="col-form-label">Title:</label>
                                                                        <input name="title" type="text"
                                                                            class="form-control" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="message-text"
                                                                            class="col-form-label">Description:</label>
                                                                        <textarea name="description" class="form-control" id="description" required></textarea>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Post
                                                                        Discussion</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                discussion forum
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>

                            <div class="col-md-10 col-xxl-4 border-md-t">
                                <section>
                                    <div class="mail-content border-right border-n h-100">
                                        <section>
                                            <div class="mail-search border-bottom">
                                                <div class="row align-items-center mx-0">
                                                    <div class="col-6">
                                                        <div class="form-group pt-2">
                                                            <ul class="nav nav-pills" id="tabs-5" role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active" id="tab-1-tab"
                                                                        data-toggle="tab" href="#tab-1" role="tab"
                                                                        aria-controls="tab-1" aria-selected="true">All</a>
                                                                </li>
                                                                @auth
                                                                    @if (Auth::user())
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" id="tab-2-tab" data-toggle="tab"
                                                                                href="#tab-2" role="tab"
                                                                                aria-controls="tab-2" aria-selected="true">My
                                                                                Discussions</a>
                                                                        </li>
                                                                    @endif

                                                                @endauth



                                                            </ul>
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
                                            </div>
                                        </section>
                                        <section>
                                            <div class="tab-content" id="tab-content-5">
                                                <div class="tab-pane fade active show" id="tab-1" role="tabpanel"
                                                    aria-labelledby="tab-1-tab">
                                                    <div class="mail-msg scrollbar scroll_dark">
                                                        <table class="table" id="myTable">
                                                            @foreach ($discussions as $discussion)
                                                                <tr>
                                                                    <td style="padding-top: 1rem; padding-bottom: 1rem;">
                                                                        <div class="mail-msg-item" id="myTable">
                                                                            <a
                                                                                href="{{ route('frontend.forum.discussions', ['id' => $discussion->id]) }}">
                                                                                <div class="media align-items-center">
                                                                                    <div class="mr-3">
                                                                                        <div class="bg-img">
                                                                                            <img src="{{ asset('assets/img/avtar/01.jpg') }}"
                                                                                                class="img-fluid2"
                                                                                                alt="user">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="w-100">
                                                                                        <div
                                                                                            class="mail-msg-item-titel justify-content-between">
                                                                                            <p>{{ $discussion->user->name }}
                                                                                            </p>
                                                                                            <p class="d-none d-xl-block">
                                                                                                {{ $discussion->created_at->diffForHumans() }}
                                                                                            </p>
                                                                                        </div>
                                                                                        <h5 class="headingC mb-0 my-2">
                                                                                            {{ $discussion->title }}
                                                                                        </h5>
                                                                                        <p>{{ $discussion->description }}
                                                                                        </p>

                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach


                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab-2" role="tabpanel"
                                                    aria-labelledby="tab-2-tab">
                                                    <div class="mail-msg scrollbar scroll_dark">
                                                        <table class="table" id="myTable">
                                                            @foreach ($currentUserDiscussions as $discussion)
                                                                <tr>
                                                                    <td style="padding-top: 1rem; padding-bottom: 1rem;">
                                                                        <div class="mail-msg-item" id="myTable">
                                                                            <a
                                                                                href="{{ route('frontend.forum.discussions', ['id' => $discussion->id]) }}">
                                                                                <div class="media align-items-center">
                                                                                    <div class="mr-3">
                                                                                        <div class="bg-img">
                                                                                            <img src="{{ asset('assets/img/avtar/01.jpg') }}"
                                                                                                class="img-fluid2"
                                                                                                alt="user">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="w-100">
                                                                                        <div
                                                                                            class="mail-msg-item-titel justify-content-between">
                                                                                            <p>{{ $discussion->user->name }}
                                                                                            </p>
                                                                                            <p class="d-none d-xl-block">
                                                                                                {{ $discussion->created_at->diffForHumans() }}
                                                                                            </p>
                                                                                        </div>
                                                                                        <h5 class="headingC mb-0 my-2">
                                                                                            {{ $discussion->title }}
                                                                                        </h5>
                                                                                        <p>{{ $discussion->description }}
                                                                                        </p>

                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
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
