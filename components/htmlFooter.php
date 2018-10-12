<footer>
    <p>Copyright © 2018 By Alex Garmash</p>
</footer>
<!-- include bootstrap libraries-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<?php
// adding javascript.
for($i=0;$i<count($this->js);$i++) {
    echo "<script src='js/{$this->js[$i]}'></script>";
}
?>
</body>
</html>
