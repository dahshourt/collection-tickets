@include('templates.header')
@include('templates.menu')
<!--begin::Subheader-->
@include('templates.sub_header')
<!--end::Subheader-->

@yield('content')

@include('templates.footer')
