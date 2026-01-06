@extends('layouts.dashboard')

@section('content')
    <div class="bg-slate-800/70 border border-slate-700 rounded-2xl p-6">

        <div class="text-white text-xl font-bold mb-3">
            {{ $room->title }}
        </div>

        <div id="meet" class="rounded-2xl overflow-hidden" style="height:80vh"></div>

    </div>

    <script src="https://meet.jit.si/external_api.js"></script>

    <script>
        const api = new JitsiMeetExternalAPI("meet.jit.si", {
            roomName: "{{ $room->room_name }}",
            parentNode: document.querySelector('#meet'),
            interfaceConfigOverwrite: {
                SHOW_JITSI_WATERMARK: true,
                BRAND_WATERMARK_LINK: 'https://compnet.kz',
                BRAND_WATERMARK_IMAGE: 'https://compnet.kz/logo.png'

            },
            userInfo: {
                displayName: "{{ auth()->user()->name }}"
            }
        });

        // учитель — главный
        @if (auth()->user()->role === 'teacher')
            api.addEventListener('videoConferenceJoined', () => {
                api.executeCommand('muteEveryone');
            });
        @endif
    </script>
@endsection
