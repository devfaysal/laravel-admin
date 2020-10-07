@props(['title' => 'At a Glance'])
<section class="section">
    <div class="row">
        <div class="col col-12 col-sm-12 col-md-12 col-xl-12 stats-col">
            <div class="card stats" data-exclude="xs">
                <div class="card-header card-header-sm bordered">
                    <div class="header-block">
                        <h3 class="title">{{ $title }}</h3>
                    </div>
                </div>
                <div class="card-block">
                    <div class="row row-sm stats-container">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>