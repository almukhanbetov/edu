@extends('layouts.app')

@section('content')

<div id="meet" style="height:90vh;"></div>

<script src="https://meet.jit.si/external_api.js"></script>

<script>
    const roomName = "compnet_lesson_{{ $lessonId }}"; 
    const userName = "{{ $username }}";

    const api = new JitsiMeetExternalAPI("meet.jit.si", {
        roomName: roomName,
        parentNode: document.querySelector('#meet'),
        width: "100%",
        height: "100%",
        userInfo: { displayName: userName },

        configOverwrite: {
            disableDeepLinking: true,
        },

        interfaceConfigOverwrite: {
            SHOW_JITSI_WATERMARK: false,
            SHOW_BRAND_WATERMARK: false,
            SHOW_POWERED_BY: false,
            HIDE_DEEP_LINKING_LOGO: true
        }
    });

    api.addEventListener('videoConferenceJoined', () => {
        api.executeCommand('password', '12345'); // тот же пароль 👈
    });
</script>

@endsection
