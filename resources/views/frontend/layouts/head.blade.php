<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>{{get_setting('title')}}</title>
<meta name="description" content="{{get_setting('meta_description')}}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="{{get_setting('meta_keywords')}}">
<!-- Favicon -->
<link rel="shortcut icon" href="{{asset(get_setting('favicon'))}}" />
<!-- Plugins CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/plugins.css')}}">
<!-- Bootstap CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
<!-- Main Style CSS -->
<link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@yield('styles')