<x-mail::message>
<strong> From:</strong> {{$name}} <{{$email}}>
<br>
<strong> Subject:</strong> {{$subject}}
<br><br>
{{$message}}
<br><br>
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
