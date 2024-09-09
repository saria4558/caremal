@extends('layouts/aplikasi')

@section('konten')
    <div class="daftarview">
        <form action="daftar" method="post" enctype="multipart/form-data">
        @csrf
            <h1>Daftar</h1>
            <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="nama_lengkap" placeholder="FullName" required>
            </div>
            <div class="input-box">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-box">
                <i class="fas fa-phone"></i>
                <input type="tel" name="telepon" placeholder="PhoneNumber" required>
            </div>
            {{-- <div class="input-box">
                <i class="fas fa-calendar"></i>
                <input type="date" name="tanggal_lahir" placeholder="BirthDate" required>
            </div> --}}
            <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="ConfirmPassword" required>
            </div>
            <!-- <a href="/sesi/masuk"> -->
                <button type="submit" class="btn">Register</button>
            <!-- </a> -->
            <div class="register-link">
                <p>Already have an account? <a href="/sesi">Login</a></p>
            </div>
        </form>
    </div>

<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");
*
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    /* background: url('/imageStock/sapi.jpg'); */
    background-color: rgb(50, 205, 205);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}

.wrapper {
    width: 420px;
    background: rgba(0, 0, 0, 0.189);
    border: 2px solid rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    color: aliceblue;
    border-radius: 10px;
    padding: 30px 40px;
}

.wrapper h1 {
    font-size: 36px;
    text-align: center;
}

.wrapper .input-box {
    position: relative;
    width: 100%;
    height: 50px;
    margin: 30px 0;
}

.input-box input {
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid rgba(255, 255, 255, 0.2);
    border-radius: 40px;
    font-size: 16px;
    color: aliceblue;
    padding: 20px 45px 20px 45px;
}

.input-box input::placeholder {
    color: aliceblue;
}

.input-box i {
    position: absolute;
    left: 20px; 
    top: 50%;
    transform: translateY(-50%);
}

.wrapper .remember-forgot {
    display: flex;
    justify-content: space-between;
    font-size: 14.5px;
    margin: -15px 0 15px;
}

.remember-forgot label input {
    accent-color: aliceblue;
    margin-right: 3px;
}

.remember-forgot a {
    color: aliceblue;
    text-decoration: none;
}

.wrapper .btn {
    width: 100%;
    height: 45px;
    background: aliceblue;
    border: none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    font-size: 16px;
    color: black;
    font-weight: 600;
}

.wrapper .register-link {
    font-size: 14.5px;
    text-align: center;
    margin: 20px 0 15px;
}

.register-link p a {
    color: aliceblue;
    text-decoration: none;
    font-weight: 600;
}

.register-link p a:hover {
    text-decoration: underline;
}

.register-form {
    display: none;
}

.wrapper .register-link a.active {
    color: aliceblue;
    text-decoration: none;
    font-weight: 600;
}

.wrapper .register-link a.active:hover {
    text-decoration: underline;
}
</style>
@endsection