<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập & Đăng Ký</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>


<style>
    /* Đảm bảo rằng body có hình nền */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        height: 100vh;
		background: url("{{ asset('public/frontend/image/icon/cho-golden-an-gi-06.jpg') }}") no-repeat center center fixed;

        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }
    
    /* Lớp phủ mờ cho toàn bộ trang */
    body::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(5px); /* Thêm hiệu ứng mờ */
        z-index: 1;
    }
    
    /* Container chính bao quanh form */
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        z-index: 2;
    }
    
    /* Form đăng nhập và đăng ký */
    .form-container {
        background: rgba(255, 255, 255, 0.8);
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 450px;
        padding: 40px;
        text-align: center;
        position: relative;
        opacity: 0;
        transform: scale(0.95);
        animation: fadeIn 0.5s forwards;
	
    }
    
    /* Tiêu đề của form */
    .form-container h2 {
        color: #333;
        font-size: 24px;
        margin-bottom: 20px;
        position: relative;
        animation: slideDown 0.6s ease-out forwards;
    }
    
    /* Sử dụng Flexbox cho label và input */
    .form-container input:focus {
    box-shadow: 0 0 8px rgba(0, 150, 136, 0.4);
    outline: none;
}
.form-container .form-row {
    position: relative; /* Để canh chỉnh icon */
margin-bottom: 15px;
width: 100%;
}

/* Style input */
.form-container input {
    width: 100%;
    padding: 12px 40px 12px 12px; /* Chừa khoảng cho icon */
   
    border: 1px solid #ccc;
    border-radius: 25px; /* Bo tròn */
    font-size: 14px;
    color: #333;
    transition: box-shadow 0.3s ease;
}



/* Icon bên trong input */
.form-container .form-row i {
    position: absolute;
    top: 50%;
    right: 12px;
    transform: translateY(-50%);
    font-size: 18px;
    color: #888;
}
    
    /* Căn chỉnh label và input */
    .form-container label {
        color: #333;
        font-size: 16px;
        margin-bottom: 5px;
    }
    
    .form-container input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 30px;
        font-size: 14px;
        color: #333;
        margin-bottom: 10px;
        transition: box-shadow 0.3s ease;
    }
    
    .form-container input:focus {
        box-shadow: 0 0 8px rgba(0, 150, 136, 0.4);
        outline: none;
    }
    
    /* Nút đăng nhập */
    .form-container button {
        width: 100%;
        padding: 12px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s;
        font-weight: bold;
    }
    
    .form-container button:hover {
        background-color: #45a049;
        transform: translateY(-2px);
    }
    
    /* Các liên kết đăng ký, đăng nhập */
    .form-container p {
        color: #333;
    }
    
    .form-container a {
        /* color: #00bcd4; */
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s;
    }
    
  
    
    /* Hiệu ứng mờ và phóng to cho form */
    @keyframes fadeIn {
        to {
            opacity: 1;
            transform: scale(1);
        }
    }
    
    @keyframes slideDown {
        0% {
            opacity: 0;
            transform: translateY(-10px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .home-link {
    position: fixed;
    top: 20px;
    left: 20px;
    font-size: 18px;
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    padding: 8px 16px;
    background-color: #4CAF50;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    transition: background-color 0.3s, transform 0.3s;
    z-index: 3; /* Đảm bảo nó nằm trên các phần tử khác */
}

/* Hiệu ứng khi di chuột qua */
.home-link:hover {
    background-color: #45a049;
    transform: translateY(-3px); /* Tạo hiệu ứng nổi lên */
}

/* Nhớ tài khoản và quên mật khẩu */
.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 10px;
    margin-bottom: 20px;
}

.remember-me {
    display: flex;
    align-items: center; /* Căn giữa theo chiều ngang với checkbox */
    font-size: 14px;
    color: #333;
}

.remember-me input {
    margin-right: 8px; /* Khoảng cách giữa checkbox và chữ */
}
.forgot-password {
    color: #5a5c5c;
    text-decoration: none;
    font-size: 14px;
    transition: color 0.3s;
    margin-left: 325px;

}



/* Nút đăng nhập */
.login-button {
    width: 100%;
    padding: 12px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s;
}

.login-button:hover {
    background-color: #45a049;
    transform: translateY(-2px);
}

/* Đăng nhập bằng mạng xã hội */
.social-login {
    display: flex;
    justify-content: space-around;
    margin-top: 20px;
}

.social-button {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    width: 100%;
    max-width: 120px;
    color: white;
    font-size: 14px;
    border-radius: 4px;
    text-decoration: none;
    transition: background-color 0.3s, transform 0.2s;
}

.social-button i {
    margin-right: 8px;
}

/* Màu sắc và hiệu ứng cho từng mạng xã hội */
.facebook {
    background-color: #3b5998;
    text-decoration: none;
}

.facebook:hover {
    background-color: #2d4373;
    transform: translateY(-2px);
    text-decoration: none;
}

.google {
    background-color: #dd4b39;
    text-decoration: none;
}

.google:hover {
    background-color: #c23321;
    transform: translateY(-2px);
    text-decoration: none;
}

.twitter {
    background-color: #1da1f2;
}

.twitter:hover {
    background-color: #0a85d9;
    transform: translateY(-2px);
    text-decoration: none;
}

    </style>
<body>
    <a href="{{URL::to('/Hien-thi-gio-hang')}}" class="home-link">Home</a>
    <div class="container">
        <div class="form-container">
            <!-- Form Đăng Nhập -->
            <div class="form-content" id="loginForm">
                <h2>ĐĂNG NHẬP</h2>
                <form action="{{URL::to('/login-customer')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-row">
                        <i class="fa fa-user"></i> <!-- Icon user -->
                        <input type="text" id="username" name="username_account" placeholder="Tên đăng nhập" required>
                    </div>
                    
                    <div class="form-row">
                        <i class="fa fa-lock"></i> <!-- Icon lock -->
                        <input type="password" id="password" name="password_account" placeholder="Mật khẩu" required>
                    </div>
                    
                    <button type="submit">Đăng Nhập</button>
                    </form>
                    <div class="form-options">
                     
                        <a href="#" class="forgot-password">Quên mật khẩu?</a>
                    </div>
                    
                    <!-- <button type="submit" class="login-button">Đăng Nhập</button> -->
                    
                    <p>Hoặc đăng nhập bằng:</p>
                    <div class="social-login">
                        <a href="#" class="social-button facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
                        <a href="#" class="social-button google"><i class="fab fa-google"></i> Google</a>
                        <a href="#" class="social-button twitter"><i class="fab fa-twitter"></i> Twitter</a>
                    </div>
                    
              
                <p>Chưa có tài khoản? <a href="#" id="showRegister">Đăng ký ngay</a></p>
            </div>
        
            <!-- Form Đăng Ký -->
            <div class="form-content" id="registerForm" style="display:none;">
                <h2>ĐĂNG KÝ</h2>
                <form action="{{URL::to('/them-khach-hang')}}" method="POST">
                    {{csrf_field()}}
                <div class="form-row">
                        <i class="fa fa-user"></i> <!-- Icon user -->
                        <input type="text" id="newUsername" name="customer_name" placeholder="Họ và tên" required>
                    </div>

                    <div class="form-row">
                        <i class="fa fa-envelope"></i> <!-- Icon envelope -->
                        <input type="email" id="email" name="customer_email" placeholder="Email" required>
                    </div>
                    <div class="form-row">
                        <i class="fa fa-user"></i> <!-- Icon user -->
                        <input type="text" id="newUsername" name="customer_name_login" placeholder="Tên đăng nhập" required>
                    </div>
        
                   
        
                    <div class="form-row">
                        <i class="fa fa-phone"></i> <!-- Icon lock -->
                        <input type="text" id="newPassword" name="customer_phone" placeholder="Số điện thoại" required>
                    </div>
                    
                    <div class="form-row">
                        <i class="fa fa-lock"></i> <!-- Icon lock -->
                        <input type="password" id="confirmPassword" name="customer_password" placeholder="Mật khẩu" required>
                    </div>
        
                    <button type="submit">Đăng Ký</button>
                </form>
                <p>Đã có tài khoản? <a href="#" id="showLogin">Đăng nhập</a></p>

                
            </div>
        </div>
        
    </div>
    
<script>
    // JavaScript để chuyển đổi giữa form đăng nhập và đăng ký
    document.getElementById('showRegister').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('loginForm').style.display = 'none';
        document.getElementById('registerForm').style.display = 'block';
    });

    document.getElementById('showLogin').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('registerForm').style.display = 'none';
        document.getElementById('loginForm').style.display = 'block';
    });
</script>

</body>
</html>
