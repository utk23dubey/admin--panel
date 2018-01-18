<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("main-menu");
var btns = header.getElementsByClassName("fa fa-table");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu"> 

                    <li>
                        <a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="user_details.php"><i class="fa fa-user"></i>User Master</a>
                    </li>
                     <li>
                         <a href="enquiry_create.php"><i class="fa fa-table"></i>Add Enquiry</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table"></i>Categories<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="category_create.php">Add Category</a>
                            </li>
                            <li>
                                <a href="category_details.php">Show Categories</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table"></i>Products<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="product_create.php">Add Products</a>
                            </li>
                            <li>
                                <a href="product_details.php">Show Products</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <li>
                        <a href="#"><i class="fa fa-table"></i>Enquiry<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="enquiry_details.php">Show Enquires</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="followup_details.php"><i class="fa fa-fw fa-file"></i>Follow_Ups</a>
                    </li>
                        </ul>
                    </li>
                </ul>
               </li> 

                </ul>

                  
            </div>

        </nav>