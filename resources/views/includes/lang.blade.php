<div class="lang">
    @if (LaravelLocalization::getCurrentLocale()=='ar')
        <a rel="alternate" href="{{LaravelLocalization::getLocalizedURL('en')}}">
            English
        </a>
    @else
        <a rel="alternate" href="{{LaravelLocalization::getLocalizedURL('ar')}}">
            عربي
        </a>
    @endif
</div>