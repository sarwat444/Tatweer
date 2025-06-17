<div class="gradient-border radius-22 page-static-sidebar  ">
    <div class="ps-box ps-sidebar">
        <div class="hero-details position-relative pt-3 pb-4 mt-0">
            <img class="radius-10" src="{{ get_image($course_details->banner) }}" alt="...">
            <div class="overly-icon" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <a href="javascript:;" class="hero-popup"><i class="fa-solid fa-play"></i></a>
            </div>
        </div>

        @if ($course_details->is_best)
            <span class="d-inline-flex justify-content-center trophy-text w-100 px-2 py-1">
                <img src="{{ asset('assets/frontend/default/image/best-seller.svg') }}" alt="best-seller-icon">{{ get_phrase('Top course') }}</span>
        @endif

        <ul class="ps-side-feature mt-2">
           
           
            <li class="d-flex justify-content-between align-items-center py-3 mb-0">
                <span>
                    <img src="{{ asset('assets/frontend/default/image/time.png') }}" alt="...">
                    <p>{{ get_phrase('Duration') }}</p>
                </span>
                {{ total_durations($course_details->id) }}
            </li>
         
          
            
         
        </ul>

        @php
            if (isset($user_data['unique_identifier'])):
                $ref = $user_data['unique_identifier'];
            else:
                $ref = '';
            endif;
            $share_url = route('course.details', $course_details->slug);
        @endphp
        {{-- <div class="w-100 px-4 pb-2 text-center mt-3">
            <span>{{ get_phrase('Share') }} :</span>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $share_url }}&ref={{ $ref }}" target="_blank" class="p-2 mx-2 color-facebook" data-bs-toggle="tooltip" title="{{ get_phrase('Share on Facebook') }}" data-bs-placement="top">
                <i class="fab fa-facebook text-20"></i>
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ $share_url }}&text={{ $course_details['title'] }}&ref={{ $ref }}" target="_blank" class="p-2 mx-2 color-twitter" data-bs-toggle="tooltip" title="{{ get_phrase('Share on Twitter') }}" data-bs-placement="top">
                <i class="fab fa-twitter text-20"></i>
            </a>
            <a href="https://api.whatsapp.com/send?text={{ $share_url }}&ref={{ $ref }}" target="_blank" class="p-2 mx-2 color-whatsapp" data-bs-toggle="tooltip" title="{{ get_phrase('Share on Whatsapp') }}" data-bs-placement="top">
                <i class="fab fa-whatsapp text-20"></i>
            </a>
            <a href="https://www.linkedin.com/shareArticle?url={{ $share_url }}&title={{ $course_details['title'] }}&summary={{ $course_details['short_description'] }}&ref={{ $ref }}" target="_blank" class="p-2 mx-2 color-linkedin" data-bs-toggle="tooltip" title="{{ get_phrase('Share on Linkedin') }}" data-bs-placement="top">
                <i class="fab fa-linkedin text-20"></i>
            </a>
        </div> --}}
    </div>
</div>

<script>
    'use strict';

    function wishlistToggleButton(course_id, elem) {
        $.ajax({
            type: "get",
            url: "{{ route('toggleWishItem') }}" + '/' + course_id,
            success: function(response) {
                if (response) {
                    if (response.toggleStatus == 'added') {
                        $(elem).removeClass('learn-btn');
                        $(elem).addClass('gradient');
                        $(elem).html('{{ get_phrase('Remove from wishlist') }}');
                    } else if (response.toggleStatus == 'removed') {
                        $(elem).removeClass('gradient');
                        $(elem).addClass('learn-btn');
                        $(elem).html('{{ get_phrase('Add to wishlist') }}');
                    }
                }
            }
        });
    }
</script>

@include('frontend.default.scripts')
