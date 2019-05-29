<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laraning Wave - the admin system to manage videos.">
    <meta name="author" content="Bruno Falcão">
    <meta name="keyword" content="Laraning,Laravel,Tutorials,PHP">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="/assets/wave/images/favicon.png">
    <title>Laraning Wave</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.9.0/css/flag-icon.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/wave/css/wave.css" rel="stylesheet">

    {{-- Load social tags in case they exist --}}
    @isset($model)
        @if(optional($model->socialtags->first())->fb_og_title != null)
            {{-- Fire up all the Facebook social tags --}}
            <meta property="og:title" content="{{ $model->socialtags->first()->fb_og_title }}">
            <meta property="og:description" content="{{ $model->socialtags->first()->fb_og_description }}">
            <meta property="og:type" content="{{ $model->socialtags->first()->fb_og_type }}">
            <meta property="og:image" content="{{ $model->socialtags->first()->fb_og_image }}">
            <meta property="og:url" content="{{ $model->socialtags->first()->fb_og_url }}">
        @endif
        @if(optional($model->socialtags->first())->twitter_card != null)
            {{-- Fire up all the Twitter social tags --}}
            <meta name="twitter:card" content="{{ $model->socialtags->first()->twitter_card }}" />
            <meta name="twitter:site" content="{{ $model->socialtags->first()->twitter_site }}" />
            <meta name="twitter:title" content="{{ $model->socialtags->first()->twitter_title }}" />
            <meta name="twitter:description" content="{{ $model->socialtags->first()->twitter_description }}" />
            <meta name="twitter:image" content="{{ $model->socialtags->first()->twitter_image }}" />
        @endif
    @endisset
    @stack('css.additional')
</head>