<nav id="sidebar">
  <ul>
    <li>
      <span class="logo">GoodOptic</span>
      <button onclick=toggleSidebar() id="toggle-btn">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
          <path d="m313-480 155 156q11 11 11.5 27.5T468-268q-11 11-28 11t-28-11L228-452q-6-6-8.5-13t-2.5-15q0-8 2.5-15t8.5-13l184-184q11-11 27.5-11.5T468-692q11 11 11 28t-11 28L313-480Zm264 0 155 156q11 11 11.5 27.5T732-268q-11 11-28 11t-28-11L492-452q-6-6-8.5-13t-2.5-15q0-8 2.5-15t8.5-13l184-184q11-11 27.5-11.5T732-692q11 11 11 28t-11 28L577-480Z" />
        </svg>
      </button>
    </li>
    <li class="active">
      <a href="index.php">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
          <path d="M240-200h120v-200q0-17 11.5-28.5T400-440h160q17 0 28.5 11.5T600-400v200h120v-360L480-740 240-560v360Zm-80 0v-360q0-19 8.5-36t23.5-28l240-180q21-16 48-16t48 16l240 180q15 11 23.5 28t8.5 36v360q0 33-23.5 56.5T720-120H560q-17 0-28.5-11.5T520-160v-200h-80v200q0 17-11.5 28.5T400-120H240q-33 0-56.5-23.5T160-200Zm320-270Z" />
        </svg>
        <span>Trang chủ</span>
      </a>
    </li>
    <li>
      <button onclick=toggleSubMenu(this) class="dropdown-btn">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
          <path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h207q16 0 30.5 6t25.5 17l57 57h320q33 0 56.5 23.5T880-640v400q0 33-23.5 56.5T800-160H160Zm0-80h640v-400H447l-80-80H160v480Zm0 0v-480 480Zm400-160v40q0 17 11.5 28.5T600-320q17 0 28.5-11.5T640-360v-40h40q17 0 28.5-11.5T720-440q0-17-11.5-28.5T680-480h-40v-40q0-17-11.5-28.5T600-560q-17 0-28.5 11.5T560-520v40h-40q-17 0-28.5 11.5T480-440q0 17 11.5 28.5T520-400h40Z" />
        </svg>
        <span>Phân loại</span>
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
          <path d="M480-361q-8 0-15-2.5t-13-8.5L268-556q-11-11-11-28t11-28q11-11 28-11t28 11l156 156 156-156q11-11 28-11t28 11q11 11 11 28t-11 28L508-372q-6 6-13 8.5t-15 2.5Z" />
        </svg>
      </button>
      <ul class="sub-menu">
        <div>
          <li><a href="viewCategories.php">Loại sản phẩm</a></li>
          <li><a href="viewMaterial.php">Chất liệu</a></li>
          <li><a href="viewBrand.php">Thương hiệu</a></li>
          <li><a href="viewTarget.php">Đối tượng</a></li>
          <li><a href="viewRefractive.php">Khúc xạ</a></li>
          <li><a href="viewUV.php">Độ chống UV</a></li>
        </div>
      </ul>
    </li>
    <li>
      <a href="viewAllOrders.php">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
          <path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z" />
        </svg>
        <span>Đơn hàng</span>
      </a>
    </li>
    <li>
      <a href="viewAllProducts.php">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
          <path d="M218-320q-42 0-75.5-27T100-416L71-550l-44 3-7-80q78-7 133.5-10t99.5-3q65 0 105 6t72 21q14 7 26.5 10t23.5 3q11 0 21.5-3t24.5-9q33-15 76-21.5t114-6.5q46 0 102 3t122 9l-7 79-43-3-30 137q-9 42-42 68.5T743-320h-89q-42 0-74-25.5T538-411l-27-107h-61l-27 107q-11 41-43 66t-73 25h-89Zm-40-112q3 14 14 23t25 9h89q14 0 25-8.5t14-21.5l31-121q-27-5-61-6.5t-62-1.5q-23 0-49.5.5T154-556l24 124Zm437 2q3 13 14 21.5t25 8.5h89q14 0 25-9t14-23l26-125q-20-1-46-1.5t-46-.5q-30 0-66.5 1.5T584-551l31 121Z" />
        </svg>
        <span>Sản phẩm</span>
      </a>
    </li>
    <li>
      <a href="viewCustomers.php">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
          <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-240v-32q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v32q0 33-23.5 56.5T720-160H240q-33 0-56.5-23.5T160-240Zm80 0h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
        </svg>
        <span>Khách hàng</span>
      </a>
    </li>
    <li>
      <a href="login.php">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF">
          <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
        </svg>
        <span>Đăng xuất</span>
      </a>
    </li>
  </ul>
</nav>