<div class="sidebar">
    <div class="row mb-4">
        <div class="col-6">
            <span class="d-inline-block py-1">{{get_phrase('Filter')}}</span>
        </div>
        <div class="col-6 text-end">
            @if(count(request()->all()) > 0 || !empty($category_details))
            <a class="btn d-flex align-items-center float-end border py-2" href="{{route('courses')}}"><i class="fi-rr-cross-circle me-2"></i> <span>{{get_phrase('Clear')}} @if(isset($_GET) && count($_GET) > 0)({{count($_GET)}})@endif</span></a>
            @endif
        </div>
    </div>
    <form class="mb-4" action="{{ route('courses') }}" method="get">
        <div class="widget">
            <div class="search">
                <input type="text" class="form-control pe-5" name="search" placeholder="{{ get_phrase('Search...') }}"
                    @if (request()->has('search')) value="{{ request()->input('search') }}" @endif>
                <button type="submit" class="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
    </form>


    <!------------------- categories start ------------------->
    <div class="mb-5"></div>
</div>


@push('js')
    <script>
        "use strict";
        $(document).ready(function() {
            $('#see-more').on('click', function(e) {
                e.preventDefault();
                $(this).toggleClass('active');
                let show_more = $(this).html();

                if ($(this).hasClass('active')) {
                    $(this).css('margin-top', '20px');
                    $(this).text('{{ get_phrase('Show Less') }}');
                } else {
                    $(this).css('margin-top', '0px');
                    $(this).html('{{ get_phrase('Show More') }}');
                }
            });

            var scrollTop = $(".scrollTop");
            $(scrollTop).on('click', function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 100);
                return false;
            });

            $('input[type="radio"]').change(function(e) {
                $('#filter-courses').trigger('submit');
            });
        });
    </script>
@endpush
