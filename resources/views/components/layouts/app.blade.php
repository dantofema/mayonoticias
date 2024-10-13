<!DOCTYPE html>
<html data-theme="winter"
      lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    @vite('resources/css/app.css')
</head>
<body>
<livewire:top-nav
        :company-name="$companyName"
        :company-logo="$companyLogo"
        :nav-links="$navLinks"
        :login-link="$loginLink"
/>

{{ $slot }}

<livewire:footer/>

@vite('resources/js/app.js')

</body>
</html>
