<?php
require 'connection.php';




?>






<!-- header section starts  -->

<?php
require 'header.php';
?>

<div class="mb-3">
    <label for="searchInput" class="form-label">Search by ID:</label>
    <div class="input-group">
        <input type="text" class="form-control" id="searchInput">
        <button class="btn btn-outline-secondary" type="button" id="searchBtn"><i class="fas fa-search"></i></button>
    </div>
</div>
<!-- product section starts  -->

<section class="product" id="product">

    <h1 class="heading">latest <span>products</span></h1>

    <div class="box-container">
        <?php

        $sql = "SELECT * FROM `products`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="box">

                <span class="discount">-
                    <?= $row['discount']; ?>%
                </span>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>



                <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" alt="User Image" width="200" height="150">' ?>
                <h3>
                    <?= $row['name']; ?>
                </h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <div class="price"> JD
                    <?= $row['price'] - ($row['price'] * $row['discount'] / 100); ?> <span> JD
                        <?= $row['price']; ?>
                    </span>
                </div>
                <div class="quantity">
                    <span>quantity : </span>
                    <input type="number" min="1" max="1000" value="1">
                    <span> /kg </span>
                </div>
                <a href="#" class="btn">add to cart</a>

            </div>
            <?php
            ?>
            <?php
        }
        ?>


    </div>

</section>
<script>
    $(document).ready(function () {
        $("#searchBtn").click(function () {
            var name = $("#searchInput").val();
            $.ajax({
                type: "POST",
                url: "search.php",
                data: { name: name },
                dataType: "json",
                success: function (result) {
                    if (result) {
                        // Update the table with the search result
                        var html =
                            "<tr><td>" + result.id + "</td><td>" + result.name + "</td><td>"
                            + result.address + "</td><td>" + result.salary + "</td><td>"
                            + result.off_days + "</td><td>" + result.img + "</td><td><a href='edit.php?id=" + result.id + "' class='link-dark'><i class='fa-solid fa-pen-to-square fs-5 me-3'></i></a><a href='delete.php?id=" + result.id + "' class='link-dark'><i class='fa-solid fa-trash fs-5'></i></a></td></tr>";
                       
                        var html = '<div class="box">' +

                                 '<span class="discount">-' + result.discount + '?>%</span>' +
                                 '<div class="icons">' +
                                '<a href="#" class="fas fa-heart"></a>'+
                               '<a href="#" class="fas fa-share"></a>' +
                                '<a href="#" class="fas fa-eye"></a>' +
                            '</div>' + result.image + "<h3>" +
                             result.name+
                            "</h3>" + '<div class="stars">'+
                                '<i class="fas fa-star"></i>'+
                                '<i class="fas fa-star"></i>'+
                                '<i class="fas fa-star"></i>'+
                                '<i class="fas fa-star"></i>'+
                               '' <i class="fas fa-star-half-alt"></i>' +'
                           ' </div>' 

                            
                            ;                     
                   
                           
                        $("div").html(html);
                    } else {
                        // Show a message if no results were found
                        var html = "<tr><td colspan='7' class='text-center'>No results found.</td></tr>";
                        $("tbody").html(html);
                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
<!-- product section ends -->

<?php
require('footer.php');
?>