@extends('layout')
@yield('title', 'Profile page')
@section('content')
<div class="sidenav">
    <a href="#">Profile</a>
    <a href="{{ route('student.courses') }}">Courses</a>
    <a href="{{ route('logout') }}">Logout</a>
</div>

<div class="container text-center" style="margin-left: 250px; padding: 20px;">
    <div id="userinfo">
    <h2>User information</h2>
    <p>Student ID: {{ $student->id }}</p>
    <p>Email: {{ $student->email }}</p>
    <p>Name: {{ $student->name }}</p>
    <button class="btn btn-profile" onclick="toggleForm('updateNameForm')">Update name</button>
    <button class="btn btn-profile" onclick="toggleForm('updatePasswordForm')">Update password</button>
    </div>

    <form id="updateNameForm" method='POST'id="nameForm" style="display: none;">
        @csrf
        <input type="text" name="name" placeholder="New name">
        <button type="submit" class="btn" onclick="nameSetAction('updateName')">Update name</button>
        <button type="submit" class="btn" onclick="nameSetAction('back')">Back</button>
    </form>

    <form id="updatePasswordForm" method='POST' id="passwordForm" style="display: none;">
        @csrf
        <input type="password" name="password" placeholder="New password">
        <button type="submit" class="btn" onclick="passSetAction('updatePassword')">Update password</button>
        <button type="submit" class="btn" onclick="passSetAction('back')">Back</button>
    </form>
</div>

<script>
    function toggleForm(formId) {
        document.getElementById('userinfo').style.display = 'none';
        document.getElementById(formId).style.display = 'block';
    }

    function nameSetAction(action) {
        const nameForm = document.getElementById('updateNameForm');
        if (action === 'updateName') {
            nameForm.action = "{{ route('update.student.name') }}";
        } else if (action === 'back') {
            nameForm.action = "{{ route('student.profile.post') }}"
        }
        nameForm.submit();
    }

    function passSetAction(action) {
        const passForm = document.getElementById('updatePasswordForm');
        if (action === 'updatePassword') {
            passForm.action = "{{ route('update.student.password') }}";
        } else if (action === 'back') {
            passForm.action = "{{ route('student.profile.post') }}"
        }
        passForm.submit();
    }


</script>
@endsection