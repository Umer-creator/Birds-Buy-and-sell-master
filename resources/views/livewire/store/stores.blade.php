  <section>
      <div class="products mb-3 ">
          <div class="row justify-content-center">
              {{-- start bird --}}
              @foreach ($stores as $store)
                  {{-- col-6 col-md-4 col-lg-4 col-xl-3 --}}
                  <div class=" col-4 col-md-3 col-lg-3 col-sm-3 shadow m-5">
                      <div class="product
                      product-7 text-center">
                          <figure class="product-media m-4">
                              {{-- <span class="product-label label-new">New</span> --}}
                              <a href="">
                                  {{-- src="{{ asset('frontend/assets/gallery/product-4.jpg') }} --}}

                                  {{-- style=" height: 289px; width:289px" --}}
                                  <img class="rounded-lg" src="{{ asset($store->image) }}" alt="birds image"
                                      style="height:250px;width:300px" class="product-image img-fluid">
                              </a>
                              <div class="product-action">
                                  <a href="{{ route('frontend.storeDetail', ['slug' => $store->slug]) }}"
                                      class="btn-product btn-cart"><span>View
                                          Store</span></a>
                              </div><!-- End  store action -->
                          </figure><!-- End  store media -->

                          <div class="product-body">
                              <div class="product-cat">
                                  <a href="#">Store</a>
                              </div><!-- End  store cat -->
                              <h3 class="product-title"><a href="product.html">{{ $store->name }}</a>
                              </h3><!-- End  store title -->
                          </div><!-- End  store body -->
                      </div><!-- End .product -->

                  </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
              @endforeach

              {{-- end bird --}}
          </div><!-- End .row -->
          {{-- <!-- Start Pagination --> --}}
          <section>
              <nav aria-label="Page navigation">
                  <ul class="pagination justify-content-center">
                      <style>
                          .pl-4,
                          .px-4 {
                              padding-left: 1.5em Important
                          }

                          .pb-2,
                          .py-2 {
                              padding-bottom: :.5em Important
                          }

                          .pt-2,
                          .py-2 {
                              padding-top: .5em Important
                          }

                          .bg-white {
                              background-color: #fff Important
                          }

                          .border {
                              border: :1px solid #dee2e6 Important
                          }

                          nav svg {
                              height: 20px
                          }

                          svg {
                              overflow: hidden;
                              vertical-align: :middle
                          }

                          .wrap-pagination-info .hidden {
                              display: block Important
                          }

                          .wrap-pagination-info .rounded-I-md {
                              margin-right: 5px
                          }

                          .wrap-pagination-info .rounded-r-md {
                              margin-left: 5px;
                              background-color: #fff Important
                          }
                      </style>
                      {{ $stores->links() }}
                  </ul>
              </nav>
          </section>
          {{-- <!-- End Pagination --> --}}
      </div><!-- End products grid  -->
  </section>
