<div class="reviews">
    <style>

    </style>
    <div class="rating-container">
        <h3>Reviews ({{ $reviews->count() }})
        </h3>

    </div>
    @auth
        @if (Auth::user()->utype == 'user')
            @if (!$userHasSubmittedReview)
                <div class="review">
                    <!-- form code goes here -->
                    <div class="review">
                        <form wire:submit.prevent="submitReview">
                            <div class="form-group">
                                <label for="rating">Rating:</label>
                                <div class="rating-container">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="fa-stack" style="width:1em">
                                            <i class="far fa-star fa-stack-1x"></i>
                                            @if ($i <= $rating)
                                                <i class="fas fa-star fa-stack-1x" style="color: #FFC107;"></i>
                                            @endif
                                        </span>
                                        <input type="radio" name="rating" wire:model="rating" value="{{ $i }}"
                                            {{ $rating == $i ? 'checked' : '' }}>
                                    @endfor
                                </div>

                                @error('rating')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="reviewMessage">Message:</label>
                                <textarea id="reviewMessage" wire:model="reviewMessage" class="form-control"></textarea>
                                @error('reviewMessage')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Review</button>
                        </form>
                    </div>
                </div>
            @endif

        @endif
    @endauth


    @if ($reviews->count())
        @foreach ($reviews as $review)
            <div class="review">
                <div class="row no-gutters">
                    <div class="col-auto">
                        <h4><a href="#">{{ $review->user->name }}</a></h4>
                        <div class="ratings-container">

                            <div class="rating-container">
                                @php
                                    $rating = $review->rating;
                                @endphp
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="fa-stack" style="width:1em">
                                        <i class="far fa-star fa-stack-1x"></i>
                                        @if ($i <= $rating)
                                            <i class="fas fa-star fa-stack-1x" style="color: #FFC107;"></i>
                                        @endif
                                    </span>
                                @endfor

                            </div>
                            {{-- <div class="ratings">
                                 <div class="ratings-val" style="width: 80%;"></div>
                                 <!-- End .ratings-val -->
                             </div><!-- End .ratings --> --}}
                        </div><!-- End .rating-container -->
                        <span class="review-date">{{ $review->created_at->diffForHumans() }}</span>
                    </div><!-- End .col -->
                    <div class="col">

                        <div class="review-content">
                            <p>{{ $review->review_message }}
                            </p>
                        </div><!-- End .review-content -->

                    </div><!-- End .col-auto -->
                </div><!-- End .row -->
            </div><!-- End .reviews -->
        @endforeach
    @endif
    <script>
        window.addEventListener('success', event => {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Thanks for your review',
                showConfirmButton: false,
                timer: 700
            })
        })
    </script>
