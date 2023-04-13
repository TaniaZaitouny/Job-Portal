<x-mail::message>
# New Job Posted

A new job that matches your search criteria has been posted!

<x-mail::button :url="$url">
View Job
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
