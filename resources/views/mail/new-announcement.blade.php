<x-mail::message>
# Announcement

## {{ $announcement->title }}

{{ $announcement->content }}

 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>