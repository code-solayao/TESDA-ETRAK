<header>
    <nav>
        <div>
            <a href="index.php">E-TRAK</a>
            <div>
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="https://lookerstudio.google.com/reporting/9d6c7c0a-dcfb-4dda-ba67-589c230b57bd/page/GzuKE?fbclid=IwY2xjawGZXIlleHRuA2FlbQIxMAABHWw1eJ0SY4OlJju7W9T7gV5eNEVFGy5QgPEYOM0jkeni293iDCwtfhtkkQ_aem_jBd-8gTDT5g2pEeWlbhpFQ" 
                            target="_blank">Dashboard</a>
                    </li>
                    <li>
                        <form action="../sections/header.php" method="post">
                            <input type="submit" name="logout" value="Log Out">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<?php
    if (!isset($_POST["logout"])) 
        return;

    session_unset();
    session_destroy();
    header("Location: ../login/index.php");
    exit();
?>