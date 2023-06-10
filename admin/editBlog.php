<?php
// editBlog.php

session_start();
include('db_conn.php');

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Retrieve the blog post from the database
        $sql = "SELECT * FROM table_blog WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process the form submission
                $title = $_POST['title'];
                $content = $_POST['content'];

                // Check if a new image file was uploaded
                if ($_FILES['image']['name'] != '') {
                    $image = $_FILES['image'];
                    $imageName = $image['name'];
                    $imageTmpName = $image['tmp_name'];
                    $imageError = $image['error'];

                    // Handle image upload
                    if ($imageError === 0) {
                        $imagePath = 'blogimage/' . $imageName;
                        move_uploaded_file($imageTmpName, $imagePath);
                    }
                } else {
                    // Use the existing image
                    $imageName = $row['img'];
                }

                // Update the blog post in the database
                $updateSql = "UPDATE table_blog SET title = '$title', content = '$content', img = '$imageName' WHERE id = $id";
                $updateResult = $conn->query($updateSql);

                if ($updateResult) {
                    $_SESSION['success'] = "Blog post updated successfully.";
                    header("Location: blog.php");
                    exit();
                } else {
                    $_SESSION['error'] = "Failed to update the blog post.";
                    header("Location: home.php");
                    exit();
                }
            }

            // Display the edit form
            ?>
            <?php include 'includes2/header-admin.php';?>

            <!DOCTYPE html>
            <html>
            <head>
                <title>Edit Blog Post</title>
                <!-- Include any necessary CSS and JS files here -->
            </head>
            <body>
            <div class="main">
                <h1>Edit Blog Post</h1>

                <?php
                if (isset($_SESSION['error'])) {
                    echo "
                    <div class='alert alert-danger text-center'>
                        <button class='close'>&times;</button>
                        " . $_SESSION['error'] . "
                    </div>";
                    unset($_SESSION['error']);
                }
                ?>

                <form method="POST" action="" enctype="multipart/form-data">
                    <label for="title">Title:</label>
                    <input type="text" name="title" value="<?php echo $row['title']; ?>"><br>

                    <label for="content">Content:</label>
                    <textarea name="content"><?php echo $row['content']; ?></textarea><br>

                    <label for="image">Image:</label>
                    <input type="file" name="image"><br>

                    <input type="submit" value="Update">
                </form>
            </div>
            </body>
            </html>

            <?php
        } else {
            $_SESSION['error'] = "Blog post not found.";
            header("Location: home.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Invalid blog post ID.";
        header("Location: home.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
