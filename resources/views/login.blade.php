@extends('layouts.app')

@section('title', 'Login POS')

@section('content')
<style>
body{ background: linear-gradient(135deg,#4f46e5,#06b6d4); min-height:100vh; overflow:hidden; }


.login-card{
    background: rgba(255,255,255,.95);
    backdrop-filter: blur(10px);
    border:none;
    border-radius:20px;
    box-shadow:0 15px 35px rgba(0,0,0,.2);
    animation:fade .6s ease;
}

@keyframes fade{
    from{
        opacity:0;
        transform:translateY(20px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

.login-title{
    font-weight:700;
    color:#1e293b;
}

.login-subtitle{
    color:#64748b;
    font-size:14px;
}

.form-control{
    height:50px;
    border-radius:12px;
    border:1px solid #dbeafe;
}

.form-control:focus{
    box-shadow:none;
    border-color:#2563eb;
}

.input-group-text{
    border-radius:12px 0 0 12px;
    background:#f8fafc;
}

.btn-login{
    height:50px;
    border-radius:12px;
    font-weight:600;
    transition:.3s;
}

.btn-login:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 20px rgba(37,99,235,.3);
}

.logo{
    width:70px;
    height:70px;
    border-radius:50%;
    background:#2563eb;
    color:white;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:30px;
    margin:auto;
}
</style>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-5 col-lg-4">

            <div class="card login-card">

                <div class="card-body p-5">

                    <div class="text-center mb-4">

                        <div class="logo mb-3">
                            <i class="bi bi-shop"></i>
                        </div>

                        <h3 class="login-title">
                            POS Zamzam
                        </h3>

                        <p class="login-subtitle">
                            Silakan login untuk melanjutkan
                        </p>

                    </div>

                    <form action="{{ route('auth') }}" method="POST">
                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Masukkan Email"
                                    value="{{ old('email') }}"
                                >
                            </div>

                            @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Password
                            </label>

                            <div class="input-group">

                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Masukkan Password"
                                >

                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="bi bi-eye"></i>
                                </button>

                            </div>

                            @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>

                        <div class="d-grid">

                            <button class="btn btn-primary btn-login">
                                Login
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>
</div>

<script>
const toggle = document.getElementById('togglePassword');
const password = document.getElementById('password');

toggle.addEventListener('click',function(){

    const type = password.getAttribute('type') === 'password'
        ? 'text'
        : 'password';

    password.setAttribute('type',type);

    this.innerHTML = type === 'password'
        ? '<i class="bi bi-eye"></i>'
        : '<i class="bi bi-eye-slash"></i>';
});
</script>

@endsection