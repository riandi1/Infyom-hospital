{{-- footer block --}}

<div class="container footer-block">
    <div class="row">
        <div class="col-lg-6 footer-followus">
            <span>{{ __('web.footer.follow_us') }}</span>
            <ul class="text-muted footer-links">
                <li><a href="//twitter.com/infyom" target="_blank">{{ __('web.footer.twitter') }}</a></li>
                <li><a href="//www.facebook.com/infyom" target="_blank">{{ __('web.footer.facebook') }}</a></li>
                <li><a href="//in.linkedin.com/company/infyom-technologies"
                       target="_blank">{{ __('web.footer.linkedin') }}</a></li>
                <li><a href="//github.com/InfyOmLabs" target="_blank">{{ __('web.footer.github') }}</a></li>
            </ul>
        </div>
        <div class="col-lg-6">
            <span>{{ __('web.footer.made_with_by_infyOm_technologies') }}</span>
            <p>{{ __('web.footer.we_are_group') }}</p>
        </div>
    </div>
</div>
{{-- end footer block --}}
<div class="footer">
    <span class="footer-links">{{ __('web.footer.copyright') }} &copy {{ date('Y') }} {{ __('web.footer.all_rights_reserved') }} | <a
                href="{{ url('/') }}">{{ config('app.name') }}</a></span>
</div>
<div id="hms-top"><i class="fa fa-angle-double-up"></i></div>
<div style="height: 80px; clear: both;">&nbsp;</div>
@include('cookieConsent::index')
