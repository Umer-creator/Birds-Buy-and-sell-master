 <div class="dropdown category-dropdown">
     <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
         aria-expanded="false" data-display="static" title="Browse Categories">
         Browse Categories <i class="icon-angle-down"></i>
     </a>
     <div>
     </div>
     <!-- start category dropdown-menu -->
     <div class="dropdown-menu">
         <nav class="side-nav">
             <ul class="menu-vertical sf-arrows">
                 @foreach ($categories as $category)
                     <li class="item-lead"><a
                             href="{{ route('frontend.view-category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                     </li>
                 @endforeach
             </ul><!-- End .menu-vertical -->
         </nav><!-- End .side-nav -->
     </div><!-- End .dropdown-menu -->
 </div>
