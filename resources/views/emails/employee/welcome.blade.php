<x-mail::message>
  # Welcome
  Our Value Team Member / {{ $details['userName'] }}
  You can login to our system using <br />
  your email:{{ $details['mail'] }} <br />
  The Temporary Password: {{ $details['pass'] }}

  <x-mail::button :url="'https://jmcleaningserv.net/login'">
    Login Now
  </x-mail::button>

  Thanks,<br>
  JM-Cleaning Team
</x-mail::message>