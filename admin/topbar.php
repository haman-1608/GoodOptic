
<div class="action">
    <div class="profile" onclick="menuToggle();">
        <img src="./icons/profile/profile-pic.png" />
    </div>
    <div class="menu">
        <span>
          <?php
          $user = $_SESSION['user'];
          // $cart = $_SESSION['cart'];
          echo $user['name'];
          ?>
        </span>
        <ul>
            <li>
                <img src="./icons/profile/user.png" /><a href="#">Thông tin cá nhân</a>
            </li>
            <li>
                <img src="./icons/profile/edit.png" /><a href="#">Sửa thông tin cá nhân</a>
            </li>
            <li>
                <img src="./icons/profile/log-out.png" /><a href="logout.php">Đăng xuất</a>
            </li>
        </ul>
    </div>
</div>
<script>
    function menuToggle() {
        const toggleMenu = document.querySelector(".menu");
        toggleMenu.classList.toggle("active");
    }
</script>