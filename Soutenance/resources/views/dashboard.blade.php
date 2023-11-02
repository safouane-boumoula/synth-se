<x-app-layout>
@extends('layout')
@section('content')
<style>
.welcome-animation {
    animation-name: welcome;
    animation-duration: 2s;
    animation-delay: 1s;
    animation-fill-mode: forwards;
}
@keyframes welcome {
0% {
opacity: 0;
transform: translateY(-100px) rotate(0deg);
}
50% {
opacity: 1;
transform: translateY(0) rotate(360deg);
}
100% {
opacity: 1;
transform: translateY(0) rotate(720deg);
}
}

@keyframes pulse {
0% {
transform: scale(1);
}
50% {
transform: scale(1.2);
}
100% {
transform: scale(1);
}
}
</style>

<div class="welcome-animation">
    <table border="0" style="width: 800px; margin:50px;">
        <tr>
            <td>
                <img src="img/student.png" width="175" height="175" style="animation: welcome 4s infinite, pulse 2s infinite;">
            </td>
            <td>
                <img src="img/teacher.jpg" width="175" height="175" style="animation: welcome 4s infinite reverse, pulse 2s infinite;">
            </td>
        </tr>
    </table>
</div>
@endsection
</x-app-layout>